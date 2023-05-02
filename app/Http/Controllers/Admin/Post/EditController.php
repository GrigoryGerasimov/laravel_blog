<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use App\Models\{Category, Tag, Post};

final class EditController extends Controller
{
    public function __invoke(Post $post): Application|View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();
        $postsList = Post::paginate(10);

        return view('admin.post.edit', compact('categoriesList', 'tagsList', 'postsList', 'post'));
    }
}
