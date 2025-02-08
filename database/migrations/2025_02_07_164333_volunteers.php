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
            'email' => 'nullable|email|max:255', //
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('volunteers', 'public');
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
            'email' => $request->email, // 
        ]);

        return redirect()->back()->with('success', 'Volunteer berhasil ditambahkan.');
    }

    // Method to edit volunteer
    public function edit($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        return view('livewire.edit-volunteer', compact('volunteer'));
    }

    // Method to update volunteer
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
            'email' => 'nullable|email|max:255', // 
        ]);

        $volunteer = Volunteer::findOrFail($id);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($volunteer->image) {
                \Storage::disk('public')->delete($volunteer->image);
            }
            $volunteer->image = $request->file('image')->store('volunteers', 'public');
        }

        // Update volunteer details
        $volunteer->name = $request->name;
        $volunteer->description = $request->description;
        $volunteer->crystal_reward = $request->crystal_reward;
        $volunteer->leaflets_reward = $request->leaflets_reward;
        $volunteer->category = $request->category;
        $volunteer->start_date = $request->start_date;
        $volunteer->end_date = $request->end_date;
        $volunteer->email = $request->email; // 

        $volunteer->save();

        return redirect()->route('mitra-volunteer.update', ['id' => $id])->with('success', 'Volunteer berhasil diperbarui!');
    }

    // Method to show volunteer details
    public function show($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        return view('volunteer-detail', compact('volunteer'));
    }

    // Method to display all volunteers
    public function index()
    {
        $volunteers = Volunteer::all();
        return view('mitra-volunteer', compact('volunteers'));
    }
}
