<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\BookController;

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
Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);
Route::group([
    'middleware' => ['auth_admin']
], function () {
    Route::get('/config', [ConfigController::class, 'index']);
    Route::post('/config', [ConfigController::class, 'configData']);
    Route::post('/change-background', [ConfigController::class, 'changeBackground']);
    Route::post('/change-sound', [ConfigController::class, 'changeSound']);

    Route::get('/book', [BookController::class, 'index']);
    Route::post('/book', [BookController::class, 'store']);
    Route::post('/reorder-book-page', [BookController::class, 'reorder']);
    Route::get('/delete-page/{id}', [BookController::class, 'destroy']);

    Route::get('/logout', [AuthController::class, 'logout']);
});