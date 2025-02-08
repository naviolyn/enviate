<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VolunteerRegistration;
use App\Models\Volunteer;

class VolunteeList extends Component
{
    public $volunteerId;
    public $confirmDeleteId = null; // Untuk konfirmasi hapus, jika diperlukan

    public function mount($volunteerId)
    {
        $this->volunteerId = $volunteerId;
    }

    // Method yang dipanggil ketika tombol "Selesai" ditekan
    public function completeReward($registrationId)
{
    // Ambil data pendaftaran berdasarkan ID
    $registration = VolunteerRegistration::findOrFail($registrationId);
    
    // Ambil user terkait (pastikan relasi 'user' sudah didefinisikan di model VolunteerRegistration)
    $user = $registration->user;
    if (!$user) {
        session()->flash('message', 'User tidak ditemukan.');
        return;
    }
    
    // Ambil data volunteer untuk mendapatkan nilai reward
    $volunteer = Volunteer::findOrFail($this->volunteerId);
    $crystalReward = $volunteer->crystal_reward;
    $leafletsReward = $volunteer->leaflets_reward;
    
    // Update reward pada user (gunakan nama kolom sesuai dengan tabel: crystal, leaflets)
    $user->crystal = ($user->crystal ?? 0) + $crystalReward;
    $user->leaflets = ($user->leaflets ?? 0) + $leafletsReward;
    $user->save();
    
    // Opsional: Tandai pendaftaran sebagai selesai agar reward tidak diproses ulang
    // $registration->status = 'selesai';
    // $registration->save();
    
    session()->flash('message', 'Reward telah masuk ke akun.');
}

    public function confirmDelete($id)
    {
        $this->confirmDeleteId = $id;
    }

    public function deleteRegistration()
    {
        if ($this->confirmDeleteId) {
            $registration = VolunteerRegistration::find($this->confirmDeleteId);
            if($registration) {
                $registration->delete();
                session()->flash('message', 'Pendaftar berhasil dihapus.');
            }
            $this->confirmDeleteId = null;
        }
    }

    public function render()
    {
        $registrations = VolunteerRegistration::where('volunteer_id', $this->volunteerId)->get();
        $volunteer = Volunteer::find($this->volunteerId);
        $volunteerName = $volunteer ? $volunteer->name : 'Unknown';

        return view('livewire.voluntee-list', compact('registrations', 'volunteerName'));
    }
}