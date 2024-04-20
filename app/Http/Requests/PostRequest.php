<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class PostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
        'post_title' => 'required|unique:posts,post_title|string|min:10|max:150',
        'author' => 'required|string|max:255',
        'post_content' => 'required',
        'post_category' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'post_title.required' => 'A bejegyzés Címének megadása kötelező!',
            'post_title.unique' => 'A megadott Cím már használatban van!',
            'post_title.min' => 'A Cím túl rövid, legalább 10 karakter hosszúnak kell lennie!',
            'post_title.max' => 'A Cím legfeljebb 150 karakter hosszú lehet!',
            'author.required' => 'A Szerző megadása kötelező!',
            'post_category.required' => 'A Kategória megadása kötelező!',
        ];
    }
}