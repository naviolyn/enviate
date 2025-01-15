<?php

use App\Livewire\Challenge;
use App\Livewire\Sidebar;
use App\Livewire\TodayTask;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/today-task', TodayTask::class);
Route::get('/challenge', Challenge::class);