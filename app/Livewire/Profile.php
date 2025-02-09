<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Badge;
use App\Models\User;
use App\Models\UserTask;
use App\Models\UserVolunteer;
use Carbon\Carbon;

class Profile extends Component
{
    public $user;
    public $badge;
    public $category = 'indonesia';
    public $leaderboard;
    public $completedTasksCount;

    public $completedVolunteersCount;

    public function mount()
    {
        $this->user = Auth::user();
        $this->badge = Badge::where('required_level', '<=', $this->user->level)
                            ->orderByDesc('required_level')
                            ->first();
        $this->updateCompletedTasksCount();
        $this->updateCompletedVolunteersCount();
    }

    public function updateCompletedTasksCount()
    {
        $this->completedTasksCount = UserTask::where('user_id', $this->user->id)
                                           ->where('status', 'completed')
                                           ->count();
    }

    public function updateCompletedVolunteersCount()
    {
        $this->completedVolunteersCount = UserVolunteer::where('user_id', $this->user->id)
                                                      ->where('status', 'completed')
                                                      ->count();
    }

    public function getUserRank($category)
    {
        $currentUser = Auth::user();

        $query = User::where('role', 'user');

        if ($category === 'province') {
            $query->where('province', $currentUser->province);
        } elseif ($category === 'city') {
            $query->where('city', $currentUser->city);
        }

        $rank = $query->orderByDesc('leaflets')->pluck('id')->search($currentUser->id);

        return $rank !== false ? $rank + 1 : 'N/A';
    }

    public function render()
    {
        return view('livewire.profile', [
            'user' => $this->user,
            'badge' => $this->badge,
            'completedTasksCount' => $this->completedTasksCount, 
        ]);
    }
}
