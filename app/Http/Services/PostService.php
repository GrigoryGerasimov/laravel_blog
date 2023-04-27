<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\Post;

class PostService
{
    private static function pluckData(mixed &$data, string $key): mixed
    {
        $pluckedData = $data[$key];

        unset($data[$key]);

        return $pluckedData;
    }

    public static function store(mixed $requestData): void
    {
        $tagsData = self::pluckData($requestData, 'tags');

        $requestData['description'] = substr($requestData['content'], 0, 200);

        $createdNewPost = Post::create($requestData);
        $createdNewPost->tags()->attach($tagsData);
    }

    public static function update(Post $post, mixed $requestData): Post|null
    {
        $tagsData = self::pluckData($requestData, 'tags');

        $post->tags()->sync($tagsData);
        $post->update($requestData);

        return $post->fresh();
    }
}
