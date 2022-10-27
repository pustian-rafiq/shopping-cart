<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductPostRequest extends FormRequest
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
 
                'brand_id' => 'required',
                'category_id' => 'required',
                'product_name_en' => 'required',
                'product_name_bn' => 'required',
                'product_code' => 'required',
                'product_qty' => 'required',
                'product_tags_en' => 'required',
                'product_tags_bn' => 'required',
                'product_color_en' => 'required',
                'product_color_bn' => 'required',
                'selling_price' => 'required',
                'short_descp_en' => 'required',
                'short_descp_bn' => 'required',
                'product_thambnail' => 'required',
        ];
    }

    public function messages()
    {
        return [
              'brand_id.required' => 'Brand name is required',
               'category_id.required' => 'Category name is required',
               'product_name_en.required' => 'Product name English is required',
               'product_code.required' => 'Product code is required',
               'product_qty.required' => 'Product quantity is required',
               'product_tags_en.required' => 'Product tag English is required',
               'product_tags_bn.required' => 'Product tag Bangla is required',
               'product_color_en.required' => 'Product color English is required',
               'product_color_bn.required' => 'Product color Bangla is required',
               'selling_price.required' => 'Product selling price is required',
               'short_descp_en.required' => 'Product short description English is required',
               'short_descp_bn.required' => 'Product short description Bangla is required',
               'product_thambnail.required' => 'Product thumbnail is required',
        ];
    }

}