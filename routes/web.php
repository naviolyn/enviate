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
use App\Livewire\Profile;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\BadgeController;

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

Route::get('/profile', Profile::class);
Route::get('/settings', EditProfile::class);
Route::get('/mitra/volunteer/edit', EditVolunteer::class);
Route::get('/register-volunteer', RegisterVolunteer::class);
Route::get('/customize-avatar', CustomizeAvatar::class);
Route::get('/mitra/volunteer/edit', EditVolunteer::class)->name('edit-volunteer');

Route::resource('tasks', TaskController::class);

// Middleware Mitra
Route::middleware(['auth', MitraMiddleware::class])->group(function () {
    // Route yang bisa diakses user
    Route::get('/mitra/dashboard', function () {
        return view('mitra.dashboard');
    })->name('mitra.dashboard');

    Route::get('/mitra/volunteer', \App\Livewire\MitraVolunteer::class);

    // Route untuk nyimpan
    Route::post('/volunteer/store', [VolunteerController::class, 'store'])->name('volunteer.store');

    Route::get('/mitra-volunteer', [VolunteerController::class, 'index'])->name('mitra-volunteer');

});

// Middleware Admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('admin/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');

    Route::get('/partners', [MitraController::class, 'index'])->name('mitra.index');
    Route::post('admin/mitra/{user}/toggle-status', [MitraController::class, 'toggleStatus'])->name('mitra.toggleStatus');

    Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
    Route::post('admin/tasks/toggle-status/{taskId}', [TasksController::class, 'toggleStatus'])->name('tasks.toggleStatus');
    Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');

    Route::get('/avatar', [AvatarController::class, 'index'])->name('avatar.index');
    Route::post('/avatar', [AvatarController::class, 'store'])->name('avatar.store');
    Route::put('/avatar/{id}', [AvatarController::class, 'update'])->name('avatar.update');

    Route::get('/badge', [BadgeController::class, 'index'])->name('badge.index');
    Route::post('/badge', [BadgeController::class, 'store'])->name('badge.store');
    Route::put('/badge/{id}', [BadgeController::class, 'update'])->name('badge.update');

    Route::get('/badges/{id}', function ($id) {
        $badge = Badge::findOrFail($id);
        return response()->json($badge);
    })->middleware('auth', 'checkLevel:id');    
});

require __DIR__.'/auth.php';
