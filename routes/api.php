<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\UserController;
use App\Models\User;
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

Route::middleware('auth:api')->group(function () {

    Route::controller(AuthController::class)->name('user.')->group(function () {
        Route::post('/login', 'login')->name('login')->withoutMiddleware('auth:api');
        Route::post('/register', 'register')->name('register')->withoutMiddleware('auth:api');
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::resource('users', UserController::class);
    Route::post('/users/import', [UserController::class, 'importUsers'])->name('user.importExcel');
});
