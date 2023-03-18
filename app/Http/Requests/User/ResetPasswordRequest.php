<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|confirmed|max:255|min:3'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Пароль обязателен',
            'password.confirmed' => 'Пароли не совпадают',
            'password.max' => 'Максимальная длина пароля 255 символов',
            'password.min' => 'Минимальная длина пароля 3 символа',
        ];
    }
}
