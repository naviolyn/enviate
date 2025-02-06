<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;

class MonthlyTask extends Component
{
    public $otherTasks = [];
    public $monthlyTasks = [];
    public $completedTasks = [];

    public function mount()
    {
        $this->loadTasks();
    }

    private function loadTasks()
    {
        $user = Auth::user();

        $this->monthlyTasks = $user->monthlyTasks()->where('status', 'in_progress')->get();

        $this->completedTasks = UserTask::where('user_id', $user->id)
            ->where('status', 'completed')
            ->whereHas('task', function($query) {
                $query->where('type', 'monthly');
            })
            ->get();

        $this->otherTasks = Task::where('type', 'monthly')
            ->whereNotIn('task_id', function ($query) use ($user) {
                $query->select('task_id')->from('user_tasks')->where('user_id', $user->id);
            })->get();
    }

    public function addToMonthlyTask($taskId)
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

        $this->monthlyTasks = UserTask::where('user_id', $user->id)
            ->where('status', 'in_progress')
            ->get();

        $this->completedTasks = UserTask::where('user_id', $user->id)
            ->where('status', 'completed')
            ->whereHas('task', function($query) {
                $query->where('type', 'monthly');
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

        if (!$task || $task->type !== 'monthly') {
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
                $query->where('type', 'monthly');
            })
            ->where('status', 'pending')
            ->get();

        $completedTasks = UserTask::where('user_id', $user->id)
            ->whereHas('task', function ($query) {
                $query->where('type', 'monthly');
            })
            ->where('status', 'completed')
            ->get();

        return view('livewire.monthly-task', [
            'level' => $user->level,
            'tasks' => $tasks,
            'completedTasks' => $completedTasks
        ]);
    }
}
