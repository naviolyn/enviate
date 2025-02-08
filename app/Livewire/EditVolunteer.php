<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Volunteer;

class EditVolunteer extends Component
{
    public $volunteer_id, $name, $crystal_reward, $leaflets_reward, $category, $start_date, $end_date, $description;

    public function mount($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $this->volunteer_id = $volunteer->volunteer_id;
        $this->name = $volunteer->name;
        $this->crystal_reward = $volunteer->crystal_reward;
        $this->leaflets_reward = $volunteer->leaflets_reward;
        $this->category = $volunteer->category;
        $this->start_date = $volunteer->start_date;
        $this->end_date = $volunteer->end_date;
        $this->description = $volunteer->description;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'crystal_reward' => 'required|numeric',
            'leaflets_reward' => 'required|numeric',
            'category' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required|string',
        ]);

        $volunteer = Volunteer::findOrFail($this->volunteer_id);
        $volunteer->update([
            'name' => $this->name,
            'crystal_reward' => $this->crystal_reward,
            'leaflets_reward' => $this->leaflets_reward,
            'category' => $this->category,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Volunteer berhasil diperbarui.');
    }

    public function render()
{
    return view('livewire.edit-volunteer', [
        'volunteer' => Volunteer::findOrFail($this->volunteer_id)
    ]);
}
}