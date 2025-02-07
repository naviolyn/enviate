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
use App\Livewire\RegisterVolunteer;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Profile;
use App\Livewire\EditVolunteer;
use App\Livewire\VolunteeList;
// use App\Livewire\VolunteerDetail;

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


Route::get('/profile', Profile::class);
Route::get('/edit-profile', EditProfile::class);
Route::get('/register-volunteer', RegisterVolunteer::class);
Route::get('/customize-avatar', CustomizeAvatar::class);

Route::resource('tasks', TaskController::class);

// Middleware Mitra
Route::middleware(['auth', MitraMiddleware::class])->group(function () {
    // Route yang bisa diakses user
    Route::get('/mitra/dashboard', function () {
        return view('mitra.dashboard');
    })->name('mitra.dashboard');

    Route::get('/mitra/volunteer', \App\Livewire\MitraVolunteer::class);
    Route::get('/mitra-volunteer/user/{id}', VolunteeList::class);
    Route::get('/mitra-volunteer', [VolunteerController::class, 'index'])->name('mitra-volunteer');
    Route::post('/mitra-volunteer', [VolunteerController::class, 'store'])->name('mitra-volunteer.store');
    Route::get('/mitra-volunteer/edit/{id}', [VolunteerController::class, 'edit'])->name('mitra-volunteer.edit');
    Route::put('/mitra-volunteer/{id}', [VolunteerController::class, 'update'])->name('mitra-volunteer.update');
    Route::delete('/mitra-volunteer/{id}', [VolunteerController::class, 'destroy'])->name('mitra-volunteer.destroy');
   

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
