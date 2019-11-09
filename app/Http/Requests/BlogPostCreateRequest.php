<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        //return auth->check();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'title' => 'required|min:5|max:200|unique:blog_posts',
            'slug' => 'max:200',
            'content_raw' => 'required|string|min:3|max:10000',
            'parent_id' => 'required|integer|exists:blog_categories,id',// в таблице blog_categories в id должно существовать
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * переводы ошибок ..локализаци  laravel/resources/lang/ru/validation.php
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required'  => 'Введите заголовок статьи',
            'content_raw.min'  => 'Минимальная длина статьи [:min] символов',
        ];

    }

    /**
     * Get custom attributes for validator errors.
     *
     * перевод атрибутов
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title'  =>  'Заголовок'
        ];
    }

}