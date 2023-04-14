<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UpdateController extends Controller
{
    public function __invoke(Post $post): Application|RedirectResponse|Redirector
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

        $post->tags()->sync($tagsData);
        $post->update($request);

        return redirect()->route('post.show', $post);
    }
}
