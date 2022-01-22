<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('register', 'Auth\RegisterController@register')->name('register');
    Route::post('verify', 'Auth\VerificationController@resend')->name('verify');
    Route::prefix('password')->name('password.')->group(function () {
        Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('email');
        Route::post('reset', 'Auth\ResetPasswordController@reset')->name('reset');
        Route::post('confirm', 'Auth\ConfirmPasswordController@confirm')->name('confirm');
    });
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::post('password', 'Api\UserController@password')->name('password');
        Route::post('profile-picture', 'Api\UserController@profile_picture')->name('profile-picture');
        Route::match(['GET', 'PATCH'], '/', 'Api\UserController');
    });
});
