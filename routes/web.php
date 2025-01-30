<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MitraMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Livewire\TodayTask;
use App\Livewire\Leaderboard;
use App\Models\User;
use App\Livewire\EditProfile;
use App\Livewire\UserTasks;
use App\Livewire\Volunteer;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Livewire\MitraVolunteer;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); 

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/today-task', 'App\Livewire\UserTasks')->name('tasks.index');
Route::post('/complete-task/{id}', [TaskController::class, 'completeTask'])->name('task.complete');

Route::get('/leaderboard', Leaderboard::class)->name('leaderboard');

Route::get('/volunteer', Volunteer::class);
Route::get('/list-volunteer', MitraVolunteer::class);

Route::get('/edit-profile', EditProfile::class);

// Mitra Middleware
Route::middleware(['auth', MitraMiddleware::class])->group(function () {
    
});

// Admin Middleware
Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::patch('/user-management/{id}/toggle-status', [UserController::class, 'updateStatus'])->name('user.toggleStatus');

Route::resource('tasks', TaskController::class);


Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Route::get('/dashboard-admin', function () {
    //     return view('admin.dashboard');
    // });
});

require __DIR__.'/auth.php';
