<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\UserTask; // Pastikan model UserTask tersedia
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // *** ADMIN METHODS ***
    public function index()
    {
        // Cek akses admin
        $this->authorize('admin'); // Pastikan Anda sudah mengatur policy/authorization untuk admin
        
        // Ambil semua task untuk admin
        $tasks = Task::all();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $this->authorize('admin');
        return view('admin.tasks.create');
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'type' => 'required|in:daily,weekly,monthly',
            'leaflets_reward' => 'required|integer',
            'level' => 'required|integer', // Tambahkan jika ada level
        ]);

        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $this->authorize('admin');
        return view('admin.tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('admin');
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'type' => 'required|in:daily,weekly,monthly',
            'leaflets_reward' => 'required|integer',
            'level' => 'required|integer',
        ]);

        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('admin');
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    // *** USER METHODS ***
    public function todayTasks()
    {
        $user = auth()->user(); // Ambil user yang sedang login

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must log in first.');
        }

        // Ambil tasks untuk hari ini
        $tasks = Task::where('level', $user->level) // Filter berdasarkan level user
            ->whereDate('created_at', today()) // Filter tugas yang dibuat hari ini
            ->with(['userTasks' => function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }])
            ->get();

        return view('livewire.today-task', compact('tasks')); // Kirim data ke view 'today-tasks'
    }

    public function completeTask(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if ($task->status !== 'completed') {
            // Update task status
            $task->status = 'completed';
            $task->save();

            // Update user's reward
            $user = auth()->user();
            $user->leaflets += $request->reward;
            $user->save();

            return response()->json([
                'success' => true,
                'task' => $task,
            ]);
        }

        return response()->json(['success' => false]);
    }
}
