<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Volunteer;

class EditVolunteer extends Component
{
    public function edit($id)
    {
    $volunteer = Volunteer::findOrFail($id);
    return view('livewire.edit-volunteer', compact('volunteer'));
    }
    public function render()
    {
        // Menampilkan volunteer dengan pagination
        $volunteers = Volunteer::latest()->paginate(10);
        
        // Menampilkan data ke view
        return view('livewire.edit-volunteer', compact('volunteers'));
    }
}
