<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
use App\Livewire\CustomizeAvatar;
use App\Livewire\EditVolunteer;
use App\Livewire\RegisterVolunteer;
use App\Livewire\Profile;
use App\Livewire\ChangePassword;

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Profile as LivewireProfile; // Alias untuk kelas Livewire
use App\Http\Controllers\Profile as ControllerProfile; // Alias untuk kelas Controller jika diperlukan
use App\Livewire\VolunteerDetail;
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

// Mail::raw('Testing Mailtrap', function ($message) {
//     $message->to('test-recipient@mailtrap.io') // Gunakan email dari Mailtrap
//             ->subject('Mailtrap Test');
// });

// Halaman User
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('livewire.edit-profile');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/today-task', 'App\Livewire\UserTasks')->name('tasks.index');
Route::get('/weekly-task', WeeklyTask::class)->middleware('auth');
Route::get('/monthly-task', MonthlyTask::class)->middleware('auth');
Route::post('/complete-task/{id}', [TaskController::class, 'completeTask'])->name('task.complete');

Route::get('/leaderboard', Leaderboard::class)->name('leaderboard');

Route::get('/volunteer', Volunteer::class);
Route::get('/list-volunteer', \App\Livewire\MitraVolunteer::class); // Correctly reference the Livewire component

Route::get('/profile', Profile::class)->name('profile');
Route::get('/edit-profile', EditProfile::class);
Route::get('/mitra/volunteer/edit', EditVolunteer::class);
Route::get('/register-volunteer', RegisterVolunteer::class);
Route::get('/settings/password', ChangePassword::class)->name('settings.password')->middleware('auth');
Route::get('/customize-avatar', CustomizeAvatar::class)->name('customize-avatar');
Route::get('/mitra/volunteer/edit', EditVolunteer::class)->name('edit-volunteer');




// Middleware Mitra
Route::middleware(['auth', MitraMiddleware::class])->group(function () {
    // Route yang bisa diakses user
    Route::get('mitra-volunteer', function () {
        return view('mitra/volunteer');
    })->name('mitra-volunteer');

    Route::get('/mitra/volunteer', \App\Livewire\MitraVolunteer::class)->name('mitra.volunteer');
    Route::get('/mitra-volunteer/{volunteerId}/list', VolunteeList::class)
    ->name('mitra-volunteer.user');

    Route::get('/mitra-volunteer', [VolunteerController::class, 'index'])->name('mitra-volunteer');
    Route::post('/mitra-volunteer', [VolunteerController::class, 'store'])->name('mitra-volunteer.store');
    Route::get('/mitra-volunteer/edit/{id}', EditVolunteer::class)->name('mitra-volunteer.edit');
      // Route untuk menampilkan detail volunteer menggunakan Livewire
    Route::get('/mitra-volunteer/detail/{id}', VolunteerDetail::class)->name('mitra-volunteer.detail');
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

    Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
    Route::post('admin/tasks/toggle-status/{taskId}', [TasksController::class, 'toggleStatus'])->name('tasks.toggleStatus');
    Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');

    // Avatar Routes
    Route::get('/avatar', [AvatarController::class, 'index'])->name('avatar.index');
    Route::post('/avatar', [AvatarController::class, 'store'])->name('avatar.store');
    Route::put('/avatar/{id}', [AvatarController::class, 'update'])->name('avatar.update');

    // Style Routes
    Route::match(['get', 'post'], '/admin/avatars/{avatar_id}/styles', [StyleController::class, 'index'])->name('style.index');
    Route::post('/avatar/{avatar}/style', [StyleController::class, 'store'])->name('style.store');
    Route::put('/style/{id}', [StyleController::class, 'update'])->name('style.update');

    Route::get('/badge', [BadgeController::class, 'index'])->name('badge.index');
    Route::post('/badge', [BadgeController::class, 'store'])->name('badge.store');
    Route::put('/badge/{id}', [BadgeController::class, 'update'])->name('badge.update');
});

require __DIR__.'/auth.php';
