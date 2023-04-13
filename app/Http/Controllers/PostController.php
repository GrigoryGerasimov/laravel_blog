<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use App\Models\Post;

class PostController extends Controller
{
    public function index(): Application|View
    {
        $postsList = Post::all();

        return view('post.index', compact('postsList'));
    }

    public function create(): Application|View
    {
        return view('post.create');
    }

    public function store(): Application|RedirectResponse|Redirector
    {
        $request = request()->validate([
            'title' => 'string',
            'author' => 'string',
            'image' => 'string',
            'content' => 'string'
        ]);

        $request['description'] = substr($request['content'], 0, 50);

        Post::create($request);

        return redirect(route('post.index'), 201);
    }

    public function show(Post $post): Application|View
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post): Application|RedirectResponse|Redirector
    {

    }

    public function deletePost(): Application|View
    {
    }

    public function restore(Post $post): void
    {
        $deletedPost = Post::withTrashed()->find($post->id);

        $deletedPost->restore();
    }
}
