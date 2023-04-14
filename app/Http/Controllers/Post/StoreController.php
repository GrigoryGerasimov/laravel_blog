<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class StoreController extends Controller
{
    public function __invoke(): Application|RedirectResponse|Redirector
    {
        $request = request()->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'image' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|string',
            'tags' => 'required|array'
        ]);

        $tagsData = $request['tags'];
        unset($request['tags']);

        $request['description'] = substr($request['content'], 0, 200);

        $createdNewPost = Post::create($request);
        $createdNewPost->tags()->attach($tagsData);

        return redirect(route('post.index'), 201);
    }
}
