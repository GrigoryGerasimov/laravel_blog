<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Services\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

final class StoreController extends Controller
{
    public function __invoke(?StoreRequest $request): Application|RedirectResponse|Redirector
    {
        PostService::store($request->validated());

        return redirect(route('admin.post.index'), 201);
    }
}
