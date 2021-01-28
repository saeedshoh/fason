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
            'store_id'  => 'sometimes|required|min:1',
            'min'       => 'required|min:0',
            'max'       => 'required|min:1',
            'margin'    => 'sometimes',
            'added_val'    => 'sometimes',
        ];
    }

    public function attributes()
    {
        return [
            'min'       => 'Введите сумма от',
            'max'       => 'Выберите сумма до',
            'margin'    => 'Введите процентную ставку',
            'added_val' => 'Введите добавочную стоимость',
        ];
    }
}
