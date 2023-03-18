<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $this->session()->flash('data', $this->except(['extra_images', 'preview_image']));
    }

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'number' => 'required|max:255',
            'description' => 'required|max:5000',
            'quantity' => 'required|integer',
            'price_per_unit' => 'required|numeric',
            'base_price_per_unit' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'preview_image' => 'required|image|file',
            'manufacturer_id' => 'required',
            'categories' => 'required',
            'images' => 'nullable',
            'images.*' => 'image|file'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
