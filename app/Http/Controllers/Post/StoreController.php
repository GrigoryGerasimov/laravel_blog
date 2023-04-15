<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\{RedirectResponse};
use Illuminate\Routing\Redirector;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): Application|RedirectResponse|Redirector
    {
        $requestData = $request->validated();

        $tagsData = $request['tags'];
        unset($request['tags']);

        $requestData['description'] = substr($requestData['content'], 0, 200);

        $createdNewPost = Post::create($requestData);
        $createdNewPost->tags()->attach($tagsData);

        return redirect(route('post.index'), 201);
    }
}
