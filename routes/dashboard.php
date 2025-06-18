<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
   Route::group(['prefix' => 'admin-panel'], function () {
      Route::get('login', [AuthController::class, 'create'])
         ->name('dashboard.login');

      Route::post('login', [AuthController::class, 'store'])->name('dashboard.login.store');

      Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
         ->name('password.request');

      Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
         ->name('password.email');

      Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
         ->name('password.reset');

      Route::post('reset-password', [NewPasswordController::class, 'store'])
         ->name('password.store');
   });
});
