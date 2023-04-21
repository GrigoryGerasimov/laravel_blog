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

Route::get('/', 'App\Http\Controllers\MainController@index')->name('main');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about');
Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contacts');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function() {
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/posts', 'IndexController')->name('admin.post.index');
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
    Route::get('/post/{post}/restore', 'RestoreController');
});

