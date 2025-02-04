<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        // Fetch all tasks from the database
        $tasks = Task::all();

        // Return the view with the tasks data, specify the full path
        return view('admin.tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:daily,weekly,monthly', // Pastikan type sesuai enum
            'leaflets_reward' => 'nullable|integer',
        ]);

        // Menyimpan data ke dalam database
        Task::create($validated);

        // Mengalihkan kembali dengan pesan sukses
        return redirect()->route('tasks.store')->with('success', 'Task successfully added!');
    }

}
