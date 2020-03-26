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
Auth::routes();
Route::group(['middleware'=>'auth'],function(){

    Route::get('welcome', function () {
        return view('welcome');
    });
    
    Route::get('index', function () {
        return view('index');
    });
    Route::get('registermain', function () {
        return view('registermain');
    });
    Route::get('loginmain', function () {
        return view('loginmain');
    });
    
    Route::resource('Account','AccountController');
    
    Route::resource('paymantlogo','PaymentlogoController');
    
    
    Route::resource('welcome','WelcomeController');
    
    
    Route::resource('bills','BillsController');
    
    Route::get('paymentlogo', function () {
        return view('paymentlogo');
    });
    Route::get('payment details', function () {
        return view('payment details');
    });
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::resource('product','ProductController');
    
    Route::resource('store','StoreController');
    
    Route::resource('category','CategoryController');
    
    Route::resource('branch','BranchController');
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/home', 'HomeController@index')->name('home');
    
});
Route::get('/', function(){
    return view('auth.login');
});