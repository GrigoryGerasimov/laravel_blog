<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

final class IndexController extends Controller
{
    public function __invoke(?Filterrequest $request): Application|View
    {
        $filterRequest = $request->validated();

        $filter = app()->make(\App\Http\Filters\PostFilter::class, ['queryParams' => $filterRequest]);

        $postsList = Post::filter($filter)->paginate(10);

        return view('admin.post.index', compact('postsList'));
    }
}
