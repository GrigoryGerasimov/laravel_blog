<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RestoreController extends Controller
{
    public function __invoke(Post $post): Application|RedirectResponse|Redirector
    {
        $deletedPost = Post::withTrashed()->find($post->id);

        $deletedPost->restore();

        return redirect()->route('admin.post.show', $post);
    }
}
