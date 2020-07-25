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

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
});
Route::resource('people', 'PersonController');
Route::resource('request-cards', 'RequestCardController');
Route::resource('account', 'AccountController');
Route::get('account-debit', 'AccountController@request_debit');
Route::get('account-credit', 'AccountController@request_credit');
Route::get('request-debit-cards-show', 'RequestCardController@request_debit_card_show');
Route::get('request-credit-cards-show', 'RequestCardController@request_credit_card_show');

