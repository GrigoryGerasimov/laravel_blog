<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\MainController@index')->name('main');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about');
Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contacts');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware'=>'admin'], function() {
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/posts', 'IndexController')->name('admin.post.index');
        Route::get('/post/create', 'CreateController')->name('admin.post.create');
        Route::post('/post/store', 'StoreController')->name('admin.post.store');
        Route::get('/post/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/post/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/post/{post}', 'UpdateController')->name('admin.post.update');
        Route::get('/post/{post}/delete', 'DeleteController')->name('admin.post.delete');
        Route::delete('/post/{post}', 'DestroyController')->name('admin.post.destroy');
        Route::get('/post/{postId}/restore', 'RestoreController')->name('admin.post.restore');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Post'], function() {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/post/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/post/{post}', 'ShowController')->name('post.show');
    Route::get('/post/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/post/{post}', 'UpdateController')->name('post.update');
    Route::get('/post/{post}/delete', 'DeleteController')->name('post.delete');
    Route::delete('/post/{post}', 'DestroyController')->name('post.destroy');
});
