<?php

use App\Livewire\Challenge;
use App\Livewire\Sidebar;
use App\Livewire\TodayTask;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('livewire.today-task');
// });
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});


Route::get('/today-task', TodayTask::class);
Route::get('/challenge', Challenge::class);
Route::get('/', TodayTask::class);
