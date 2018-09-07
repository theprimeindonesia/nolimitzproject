<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Home
Route::get('/home', 'API\HomeController@index');

//Blogs
Route::get('/blogs', 'API\BlogsController@blogs');
Route::get('/blogs/{id}', 'API\BlogsController@categoryBlogs');
Route::get('/posts/{url}', 'API\BlogsController@blogPost');
//Ulasan Blogs
Route::post('/createUlasanBlogs/{blogid}', 'API\UlasanBlogsController@createUlasanBlogs');
Route::patch('/updateUlasanBlogs/{ulasanblogid}', 'API\UlasanBlogsController@updateUlasanBlogs');
Route::post('/createBalasUlasanBlogs/{ulasanblogid}', 'API\UlasanBlogsController@createBalasUlasanBlogs');
Route::patch('/updateBalasUlasanBlogs/{balasulasanblogid}', 'API\UlasanBlogsController@updateBalasUlasanBlogs');

//Auth
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::middleware('auth:api')->post('/logout', 'AuthController@logout');
