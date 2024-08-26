<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')
    ->middleware(['auth', 'role:super admin'])
    ->name('admin.')
    ->group(static function () {
        Route::get('/', [HomeController::class, 'index'])->name('home.index');
        Route::resource('users', UserController::class);
    });
