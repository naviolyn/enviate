<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Volunteer;

class TambahVolunteer extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $crystal_reward;
    public $leaflets_reward;
    public $category;
    public $start_date;
    public $end_date;
    public $image;
    public $created_by;
    public $user_name;

    public function mount()
    {
        // Ambil ID pengguna yang sedang login dan nama pengguna
        $this->created_by = auth()->id();
        $this->user_name = auth()->user()->name; // Ambil nama pengguna yang login
    }

    public function save()
{
    // Validasi input
    $this->validate([
        'name' => 'required|string|max:255',
        'crystal_reward' => 'required|integer|min:0', // Validasi minimal 0 untuk crystal_reward
        'leaflets_reward' => 'required|integer|min:0', // Validasi minimal 0 untuk leaflets_reward
        'category' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date', // Ensure end date is after start date
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar opsional tapi dengan batasan yang tepat
    ]);

    try {
        // Simpan gambar jika ada
        $imagePath = $this->image ? $this->image->store('volunteers', 'public') : null;

        // Memanggil stored procedure
        \DB::select('CALL AddVolunteer(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $this->name,
            $this->description,
            $this->created_by,
            $this->crystal_reward,
            $this->leaflets_reward,
            $this->category,
            $this->start_date,
            $this->end_date,
            $imagePath
        ]);

        // Reset form setelah sukses
        $this->reset();

        session()->flash('success', 'Volunteer berhasil ditambahkan!');
    } catch (\Exception $e) {
        session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        \Log::error('Error saving volunteer: ' . $e->getMessage()); // Log kesalahan untuk debugging
    }
}
    public function render()
    {
        return view('livewire.tambah-volunteer');
    }
}