<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;

final class EditController extends Controller
{
    public function __invoke(Post $post): Application|View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();

        return view('post.edit', compact('post', 'categoriesList', 'tagsList'));
    }
}
