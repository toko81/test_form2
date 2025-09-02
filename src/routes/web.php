<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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


Route::middleware('auth')->group(function () {
    Route::get('/admin', [TestController::class, 'admin']);

    Route::get('/contacts/search', [TestController::class, 'search']);

    Route::post('/delete', [TestController::class, 'destroy']);

    Route::post('/export', [TestController::class, 'export']);
});

Route::get('/', [TestController::class, 'index']);

Route::post('/confirm', [TestController::class, 'confirm']);

Route::post('/thanks', [TestController::class, 'store']);



