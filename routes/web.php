<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\File\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/track/{id}', [TrackController::class, 'index']);

Route::get('/download/{id}', [DownloadController::class, 'index']);

Route::get('/admin/auth', [\App\Http\Controllers\Admin\AuthController::class, 'index']);

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/complaint/{id}', [ComplaintController::class, 'detail']);
});
