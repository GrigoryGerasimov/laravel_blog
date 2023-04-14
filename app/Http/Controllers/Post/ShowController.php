<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;

class ShowController extends Controller
{
    public function __invoke(Post $post): Application|View
    {
        return view('post.show', compact('post'));
    }
}
