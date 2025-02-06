<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EditProfile extends Component
{
    public $username, $email, $province, $city;

    // Mengambil data pengguna yang sedang login
    public function mount()
    {
        $user = Auth::user();
        $this->username = $user->username;
        $this->email = $user->email;
        $this->province = $user->province;
        $this->city = $user->city;
    }

    // Method untuk menyimpan perubahan
    public function save()
    {
        $user = Auth::user();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->province = $this->province;
        $user->city = $this->city;
        $user->save();

        session()->flash('message', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
