<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'image' => $this->image,
            'content' => $this->content,
            'description' => $this->description,
            'likes' => $this->likes,
            'is_published' => $this->is_published,
            'category_id' => $this->category_id
        ];
    }
}
