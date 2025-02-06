<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MitraController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'mitra')->get();
        return view('admin.partners', compact('users'));
    }

    public function toggleStatus(User $user)
    {
        if ($user->role !== 'mitra') {
            return redirect()->route('mitra.index')->with('error', 'Unauthorized action.');
        }

        // Toggle status
        $user->status = $user->status == '1' ? '0' : '1';
        $user->save();

        return redirect()->route('mitra.index')->with('success', 'Partner status updated successfully.');
    }
}

