<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewPasswordController;
use App\Http\Controllers\Admin\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
   Route::group(['prefix' => 'admin-panel'], function () {
      Route::get('login', [AuthController::class, 'create'])
         ->name('dashboard.login');

      Route::post('login', [AuthController::class, 'store'])->name('dashboard.login.store');

      Route::get('forgot-password', [PasswordResetController::class, 'create'])
         ->name('admin.password.forgot');

      Route::post('forgot-password', [PasswordResetController::class, 'store'])
         ->name('admin.password.forgot.store');

      Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
         ->name('admin.password.reset');

      Route::post('reset-password', [NewPasswordController::class, 'store'])
         ->name('admin.password.reset.store');
   });
});

Route::middleware(['auth', 'verified'])->group(function () {
   Route::group(['prefix' => 'dashboard'], function () {
      Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
   });
});
