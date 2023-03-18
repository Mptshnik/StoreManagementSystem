<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|max:255|email|unique:customers',
            'password' => 'required|max:255|min:2|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email обязателен',
            'email.unique' => 'Пользователь с таким email уже существует',
            'email.email' => 'Некорректный email',
            'email.max' => 'Максимальная длина email 255 символов',

            'password.required' => 'Пароль обязателен',
            'password.max' => 'Максимальная длина пароля 255 символов',
            'password.min' => 'Минимальная длина пароля 2 символа',
            'password.confirmed' => 'Пароли не совпадают'
        ];
    }
}
