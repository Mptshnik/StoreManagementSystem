<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories,id|min:1|max:255',
            'description' => 'required|string|min:1|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название обязательно',
            'name.string' => 'Название должно быть строкой',
            'name.unique' => 'Категория с таким названием уже существует',
            'name.min' => 'Минимальная длина названия 1 символ',
            'name.max' => 'Максимальная длина названия 255 символов',

            'description.required' => 'Описание обязательно',
            'description.string' => 'Описание должно быть строкой',
            'description.min' => 'Минимальная длина описания 1 символ',
            'description.max' => 'Максимальная длина описания 255 символов',
        ];
    }
}
