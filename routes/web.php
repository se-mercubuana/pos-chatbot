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


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index');
    Route::get('/formtemplate', 'HomeController@formtemplate');


    Route::group(['middleware' => 'manager'], function () {
        Route::resource('bank', 'BankController');
    });

    Route::get('/user/{id}/reset-password', 'UserController@resetPassword');

    Route::resource('product', 'ProductController');

    Route::resource('user', 'UserController');

    Route::get('/customer/address/{customerId}', 'CustomerController@listCustomerAddress');


    Route::get('/customer/address/{id}/create', 'CustomerController@createCustomerAddress');
    Route::get('/customer/address/{id}/edit', 'CustomerController@editCustomerAddress');
    Route::put('/customer/address/{id}', 'CustomerController@putCustomerAddress');
    Route::post('/customer/address/{id}', 'CustomerController@postCustomerAddress');

    Route::resource('customer', 'CustomerController');


    Route::get('/transaction/approve', 'TransactionController@indexApprove');
    Route::get('/transaction/approve/{id}/edit', 'TransactionController@editApprove');
    Route::put('/transaction/approve/{id}', 'TransactionController@confirmationApprove');


    Route::get('/transaction/pengiriman', 'TransactionController@indexConfirmationPengiriman');
    Route::get('/transaction/pengiriman/{id}/edit', 'TransactionController@editConfirmationPengiriman');
    Route::put('/transaction/pengiriman/{id}', 'TransactionController@putConfirmationPengiriman');

    Route::get('/transaction/success', 'TransactionController@indexSuccess');
    Route::get('/transaction/success/{id}/edit', 'TransactionController@editSuccess');


    Route::resource('transaction', 'TransactionController');


});

//Auth::routes();

//// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');
//
//// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');



