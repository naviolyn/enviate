<?php

use App\Livewire\Challenge;
use App\Livewire\Sidebar;
use App\Livewire\TodayTask;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('livewire.today-task');
// });
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/today-task', TodayTask::class);
Route::get('/challenge', Challenge::class);
Route::get('/', TodayTask::class);
