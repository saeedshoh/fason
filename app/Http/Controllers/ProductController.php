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
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Traits\ImageInvTrait;

class ProductController extends Controller
{
    use ImageInvTrait;

    public function __construct()
    {
        $this->categories = Category::get();

        $this->middleware('permission:create-products', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-products', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-products', ['only' => ['destroy']]);
        $this->middleware('permission:read-products', ['only' => ['index', 'show']]);
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
        return redirect()->route('products.index');
    }

    public function add_product()
    {
        $cat_parent = $this->categories->where('parent_id', 0);
        $store = Store::withoutGlobalScopes()->where('user_id', Auth::id())->first()->id;
        return view('products.create', compact('cat_parent', 'store'));
    }

    public function index(Request $request)
    {
        session()->forget('previous_product');
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->full($request)
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.products',
                    compact('products')
                )->render()
            );
        }
        return view('dashboard.products.index', compact('products', 'products_stats'));
    }

    // !Разбивка статусов на странички
    public function accepted(Request $request)
    {
        session()->forget('previous_product');
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->accepted($request)
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.products',
                    compact('products')
                )->render()
            );
        }
        return view('dashboard.products.statuses.accepted', compact('products', 'products_stats'));
    }

    public function notInStock(Request $request)
    {
        session()->forget('previous_product');
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->notInStock($request)
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.products',
                    compact('products')
                )->render()
            );
        }
        return view('dashboard.products.statuses.notInStock', compact('products', 'products_stats'));
    }

    public function canceled(Request $request)
    {
        session()->forget('previous_product');
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->canceled($request)
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.products',
                    compact('products')
                )->render()
            );
        }
        return view('dashboard.products.statuses.canceled', compact('products', 'products_stats'));
    }

    public function hidden(Request $request)
    {
        session()->forget('previous_product');
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->hidden($request)
            ->paginate(30)
            ->withQueryString();

        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.products',
                    compact('products')
                )->render()
            );
        }
        return view('dashboard.products.statuses.hidden', compact('products', 'products_stats'));
    }

    public function onCheck(Request $request)
    {
        session()->forget('previous_product');
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->onCheck($request)
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.products',
                    compact('products')
                )->render()
            );
        }
        return view('dashboard.products.statuses.onCheck', compact('products', 'products_stats'));
    }

    public function deleted(Request $request)
    {
        session()->forget('previous_product');
        $products_stats = Product::withoutGlobalScopes()->get();

        $products = Product::withoutGlobalScopes()
            ->deleted($request)
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.products',
                    compact('products')
                )->render()
            );
        }
        return view('dashboard.products.statuses.deleted', compact('products', 'products_stats'));
    }
    // #Разбивка статусов на странички

    public function single($slug)
    {
        $product = Product::withoutGlobalScopes()->withTrashed()->where('slug', $slug)->first();
        if (Auth::check()) {
            if ($product->store->user_id != Auth::user()->id) {
                $product = Product::where('slug', $slug)->first();
            }
        }
        if (!$product) abort(404);
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
        if(!session('previous_product')){
            session(['previous_product' => url()->previous()]);
        }
        $stores = Store::withoutGlobalScopes()->where('is_active', 1)->get(['id', 'name']);
        $categories = $this->categories;
        return view('dashboard.products.create', compact('categories', 'stores'));
    }

    public function editProduct($slug)
    {
        $product = Product::withoutGlobalScopes()->where('slug', $slug)->first();
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
    public function store(ProductRequest $request)
    {
        dd($request->all());
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        if(!session('previous_product')){
            session(['previous_product' => url()->previous()]);
        }
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
        $stores = Store::withoutGlobalScopes()->where('is_active', 1)->get(['id', 'name']);
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
        $product_status_id = 1;
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
        if(auth()->user()->isAn('admin')){
            $product_status_id = 2;
        }
        $product->update($request->validated() + ['gallery' => $request->gallery, 'product_status_id' => $product_status_id]);
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
    public function destroy($product)
    {
        $product = Product::withoutGlobalScopes()->find($product);
        $category = Category::where('id', $product->category_id)->first()->name;
        $store = Store::withoutGlobalScopes()->where('id', $product->store_id)->get();
        $previous = url()->previous();
        if (str_contains($previous, 'products/single/')) {
            $product->delete();
            return redirect()->route('ft-store.show', $store->first()->slug);
        }
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 3,
            'table'     => 'Продукты',
            'description' => 'Название: ' . $product->name . ', Категория: ' . $category . ', Цена: ' . $product->price . ', Количество: ' . $product->quantity . ', Описание: ' . $product->description . ', Магазин: ' . $store->first()->name
        ]);
        $product->update(['product_status_id' => 6]);
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
        $product = Product::withoutGlobalScopes()->where('slug', $product)->first();
        $store = Store::withoutGlobalScopes()->where('id', $product->store_id)->get();
        $previous = url()->previous();
        if (str_contains($previous, 'products/single/')) {
            $product->restore();
            return redirect()->route('ft-store.show', $store->first()->slug);
        }
        $product->update(['product_status_id' => 2]);
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
            $product = Product::create(
                [
                    'name'              => $request->name,
                    'description'       => $request->description,
                    'category_id'       => $request->cat_id,
                    'quantity'          => $request->quantity,
                    'price'             => $request->price,
                    'store_id'          => $request->store_id,
                    'product_status_id' => auth()->user()->status == 1 ? 2 : 1,
                    'image'             => $main_image,
                    'gallery'           => !empty($base64_images) ? json_encode($images) : null,
                    'created_at'        => Carbon::now()
                ]
            );
            if (isset($request->attribute)) {
                $attributes = json_decode($request->attribute);
                foreach($attributes as $attribute){
                    foreach($attribute->attribute_values as $attribute_value){
                        ProductAttribute::create([
                            'product_id' => $product->id,
                            'attribute_id' => $attribute->id,
                            'attribute_value_id' => $attribute_value
                        ]);
                    }
                }
            }
        }
    }

    public function test_update(Request $request, $product)
    {
        $product = Product::withoutGlobalScopes()->find($product);
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
                $main_image = str_replace(url('/') . '//storage', "", $main_image_json);
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
                        $image = str_replace(url('/') . '//storage/', "", $base64_image);
                        array_push($images, $image);
                    }
                }
            }
            $product->update(
                [
                    'name'              => $request->name,
                    'description'       => $request->description,
                    'category_id'       => $request->cat_id,
                    'quantity'          => $request->quantity,
                    'price'             => $request->price,
                    'store_id'          => $request->store_id,
                    'product_status_id' => auth()->user()->status == 1 ? 2 : 1,
                    'image'             => $main_image,
                    'gallery'           => !empty($base64_images) ? json_encode($images) : null,
                    'created_at'        => Carbon::now()
                ]
            );
            if (isset($request->attribute)) {

                $product_attributes = ProductAttribute::where('product_id', $product->id);
                if ($product_attributes->count() > 0) {
                    $product_attributes->delete();
                }

                if (isset($request->attribute)) {
                    $attributes = json_decode($request->attribute);
                    foreach($attributes as $attribute){
                        foreach($attribute->attribute_values as $attribute_value){
                            ProductAttribute::create([
                                'product_id' => $product->id,
                                'attribute_id' => $attribute->id,
                                'attribute_value_id' => $attribute_value
                            ]);
                        }
                    }
                }
            }
        }
    }
}
