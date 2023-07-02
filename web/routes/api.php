<?php

use App\Http\Controllers\Api\NewsResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\GetController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\Api\UploadImageContoller;
use \App\Http\Controllers\Api\BannersResourceController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::group(['middleware' => 'auth:api'], function (){
        Route::get('get', GetController::class);
    });

    Route::post('upload-image', [UploadImageContoller::class, 'index']);

});

Route::apiResources([
    'news' => NewsResourceController::class,
    'banners' => BannersResourceController::class,
]);
