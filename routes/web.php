<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MitraMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Livewire\TodayTask;
use App\Livewire\Leaderboard;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/today-task', TodayTask::class)->name('today-task');

Route::get('/leaderboard', Leaderboard::class)->name('leaderboard');

// Mitra Middleware
Route::middleware(['auth', MitraMiddleware::class])->group(function () {
    
});

// Admin Middleware
Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Route::get('/dashboard-admin', function () {
    //     return view('admin.dashboard');
    // });
});

require __DIR__.'/auth.php';
