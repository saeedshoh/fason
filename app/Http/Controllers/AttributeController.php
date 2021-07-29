<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:create-attributes', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-attributes', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-attributes', ['only' => ['destroy']]);
        $this->middleware('permission:read-attributes', ['only' => ['index', 'show']]);
    }


    public function index(Request $request)
    {
        $attributes = Attribute::with('attribute_values')
            ->where('name', 'like', '%'.$request->search.'%')
            ->paginate(30)
            ->withQueryString();
        if($request->ajax()) {
            return response()->json(
                    view('dashboard.ajax.attributes', compact('attributes')
                )->render());
        }
        return view('dashboard.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $attributes = Attribute::get();
        return view('dashboard.attributes.create', compact('categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = Attribute::create($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => ' Атрибуты',
            'description' => 'Название: ' . $request->name
        ]);
        return redirect(route('attributes.index'))->with(['class' => 'success', 'message' => 'Аттрибут  «'.$attr->name.'»  успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        return view('dashboard.attributes.show', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        $categories = Category::get();
        return view('dashboard.attributes.edit', compact('attribute', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $page = '';
        if(strrpos($request->previous,'?')){
            $page = substr($request->previous, strrpos($request->previous,'?'));
        }
        $attribute->update($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => ' Атрибуты',
            'description' => 'Название: ' . $request->name
        ]);
        return redirect(route('attributes.index').$page)->with(['class' => 'primary', 'message' => 'Аттрибут  «'.$attribute->name.'»  успешно изменена!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $message = 'Аттрибут «'.$attribute->name.'» успешно удалена!';
        $class = 'danger';
        if($attribute->products->isEmpty()){
            Log::create([
                'user_id' => Auth::user()->id,
                'action' => 3,
                'table'  => ' Атрибуты',
                'description' => 'Название: ' . $attribute->name
            ]);
            $attribute->delete();
        } else {
            $class = 'warning';
            $message = 'Невозможно удалить атрибут, так как есть товар с таким атрибутом.';
        }
        return redirect(route('attributes.index'))->with(['class' => $class, 'message' => $message]);
    }

    public function attributes(Request $request)
    {
        if ($request->ajax()) {
            $request->validate(['category_id' => 'required|numeric|digits_between:1,20']);
            return DB::table('category_attributes')->select('category_attributes.*', 'attributes.name AS at_name', 'attributes.slug AS at_slug', 'attributes.id AS at_id')
                    ->where('category_id', $request->category_id)
                    ->leftJoin('attributes', 'attributes.id', '=', 'category_attributes.attribute_id')->get();
        }

        abort(404);
    }

    public function attributesValue(Request $request)
    {
        if ($request->ajax()) {
            $request->validate(['attribute_id' => 'required|numeric|digits_between:1,20']);
            return DB::table('attribute_values')->select('attribute_values.*', 'attributes.slug')
                     ->where('attribute_id', $request->attribute_id)
                     ->leftJoin('attributes', 'attributes.id', '=', 'attribute_values.attribute_id')->get();
        }

        abort(404);
    }
}
