<?php

namespace App\Http\Requests\V1\Panel\Financial\Exchange;

use Illuminate\Foundation\Http\FormRequest;

class ExchangeRequest extends FormRequest
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
            'name' => 'string|required',
            'price' => 'numeric|required',

            //* Relations
            'currencies.*' => 'required|integer|exists:currencies,id'
        ];
    }
}
