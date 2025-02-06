<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Volunteer;

class MitraVolunteer extends Component
{
    use WithPagination;

    protected $listeners = ['volunteerAdded' => '$refresh'];

    public function render()
    {
        $volunteers = Volunteer::latest()->paginate(10);
        return view('livewire.mitra-volunteer', compact('volunteers'));
    }
}
