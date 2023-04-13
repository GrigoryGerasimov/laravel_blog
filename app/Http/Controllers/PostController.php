<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Post;

class PostController extends Controller
{
    public function getPosts()
    {
        $postsList = Post::all();

        return view('posts.list', compact('postsList'));
    }

    public function createPost()
    {
        $initPosts = [
            [
                'title' => 'My first blog post',
                'author' => 'anonymous',
                'content' => 'Lorem ipsum...',
                'likes' => 100,
                'is_published' => 0
            ],
            [
                'title' => 'Second blog',
                'author' => 'John Doe',
                'content' => 'Test content to Blog 2',
                'likes' => 0,
                'is_published' => 1
            ],
            [
                'title' => 'Third blog',
                'author' => 'Jane Doe',
                'content' => 'Test content to Blog 3',
                'likes' => 50000,
                'is_published' => 1
            ]
        ];

        foreach($initPosts as $initPost) {
            $result[] = json_encode(Post::firstOrCreate($initPost));
        }

        return view('posts.create', [
            'result' => $result
        ]);
    }

    public function updatePost()
    {
        $firstPost = Post::all()->first();
        $lastPost = Post::all()->last();

        $updatedFirstPost = Post::updateOrCreate(['id' => $firstPost->id], ['title' => 'upd title for first post']);
        $updatedLastPost = Post::updateOrCreate(['id' => $lastPost->id], ['title' => 'upd title for last post']);

        return view('posts.update', compact('updatedFirstPost', 'updatedLastPost'));
    }

    public function deletePost()
    {
        $postToDelete = Post::where('likes', 100)->first();
        $postId = $postToDelete->id;

        $deleted = $postToDelete->delete();

        return view('posts.delete', compact('deleted', 'postId'));
    }

    public function restorePost()
    {
        $deletedPost = Post::withTrashed()->whereNotNull('deleted_at');

        $deletedPost->restore();
    }
}
