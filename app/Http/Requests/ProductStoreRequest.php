<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
        //Make sure to use the one on the file LOOK OVER
        return [
            'product_name' => 'required|max:255',
            'description' => 'required|max:255',
            'style' => 'required|max:255',
            'brand' => 'required|max:255',
            'product_type' => 'required|max:255',
            'shipping_price' => 'required|max:6',
            'note' => 'max:255',
            'url' => 'max:255',

        ];
            
        
    }
}
