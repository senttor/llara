<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|min:5|max:200',
            'slug'        => 'max:200',
            'discription' => 'string|max:500|min:3', //description
            'parent_id'   => 'required|integer|exists:blog_categories,id',// в таблице blog_categories в id должно существовать
        ];
    }
}
