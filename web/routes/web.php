<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CertificatesController;
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
Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');
Route::get('/certificates', [\App\Http\Controllers\IndexController::class, 'certificates'])->name('certificates');

Route::prefix('news')->group(function (){
    Route::get('/', [\App\Http\Controllers\NewsController::class, 'index'])->name('news_list');
    Route::get('/{id}', [\App\Http\Controllers\NewsController::class, 'detail'])->name('detail_news');
});

Route::prefix('projects')->group(function (){
    Route::get('/', [\App\Http\Controllers\ProjectsController::class, 'index'])->name('projects_list');
    Route::get('/{id}', [\App\Http\Controllers\ProjectsController::class, 'detail'])->name('detail_project');
});
Route::prefix('services')->group(function (){
    Route::get('/', [\App\Http\Controllers\ServicesController::class, 'index'])->name('services_list');
    Route::get('/{id}', [\App\Http\Controllers\ServicesController::class, 'detail'])->name('detail_services');
});
Route::prefix('certificates')->group(function (){
    Route::get('/', [CertificatesController::class, 'index'])->name('certificates');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
