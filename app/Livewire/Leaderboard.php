<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Badge;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Leaderboard extends Component
{
    public $category = 'indonesia';
    public $leaderboard;
    public $userBadge;

    public function mount()
    {
        $this->updateLeaderboard();
        $this->updateUserBadge();
    }

    public function updateLeaderboard()
    {
        $this->leaderboard = $this->getLeaderboard();
    }

    public function getLeaderboard()
    {
        $currentUser = Auth::user();

        $query = User::select('id', 'username', 'leaflets', 'level', 'province', 'city')
            ->where('role', 'user')
            ->orderByDesc('leaflets');

        if ($this->category === 'province') {
            $query->where('province', $currentUser->province);
        } elseif ($this->category === 'city') {
            $query->where('city', $currentUser->city);
        }

        return $query->get();
    }

    public function updateUserBadge()
    {
        $currentUser = Auth::user();
        $this->userBadge = Badge::where('required_level', '<=', $currentUser->level)
                                ->orderByDesc('required_level')
                                ->first();
    }

    public function updated($property)
    {
        $this->updateLeaderboard();
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

        return $rank !== false ? $rank + 1 : 'N/A'; // Jika user tidak ditemukan, tampilkan 'N/A'
    }


    public function render()
    {
        return view('livewire.leaderboard', [
            'users' => $this->getLeaderboard(),
            'badge' => $this->userBadge
        ]);
    }
}
