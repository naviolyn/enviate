<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VolunteerController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'crystal_reward' => 'required|integer',
        'leaflets_reward' => 'required|integer',
        'category' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        // Simpan gambar di folder public/image/OpenVolunteer
        $imagePath = $request->file('image')->store('img/OpenVolunteer', 'public');
    }

    // Simpan volunteer dan ambil instance yang baru dibuat
    $volunteer = Volunteer::create([
        'name' => $request->name,
        'description' => $request->description,
        'created_by' => Auth::id(),
        'crystal_reward' => $request->crystal_reward,
        'leaflets_reward' => $request->leaflets_reward,
        'category' => $request->category,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'image' => $imagePath,
    ]);

    // Redirect ke halaman /mitra-volunteer
    return redirect('/mitra-volunteer')->with('success', 'Volunteer berhasil ditambahkan.');

}

    public function edit($id)
    {
        $volunteer = Volunteer::where('created_by', Auth::id())
                            ->findOrFail($id);
        return view('livewire.edit-volunteer', compact('volunteer'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'crystal_reward' => 'required|numeric',
        'leaflets_reward' => 'required|numeric',
        'category' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $volunteer = Volunteer::where('created_by', Auth::id())
                        ->findOrFail($id);

    if ($request->hasFile('image')) {
        if ($volunteer->image) {
            Storage::disk('public')->delete($volunteer->image);
        }
        // Simpan gambar di folder public/image/OpenVolunteer
        $volunteer->image = $request->file('image')->store('img/OpenVolunteer', 'public');
    }

    $volunteer->update([
        'name' => $request->name,
        'description' => $request->description,
        'crystal_reward' => $request->crystal_reward,
        'leaflets_reward' => $request->leaflets_reward,
        'category' => $request->category,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
    ]);

    return redirect()->route('mitra-volunteer')->with('success', 'Volunteer berhasil diperbarui.');
}

    // public function show($id)
    // {
    //     $volunteer = Volunteer::findOrFail($id);
    //     return view('livewire.volunteer-detail', compact('volunteer'));
    // }
    // public function volunteerList()
    // {
    //     $volunteers = Volunteer::paginate(10); // Mengambil semua volunteer dengan pagination
    //     return view('livewire.volunteer', compact('volunteers'));
    // }

    public function index()
    {
        $volunteers = Volunteer::where('created_by', Auth::id())
                             ->get();
        return view('livewire.mitra-volunteer', compact('volunteers'));
    }

    public function destroy($id)
    {
        $volunteer = Volunteer::where('created_by', Auth::id())
                            ->findOrFail($id);
        
        if ($volunteer->image) {
            Storage::disk('public')->delete($volunteer->image);
        }
        
        $volunteer->delete();
        
        return redirect()->route('mitra-volunteer')
                        ->with('success', 'Volunteer berhasil dihapus!');
    }
}