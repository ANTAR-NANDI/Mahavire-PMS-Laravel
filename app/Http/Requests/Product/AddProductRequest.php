<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
             'Sku'    => ['required'],
            'Title'    => ['required'],
            'Cost'    => ['required'],
            'Shipping'    => ['required'],
            'Commision'    => ['required'],
            'Profit'    => ['required'],
            'Max_Price'    => ['required'],
        ];
    }
}