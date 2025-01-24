<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // Get all users from the view
        $users = UserView::all();
        
        // Pass the users data to the view
        return view('admin.users', compact('users'));
    }  

    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Perbarui status berdasarkan nilai dari dropdown
        $user->status = $request->input('status');
        $user->save();

        return redirect()->back()->with('success', 'Status pengguna berhasil diperbarui.');
    }
}
