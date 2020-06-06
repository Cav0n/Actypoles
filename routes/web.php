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

Route::get('', 'MainController@showHomepage')->name('homepage');
Route::get('contact', 'MainController@showContactPage')->name('contact');
Route::post('contact', 'ContactMessageController@store')->name('contact');

// Customer area
Route::name('customer_area.')->prefix('customer-area')->group(function () {

    // Routes only for guests
    Route::middleware('guest')->group(function () {
        Route::get('login', 'CustomerArea\LoginController@showLoginPage')->name('login');
        Route::post('login', 'CustomerArea\LoginController@authenticate')->name('login');
        Route::get('register', 'CustomerArea\RegisterController@showRegisterPage')->name('register');
        Route::post('register', 'CustomerArea\RegisterController@register')->name('register');

        Route::get('password-forgotten', 'CustomerArea\CustomerAreaController@showPasswordForgotten')->name('password-forgotten');
        Route::post('password-forgotten', 'UserController@sendPasswordResetLink')->name('password-forgotten');
        Route::get('reset-password', 'CustomerArea\CustomerAreaController@showPasswordReset')->name('reset-password');
        Route::post('reset-password', 'UserController@resetPassword')->name('reset-password');
    });

    // Routes only for authenticated users
    Route::middleware('auth')->group(function () {
        Route::get('', 'CustomerArea\CustomerAreaController@showHomepage')->name('homepage');
        Route::get('logout', 'CustomerArea\LoginController@logout')->name('logout');

        Route::post('update/personal-informations/{user}', 'UserController@updatePersonalInformations')->name('update.personal-informations');
        Route::post('update/password/{user}', 'UserController@updatePassword')->name('update.password');
    });
});

Route::name('admin.')->prefix('admin')->group(function () {

    // Routes only for guests
    Route::middleware('isNotAdmin')->group(function () {
        Route::get('login', 'BackOffice\LoginController@showLoginPage')->name('login');
        Route::post('login', 'BackOffice\LoginController@authenticate')->name('login');
    });

    // Routes only for admins
    Route::middleware('isAdmin')->group(function () {
        Route::get('', 'BackOffice\BackOfficeController@showHomepage')->name('homepage');
    });
});
