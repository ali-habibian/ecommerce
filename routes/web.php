<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserPermissionController;
use App\Http\Controllers\Admin\UserRoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')
    ->middleware(['auth', 'role:super admin'])
    ->name('admin.')
    ->group(static function () {
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home.index');
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::post('/user/{user}/roles', UserRoleController::class)->name('users.roles.assign');
        Route::post('/users/{user}/permissions', UserPermissionController::class)
            ->name('users.permissions.assign');
        Route::post('/roles/{role}/permissions', RolePermissionController::class)
            ->name('roles.permissions.assign');
        Route::resource('categories', CategoryController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('products', ProductController::class);
    });

Route::group([], static function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('{category}/products', [App\Http\Controllers\ProductController::class, 'index'])->name('home.category.products');
    Route::get('products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('home.products.show');
});
