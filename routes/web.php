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

Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('post.index');
Route::get('/post/create', 'App\Http\Controllers\PostController@create')->name('post.create');
Route::post('/posts', 'App\Http\Controllers\PostController@store')->name('post.store');

Route::get('/post/{post}', 'App\Http\Controllers\PostController@show')->name('post.show');

Route::get('/post/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');
Route::patch('/post/{post}', 'App\Http\Controllers\PostController@update')->name('post.update');

Route::get('/post/{post}/delete', 'App\Http\Controllers\PostController@delete')->name('post.delete');
Route::delete('/post/{post}', 'App\Http\Controllers\PostController@destroy')->name('post.destroy');
Route::get('/post/{post}/restore', 'App\Http\Controllers\PostController@restore');
