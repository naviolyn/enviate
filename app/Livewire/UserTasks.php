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

        $this->otherTasks = Task::where('type', 'daily')
            ->whereNotIn('task_id', function ($query) use ($user) {
                $query->select('task_id')
                    ->from('user_tasks')
                    ->where('user_id', $user->id);
            })->get();
    }

    public function addToTodayTask($taskId)
    {
        $userId = Auth::id();

        UserTask::updateOrCreate(
            ['user_id' => $userId, 'task_id' => $taskId],
            ['status' => 'in_progress']
        );

        $this->loadTasks();
    }

    public function completeTask($taskId)
    {
        $user = Auth::user();
        $task = Task::find($taskId);

        if (!$task) {
            return;
        }

        UserTask::where('user_id', $user->id)
            ->where('task_id', $taskId)
            ->update(['status' => 'completed']);

        $user->leaflets += $task->leaflets_reward;
        $user->save();

        $this->todayTasks = $this->todayTasks->reject(fn($t) => $t->task_id == $taskId);

        $this->completedTasks = UserTask::where('user_id', $user->id)
            ->where('status', 'completed')
            ->whereHas('task', function($query) {
                $query->where('type', 'daily');
            })
            ->get();

        $this->loadTasks();

        $this->dispatch('leafletsUpdated', $task->leaflets_reward, $task->name);
        session()->flash('message', "Tugas berhasil diselesaikan! Anda mendapatkan {$task->leaflets_reward} Leaflets.");
    }

    public function addTaskToUser($userId, $taskId)
    {
        $status = 'in_progress';

        $userTask = new UserTask();
        $userTask->user_id = $userId;
        $userTask->task_id = $taskId;
        $userTask->status = $status;
        $userTask->completed_at = null;
        $userTask->save();
    }

    public function unfinishTask($taskId)
    {
        $user = Auth::user();
        $task = Task::find($taskId);

        if (!$task || $task->type !== 'daily') {
            return;
        }

        $userTask = UserTask::where('user_id', $user->id)
            ->where('task_id', $taskId)
            ->where('status', 'completed')
            ->first();

        if ($userTask) {
            UserTask::where('user_id', $user->id)
                ->where('task_id', $taskId)
                ->update(['status' => 'in_progress']);

            $user->leaflets = max(0, $user->leaflets - $task->leaflets_reward);
            $user->save();

            $this->dispatch('leafletsUpdated', -$task->leaflets_reward, $task->name);
            session()->flash('message', "Task dikembalikan ke Your Today Task. {$task->leaflets_reward} Leaflets dikurangi.");

            $this->loadTasks();
        }
    }

    public function render()
    {
        return view('livewire.today-task');
    }
}
