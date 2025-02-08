<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    // Method to store a new volunteer
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
            'email' => 'nullable|string|max:255', 
        ]);

        // Handle image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Nama unik
        $image->move(public_path('img/OpenVolunteers'), $imageName); // Simpan di public/img/OpenVolunteers
        $imagePath = 'img/OpenVolunteers/' . $imageName; // Simpan path relatif di database
    }

        // Save data to the database
        Volunteer::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => Auth::id(),
            'crystal_reward' => $request->crystal_reward,
            'leaflets_reward' => $request->leaflets_reward,
            'category' => $request->category,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $imagePath,
            'email' => $request->email, // ✅ Tambah email ke database
        ]);

        return redirect()->back()->with('success', 'Volunteer berhasil ditambahkan.');
    }

   

    // Method to show volunteer details
    public function show($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        return view('volunteer-detail', compact('volunteer'));
    }

    // Method to display all volunteers
    // public function index()
    // {
    //     $volunteers = Volunteer::all();
    //     return view('mitra-volunteer', compact('volunteers'));
    // }
    public function destroy($id)
{
    $volunteer = Volunteer::findOrFail($id);
    $volunteer->delete();

    return redirect()->back()->with('success', 'Volunteer berhasil dihapus.');
}
    
    public function index()
    {
        $volunteers = Volunteer::withCount('registrations')->get();
        return view('mitra-volunteer', compact('volunteers'));
    }
}
