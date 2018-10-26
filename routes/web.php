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
    return redirect()->route('admin.dashboard');
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
    Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');
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

    //UOM
      Route::resource('/uom','Web\UomController')->except([
        'show'
    ]);
    
    //SUPPLIERS
       Route::resource('/suppliers','Web\SuppliersController')->except([
        'show'
    ]);

    //PURCHASE
    Route::group(['prefix' => '/purchase'],function(){
        Route::get('/', 'Web\PurchaseController@index')->name('purchase.index');
        Route::get('/create', 'Web\PurchaseController@create')->name('purchase.create');
        Route::post('/store', 'Web\PurchaseController@store')->name('purchase.store');
        Route::get('/detail/{id}', 'Web\PurchaseController@detail')->name('purchase.detail');
        Route::post('/destroy/{id}', 'Web\PurchaseController@destroy')->name('purchase.destroy');
        Route::get('/received/{id}', 'Web\PurchaseController@received')->name('purchase.received');
        Route::post('/update/{id}', 'Web\PurchaseController@update')->name('purchase.update');
        Route::post('/podet/{id}', 'Web\PurchaseController@podet')->name('purchase.podet');
        Route::get('/return/{id}', 'Web\PurchaseController@return')->name('purchase.return');
        Route::post('/return/update/{id}', 'Web\PurchaseController@returnupdate')->name('purchase.return.update');
        Route::get('/po/{id}', 'Web\PurchaseController@po')->name('purchase.po');

    });

     //PRODUCT
     Route::group(['prefix' => '/product'],function(){
        Route::get('/', 'Web\ProductController@index')->name('product.index');
        Route::get('/create', 'Web\ProductController@create')->name('product.create');
        Route::post('/store', 'Web\ProductController@store')->name('product.store');
        Route::post('/destroy/{id}', 'Web\ProductController@destroy')->name('product.destroy');
        Route::post('/addvarian/{id}', 'Web\ProductController@addvarian')->name('product.addvarian');
        Route::get('/detail/{id}', 'Web\ProductController@detail')->name('product.detail');
        Route::get('/edit/{id}', 'Web\ProductController@edit')->name('product.edit');
        Route::post('/update/{id}', 'Web\ProductController@update')->name('product.update');
        Route::get('/varian/edit/{id}', 'Web\ProductController@varianedit')->name('product.varian.edit');
        Route::post('/varian/update/{id}', 'Web\ProductController@varianupdate')->name('product.varian.update');
        Route::post('/varian/delete/{id}', 'Web\ProductController@variandelete')->name('product.varian.delete');
        Route::get('/varian/add/{id}', 'Web\ProductController@varianadd')->name('product.varian.add');
        Route::post('/varian/save/{id}', 'Web\ProductController@variansave')->name('product.varian.save');
     });

     //EXPEDITIONS
     Route::resource('/expeditions','Web\ExpeditionsController')->except([
        'show'
    ]);

     //PAYMENTS
     Route::resource('/payments','Web\PaymentsController')->except([
        'show'
    ]);

      //MEMBERS
      Route::group(['prefix' => '/members'],function(){
        Route::get('/', 'Web\MembersController@index')->name('members.index');
        Route::get('/create', 'Web\MembersController@create')->name('members.create');
        Route::post('/store', 'Web\MembersController@store')->name('members.store');
        Route::get('/detail/{id}', 'Web\MembersController@detail')->name('members.detail');
        Route::get('/edit/{id}', 'Web\MembersController@edit')->name('members.edit');
        Route::post('/update/{id}', 'Web\MembersController@update')->name('members.update');
        Route::post('/destroy/{id}', 'Web\MembersController@destroy')->name('members.destroy');

        Route::get('/address/{id}', 'Web\MembersController@address')->name('members.address');
        Route::get('/address/edit/{id}', 'Web\MembersController@addressedit')->name('members.address.edit');
        Route::post('/address/add/{id}', 'Web\MembersController@addressadd')->name('members.address.add');
        Route::post('/address/update/{id}', 'Web\MembersController@addressupdate')->name('members.address.update');
        Route::post('/address/destroy/{id}', 'Web\MembersController@addressdestroy')->name('members.address.destroy');

        Route::get('/bank/{id}', 'Web\MembersController@bank')->name('members.bank');
        Route::get('/bank/edit/{id}', 'Web\MembersController@bankedit')->name('members.bank.edit');
        Route::post('/bank/add/{id}', 'Web\MembersController@bankadd')->name('members.bank.add');
        Route::post('/bank/update/{id}', 'Web\MembersController@bankupdate')->name('members.bank.update');
        Route::post('/bank/destroy/{id}', 'Web\MembersController@bankdestroy')->name('members.bank.destroy');

         

      });

       //ORDERS
       Route::group(['prefix' => '/orders'],function(){
           Route::get('/', 'Web\OrdersController@index')->name('orders.index');
           Route::get('/detail/{id}', 'Web\OrdersController@detail')->name('orders.detail');
           Route::post('/destroy/{id}', 'Web\OrdersController@destroy')->name('orders.destroy');
           Route::get('/paid/{id}', 'Web\OrdersController@paid')->name('orders.paid');

           Route::group(['prefix' => '/return'],function(){
            Route::get('/', 'Web\OrdersController@return')->name('orders.return');
            });
        //    Route::get('/cek', 'Web\OrdersController@cek')->name('orders.index');

       });

       //SHIPPING
       Route::group(['prefix' => '/shipping'],function(){
        Route::get('/', 'Web\ShippingController@index')->name('shipping.index');
        Route::get('/detail/{id}', 'Web\ShippingController@detail')->name('shipping.detail');
        Route::post('/destroy/{id}', 'Web\ShippingController@destroy')->name('shipping.destroy');
        Route::get('/label/{id}', 'Web\ShippingController@label')->name('shipping.label');
        Route::post('/resi', 'Web\ShippingController@resi')->name('shipping.resi');

    });


});