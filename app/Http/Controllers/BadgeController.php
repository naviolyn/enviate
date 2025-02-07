<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Badge;
use Illuminate\Support\Facades\Storage;

class BadgeController extends Controller
{
    public function index()
    {
        $badge = Badge::all();
        return view('admin.badge', compact('badge'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:50',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'required_level' => 'required|integer|min:1'
    ]);

    // Simpan gambar ke storage
    $path = $request->file('image')->store('badge_images', 'public');

    // Simpan badge ke database dengan field yang benar
    Badge::create([
        'name' => $request->name,
        'description' => $request->description,
        'image_path' => $path, // Ubah 'image' menjadi 'image_path'
        'required_level' => $request->required_level
    ]);

    return redirect()->back()->with('success', 'Badge added successfully!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:50',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'required_level' => 'required|integer|min:1'
    ]);

    $badge = Badge::findOrFail($id, ['badge_id']);

    $badge->name = $request->name;
    $badge->description = $request->description;

    if ($request->hasFile('image')) {
        if (!empty($badge->image_path)) { // Pastikan image_path tidak null sebelum dihapus
            Storage::disk('public')->delete($badge->image_path);
        }
        $path = $request->file('image')->store('badge_images', 'public');
        $badge->image_path = $path;
    }
    
    $badge->required_level = $request->required_level;
    $badge->save();

    return redirect()->back()->with('success', 'Badge updated successfully!');
}

}
