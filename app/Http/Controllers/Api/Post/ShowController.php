<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post): PostResource
    {
        return new PostResource($post);
    }
}
