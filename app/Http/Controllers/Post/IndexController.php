<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request): Application|View|AnonymousResourceCollection
    {
        $filterRequest = $request->validated();

        $filterRequest['page'] = $request['page'] ?? 1;
        $filterRequest['per_page'] = $request['per_page'] ?? 10;

        $queryParams = app()->make(\App\Http\Filters\PostFilter::class, ['queryParams' => array_filter($filterRequest)]);

        $postsList = Post::filter($queryParams)->paginate($filterRequest['per_page'], ['*'], 'page', $filterRequest['page']);

        return PostResource::collection($postsList);

        //return view('post.index', compact('postsList'));
    }
}


