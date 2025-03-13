<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SocialIconController;
use App\Http\Controllers\Backend\StatisticsController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('application', [ApplicationController::class, 'index'])->name('applications.index');
    Route::put('application/update/{id}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');




    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/getdata', [UserController::class, 'getdata'])->name('user.getdata');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::delete('user/distroy/{id}', [UserController::class, 'distroy'])->name('user.distroy');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');


    Route::get('statistics', [StatisticsController::class, 'index'])->name('statistics.index');
    Route::get('statistics/getdata', [StatisticsController::class, 'getdata'])->name('statistics.getdata');
    Route::get('statistics/create', [StatisticsController::class, 'create'])->name('statistics.create');
    Route::post('statistics/store', [StatisticsController::class, 'store'])->name('statistics.store');
    Route::delete('statistics/distroy/{id}', [StatisticsController::class, 'distroy'])->name('statistics.distroy');
    Route::get('statistics/edit/{id}', [StatisticsController::class, 'edit'])->name('statistics.edit');
    Route::put('statistics/update/{id}', [StatisticsController::class, 'update'])->name('statistics.update');


    Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('slider/getdata', [SliderController::class, 'getdata'])->name('slider.getdata');
    Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::delete('slider/distroy/{id}', [SliderController::class, 'distroy'])->name('slider.distroy');
    Route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');

    Route::get('social-icon', [SocialIconController::class, 'index'])->name('social.icon.index');
    Route::get('social-icon/getdata', [SocialIconController::class, 'getdata'])->name('social.icon.getdata');
    Route::get('social-icon/create', [SocialIconController::class, 'create'])->name('social.icon.create');
    Route::post('social-icon/store', [SocialIconController::class, 'store'])->name('social.icon.store');
    Route::delete('social-icon/distroy/{id}', [SocialIconController::class, 'distroy'])->name('social.icon.distroy');
    Route::get('social-icon/edit/{id}', [SocialIconController::class, 'edit'])->name('social.icon.edit');
    Route::put('social-icon/update/{id}', [SocialIconController::class, 'update'])->name('social.icon.update');
});
