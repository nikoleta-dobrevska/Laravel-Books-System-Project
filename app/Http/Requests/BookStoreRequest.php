<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'title' => ['required', 'max:255', 'unique:books,title'],
            'isbn' => ['required', 'max:255', 'unique:books,isbn'],
            'pages' => ['required', 'integer', 'min:1', 'max:10000'],
            'image' => ['required'],
            'summary' => ['required'],
            'publishing_date'=>['required','date']
        ];
    }
}
