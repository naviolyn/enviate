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
            'crystal_reward' => 'required|integer|min:0',
            'leaflets_reward' => 'required|integer|min:0',
            'category' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Simpan gambar jika ada
            $imagePath = $this->image ? $this->image->store('volunteers', 'public') : null;

            // Simpan data volunteer menggunakan Eloquent
            Volunteer::create([
                'name' => $this->name,
                'description' => $this->description,
                'created_by' => $this->created_by,
                'crystal_reward' => $this->crystal_reward,
                'leaflets_reward' => $this->leaflets_reward,
                'category' => $this->category,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'image' => $imagePath,
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
