<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CustomLoginController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\HomeController;

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



Route::get('/',HomeController::class);

Route::prefix('dashboard')->group(function () {

    Route::get('/login',[CustomLoginController::class, 'index' ])->name('login');
    Route::post('/login',[CustomLoginController::class, 'checkAdminLogin' ]);
    Route::post('/logout',[CustomLoginController::class, 'logout' ])->name('logout');

    Route::get('/',[DashboardController::class, 'index' ])->middleware('admin');
    Route::resource('admins', AdminController::class)->middleware('admin');
    Route::resource('products', ProductController::class)->middleware('admin');
    Route::resource('languages', LanguageController::class)->middleware('admin');

});
