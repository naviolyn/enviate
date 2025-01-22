<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component
{
    public $user;

    public function mount()
{
    if (Auth::check()) {
        $this->user = Auth::user();
    } else {
        $this->user = null;
    }
}

    public function render()
    {
        // Mengirim variabel ke tampilan Blade
        return view('livewire.sidebar');
    }
}
