<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    }

    public function decline(Product $product) {
        $product->update(['product_status_id' => 3]);
        return redirect()->route('products.index');
    }
    public function publish(Product $product) {
        $product->update(['product_status_id' => 2]);
        return redirect()->route('products.index');
    }

    public function add_product()
    {
        $cat_parent = $this->categories->where('parent_id', 0);
        return view('products.create', compact('cat_parent'));
    }


    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    public function single($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $similars = Product::where('store_id', $product->store_id)->get();
        // return Auth::user()->store->id;
        return view('products.single', compact('product', 'similars'));
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
        // return $request;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
        ]);
        $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
        $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();

        $save = Image::make($request->file('image'))->resize(480, 480, function ($constraint) {
            $constraint->upsize();
        });
        $save_single = Image::make($request->file('image'))->fit(800, 800, function ($constraint) {
            $constraint->upsize();
        });
        $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
        $save->insert($watermark, 'bottom-right', 25, 25);
        $save_single->insert($watermark, 'bottom-right', 25, 25);

        $image = $nowYear . '480x480.jpg';
        $image_single = $nowYear . '800x800.jpg';
        if (!file_exists(public_path('/storage/' . $image))) {
            Storage::makeDirectory($yearFolder);
            $save->save(public_path('/storage/' . $image));
            $save_single->save(public_path('/storage/' . $image_single));
        } else {
            $save->save(public_path('/storage/' . $image));
            $save_single->save(public_path('/storage/' . $image_single));
        }

        $gallery = $request->file('gallery');
        $galleries = [];
        foreach($gallery as $images){
            $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
            $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();

            $save_single = Image::make($images)->fit(800, 800, function ($constraint) {
                $constraint->upsize();
            });
            $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
            $save_single->insert($watermark, 'bottom-right', 25, 25);

            $image_single = $nowYear . '800x800.jpg';
            $save_single->save(public_path('/storage/' . $image_single));
            array_push($galleries, $image_single);
        }

        Product::create($request->validated() + ['image' => $image, 'gallery' => json_encode($galleries, true)]);
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
        $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
        $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();

        $save = Image::make($request->file('image'))->resize(480, 480, function ($constraint) {
            $constraint->upsize();
        });
        $save_single = Image::make($request->file('image'))->fit(800, 800, function ($constraint) {
            $constraint->upsize();
        });
        $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
        $save->insert($watermark, 'bottom-right', 25, 25);
        $save_single->insert($watermark, 'bottom-right', 25, 25);

        $image = $nowYear . '480x480.jpg';
        $image_single = $nowYear . '800x800.jpg';
        if (!file_exists(public_path('/storage/' . $image))) {
            Storage::makeDirectory($yearFolder);
            $save->save(public_path('/storage/' . $image));
            $save_single->save(public_path('/storage/' . $image_single));
        } else {
            $save->save(public_path('/storage/' . $image));
            $save_single->save(public_path('/storage/' . $image_single));
        }

        $gallery = $request->file('gallery');
        $galleries = [];
        foreach($gallery as $images){
            $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
            $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();

            $save_single = Image::make($images)->fit(800, 800, function ($constraint) {
                $constraint->upsize();
            });
            $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
            $save_single->insert($watermark, 'bottom-right', 25, 25);

            $image_single = $nowYear . '800x800.jpg';
            $save_single->save(public_path('/storage/' . $image_single));
            array_push($galleries, $image_single);
        }

        Product::create($request->validated() + ['image' => $image, 'gallery' => json_encode($galleries, true)]);
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
        if ($request->image != $product->image && $request->image != null) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP',
            ]);
            $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
            $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();

            $save = Image::make($request->file('image'))->resize(480, 480, function ($constraint) {
                $constraint->upsize();
            });
            $save_single = Image::make($request->file('image'))->fit(800, 800, function ($constraint) {
                $constraint->upsize();
            });
            $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
            $save->insert($watermark, 'bottom-right', 25, 25);
            $save_single->insert($watermark, 'bottom-right', 25, 25);

            $image = $nowYear . '480x480.jpg';
            $image_single = $nowYear . '800x800.jpg';
            if (!file_exists(public_path('/storage/' . $image))) {
                Storage::makeDirectory($yearFolder);
                $save->save(public_path('/storage/' . $image));
                $save_single->save(public_path('/storage/' . $image_single));
            } else {
                $save->save(public_path('/storage/' . $image));
                $save_single->save(public_path('/storage/' . $image_single));
            }
            $product->update([
                'image' => $image,
            ]);
        }

        if(!empty($gallery = $request->file('gallery'))){
            $gallery = $request->file('gallery');
            $galleries = [];
            foreach($gallery as $image){
                $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
                $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();

                $save_single = Image::make($image)->fit(800, 800, function ($constraint) {
                    $constraint->upsize();
                });
                $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
                $save_single->insert($watermark, 'bottom-right', 25, 25);

                $image_single = $nowYear . '800x800.jpg';
                if (!file_exists(public_path('/storage/' . $image))) {
                    Storage::makeDirectory($yearFolder);
                    $save_single->save(public_path('/storage/' . $image_single));
                    array_push($galleries, $image_single);
                } else {
                    $save_single->save(public_path('/storage/' . $image_single));
                    array_push($galleries, $image_single);
                }
            }
            $product->update([
                'gallery' => $galleries,
            ]);
        }

        $product->update($request->validated());
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
        $product->delete();
        return redirect()->route('products.index');
    }
}
