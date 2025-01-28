<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $primaryKey = 'task_id';

    protected $fillable = [
        'name',
        'description',
        'type',
        'level',
        'leaflets_reward',
        'created_by',
        'reminder',
    ];

    public $timestamps = false;

    public function userTasks()
    {
        return $this->hasMany(UserTask::class, 'task_id');
    }

    public function completeTask($taskId, $reward)
    {
        // Proses untuk menyelesaikan task, update status, dsb.
        $task = Task::find($taskId);
        if ($task) {
            $task->status = 'completed';
            $task->save();

            // Update reward atau data lainnya sesuai dengan bisnis logic
            $this->leafletReward += $reward;

            // Emit event jika ingin memberi respons ke frontend
            $this->emit('taskCompleted', $taskId);
        }
    }

    protected $listeners = ['taskCompleted' => 'handleTaskCompleted'];

    public function handleTaskCompleted($taskId)
    {
        // Lakukan sesuatu untuk memperbarui UI, seperti memindahkan task dari pending ke completed
        $this->tasks = Task::where('status', 'pending')->get();
        $this->completedTasks = Task::where('status', 'completed')->get();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tasks', 'task_id', 'user_id')
            ->withPivot('status', 'completed_at');
    }
}
