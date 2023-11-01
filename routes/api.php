<?php

use App\Http\Controllers\Api\v1\AccountController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    /**
     * user
     */
    Route::controller(AuthController::class)
        ->group(function() {
        Route::post('/login','login');
        Route::post('/register','register');
    });

    Route::middleware(['auth:sanctum'])->group(function() {
        /**
         * Config Account
         */
        Route::prefix('/profile')
        ->controller(AccountController::class)
        ->group(function () {
            Route::post('/update','update');
        });

        /**
         * Config Account
         */
        Route::prefix('/product')
        ->controller(ProductController::class)
        ->group(function () {
            Route::get('/','index');
        });
    });
});
