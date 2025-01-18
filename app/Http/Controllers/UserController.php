<?php

namespace App\Http\Controllers;

use App\Models\UserView;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Get all users from the view
        $users = UserView::all();
        
        // Pass the users data to the view
        return view('admin.users', compact('users'));
    }

    public function destroy($id)
    {
        // Find the user by id
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Redirect or return a response
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
