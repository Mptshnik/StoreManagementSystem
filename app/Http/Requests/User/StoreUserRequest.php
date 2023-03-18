<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $this->session()->flash('data', $this->all());
    }

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users|max:255',
            'login' => 'required|unique:users|max:255',
            'password' => 'required|confirmed|max:255|min:3'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя пользователя обязательно',
            'name.unique' => 'Пользователь с таким именем уже существует',
            'name.max' => 'Максимальная длина имени пользователя 255 символов',

            'login.required' => 'Логин пользователя обязателен',
            'login.unique' => 'Пользователь с таким логином уже существует',
            'login.max' => 'Максимальная длина логина 255 символов',

            'password.required' => 'Пароль обязателен',
            'password.confirmed' => 'Пароли не совпадают',
            'password.max' => 'Максимальная длина пароля 255 символов',
            'password.min' => 'Минимальная длина пароля 3 символа',
        ];
    }
}
