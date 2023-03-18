<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users,id|max:255',
            'login' => 'required|unique:users,id|max:255',
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
        ];
    }
}
