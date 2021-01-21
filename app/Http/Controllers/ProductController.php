<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Http\Requests\ProductRequest;
use App\Models\Log;
use App\Models\Order;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->categories = Category::get();
        $this->stores = Store::get();
        $this->count = 1;
    }

    public function decline(Product $product) {
        $product->update(['product_status_id' => 3]);
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 2,
            'table'     => 'Продукты',
            'description' => 'Название: ' . $product->name . ', Статус: Отклонен'
        ]);
        return redirect()->route('products.index');
    }
    public function publish(Product $product) {
        $product->update(['product_status_id' => 2]);
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 2,
            'table'     => 'Продукты',
            'description' => 'Название: ' . $product->name . ', Статус: Активный'
        ]);
        return redirect()->route('products.index');
    }

    public function add_product()
    {
        $cat_parent = $this->categories->where('parent_id', 0);
        return view('products.create', compact('cat_parent'));
    }


    public function index()
    {
        $products = Product::latest()->withoutGlobalScopes()->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    public function single($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $similars = Product::where('store_id', $product->store_id)->where('product_status_id', 2)->latest()->take(10)->get();
        $similars = Product::where('store_id', $product->store_id)->where('product_status_id', 2)->latest()->take(10)->get();

        $countProd = Order::select('product_id', DB::raw('count(product_id) as countProd'))
        ->groupBy('product_id');
        $topProducts = Product::where('product_status_id', 2)
        ->select(DB::raw('products.*, countProd.countProd'))
        ->leftJoinSub($countProd, 'countProd', function ($join) {
            $join->on('products.id', '=', 'countProd.product_id');
        })->orderByDesc('countProd')->paginate(15);
        $attributes = $product->attribute_variation;
        return view('products.single', compact('product', 'similars', 'attributes', 'topProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = $this->stores;
        $categories = $this->categories;

        return view('dashboard.products.create', compact('categories', 'stores'));
    }

    public function editProduct($slug)
    {
        $allCategories = Category::get();
        $id = Product::where('slug', $slug)->first();
        $category = Category::where('id', $id->category_id)->first();
        $parent = null;
        $grandParent = null;
        if($category->parent_id != 0){
            $parent = Category::where('id', $category->parent_id)->first();
            if($parent->parent_id){
                $grandParent = Category::where('id', $parent->parent_id)->first();
            }
        }
        $cat_parent = $this->categories->where('parent_id', 0);
        $product = Product::where('id', $id->id)->first();
        return view('products.edit', compact('product', 'cat_parent', 'category', 'parent', 'grandParent', 'allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ft_store(ProductRequest $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
        ]);

        $img = Image::make($request->file('image')->getRealPath());
        $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(145, 62)->opacity('50');
        $img->insert($watermark, 'bottom-right', 50, 50);

        //Create folder if doesn't exist
        $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
        if(!File::isDirectory($yearFolder)){
            File::makeDirectory($yearFolder, 0777, true);
        }

        $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
        $this->cropImage($img, 480, 50, $nowYear);
        $this->cropImage($img, 800, 83, $nowYear);

        $gallery = $request->file('gallery');
        $galleries = [];
        foreach($gallery as $images){
            $singleImage = Image::make($images->getRealPath());
            $singleImage->insert($watermark, 'bottom-right', 50, 50);
            $nowYear1 = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
            $this->cropImage($singleImage, 800, 83, $nowYear1);
            $image_single = $nowYear1 . '800x800.jpg';
            array_push($galleries, $image_single);
        }

        $product = Product::create($request->validated() + ['image' => $image, 'gallery' => json_encode($galleries, true)]);


        foreach ($request->attribute as $attribute) {
           foreach($attribute as $item) {
               ProductAttribute::insert([
                'product_id' => $product->id,
                'attribute_id' => $attribute['id'],
                'attribute_value_id' => $item
            ]);
           }
        }
        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
        ]);

        $img = Image::make($request->file('image')->getRealPath());
        $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
        $img->insert($watermark, 'bottom-right', 50, 50);

        //Create folder if doesn't exist
        $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
        if(!File::isDirectory($yearFolder)){
            File::makeDirectory($yearFolder, 0777, true);
        }

        $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
        $this->cropImage($img, 480, 50, $nowYear);
        $this->cropImage($img, 800, 83, $nowYear);

        $gallery = $request->file('gallery');
        $galleries = [];
        foreach($gallery as $images){
            $singleImage = Image::make($images->getRealPath());
            $singleImage->insert($watermark, 'bottom-right', 50, 50);
            $nowYear1 = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
            $this->cropImage($singleImage, 800, 83, $nowYear1);
            $image_single = $nowYear1 . '800x800.jpg';
            array_push($galleries, $image_single);
        }

        Product::create($request->validated() + ['image' => $nowYear . '480x480.jpg', 'gallery' => json_encode($galleries, true)]);

        //Save to Logs
        $category = Category::where('id', $request->category_id)->first()->name;
        $store = Store::where('id', $request->store_id)->first()->name;
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 1,
            'table'     => 'Продукты',
            'description' => 'Название: ' . $request->name . ', Категория: ' . $category . ', Цена: ' . $request->price . ', Количество: ' . $request->quantity . ', Описание: ' . $request->description . ', Магазин: ' . $store
        ]);
        return redirect()->route('dashboard.products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $allCategories = Category::get();
        $category = Category::where('id', $product->category_id)->first();
        $parent = null;
        $grandParent = null;
        if($category->parent_id != 0){
            $parent = Category::where('id', $category->parent_id)->first();
            if($parent->parent_id){
                $grandParent = Category::where('id', $parent->parent_id)->first();
            }
        }
        $categories = $this->categories;
        return view('dashboard.products.edit', compact('product', 'allCategories', 'parent', 'grandParent', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->image != $product->image && $request->image != null)
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP',
            ]);

            //Create folder if doesn't exist
            $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
            if(!File::isDirectory($yearFolder)){
                File::makeDirectory($yearFolder, 0777, true);
            }

            $img = Image::make($request->file('image')->getRealPath());
            $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
            $img->insert($watermark, 'bottom-right', 50, 50);
            $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
            $this->cropImage($img, 480, 50, $nowYear);
            $this->cropImage($img, 800, 83, $nowYear);

            $image = $nowYear . '480x480.jpg';
            $product->update([
                'image' => $image,
            ]);
        }

        if(!empty($gallery = $request->file('gallery'))){
            $gallery = $request->file('gallery');
            $galleries = [];
            foreach($gallery as $images){
                $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
                if(!File::isDirectory($yearFolder)){
                    File::makeDirectory($yearFolder, 0777, true);
                }

                $singleImage = Image::make($images->getRealPath());
                $img = Image::make($request->file('image')->getRealPath());
                $img->insert($watermark, 'bottom-right', 50, 50);
                $nowYear1 = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
                $this->cropImage($singleImage, 800, 83, $nowYear1);

                $image_single = $nowYear1 . '800x800.jpg';
                array_push($galleries, $image_single);
            }
            $product->update([
                'gallery' => json_encode($galleries),
            ]);
        }

        $product->update($request->validated());
        $category = Category::where('id', $request->category_id)->first()->name;
        $store = Store::where('id', $request->store_id)->first()->name;
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 2,
            'table'     => 'Продукты',
            'description' => 'Название: ' . $request->name . ', Категория: ' . $category . ', Цена: ' . $request->price . ', Количество: ' . $request->quantity . ', Описание: ' . $request->description . ', Магазин: ' . $store
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $category = Category::where('id', $product->category_id)->first()->name;
        $store = Store::where('id', $product->store_id)->first()->name;
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 3,
            'table'     => 'Продукты',
            'description' => 'Название: ' . $product->name . ', Категория: ' . $category . ', Цена: ' . $product->price . ', Количество: ' . $product->quantity . ', Описание: ' . $product->description . ', Магазин: ' . $store
        ]);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function getAttributes()
    {
        $attributes = Attribute::get();
        return [
            'attributes' => view('products.attribute', compact('attributes'))->render()
        ];
    }

    public function getAttValues(Request $request)
    {
        $att_values = AttributeValue::find($request->id);
        return $att_values;
    }

    // Add white background to free spaces
    function cropImage($img, $dimension, $sides, $nowYear)
    {
        $width  = $img->width();
        $height = $img->height();
        $vertical   = (($width < $height) ? true : false);
        $horizontal = (($width > $height) ? true : false);
        $square     = (($width = $height) ? true : false);

        if ($vertical) {
            $top = $bottom = $sides;
            $newHeight = ($dimension) - ($bottom + $top);
            $img->resize(null, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            });

        } else if ($horizontal) {
            $right = $left = 0;
            $newWidth = ($dimension) - ($right + $left);
            $img->resize($newWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });

        } else if ($square) {
            $right = $left = $sides;
            $newWidth = ($dimension) - ($left + $right);
            $img->resize($newWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $image = $nowYear . $dimension . 'x' . $dimension . '.jpg';

        $img->resizeCanvas($dimension, $dimension, 'center', false, '#ffffff');
        // $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
        // $img->insert($watermark, 'bottom-right', 25, 25);
        $img->save(public_path('/storage/' . $image));
    }
}
