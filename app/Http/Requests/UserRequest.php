<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'city_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'address' => 'Адрес',
            'city_id' => 'Выберите город',
        ];
    }
}
