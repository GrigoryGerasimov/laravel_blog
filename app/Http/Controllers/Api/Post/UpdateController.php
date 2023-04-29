<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UpdateController extends Controller
{
    public function __invoke(Post $post, UpdateRequest $request): Application|RedirectResponse|Redirector
    {
        PostService::update($post, $request->validated());

        return redirect()->route('api.post.show', $post);
    }
}
