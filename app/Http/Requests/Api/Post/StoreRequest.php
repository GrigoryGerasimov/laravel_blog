<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest
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
            'category' => 'required',
            'tags' => 'required|array'
        ];
    }
}
