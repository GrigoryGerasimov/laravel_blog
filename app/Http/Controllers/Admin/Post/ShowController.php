<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post): Application|View
    {
        $postsList = Post::paginate(10);

        return view('admin.post.show', compact('post', 'postsList'));
    }
}
