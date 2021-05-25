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
use App\Scopes\FreshProductScope;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use App\Http\Traits\ImageInvTrait;

class ProductController extends Controller
{
    use ImageInvTrait;
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

    public function decline($product)
    {
        $product = Product::withoutGlobalScopes()->find($product);
        $product->update(['product_status_id' => 3]);
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 2,
            'table'     => 'Продукты',
            'description' => 'Название: ' . $product->name . ', Статус: Отклонен'
        ]);
        return redirect()->route('products.index');
    }

    public function publish($product)
    {
        $product = Product::withoutGlobalScopes()->find($product);

        $product->update(['product_status_id' => 2]);
        $product->restore();
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 2,
            'table'     => 'Продукты',
            'description' => 'Название: ' . $product->name . ', Статус: Активный'
        ]);
        // return redirect()->route('products.index');
        return redirect()->back();
    }

    public function add_product()
    {
        $cat_parent = $this->categories->where('parent_id', 0);
        $store = Store::withoutGlobalScopes()->where('user_id', Auth::id())->first()->id;
        return view('products.create', compact('cat_parent', 'store'));
    }


    public function index(Request $request)
    {
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->full($request)
            ->paginate(10)
            ->withQueryString();
        if($request->ajax()) {
            return response()->json(
                    view('dashboard.ajax.products', compact('products')
                )->render());
        }
        return view('dashboard.products.index', compact('products', 'products_stats'));
    }

    // !Разбивка статусов на странички

    public function accepted(Request $request)
    {
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->accepted($request)
            ->paginate(10)
            ->withQueryString();
        if($request->ajax()) {
            return response()->json(
                    view('dashboard.ajax.products', compact('products')
                )->render());
        }
        return view('dashboard.products.statuses.accepted', compact('products', 'products_stats'));
    }
    public function notInStock(Request $request)
    {
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->notInStock($request)
            ->paginate(10)
            ->withQueryString();
        if($request->ajax()) {
            return response()->json(
                    view('dashboard.ajax.products', compact('products')
                )->render());
        }
        return view('dashboard.products.statuses.notInStock', compact('products', 'products_stats'));
    }
    public function canceled(Request $request)
    {
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->canceled($request)
            ->paginate(10)
            ->withQueryString();
        if($request->ajax()) {
            return response()->json(
                    view('dashboard.ajax.products', compact('products')
                )->render());
        }
        return view('dashboard.products.statuses.canceled', compact('products', 'products_stats'));
    }

    public function hidden(Request $request)
    {
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->hidden($request)
            ->paginate(10)
            ->withQueryString();
        if($request->ajax()) {
            return response()->json(
                    view('dashboard.ajax.products', compact('products')
                )->render());
        }
        return view('dashboard.products.statuses.hidden', compact('products', 'products_stats'));
    }
    public function onCheck(Request $request)
    {
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->onCheck($request)
            ->paginate(10)
            ->withQueryString();
        if($request->ajax()) {
            return response()->json(
                    view('dashboard.ajax.products', compact('products')
                )->render());
        }
        return view('dashboard.products.statuses.onCheck', compact('products', 'products_stats'));
    }
    public function deleted(Request $request)
    {
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->deleted($request)
            ->paginate(10)
            ->withQueryString();
        if($request->ajax()) {
            return response()->json(
                    view('dashboard.ajax.products', compact('products')
                )->render());
        }
        return view('dashboard.products.statuses.deleted', compact('products', 'products_stats'));
    }
    // #Разбивка статусов на странички


    public function single($slug)
    {
        $product = Product::withoutGlobalScopes()->withTrashed()->where('slug', $slug)->first();
        if(Auth::check()){
            if($product->store->user_id != Auth::user()->id){
                $product = Product::where('slug', $slug)->first();
            }
        }
        if(!$product) abort(404);
        $similars = Product::where('store_id', $product->store_id)->where('product_status_id', 2)->latest()->take(10)->get();

        $countProd = Order::select('product_id', DB::raw('count(product_id) as countProd'))
            ->groupBy('product_id');
        $topProducts = Product::where('product_status_id', 2)
            ->where('category_id', $product->category_id)
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
        $stores = Store::withoutGlobalScopes()->where('is_active', 1)->get();
        $categories = $this->categories;
        return view('dashboard.products.create', compact('categories', 'stores'));
    }

    public function editProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $attributes = $product->category->attributes->map(function ($attributes) use ($product) {
            $attributes->is_checked = $product->attribute_variation->pluck('attribute_id')->contains($attributes->id);
            return $attributes;
        });

        $attrValues = AttributeValue::all()->map(function ($attrValues) use ($product) {
            $attrValues->is_checked = $product->attribute_variation->pluck('attribute_value_id')->contains($attrValues->id);
            return $attrValues;
        });

        $allCategories = Category::get();
        $category = Category::where('id', $product->category_id)->first();
        $parent = null;
        $grandParent = null;
        $hasParentCategory = false;
        if (!$product->category->parent) {
            $hasParentCategory = true;
        }
        if ($category->parent_id != 0) {
            $parent = Category::where('id', $category->parent_id)->first();
            if ($parent->parent_id) {
                $grandParent = Category::where('id', $parent->parent_id)->first();
            }
        }
        $cat_parent = $this->categories->where('parent_id', 0);
        return view('products.edit', compact('product', 'cat_parent', 'category', 'parent', 'grandParent', 'allCategories', 'attributes', 'attrValues', 'hasParentCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function ft_store(ProductRequest $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
    //         'gallery' => 'sometimes'
    //     ]);


    //     $img = Image::make($request->file('image')->getRealPath());

    //     //Create folder if doesn't exist
    //     $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
    //     if(!File::isDirectory($yearFolder)){
    //         File::makeDirectory($yearFolder, 0777, true);
    //     }

    //     $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
    //     $this->cropImage($img, 800, 100, $nowYear);
    //     // return $this->cropImage($img, 800, 100, $nowYear);
    //     $product = Product::create($request->validated() + ['image' => $nowYear . '800x800.jpg', 'gallery' => $request->gallery]);

    //     if(isset($request->attribute)) {
    //         foreach ($request->attribute as $name => $attribute) {
    //             // print($attribute);
    //             if($name != 'cvet'){
    //                 $attribute_id = Attribute::where('slug', $name)->first()->id;
    //                 foreach($attribute['value'] as $value){
    //                     ProductAttribute::create([
    //                         'product_id' => $product->id,
    //                         'attribute_id' => $attribute_id,
    //                         'attribute_value_id' => $value
    //                     ]);
    //                 }
    //             }
    //         }
    //     }
    //     if(isset($request->cvet)) {
    //         $cvet = explode(',', $request->cvet);
    //         for($i = 0; $i < count($cvet); $i++){
    //             $attribute_id = Attribute::where('slug', 'cvet')->first()->id;
    //             ProductAttribute::create([
    //                 'product_id' => $product->id,
    //                 'attribute_id' => $attribute_id,
    //                 'attribute_value_id' => $cvet[$i]
    //             ]);
    //         }
    //     }
    //     return view('useful_links.thanks')->with(['title' => 'Товар успешно добавлен и проходит модерацию']);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function ft_update(ProductRequest $request, Product $product)
    // {
    //     if ($request->image != $product->image && $request->image != null)
    //     {
    //         $request->validate([
    //             'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP',
    //             'gallery' => 'sometimes'
    //         ]);

    //         //Create folder if doesn't exist
    //         $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
    //         if(!File::isDirectory($yearFolder)){
    //             File::makeDirectory($yearFolder, 0777, true);
    //         }

    //         $img = Image::make($request->file('image')->getRealPath());
    //         $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
    //         $this->cropImage($img, 800, 100, $nowYear);

    //         $image = $nowYear . '800x800.jpg';
    //         $product->update([
    //             'image' => $image,
    //         ]);
    //     }
    //     $product->update($request->validated() + ['gallery' => $request->gallery]);

    //     if(isset($request->attribute) || isset($request->cvet)) {
    //         $delete = ProductAttribute::where('product_id', $product->id);
    //         if($delete->count() > 0){
    //             $delete->delete();
    //         }
    //     }

    //     if(isset($request->attribute)) {
    //         foreach ($request->attribute as $name => $attribute) {
    //             if($name != 'cvet'){
    //                 $attribute_id = Attribute::where('slug', $name)->first()->id;
    //                 foreach($attribute['value'] as $value){
    //                     ProductAttribute::create([
    //                         'product_id' => $product->id,
    //                         'attribute_id' => $attribute_id,
    //                         'attribute_value_id' => $value
    //                     ]);
    //                 }
    //             }
    //         }
    //     }
    //     if(isset($request->cvet)) {
    //         $cvet = explode(',', $request->cvet);
    //         for($i = 0; $i < count($cvet); $i++){
    //             $attribute_id = Attribute::where('slug', 'cvet')->first()->id;
    //             ProductAttribute::create([
    //                 'product_id' => $product->id,
    //                 'attribute_id' => $attribute_id,
    //                 'attribute_value_id' => $cvet[$i]
    //             ]);
    //         }
    //     }
    //     return view('useful_links.thanks')->with(['title' => 'Товар успешно изменен и проходит модерацию']);
    // }

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
            'gallery' => 'sometimes'
        ]);


        $img = Image::make($request->file('image')->getRealPath());

        //Create folder if doesn't exist
        $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
        if (!File::isDirectory($yearFolder)) {
            File::makeDirectory($yearFolder, 0777, true);
        }

        $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
        $this->cropImage($img, 800, 100, $nowYear);

        $product = Product::create($request->validated() + ['image' => $nowYear . '800x800.jpg', 'gallery' => $request->gallery]);

        if (isset($request->attribute)) {
            foreach ($request->attribute as $name => $attribute) {
                $attribute_id = Attribute::where('slug', $name)->first()->id;
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute_id,
                    'attribute_value_id' => $attribute['value']
                ]);
            }
        }

        //Save to Logs
        $category = Category::where('id', $request->category_id)->first()->name;
        $store = Store::where('id', $request->store_id)->first()->name;
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 1,
            'table'     => 'Продукты',
            'description' => 'Название: ' . $request->name . ', Категория: ' . $category . ', Цена: ' . $request->price . ', Количество: ' . $request->quantity . ', Описание: ' . $request->description . ', Магазин: ' . $store
        ]);
        return redirect()->route('products.index');
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
    public function edit($product)
    {
        $product = Product::withoutGlobalScopes()->find($product);
        $attributes = $product->category->attributes->map(function ($attributes) use ($product) {
            $attributes->is_checked = $product->attribute_variation->pluck('attribute_id')->contains($attributes->id);
            return $attributes;
        });

        $attrValues = AttributeValue::all()->map(function ($attrValues) use ($product) {
            $attrValues->is_checked = $product->attribute_variation->pluck('attribute_value_id')->contains($attrValues->id);
            return $attrValues;
        });

        $allCategories = Category::get();
        $category = Category::where('id', $product->category_id)->first();
        $parent = null;
        $grandParent = null;
        if ($category->parent_id != 0) {
            $parent = Category::where('id', $category->parent_id)->first();
            if ($parent->parent_id) {
                $grandParent = Category::where('id', $parent->parent_id)->first();
            }
        }
        $categories = $this->categories;
        $stores = Store::withoutGlobalScopes()->where('is_active', 1)->get();

        return view('dashboard.products.edit', compact('stores', 'product', 'allCategories', 'parent', 'grandParent', 'category', 'attributes', 'attrValues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {
        $product = Product::withoutGlobalScopes()->find($product);
        if ($request->image != $product->image && $request->image != null) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP',
                'gallery' => 'sometimes'
            ]);

            //Create folder if doesn't exist
            $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
            if (!File::isDirectory($yearFolder)) {
                File::makeDirectory($yearFolder, 0777, true);
            }

            $img = Image::make($request->file('image')->getRealPath());
            $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
            $this->cropImage($img, 800, 100, $nowYear);

            $image = $nowYear . '800x800.jpg';
            $product->update([
                'image' => $image,
            ]);
        }
        $product->update($request->validated() + ['gallery' => $request->gallery]);
        if (isset($request->attribute)) {

            $delete = ProductAttribute::where('product_id', $product->id);
            if ($delete->count() > 0) {
                $delete->delete();
            }

            foreach ($request->attribute as $name => $attribute) {
                $attribute_id = Attribute::where('slug', $name)->first()->id;
                foreach ($attribute['value'] as $value) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $attribute_id,
                        'attribute_value_id' => $value
                    ]);
                }
            }
        }
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
        $store = Store::withoutGlobalScopes()->where('id', $product->store_id)->get();
        $previous = url()->previous();
        if(str_contains($previous, 'products/single/')){
            $product->delete();
            return redirect()->route('ft-store.show', $store->first()->slug);
        }
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 3,
            'table'     => 'Продукты',
            'description' => 'Название: ' . $product->name . ', Категория: ' . $category . ', Цена: ' . $product->price . ', Количество: ' . $product->quantity . ', Описание: ' . $product->description . ', Магазин: ' . $store->first()->name
        ]);
        $product->delete();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function cancelDestroy($product)
    {
        $product = Product::withTrashed()->where('slug', $product)->first();
        $store = Store::withoutGlobalScopes()->where('id', $product->store_id)->get();
        $previous = url()->previous();
        if(str_contains($previous, 'products/single/')){
            $product->restore();
            return redirect()->route('ft-store.show', $store->first()->slug);
        }
        $product->restore();
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
    // function cropImage($img, $dimension, $sides, $nowYear)
    // {
    //     $width  = $img->width();
    //     $height = $img->height();
    //     $vertical   = (($width < $height) ? true : false);
    //     $horizontal = (($width > $height) ? true : false);
    //     $square     = (($width = $height) ? true : false);

    //     if ($vertical) {
    //         $top = $bottom = 0;
    //         $newHeight = ($dimension) - ($bottom + $top);
    //         $img->resize(null, $newHeight, function ($constraint) {
    //             $constraint->aspectRatio();
    //         });

    //     } else if ($horizontal) {
    //         $right = $left = 0;
    //         $newWidth = ($dimension) - ($right + $left);
    //         $img->resize($newWidth, null, function ($constraint) {
    //             $constraint->aspectRatio();
    //         });

    //     } else if ($square) {
    //         $right = $left = 0;
    //         $newWidth = ($dimension) - ($left + $right);
    //         $img->resize($newWidth, null, function ($constraint) {
    //             $constraint->aspectRatio();
    //         });
    //     }
    //     $path = $nowYear . $dimension . 'x' . $dimension . '.jpg';

    //     // create an image manager instance with favored driver
    //     $manager = new ImageManager(array('driver' => 'gd'));

    //     $back = $manager->canvas($dimension, $dimension, '#ffffff');
    //     $back->insert($img, 'center');
    //     $watermark = Image::make(public_path('storage/logo_fason_white.png'))->resize(134, 50)->opacity('50');
    //     $back->insert($watermark, 'bottom-right', 50, 50);

    //     $back->save(public_path('/storage/' . $path));
    // }

    public function test_store(Request $request)
    {
        if ($request->ajax()) {
            $base64_images = json_decode($request->gallery);
            $main_image_json = $request->image;
            $year_month = now()->year . '/' . sprintf("%02d", now()->month);

            $main_image = $year_month . '/' . uniqid() . '.jpg';
            if (preg_match('/^data:image\/(\w+);base64,/', $main_image_json)) {
                $data = substr($main_image_json, strpos($main_image_json, ',') + 1);
                $data = base64_decode($data);
                Storage::disk('public')->put($main_image, $data);
                $main_image = $this->uploadImage($main_image);
            };

            if (!empty($base64_images)) {
                $images = [];
                foreach ($base64_images as $base64_image) {
                    $image = $year_month . '/' . uniqid() . '.jpg';
                    if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                        $data = substr($base64_image, strpos($base64_image, ',') + 1);
                        $data = base64_decode($data);
                        Storage::disk('public')->put($image, $data);
                        array_push($images, $this->uploadImage($image));
                    };
                }
            }
            Product::create(
                [
                    'name' =>  $request->name,
                    'description' =>  $request->description,
                    'category_id' =>  $request->cat_id,
                    'quantity' =>  $request->quantity,
                    'price' =>  $request->price,
                    'store_id' =>  $request->store_id,
                    'product_status_id' =>  1,
                    'image' =>  $main_image,
                    'gallery' =>  !empty($base64_images) ? json_encode($images) : null,
                    'created_at' => Carbon::now()
                ]
            );
        }
    }
    public function test_update(Request $request, Product $product)
    {


        if ($request->ajax()) {
            $base64_images = json_decode($request->gallery);

            $main_image_json = $request->image;

            $year_month = now()->year . '/' . sprintf("%02d", now()->month);
            if (preg_match('/^data:image\/(\w+);base64,/', $main_image_json)) {
                $main_image = $year_month . '/' . uniqid() . '.jpg';

                $data = substr($main_image_json, strpos($main_image_json, ',') + 1);

                $data = base64_decode($data);

                Storage::disk('public')->put($main_image, $data);
                $main_image = $this->uploadImage($main_image);
            } else {
                $main_image = str_replace("https://fason.tj//storage/", "", $main_image_json);
            }

            if (!empty($base64_images)) {
                $images = [];

                foreach ($base64_images as $base64_image) {

                    if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                        $image = $year_month . '/' . uniqid() . '.jpg';

                        $data = substr($base64_image, strpos($base64_image, ',') + 1);
                        $data = base64_decode($data);
                        Storage::disk('public')->put($image, $data);
                        array_push($images, $this->uploadImage($image));
                    } else {
                        $image = str_replace("https://fason.tj//storage/", "", $base64_image);
                        array_push($images, $image);
                    }
                }
            }
            $product->update(
                [
                    'name' =>  $request->name,
                    'description' =>  $request->description,
                    'category_id' =>  $request->cat_id,
                    'quantity' =>  $request->quantity,
                    'price' =>  $request->price,
                    'store_id' =>  $request->store_id,
                    'product_status_id' =>  1,
                    'image' =>  $main_image,
                    'gallery' =>  !empty($base64_images) ? json_encode($images) : null,
                    'created_at' => Carbon::now()
                ]
            );
        }
    }
}
