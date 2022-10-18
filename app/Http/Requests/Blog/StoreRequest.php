<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'excerpt'=>'required|string',
            'image'=>'required|string',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'author' => 'nullable|string'
        ];
    }
}
