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

/**
 * 
 * 
 * 
 * BackEnd Management
 * 
*/
Route::get('admin', 'BackEnd\HomeController@index');
Route::post('admin', 'BackEnd\HomeController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
    //Home
    Route::get('dash', 'BackEnd\HomeController@dashboard')->name('dashboard');
    Route::get('logout', 'BackEnd\HomeController@logout')->name('logout');

    //Categories
    Route::get('categories', 'BackEnd\CategoryController@index')->name('categories');
    Route::post('addCat', 'BackEnd\CategoryController@store')->name('addCategory');

    //Products
    Route::get('products', 'BackEnd\ProductController@index')->name('products');
    Route::get('newProduct', 'BackEnd\ProductController@create')->name('addProduct');
    Route::post('products', 'BackEnd\ProductController@store')->name('newProduct');

    //Orders
    Route::get('orders', 'BackEnd\OrderController@index')->name('orders');

    //Promotions
    Route::get('promotions', 'BackEnd\PromotionController@index')->name('promotions');
    Route::get('newPromotions', 'BackEnd\PromotionController@create')->name('newPromotions');
    Route::post('storePromotions', 'BackEnd\PromotionController@store')->name('storePromotions');
    Route::delete('promotions/{code}', 'BackEnd\PromotionController@destroy');

    //Admins
    Route::get('admins', 'BackEnd\AdminController@index')->name('admins');
    Route::get('newAdmin', 'BackEnd\AdminController@create')->name('newAdmin');
    Route::post('storeAdmin', 'BackEnd\AdminController@store')->name('storeAdmin');
    Route::delete('admins/{email}', 'BackEnd\AdminController@destroy');

    //Client
    Route::get('clients', 'BackEnd\ClientController@index')->name('clients');
    Route::post('clients/{email}', 'BackEnd\ClientController@block');

    //Report
    Route::get('reports', 'BackEnd\ReportController@index')->name('reports');

    //User
    Route::get('users', 'BackEnd\UserController@index')->name('account');
    Route::post('storeUser', 'BackEnd\UserController@store')->name('storeUserData');

    //Notification
    Route::get('notifications', 'BackEnd\NotificationController@index')->name('notifications');
    Route::post('notifications/{id}', 'BackEnd\NotificationController@read');

    //Message
    Route::get('messages', 'BackEnd\MessageController@index')->name('messages');
    Route::post('messages/{id}', 'BackEnd\MessageController@read');
});





/**
 * 
 * 
 * FrontEnd Management
 * 
*/