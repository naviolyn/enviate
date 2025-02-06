<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;

class UserTasks extends Component
{
    public $otherTasks = [];
    public $todayTasks = [];
    public $completedTasks = [];

    public function mount()
    {
        $this->loadTasks();
    }

    private function loadTasks()
    {
        $user = Auth::user();

        // Tambahkan filter type 'daily' untuk todayTasks juga
        $this->todayTasks = UserTask::where('user_id', $user->id)
            ->where('status', 'in_progress')
            ->whereHas('task', function($query) {
                $query->where('type', 'daily');
            })
            ->get();

        $this->completedTasks = UserTask::where('user_id', $user->id)
            ->where('status', 'completed')
            ->whereHas('task', function($query) {
                $query->where('type', 'daily');
            })
            ->get();

        // Ambil semua task yang belum di-assign ke user
        $this->otherTasks = Task::where('type', 'daily')
            ->whereNotIn('task_id', function ($query) use ($user) {
                $query->select('task_id')
                    ->from('user_tasks')
                    ->where('user_id', $user->id);
            })->get();
    }


    // Fungsi untuk memindahkan task ke "Your Today Task"
    public function addToTodayTask($taskId)
{
    $userId = Auth::id();

    UserTask::updateOrCreate(
        ['user_id' => $userId, 'task_id' => $taskId],
        ['status' => 'in_progress']
    );

    $this->loadTasks(); // Pastikan ini berjalan agar daftar tugas diperbarui
}



    // Fungsi untuk menandai task sebagai "Completed"
    public function completeTask($taskId)
    {
        $user = Auth::user();

        // Ambil task yang diselesaikan
        $task = Task::find($taskId);

        if (!$task) {
            return;
        }

        // Update status task menjadi completed
        UserTask::where('user_id', $user->id)
            ->where('task_id', $taskId)
            ->update(['status' => 'completed']);

        // Tambahkan leaflets_reward ke user
        $user->leaflets += $task->leaflets_reward;
        $user->save();


        // Perbarui daftar tugas
        $this->todayTasks = $this->todayTasks->reject(fn($t) => $t->task_id == $taskId);

        $this->completedTasks = UserTask::where('user_id', $user->id)
        ->where('status', 'completed')
        ->whereHas('task', function($query) {
            $query->where('type', 'daily');
        })
        ->get();

        // Refresh daftar tugas
        $this->loadTasks();

        // Notifikasi Leaflets
        $this->dispatch('leafletsUpdated', $task->leaflets_reward, $task->name);
        session()->flash('message', "Tugas berhasil diselesaikan! Anda mendapatkan {$task->leaflets_reward} Leaflets.");

    }



    public function addTaskToUser($userId, $taskId)
{
    // Cek apakah status yang akan diset valid
    $status = 'in_progress';  // Anda bisa mengganti ini dengan logika tertentu

    $userTask = new UserTask();
    $userTask->user_id = $userId;
    $userTask->task_id = $taskId;
    $userTask->status = $status;  // Set status menjadi 'in_progress'
    $userTask->completed_at = null;  // Karena statusnya 'in_progress', completed_at kosong
    $userTask->save();
}

public function unfinishTask($taskId)
{
    $user = Auth::user();

    // Ambil task yang akan di-unfinish dan pastikan type-nya daily
    $task = Task::where('task_id', $taskId)
        ->where('type', 'daily')
        ->first();

    if (!$task) {
        return;
    }

    // Ambil user task yang akan diupdate
    $userTask = UserTask::where('user_id', $user->id)
        ->where('task_id', $taskId)
        ->whereHas('task', function($query) {
            $query->where('type', 'daily');
        })
        ->first();

    if ($userTask && $userTask->status === 'completed') {
        // Update status task kembali ke in_progress
        $userTask->status = 'in_progress';
        $userTask->save();

        // Kurangi leaflets user
        $user->leaflets -= $task->leaflets_reward;
        $user->save();

        // Notifikasi Leaflets berkurang
        $this->dispatch('leafletsUpdated', -$task->leaflets_reward, $task->name);
        session()->flash('message', "Task dikembalikan ke Your Today Task. {$task->leaflets_reward} Leaflets dikurangi.");
    }

    // Refresh daftar tugas
    $this->loadTasks();
}


    public function render()
    {
        return view('livewire.today-task');
    }
}

