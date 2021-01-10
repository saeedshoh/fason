<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonetizationRequest extends FormRequest
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
            'min'       => 'required|min:0',
            'max'       => 'required|min:1',
            'margin'    => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'min'       => 'Введите сумма от',
            'max'       => 'Выберите сумма до',
            'margin'    => 'Введите процентную ставку',
        ];
    }
}
