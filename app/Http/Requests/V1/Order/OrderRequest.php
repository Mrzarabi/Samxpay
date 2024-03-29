<?php

namespace App\Http\Requests\V1\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'input_number' => 'required|numeric',
            'input_currency_unit' => 'required|string',
            'output_number' => 'required|numeric',
            'output_currency_unit' => 'required|string',

            //* Relations
            'calculators.*' => 'required|integer|exists:calculators,id',
            'elements.*' => 'required|integer|exists:elements,id',
        ];
    }
}
