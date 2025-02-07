<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $guarded = [];
    protected $primaryKey = 'id'; // Sesuaikan primary key
    public $incrementing = true; // Jika primary key auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
    'username',
    'email',
    'province',
    'city',
    'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'user_tasks', 'user_id', 'task_id')
            ->withPivot('status', 'completed_at');
    }

    public function isUser()
    {
        return $this->role === 'user'; // misalnya role 'user'
    }

    public function todayTasks()
    {
        return $this->hasMany(UserTask::class, 'user_id')
                    ->where('status', 'in_progress');
    }

    public function completedTasks()
    {
        return $this->hasMany(UserTask::class, 'user_id')
                    ->where('status', 'completed');
    }

    public function weeklyTasks()
{
    return $this->hasMany(UserTask::class, 'user_id')
        ->whereHas('task', function ($query) {
            $query->where('type', 'weekly');
        });
}

public function monthlyTasks()
{
    return $this->hasMany(UserTask::class, 'user_id')
        ->whereHas('task', function ($query) {
            $query->where('type', 'monthly');
        });
}


}
