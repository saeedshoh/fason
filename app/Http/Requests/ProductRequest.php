<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'color' => 'required',
        ];
    }

    public function messages() {
        return ['required' => ':attribute'];
    }

    public function attributes()
    {
        return [
            'name' => 'Введите название категории',
            'image' => 'Выберите изображение',
            'description' => 'Введите описание продукта',
            'quantity' => 'Введите количество продукта',
            'price' => 'Введите ценну продукта',
            'color' => 'Выберите цвет',
        ];
    }
}
