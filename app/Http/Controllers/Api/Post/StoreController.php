<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\StoreRequest;
use App\Http\Services\PostService;
use App\Http\Resources\Post\PostResource;

final class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): PostResource
    {
        $post = PostService::store_api($request->validated());

        return new PostResource($post);
    }
}
