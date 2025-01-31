<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTask;

class TodayTask extends Component
{
    public function render()
    {
        $user = Auth::user();

        $tasks = UserTask::where('user_id', $user->id)
                    ->whereHas('task', function ($query) {
                        $query->where('type', 'daily');
                    })
                    ->where('status', 'pending')
                    ->get();

        $completedTasks = UserTask::where('user_id', $user->id)
                    ->whereHas('task', function ($query) {
                        $query->where('type', 'daily');
                    })
                    ->where('status', 'completed')
                    ->get();

        return view('livewire.today-task', [
            'level' => $user->level,
            'tasks' => $tasks,
            'completedTasks' => $completedTasks
        ]);
    }
}


