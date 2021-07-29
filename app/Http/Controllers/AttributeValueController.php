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
            ->when($request->search, function($att_value) use ($request) {
                $att_value->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('value', 'like', '%' . $request->search . '%');
            })
            ->paginate(30)
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
        $value = AttributeValue::create($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => ' Значение атрибутов',
            'description' => 'Название: ' . $request->name . ', Значение: ' . $request->value
        ]);
        return redirect(route('attr_val.index', ['id' => $request->attribute_id]))->with(['class' => 'success', 'message' => 'Значение  «'.$value->name.'»  успешно добавлено!']);
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

        $page = '';
        if(strrpos($request->previous,'?')){
            $page = substr($request->previous, strrpos($request->previous,'?'));
        }
        $value = $attributeValue->find($val_id)->update($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => ' Значение атрибутов',
            'description' => 'Название: ' . $request->name . ', Значение: ' . $request->value
        ]);
        return redirect(route('attr_val.index', ['id' => $id]).$page)->with(['class' => 'primary', 'message' => 'Значение  «'.$request->name.'»  успешно обновлено!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeValue $attributeValue, $id, $val_id)
    {
        $message = 'Аттрибут успешно удалена!';
        $class = 'success';
        $value = AttributeValue::find($val_id);
        if($attributeValue->find($val_id)->products->isEmpty()){
            Log::create([
                'user_id' => Auth::user()->id,
                'action' => 3,
                'table'  => ' Значение атрибутов',
                'description' => 'Название: ' . $attributeValue->name . ', Значение: ' . $attributeValue->value
            ]);
            $attributeValue->find($val_id)->delete();
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Значение  «'.$value->name.'»  успешно удалено!']);
        } else {
            return redirect()->back()->with(['class' => 'warning', 'message' => 'Невозможно удалить значение   «'.$value->name.'»  так как есть товар с таким значением!']);
        }
    }
}
