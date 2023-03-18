<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:providers,id|min:1|max:255',
            'phone_number' => 'required',
            'tax_number' => 'required|numeric|digits_between:10,10',
            'address' => 'required|string|min:1|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Наименование обязательно',
            'name.string' => 'Наименование должно быть строкой',
            'name.unique' => 'Поставщик с таким наименованием уже существует',
            'name.min' => 'Минимальная длина наименования 1 символ',
            'name.max' => 'Максимальная длина наименования 255 символов',

            'phone_number.required' => 'Номер телефона обязателен',

            'tax_number.required' => 'ИНН обязателен',
            'tax_number.numeric' => 'ИНН должен состоять из цифр',
            'tax_number.digits_between' => 'Длина ИНН 10 цифр',

            'address.required' => 'Адрес обязателен',
            'address.string' => 'Адрес должен содержать строку',
            'address.min' => 'Минимальная длина адреса 1 символ',
            'address.max' => 'Максимальная длина адрес 1000 символов',
        ];
    }
}
