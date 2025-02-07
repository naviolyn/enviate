<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VolunteerRegistration;
use Illuminate\Support\Facades\Auth;

class RegisterVolunteer extends Component
{
    public $volunteer_id, $name, $email, $phone, $reason;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'reason' => 'nullable|string',
    ];

    public function mount()
    {
        $this->volunteer_id = request()->query('volunteer_id');

        if (!$this->volunteer_id) {
            session()->flash('error', 'Volunteer ID is missing!');
        }
    }

    public function submit()
    {
        $this->validate();

        VolunteerRegistration::create([
            'volunteer_id' => $this->volunteer_id,
            'user_id' => Auth::id(),
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'reason' => $this->reason,
        ]);

        session()->flash('success', 'Registration successful!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.register-volunteer');
    }
}

