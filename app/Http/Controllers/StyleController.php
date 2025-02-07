<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Style;
use App\Models\Avatar;
use Illuminate\Support\Facades\Storage;

class StyleController extends Controller
{
    public function index($avatar_id)
    {
        $avatars = Avatar::findOrFail($avatar_id); // Pastikan avatar ada
        $styles = Style::where('avatar_id', $avatar_id)->get(); // Ambil style berdasarkan avatar_id

        return view('admin.styles', compact('avatars', 'styles'));
    }

    public function store(Request $request, $avatarId)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'leaflet_cost' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Simpan gambar ke storage dan dapatkan path-nya
    $imagePath = $request->file('image')->store('styles', 'public');

    // Masukkan path gambar ke database
    Style::create([
        'avatar_id' => $avatarId,
        'name' => $request->name,
        'leaflet_cost' => $request->leaflet_cost,
        'path' => $imagePath, // ✅ Tambahkan path
    ]);

    return redirect()->back()->with('success', 'Style berhasil ditambahkan!');
}

public function update(Request $request, $id)
{
    $style = Style::findOrFail($id);

    $style->name = $request->name;
    $style->leaflet_cost = $request->leaflet_cost;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('styles', 'public');
        $style->path = $path;  // Gantilah 'image' dengan 'path'
    }

    $style->save();

    return redirect()->route('style.index', ['avatar_id' => $style->avatar_id])
                     ->with('success', 'Style updated successfully');
}

}
