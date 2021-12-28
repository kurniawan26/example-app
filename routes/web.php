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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\dashboard\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/movies', [App\Http\Controllers\dashboard\DashboardController::class, 'index'])->name('dashboard.movies');
    Route::get('/dashboard/theaters', [App\Http\Controllers\dashboard\DashboardController::class, 'index'])->name('dashboard.theaters');
    Route::get('/dashboard/tickets', [App\Http\Controllers\dashboard\DashboardController::class, 'index'])->name('dashboard.tickets');
    
    Route::get('/dashboard/users', [App\Http\Controllers\dashboard\UserController::class, 'index'])->name('dashboard.users');
    Route::get('/dashboard/users/{id}', [App\Http\Controllers\dashboard\UserController::class, 'edit'])->name('dashboard.user.edit');
    Route::post('/dashboard/users/{id}', [App\Http\Controllers\dashboard\UserController::class, 'update'])->name('dashboard.user.update');
    Route::post('/dashboard/users/delete/{id}', [App\Http\Controllers\dashboard\UserController::class, 'delete'])->name('dashboard.user.delete');
});

