<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/admin', function () {
    return redirect()->route('admin.home');
});

 // Authentication Routes...
Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\LoginController@login');

// Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset');

Route::group(['prefix' => 'admin','middleware' => 'assign.guard:admin,admin/login'],function(){
    //logout
    Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    //home
    Route::get('/home', 'HomeController@index')->name('admin.home');
    //roles
    Route::resource('/roles','Web\RoleController')->except([
        'show'
    ]);
    //users
    Route::resource('/users','Web\UserController')->except([
        'show'
    ]);

    ///ANGGI

    ///MERK
    Route::resource('/merk','Web\MerkController')->except([
        'show'
    ]);

    //CATEGORIES
    Route::resource('/categories','Web\CategoriesController')->except([
        'show'
    ]);

    //MOTOR
    Route::resource('/motor','Web\MotorController')->except([
        'show'
    ]);

     //TYPE
     Route::resource('/type','Web\TypeController')->except([
        'show'
    ]);
});