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
  if (\Auth::check()) {
      return view('pages.one');
  }
    return view('auth.login');
});
Route::get('/home','admin\HomeController@index');
Auth::routes();
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/users','admin\UserController@index');  
    Route::delete('/user_delete/{id}','admin\UserController@destroy');
    Route::get('/adduser','admin\RoleController@index');
    Route::post('/add_user','admin\UserController@store');
    Route::get('/edituser/{id}','admin\UserController@edit');
    Route::post('/update_user/{id}','admin\UserController@update');
    Route::resource('configuration','admin\ConfigurationController');
    Route::resource('banner','admin\BannerController');
    Route::resource('category','admin\CategoryController');
    Route::resource('product','admin\ProductController');
    Route::resource('product_attributes','admin\ProductAttributesController');
    Route::post('getvalue','admin\ProductAttributesController@getvalue');
    Route::post('getcat','admin\ProductAttributesController@getcat');
    Route::resource('coupon','admin\CouponController');
});
Route::get('user-login','frontend\Logincontroller@userlogin'); 
Route::post('user-login','frontend\Logincontroller@login');
Route::get('index','frontend\HomepageController@index')->name('homepage');
Route::post('user-logout','frontend\Logincontroller@logout');
Route::get('contact-us','frontend\HomepageController@contact');
Route::get('product_details/{id}','frontend\ProductController@product_detail')->name('product_details');
Route::get('cart','frontend\CartController@listing')->name('cart');
Route::get('404','frontend\HomepageController@siteerror');
Route::get('blog','frontend\HomepageController@blog');
Route::get('blog-single','frontend\HomepageController@blogsingle');
Route::get('checkout','frontend\HomepageController@checkout');
Route::get('shop','frontend\HomepageController@shop');
Route::POST('addcart','frontend\CartController@getpro')->name('addcart');


