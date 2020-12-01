<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'parent_id' => '',
            'is_active' => '',
        ];
    }

    public function messages() {
        return ['required' => ':attribute'];
    }

    public function attributes()
    {
        return [
            'name' => 'Введите название категории',
            'parent_id' => 'Выберите категорию',
            'is_active' => 'Выберите категорию',
            'icon' => 'Выберите изображение'
        ];
    }
}
