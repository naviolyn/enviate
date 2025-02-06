<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;

class WeeklyTask extends Component
{
    public $otherTasks = [];
    public $weeklyTasks = [];
    public $completedTasks = [];

    public function mount()
    {
        $this->loadTasks();
    }

    private function loadTasks()
    {
        $user = Auth::user();

        $this->weeklyTasks = $user->weeklyTasks()->where('status', 'in_progress')->get();

        $this->completedTasks = UserTask::where('user_id', $user->id)
            ->where('status', 'completed')
            ->whereHas('task', function($query) {
                $query->where('type', 'weekly');
            })
            ->get();

        $this->otherTasks = Task::where('type', 'weekly')
            ->whereNotIn('task_id', function ($query) use ($user) {
                $query->select('task_id')->from('user_tasks')->where('user_id', $user->id);
            })->get();
    }

    public function addToWeeklyTask($taskId)
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

        $this->weeklyTasks = UserTask::where('user_id', $user->id)
            ->where('status', 'in_progress')
            ->get();

        $this->completedTasks = UserTask::where('user_id', $user->id)
            ->where('status', 'completed')
            ->whereHas('task', function($query) {
                $query->where('type', 'weekly');
            })
            ->get();

        $this->dispatch('leafletsUpdated', $task->leaflets_reward, $task->name);
        session()->flash('message', "Tugas berhasil diselesaikan! Anda mendapatkan {$task->leaflets_reward} Leaflets.");

        $this->loadTasks();
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

        if (!$task || $task->type !== 'weekly') {
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
        $user = Auth::user();

        $tasks = UserTask::where('user_id', $user->id)
            ->whereHas('task', function ($query) {
                $query->where('type', 'weekly');
            })
            ->where('status', 'pending')
            ->get();

        $completedTasks = UserTask::where('user_id', $user->id)
            ->whereHas('task', function ($query) {
                $query->where('type', 'weekly');
            })
            ->where('status', 'completed')
            ->get();

        return view('livewire.weekly-task', [
            'level' => $user->level,
            'tasks' => $tasks,
            'completedTasks' => $completedTasks
        ]);
    }
}
