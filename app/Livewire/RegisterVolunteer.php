<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VolunteerRegistration;
use Illuminate\Support\Facades\Auth;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Mail;
use App\Mail\VolunteerRegistrationMail;


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

        $registration = VolunteerRegistration::create([
            'volunteer_id' => $this->volunteer_id,
            'user_id' => Auth::id(),
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'reason' => $this->reason,
        ]);

        // **Perbaikan: Pastikan model Volunteer digunakan dengan find()**
        $volunteer = Volunteer::find($this->volunteer_id);

        if ($volunteer) {
            // Kirim email ke user
            Mail::to($this->email)->send(new VolunteerRegistrationMail($volunteer->name, $this->name));
        } else {
            session()->flash('error', 'Volunteer not found!');
        }

        session()->flash('success', 'Registration successful! Please check your email.');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.register-volunteer');
    }
}

