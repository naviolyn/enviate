<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Volunteer as VolunteerModel;

class Volunteer extends Component
{
    public $volunteers;
    public $categories;
    public $selectedCategory = null;

    public function mount()
    {
        $this->categories = VolunteerModel::pluck('category')->unique()->toArray();
        $this->loadVolunteers();
    }

    public function loadVolunteers()
    {
        $query = VolunteerModel::with('creator'); // Eager load creator relation

        if ($this->selectedCategory) {
            $query->where('category', $this->selectedCategory);
        }

        $this->volunteers = $query->get();
    }

    public function setCategory($category)
    {
        $this->selectedCategory = $category;
        $this->loadVolunteers();
    }

    public function render()
    {
        return view('livewire.volunteer', [
            'volunteers' => $this->volunteers,
            'categories' => $this->categories
        ]);
    }
}
