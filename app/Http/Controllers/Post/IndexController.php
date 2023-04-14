<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): Application|View
    {
        $postsList = Post::all();

        return view('post.index', compact('postsList'));
    }
}


