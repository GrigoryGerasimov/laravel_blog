<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'string',
            'author' => 'string',
            'category_id' => 'string',
            'page' => 'string',
            'per_page' => 'string'
        ];
    }
}
