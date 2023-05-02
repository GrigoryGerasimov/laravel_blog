<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

final class DestroyController extends Controller
{
    public function __invoke(Post $post): Application|RedirectResponse|Redirector
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
