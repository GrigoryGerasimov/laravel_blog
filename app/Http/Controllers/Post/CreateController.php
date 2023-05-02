<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;

final class CreateController extends Controller
{
    public function __invoke(): Application|View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();

        return view('post.create', compact('categoriesList', 'tagsList'));
    }
}
