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

Route::prefix('solutions')->group(function (){
    Route::get('/', [\App\Http\Controllers\SolutionsController::class, 'index'])->name('solutions_list');
    Route::get('/{id}', [\App\Http\Controllers\SolutionsController::class, 'detail'])->name('detail_solutions');
});
Route::prefix('services')->group(function (){
    Route::get('/', [\App\Http\Controllers\ServicesController::class, 'index'])->name('services_list');
    Route::get('/{id}', [\App\Http\Controllers\ServicesController::class, 'detail'])->name('detail_services');
});
Route::prefix('certificates')->group(function (){
    Route::get('/', [CertificatesController::class, 'index'])->name('certificates');
});

Route::prefix('contacts')->group(function (){
    Route::get('/', [\App\Http\Controllers\ContactsController::class, 'index'])->name('contacts');
});

Route::prefix('about-us')->group(function (){
    Route::get('/', [\App\Http\Controllers\AboutUsController::class, 'index'])->name('about-us');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
