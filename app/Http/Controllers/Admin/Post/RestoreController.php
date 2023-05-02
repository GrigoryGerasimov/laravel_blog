<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

final class RestoreController extends Controller
{
    public function __invoke($postId): Application|RedirectResponse|Redirector
    {
        $deletedPost = Post::withTrashed()->find($postId);

        $deletedPost->restore();

        return redirect()->route('admin.post.show', $deletedPost);
    }
}
