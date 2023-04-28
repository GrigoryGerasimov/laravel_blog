<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request): Application|View
    {
        $filterRequest = $request->validated();

        $queryParams = app()->make(PostFilter::class, ['queryParams' => array_filter($filterRequest)]);

        $postsList = Post::filter($queryParams)->paginate(10);

        return view('post.index', compact('postsList'));
    }
}


