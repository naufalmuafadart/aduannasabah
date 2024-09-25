<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ComplaintController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/auth', [AuthController::class, 'login']);

Route::prefix('/complaint')->group(function () {
    Route::post('/', [ComplaintController::class, 'post']);
    Route::get('/change_to_followed/{id}', [ComplaintController::class, 'update_to_followed']);
    Route::get('/change_to_finish/{id}', [ComplaintController::class, 'update_to_finish']);
});
