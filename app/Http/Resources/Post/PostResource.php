<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Tag\TagResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class PostResource extends JsonResource
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
            'category' => new CategoryResource(Category::find($this->category_id)),
            'tags' => TagResource::collection($this->tags)
        ];
    }
}
