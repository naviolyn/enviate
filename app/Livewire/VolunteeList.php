<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VolunteerRegistration;
use App\Models\Volunteer;
use App\Models\UserVolunteer;
use Illuminate\Support\Facades\Log;

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

    // Ambil user terkait
    $user = $registration->user;
    if (!$user) {
        session()->flash('message', 'User tidak ditemukan.');
        return;
    }

    // Ambil data volunteer untuk mendapatkan nilai reward
    $volunteer = Volunteer::findOrFail($this->volunteerId);
    $crystalReward = $volunteer->crystal_reward;
    $leafletsReward = $volunteer->leaflets_reward;

    // Cek apakah user sudah pernah menyelesaikan volunteer ini
    $existingRecord = UserVolunteer::where('user_id', $user->id)
                                    ->where('volunteer_id', $this->volunteerId)
                                    ->exists();

    if ($existingRecord) {
        session()->flash('message', 'User sudah menyelesaikan volunteer ini.');
        return;
    }

    // Simpan ke tabel user_volunteers
    UserVolunteer::create([
        'user_id' => $user->id,
        'volunteer_id' => $this->volunteerId,
        'status' => 'completed',
        'confirmed_at' => now()
    ]);

    // Update reward pada user
    $user->crystal = ($user->crystal ?? 0) + $crystalReward;
    $user->leaflets = ($user->leaflets ?? 0) + $leafletsReward;
    $user->save();

    // Tandai pendaftaran sebagai selesai
    $registration->status = 'completed';
    $registration->save();

    session()->flash('message', 'Reward telah masuk ke akun dan volunteer tercatat di sistem.');
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
