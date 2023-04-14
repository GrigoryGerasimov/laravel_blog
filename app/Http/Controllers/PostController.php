<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use App\Models\{Post, Category, Tag};

class PostController extends Controller
{
    public function index(): Application|View
    {
        $postsList = Post::all();

        return view('post.index', compact('postsList'));
    }

    public function create(): Application|View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();

        return view('post.create', compact('categoriesList', 'tagsList'));
    }

    public function store(): Application|RedirectResponse|Redirector
    {
        $request = request()->validate([
            'title' => 'string',
            'author' => 'string',
            'image' => 'string',
            'content' => 'string',
            'category_id' => 'string',
            'tags' => 'array'
        ]);

        $tagsData = $request['tags'];
        unset($request['tags']);

        $request['description'] = substr($request['content'], 0, 200);

        $createdNewPost = Post::create($request);
        $createdNewPost->tags()->attach($tagsData);

        return redirect(route('post.index'), 201);
    }

    public function show(Post $post): Application|View
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post): Application|View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();

        return view('post.edit', compact('post', 'categoriesList', 'tagsList'));
    }

    public function update(Post $post): Application|RedirectResponse|Redirector
    {
        $request = request()->validate([
            'title' => 'string',
            'author' => 'string',
            'image' => 'string',
            'content' => 'string',
            'category_id' => 'string',
            'tags' => 'array'
        ]);

        $tagsData = $request['tags'];
        unset($request['tags']);

        $post->tags()->sync($tagsData);
        $post->update($request);

        return redirect()->route('post.show', $post);
    }

    public function delete(Post $post): Application|View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();

        return view('post.delete', compact('post', 'categoriesList', 'tagsList'));
    }

    public function destroy(Post $post): Application|RedirectResponse|Redirector
    {
        $post->delete();

        return redirect()->route('post.index');
    }

    public function restore(Post $post): void
    {
        $deletedPost = Post::withTrashed()->find($post->id);

        $deletedPost->restore();
    }
}
