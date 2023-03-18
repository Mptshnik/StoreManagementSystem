<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:roles,id',
            'permissions' => 'required',
            'permissions.*' => 'required|exists:permissions,slug'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название обязательно',
            'name.max' => 'Максимальная длина названия 255 символов',
            'name.unique' => 'Роль с таким названием уже существует',

            'permissions.required' => 'Должен быть присвоен минимум 1 доступ',
            'permissions.exists' => 'Права доступа с таким id не существует',
        ];
    }
}
