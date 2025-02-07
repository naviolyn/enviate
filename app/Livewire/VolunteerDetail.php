<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Volunteer;

class VolunteerDetail extends Component
{
    public $volunteerId;
    public $volunteer;

    public function mount($id)
    {
    $this->volunteerId = $id;
    $this->volunteer = Volunteer::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.volunteer-detail');
    }

    public function back()
    {
        return redirect()->route('mitra-volunteer');
    }
    

}
