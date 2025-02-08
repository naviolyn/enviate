<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Badge;

class Profile extends Component
{
    public $user;
    public $badge;

    public function mount()
    {
        $this->user = Auth::user();
        $this->badge = Badge::where('required_level', '<=', $this->user->level)
                            ->orderByDesc('required_level')
                            ->first();
    }

    public function render()
    {
        return view('livewire.profile', [
            'user' => $this->user,
            'badge' => $this->badge,
        ]);
    }
}
