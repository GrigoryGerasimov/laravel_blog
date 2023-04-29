<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Services\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): Application|RedirectResponse|Redirector
    {
        PostService::store($request->validated());

        return redirect()->route('api.post.index', 201);
    }
}
