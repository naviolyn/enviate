<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\UserTask;

class UserTasks extends Component
{
    public $tasks;
    public $level;

    public function mount()
    {
        $this->level = auth()->user()->level; // Ambil level user
        $this->tasks = Task::where('level', '<=', $this->level)->get(); // Ambil task berdasarkan level
    }

    public function completeTask($taskId)
    {
        $userTask = UserTask::where('user_id', auth()->id())->where('task_id', $taskId)->first();

        if ($userTask) {
            $userTask->update(['status' => 'completed', 'completed_at' => now()]);

            // Periksa apakah semua task di level ini sudah selesai
            $remainingTasks = UserTask::where('user_id', auth()->id())
                ->where('status', 'pending')
                ->count();

            if ($remainingTasks === 0) {
                // Naikkan level user
                $user = auth()->user();
                $user->increment('level');
                $this->level = $user->level;

                // Refresh tasks
                $this->tasks = Task::where('level', '<=', $this->level)->get();
            }
        }
    }

    public function render()
    {
        // Ambil data completed tasks dari model atau database
        $completedTasks = UserTask::where('status', 'completed')->get();

        // Pastikan variabel dikirimkan ke view
        return view('livewire.today-task', compact('completedTasks'));
    }
}
