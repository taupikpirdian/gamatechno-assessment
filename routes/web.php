<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Login
 */
Route::controller(LoginController::class)
    ->group(function() {
        Route::group(['middleware' => ['guest']], function() {
            /**
             * Login Routes
             */
            Route::get('/login', 'show')->name('login');
            Route::post('/login', 'login')->name('login.perform');
        });
    });

Route::group(['middleware' => ['auth']], function() {
    Route::controller(DashboardController::class)
        ->group(function() {
            Route::group(['middleware' => ['auth']], function() {
                Route::get('/','index');
            });
        });

    /**
     * Auth
     */
    Route::controller(LogoutController::class)
        ->group(function() {
            Route::get('/logout', 'perform')->name('logout.perform');
        });

    /**
     * Transaction
     */
    Route::prefix('/transaction')
        ->controller(TransactionController::class)
        ->group(function () {
            Route::get('/','index')->name('transaction.index');
            Route::get('/create','create')->name('transaction.create');
            Route::post('/store','store')->name('transaction.store');
            Route::get('/show/{id}','show')->name('transaction.show');
            Route::post('/check','check')->name('transaction.check');
        });
});