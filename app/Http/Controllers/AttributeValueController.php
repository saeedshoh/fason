<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $parent = Attribute::find($id);
        $attributes = AttributeValue::where('attribute_id', $id)
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('value', 'like', '%' . $request->search . '%')
            ->paginate(10)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.attribute_values',
                    compact('attributes', 'parent')
                )->render()
            );
        }
        return view('dashboard.attributes.value.index', compact('attributes', 'parent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $parent = Attribute::find($id);
        return view('dashboard.attributes.value.create', compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AttributeValue::create($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => ' Значение атрибутов',
            'description' => 'Название: ' . $request->name . ', Значение: ' . $request->value
        ]);
        return redirect(route('attr_val.index', ['id' => $request->attribute_id]))->with('success', 'Значение для аттрибута успешно добавлена!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeValue $attributeValue, $id, $val_id)
    {
        $parent = Attribute::find($id);
        $attribute = $attributeValue->find($val_id);
        return view('dashboard.attributes.value.edit', compact('parent', 'attribute', 'attributeValue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeValue $attributeValue, $id, $val_id)
    {
        $attributeValue->find($val_id)->update($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => ' Значение атрибутов',
            'description' => 'Название: ' . $request->name . ', Значение: ' . $request->value
        ]);
        return redirect(route('attr_val.index', ['id' => $id]))->with('success', 'Значение для аттрибута успешно добавлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeValue $attributeValue, $id, $val_id)
    {
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 3,
            'table'  => ' Значение атрибутов',
            'description' => 'Название: ' . $attributeValue->name . ', Значение: ' . $attributeValue->value
        ]);
        $attributeValue->find($val_id)->delete();
        return redirect()->back()->with('success', 'Аттрибут успешно удалена!');
    }
}
