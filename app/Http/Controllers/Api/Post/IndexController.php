<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Filters\PostFilter;
use App\Models\Post;
use App\Http\Resources\Post\PostResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController extends Controller
{
    public function __invoke(?FilterRequest $request): AnonymousResourceCollection
    {
        $validatedRequest = $request->validated();

        $page = $validatedRequest['page'] ?? 1;
        $perPage = $validatedRequest['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($validatedRequest)]);
        $postsList = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        return PostResource::collection($postsList);
    }
}
