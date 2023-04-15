<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(Post $post, UpdateRequest $request): Application|RedirectResponse|Redirector
    {
        $requestData = $request->validated();

        $tagsData = $request['tags'];
        unset($request['tags']);

        $post->tags()->sync($tagsData);
        $post->update($requestData);

        return redirect()->route('post.show', $post);
    }
}
