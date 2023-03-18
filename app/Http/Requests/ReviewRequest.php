<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => 'required',
            'advantages' => 'nullable',
            'disadvantages' => 'nullable',
            'rating' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'Комментарий обязателен',
            'rating.required' => 'Рейтинг товара обязателен',
        ];
    }
}
