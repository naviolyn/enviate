<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

// Relasi Many-to-Many dengan Avatar yang telah dibeli
public function ownedAvatars(): BelongsToMany
{
    return $this->belongsToMany(Avatar::class, 'user_avatars', 'user_id', 'avatar_id')
                ->select('avatars.id', 'avatars.name', 'avatars.path', 'avatars.leaflet_reward')
                ->withTimestamps();
}

public function ownedStyles(): BelongsToMany
{
    return $this->belongsToMany(Style::class, 'user_styles', 'user_id', 'style_id')
                ->select('styles.id', 'styles.name', 'styles.path', 'styles.leaflet_cost')
                ->withTimestamps();
}

public function avatars()
{
    return $this->belongsToMany(Avatar::class, 'user_avatars')->withTimestamps();
}

public function styles(): BelongsToMany
    {
        return $this->belongsToMany(Style::class, 'user_styles', 'user_id', 'style_id')
            ->withTimestamps();
    }
}
