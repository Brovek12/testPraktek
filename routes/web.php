<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::post('/role/updatePermissions', [RoleController::class, 'updatePermissions'])->name('role.updatePermissions');
    Route::post('/role/deletePermissions', [RoleController::class, 'deletePermissions'])->name('role.deletePermissions');
    Route::post('/role/updateSinglePermissions', [RoleController::class, 'updateSinglePermissions'])->name('role.updateSinglePermissions');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
