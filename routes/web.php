<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/404', function () {
    return view('errors/404');
});
Route::get('/login.html', function () {
    return view('frontend/login');
})->name('login');
Route::get('/register.html', function () {
    return view('frontend/register');
})->name('register');
Route::post('/register.html', 'ControllerFrontend@register')->name('register-save');
Route::get('/', 'ControllerFrontend@index')->name('home');

Route::post('/login.html', 'ControllerFrontend@login')->name('login_save');
Route::get('/logout', 'ControllerFrontend@logout')->name('logout');
Route::get('/cart', 'ControllerFrontend@cart')->name('cart');
Route::get('/product/{id}', 'ControllerFrontend@product')->name('product-chitiet');
Route::get('/search', 'ControllerFrontend@search')->name('search');
Route::post('/cart', 'ControllerFrontend@order')->name('dat-hang');
Route::post('/', 'ControllerFrontend@cart_add')->name('cart-add');
Route::post('/cart/delete', 'ControllerFrontend@cart_delete')->name('cart-delete');

Route::get('admin/login' , 'ControllerAdmin@getLogin')->name('login-get');
Route::post('admin/login' ,'ControllerAdmin@postLogin')->name('loginPost');
Route::get('admin/logout' , 'ControllerAdmin@getLogout')->name('logout-admin');

Route::group(['prefix'=>'admin', 'middleware'=>'login'] ,function(){
    Route::group(['prefix'=>'customer'] , function (){
        Route::get('/', 'ControllerCustomer@index')->name('khachhang-list');
        Route::get('create', 'ControllerCustomer@create')->name('khachhang-add');
        Route::post('create', 'ControllerCustomer@store')->name('khachhang-addsave');
        Route::get('/edit/{id}', 'ControllerCustomer@edit')->name('khachhang-update');
        Route::post('edit/{id}', 'ControllerCustomer@update')->name('khachhang-updatesave');
        Route::get('{id}/delete', 'ControllerCustomer@destroy')->name('khachhang-delete');

    });
    Route::group(['prefix'=>'type_product'] , function (){
        Route::get('/', 'ControllerTypeProduct@index')->name('loai-sanpham-list');
        Route::get('create', 'ControllerTypeProduct@create')->name('loai-sanpham-create');
        Route::post('create', 'ControllerTypeProduct@store')->name('loai-sanpham-store');
        Route::get('/edit/{id}', 'ControllerTypeProduct@edit')->name('loai-sanpham-edit');
        Route::post('edit/{id}', 'ControllerTypeProduct@update')->name('loai-sanpham-update');
        Route::get('{id}/delete', 'ControllerTypeProduct@destroy')->name('loai-sanpham-destroy');

    });
    Route::group(['prefix'=>'product'] , function (){
        Route::get('/', 'ControllerProduct@index')->name('sanpham-list');
        Route::get('create', 'ControllerProduct@create')->name('sanpham-create');
        Route::post('create', 'ControllerProduct@store')->name('sanpham-store');
        Route::get('/edit/{id}', 'ControllerProduct@edit')->name('sanpham-edit');
        Route::post('edit/{id}', 'ControllerProduct@update')->name('sanpham-update');
        Route::get('{id}/delete', 'ControllerProduct@destroy')->name('sanpham-destroy');

    });
    Route::group(['prefix'=>'order'] , function (){
        Route::get('/', 'ControllerOrder@index')->name('order-list');
        Route::get('create', 'ControllerOrder@create')->name('order-create');
        Route::post('create', 'ControllerOrder@store')->name('order-store');
        Route::get('/edit/{id}', 'ControllerOrder@edit')->name('order-edit');
        Route::post('edit/{id}', 'ControllerOrder@update')->name('order-update');
        Route::get('{id}/delete', 'ControllerOrder@destroy')->name('order-destroy');
        Route::post('create/amount', 'ControllerOrder@amount')->name('order-amount');

    });

});
Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'] ,function(){
    Route::group(['prefix'=>'nhanvien'] ,function (){
        Route::get('/', 'ControllerAdmin@index')->name('nhanvien-list');
        Route::get('create', 'ControllerAdmin@create')->name('nhanvien-add');
        Route::post('create', 'ControllerAdmin@store')->name('nhanvien-addsave');
        Route::get('/edit/{id}', 'ControllerAdmin@edit')->name('nhanvien-update');
        Route::post('edit/{id}', 'ControllerAdmin@update')->name('nhanvien-updatesave');
        Route::get('{id}/delete', 'ControllerAdmin@destroy')->name('nhanvien-delete');
    });
});

