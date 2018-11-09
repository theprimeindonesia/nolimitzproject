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

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });    

    //Auth
    Route::post('/logout', 'AuthController@logout');
    
    
    //checkout
    Route::get('/checkout', 'API\OrdersController@index');
    Route::get('/getcost', 'API\OrdersController@getcost');

    //Ulasan Products
    Route::post('/createulasanproducts/{products_id}', 'API\ProductsController@createulasanproducts');
    Route::patch('/updateulasanproducts/{ulasanproductsid}', 'API\ProductsController@updateulasanproducts');
    Route::post('/createbalasulasanproducts/{ulasanproductsid}', 'API\ProductsController@createbalasulasanproducts');
    Route::patch('/updatebalasulasanproducts/{balasulasanproductsid}', 'API\ProductsController@updatebalasulasanproducts');

    // //Ulasan Blogs
    // Route::post('/createUlasanBlogs/{blogid}', 'API\UlasanBlogsController@createUlasanBlogs');
    // Route::patch('/updateUlasanBlogs/{ulasanblogid}', 'API\UlasanBlogsController@updateUlasanBlogs');
    // Route::post('/createBalasUlasanBlogs/{ulasanblogid}', 'API\UlasanBlogsController@createBalasUlasanBlogs');
    // Route::patch('/updateBalasUlasanBlogs/{balasulasanblogid}', 'API\UlasanBlogsController@updateBalasUlasanBlogs');
});


//Home
Route::get('/home', 'API\HomeController@index');
Route::post('/subscribe', 'API\HomeController@subscribe');

//Catalog
Route::get('/catalog', 'API\CatalogController@index');
Route::post('/catalogfilter', 'API\CatalogController@filter');

//Catalog
Route::get('/products/{products_id}', 'API\ProductsController@index');

// //Blogs
// Route::get('/blogs', 'API\BlogsController@blogs');
// Route::get('/blogs/{id}', 'API\BlogsController@categoryBlogs');
// Route::get('/posts/{url}', 'API\BlogsController@blogPost');

// //Contact
// Route::get('/contact','API\ContactController@contact');
// Route::post('/message','API\ContactController@message');

//Auth
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

