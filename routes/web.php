<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CkeditorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/posts/post-details/{id}',  ['as' => 'post-details', 'uses' => 'App\Http\Controllers\HomeController@details']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    /**
     * User
     */
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    /**
     * Posts
     */
    Route::get('posts/create-posts', ['as' => 'create-posts', 'uses' => 'App\Http\Controllers\PostController@create']);
    Route::post('/posts/store-post', ['as' => 'store-post', 'uses' => 'App\Http\Controllers\PostController@store']);
    Route::get('/posts/list-posts',  ['as' => 'list-posts', 'uses' => 'App\Http\Controllers\PostController@index']);
    Route::get('/posts/show-post/{id}',  ['as' => 'show-post', 'uses' => 'App\Http\Controllers\PostController@show']);
    Route::get('/posts/edit-post/{id}',  ['as' => 'edit-post', 'uses' => 'App\Http\Controllers\PostController@edit']);
    Route::post('/posts/update-post/{id}',  ['as' => 'update-post', 'uses' => 'App\Http\Controllers\PostController@update']);
    Route::delete('/posts/delete-post/{id}',  ['as' => 'delete-post', 'uses' => 'App\Http\Controllers\PostController@destroy']);
    Route::post('/posts/rating/',  ['as' => 'rating-post', 'uses' => 'App\Http\Controllers\PostController@rating']);
    Route::post('ckeditor/image_upload', [CkeditorController::class, 'upload'])->name('upload');



});

