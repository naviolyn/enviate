<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users', compact('users'));
    }

    public function toggleStatus(User $user)
    {
        if ($user->role !== 'user') {
            return redirect()->route('users.index')->with('error', 'Unauthorized action.');
        }

        // Toggle status
        $user->status = $user->status == '1' ? '0' : '1';
        $user->save();

        return redirect()->route('users.index')->with('success', 'User status updated successfully.');
    }
}
