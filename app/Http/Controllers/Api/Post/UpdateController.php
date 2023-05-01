<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Services\PostService;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(Post $post, UpdateRequest $request): PostResource
    {
        $post = PostService::update_api($post, $request->validated());

        return new PostResource($post);
    }
}
