<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

final class DestroyController extends Controller
{
    public function __invoke(Post $post): string|int
    {
        $post->delete();

        return $post->id;
    }
}
