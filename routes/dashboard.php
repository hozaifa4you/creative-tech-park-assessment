<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewPasswordController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
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


      Route::group(['prefix' => 'products'], function () {
         Route::get('/', [ProductController::class, 'index'])->name('dashboard.products');
         Route::get('create', [ProductController::class, 'create'])->name('dashboard.products.create');
         Route::get('edit/{product}', [ProductController::class, 'edit'])->name('dashboard.products.edit');
         Route::post('update', [ProductController::class, 'update'])->name('dashboard.products.update');
      });


      Route::group(['prefix' => 'categories'], function () {
         Route::get('/', [CategoryController::class, 'index'])->name("dashboard.categories");
      });
   });
});
