<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avatar;
use Illuminate\Support\Facades\Storage;
 
class AvatarController extends Controller
{
    public function index()
    {
        $avatar = Avatar::all();
        return view('admin.avatar', compact('avatar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'leaflet_reward' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('image')->store('avatar_images', 'public');

        Avatar::create([
            'name' => $request->name,
            'image' => $imagePath,
            'leaflet_reward' => $request->leaflet_reward,
            'path' => $imagePath, // Simpan path gambar
        ]);        

        return redirect()->back()->with('success', 'Avatar added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'leaflet_reward' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $avatar = Avatar::findOrFail($id);

        $avatar->name = $request->name;
        $avatar->leaflet_reward = $request->leaflet_reward;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            Storage::disk('public')->delete($avatar->image);

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('avatar_images', 'public');
            $avatar->image = $imagePath;
        }

        $avatar->save();

        return redirect()->back()->with('success', 'Avatar updated successfully!');
    }

}
