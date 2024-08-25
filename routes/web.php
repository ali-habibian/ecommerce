<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')
    ->middleware(['auth', 'permission:super admin'])
    ->name('admin.')
    ->group(static function () {
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home.index');
    });
