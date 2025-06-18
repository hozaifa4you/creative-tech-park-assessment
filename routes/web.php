<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('index');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
   Route::get('user-dashboard', function () {
      return view('dashboard');
   })->name('user.dashboard');
});

Route::middleware(['auth'])->group(function () {
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('products/{slug}', [ProductController::class, 'show'])->name('products.show');

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
