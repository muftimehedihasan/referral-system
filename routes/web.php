<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferralController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/referrals/create', [ReferralController::class, 'create'])->name('referrals.create');
    Route::post('/referrals', [ReferralController::class, 'store'])->name('referrals.store');
});





Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/referrals', [AdminController::class, 'index'])->name('admin.referrals');
});



require __DIR__.'/auth.php';
