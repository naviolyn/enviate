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
        // Toggle the user's status (1 becomes 0, and 0 becomes 1)
        $user->status = $user->status == '1' ? '0' : '1';
        $user->save();

        // Redirect back with success message
        return redirect()->route('users.index')->with('success', 'User status updated successfully.');
    }
}
