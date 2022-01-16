<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

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
