<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Post;

class PostController extends Controller
{
    public function getPosts(): Collection
    {
        return Post::all();
    }

    public function createPost(): void
    {
        $dummyPost = [
            'title' => 'My first blog post',
            'author' => 'anonymous',
            'content' => 'Lorem ipsum...',
            'likes' => 100,
            'is_published' => 0
        ];

        Post::create($dummyPost);
    }
}
