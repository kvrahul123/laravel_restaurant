<?php

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


Route::get('/',[App\Http\Controllers\HomeController::class,'index']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/dashboard',[App\Http\Controllers\Backend\DashboardController::class,'dashboard']);
Route::resource('/banner',\App\Http\Controllers\Backend\BannerController::class);
Route::post('/status_update',[App\Http\Controllers\Backend\BannerController::class,'status_update'])->name('banner.status_update');

Route::resource('/event',\App\Http\Controllers\Backend\EventController::class);
Route::post('/event_status',[App\Http\Controllers\Backend\EventController::class,'status_update'])->name('event.event_status');

Route::resource('/aboutus',\App\Http\Controllers\Backend\AboutusController::class);
Route::post('/aboutus_status',[App\Http\Controllers\Backend\AboutusController::class,'status_update'])->name('aboutus.aboutus_status');

Route::resource('/category',\App\Http\Controllers\Backend\CategoryController::class);
Route::post('/category_status',[App\Http\Controllers\Backend\CategoryController::class,'status_update'])->name('category.category_status');

});
