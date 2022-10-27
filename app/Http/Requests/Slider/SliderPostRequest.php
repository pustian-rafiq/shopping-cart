<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderPostRequest extends FormRequest
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
 
                'title_en' => 'required',
                'title_bn' => 'required',
                'description_en' => 'required',
                'description_bn' => 'required',
                'slider_image' => 'required|file',
        ];
    }

    public function messages()
    {
        return [
               'title_en.required' => 'Slider title English is required',
               'title_bn.required' => 'Slider title Bangla is required',
               'description_en.required' => 'Slider description English is required',
               'description_bn.required' => 'Slider description Bangla is required',
               'slider_image.required' => 'Slider image is required',
        ];
    }
}