<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
            Route::get('/login', 'show')->name('login.show');
            Route::post('/login', 'login')->name('login.perform');
        });
    });
