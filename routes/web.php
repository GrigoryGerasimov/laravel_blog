<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'App\Http\Controllers\PostController@getPosts')->name('posts.index');
Route::get('/posts/create', 'App\Http\Controllers\PostController@createPost')->name('posts.create');
Route::get('/posts/update', 'App\Http\Controllers\PostController@updatePost')->name('posts.update');
Route::get('/posts/delete', 'App\Http\Controllers\PostController@deletePost')->name('posts.delete');
Route::get('/posts/restore', 'App\Http\Controllers\PostController@restorePost');
