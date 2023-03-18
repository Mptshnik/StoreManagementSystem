<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorizationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'login' => 'required|max:255',
            'password' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Введите логин',
            'login.max' => 'Максимальная длина логина 255 символов',

            'password.required' => 'Введите пароль',
            'password.max' => 'Максимальная длина пароля 255 символов',
        ];
    }
}
