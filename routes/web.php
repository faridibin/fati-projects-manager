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

Route::get('/', 'Landing\LandingController@index')->name('home');

Auth::routes(['verify' => true]);

Route::middleware(['auth'])->prefix('/')->group(function () {
    // Route::middleware(['2fa.verified.redirect'])->prefix('2fa')->group(function () {
    //     Route::match(['get', 'post'], '/', 'Auth\Verify2FaToken')->name('2fa.verify');
    //     Route::get('resend', 'Auth\Verify2FaToken@resend_token')->name('2fa.resend');
    // });

    // Route::middleware(['verified', 'password.verified', '2fa.verify'])->group(function () {
    //     Route::prefix('app')->group(function () {
    //         Route::get('{path}', 'Dashboard\DashboardController')->where('path', '([A-Za-z\d\-\/_.]+)?')->name('dashboard');
    //     });
    // });
});
