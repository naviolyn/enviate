<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\MitraMiddleware;
use App\Http\Middleware\AdminMiddleware;

use App\Models\User;
use App\Models\Task;

use Livewire\Livewire; // Import Livewire
use App\Livewire\TodayTask;
use App\Livewire\WeeklyTask;
use App\Livewire\MonthlyTask;
use App\Livewire\Leaderboard;
use App\Livewire\EditProfile;
use App\Livewire\UserTasks;
use App\Livewire\Volunteer;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Livewire\CustomizeAvatar;
use App\Livewire\EditVolunteer;
use App\Livewire\RegisterVolunteer;



use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


// Autentikasi Google
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    // Cek apakah pengguna sudah terdaftar
    $user = User::updateOrCreate([
        'email' => $googleUser->getEmail(),
    ], [
        'name' => $googleUser->getName(),
        'google_id' => $googleUser->getId(),
        'password' => bcrypt('default_password'), // Bisa diubah sesuai kebutuhan
    ]);

    // Login pengguna
    Auth::login($user);

    // Redirect ke halaman setelah login
    return redirect('/today-task');  // Sesuaikan dengan rute tujuan setelah login
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Halaman User
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
Route::get('/weekly-task', WeeklyTask::class)->middleware('auth');
Route::get('/monthly-task', MonthlyTask::class)->middleware('auth');
Route::post('/complete-task/{id}', [TaskController::class, 'completeTask'])->name('task.complete');

Route::get('/leaderboard', Leaderboard::class)->name('leaderboard');

Route::get('/volunteer', Volunteer::class);
Route::get('/list-volunteer', \App\Livewire\MitraVolunteer::class); // Correctly reference the Livewire component

Route::get('/edit-profile', EditProfile::class);
Route::get('/mitra/volunteer/edit', EditVolunteer::class);
Route::get('/register-volunteer', RegisterVolunteer::class);
Route::get('/customize-avatar', CustomizeAvatar::class);
Route::get('/mitra/volunteer/edit', EditVolunteer::class)->name('edit-volunteer');
Route::get('/tambah-volunteer', \App\Livewire\TambahVolunteer::class)->name('tambah-volunteer');

Route::resource('tasks', TaskController::class);

// Middleware Mitra
Route::middleware(['auth', MitraMiddleware::class])->group(function () {
    Route::get('/mitra/dashboard', function () {
        return view('mitra.dashboard');
    })->name('mitra.dashboard');

    Route::get('/mitra/volunteer', \App\Livewire\MitraVolunteer::class);
    Route::get('/mitra/voluntee', \App\Livewire\VolunteeList::class);

    Route::get('/mitra/volunteer/tambah', \App\Livewire\TambahVolunteer::class)->name('tambah-volunteer');
});

// Middleware Admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');

    Route::get('admin/mitra', [MitraController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/toggle-status', [MitraController::class, 'toggleStatus'])->name('users.toggleStatus');

    Route::get('/tasks', [TasksController::class, 'index']);
    Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');

    Route::get('/avatar', function () {
        return view('admin.avatar');
    })->name('admin.avatar');
    Route::get('/avatar/edit', function () {
        return view('admin.edit-avatar');
    })->name('admin.edit-avatar');
});

require __DIR__.'/auth.php';
