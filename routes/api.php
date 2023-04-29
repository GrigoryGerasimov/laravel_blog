<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function() {
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/posts', 'IndexController')->name('api.post.index');
        Route::post('/posts', 'StoreController')->name('api.post.store');
        Route::get('/post/{post}', 'ShowController')->name('api.post.show');
        Route::patch('/post/{post}', 'UpdateController')->name('api.post.update');
        Route::delete('/post/{post}', 'DestroyController')->name('api.post.destroy');
    });
});
