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
        $validated = $request->validate([ 
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:daily,weekly,monthly',
            'leaflets_reward' => 'nullable|integer',
        ]);

       // Set default status ke '1' saat task dibuat
        $validated['status'] = '1';

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task successfully added!');
    }

    public function toggleStatus($taskId)
    {
        // Temukan task berdasarkan ID
        $task = Task::findOrFail($taskId);

        // Toggle status task ('1' -> '0', '0' -> '1')
        $task->status = $task->status === '1' ? '0' : '1';
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully.');
    }

}
