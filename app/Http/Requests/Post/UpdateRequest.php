<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'image' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|string',
            'tags' => 'required|array'
        ];
    }
}
