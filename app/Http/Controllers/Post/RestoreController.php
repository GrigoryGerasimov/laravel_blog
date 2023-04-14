<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class RestoreController extends Controller
{
    public function __invoke(Post $post): void
    {
        $deletedPost = Post::withTrashed()->find($post->id);

        $deletedPost->restore();
    }
}
