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

Route::get('/', 'MainController@showHomepage')->name('homepage');

// Customer area
Route::name('customer_area.')->prefix('customer-area')->group(function () {

    // Routes only for guests
    Route::middleware('guest')->group(function () {
        Route::get('login', 'CustomerArea\LoginController@showLoginPage')->name('login');
        Route::post('login', 'CustomerArea\LoginController@authenticate')->name('login');
        Route::get('register', 'CustomerArea\RegisterController@showRegisterPage')->name('register');
        Route::post('register', 'CustomerArea\RegisterController@register')->name('register');
    });

    // Routes only for authenticated users
    Route::middleware('auth')->group(function () {
        Route::get('/', 'CustomerArea\CustomerAreaController@showHomepage')->name('homepage');
        Route::get('logout', 'CustomerArea\LoginController@logout')->name('logout');
    });
});
