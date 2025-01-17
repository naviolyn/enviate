<?php

use App\Livewire\Challenge;
use App\Livewire\Leaderboard;
use App\Livewire\Sidebar;
use App\Livewire\TodayTask;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('livewire.today-task');
// });

Route::get('/verify-email', function () {
    return view('verification');
 });


 Route::get('/verify-email', function () {
    return view('verification');
 });

 Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
 });

 Route::get('/admin/users', function () {
    return view('admin.users');
 });


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/today-task', TodayTask::class);
Route::get('/challenge', Challenge::class);
Route::get('/', TodayTask::class);
Route::get('/leaderboard', Leaderboard::class);