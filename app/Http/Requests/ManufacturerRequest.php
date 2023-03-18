<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:manufacturers,id|string|min:1|max:255',
            'description' => 'required|min:1|max:255|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название обязательно',
            'name.unique' => 'Производитель с таким названием уже существует',
            'name.string' => 'Название должно быть строкой',
            'name.min' => 'Минимальная длина названия 1 символ',
            'name.max' => 'Максимальная длина названия 255 символов',

            'description.required' => 'Описание обязательно',
            'description.min' => 'Описание должно быть строкой',
            'description.max' => 'Минимальная длина описания 1 символ',
            'description.string' => 'Максимальная длина описания 255 символов',
        ];
    }
}
