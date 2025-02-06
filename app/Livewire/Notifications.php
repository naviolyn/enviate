<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    public $notifications = [];

    protected $listeners = ['leafletsUpdated' => 'addNotification'];

    public function mount()
    {
        // Ambil notifikasi dari database
        $this->notifications = Notification::where('user_id', Auth::id())->latest()->get();
    }

    public function addNotification($amount, $taskName)
{
    // Pesan berbeda untuk penambahan dan pengurangan leaflets
    if ($amount > 0) {
        $message = "You received {$amount} Leaflets for completing the task {$taskName}";
    } else {
        // Ubah nilai negatif menjadi positif untuk pesan
        $positiveAmount = abs($amount);
        $message = "Your Leaflets have been reduced by {$positiveAmount} for uncompleting the task {$taskName}";
    }

    // Simpan notifikasi ke database
    Notification::create([
        'user_id' => Auth::id(),
        'message' => $message,
    ]);

    // Ambil notifikasi terbaru dari database
    $this->notifications = Notification::where('user_id', Auth::id())->latest()->get();
}

    public function render()
    {
        return view('livewire.notifications');
    }
}
