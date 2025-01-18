<?php

use App\Livewire\Challenge;
use App\Livewire\Leaderboard;
use App\Livewire\Sidebar;
use App\Livewire\TodayTask;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('livewire.today-task');
// });

Route::get('/verify-email', function () {
    return view('verification');
 });


 Route::get('/verify-email', function () {
    return view('verification');
 });

 Route::get('/dashboard', function () {
    return view('admin.dashboard');
 }); 

 Route::get('/users', [UserController::class, 'index'])->name('users.index');
 Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

 Route::get('/tasks', function () {
    return view('admin.tasks');
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