<!--
=========================================================
* Soft UI Dashboard Tailwind - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

@extends('admin.app-admin')

@section('content')
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-lg rounded-xl p-6">
            <div class="pb-4 border-b border-gray-200 flex justify-between items-center">
                <h6 class="text-lg font-semibold text-gray-700">Tasks List</h6>
                <button onclick="openModal()" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                    + Add Task
                </button>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 text-center">ID</th>
                            <th class="px-6 py-3 text-center">Task Name</th>
                            <th class="px-6 py-3 text-center">Description</th>
                            <th class="px-6 py-3 text-center">Type</th>
                            <th class="px-6 py-3 text-center">Leaflets Reward</th>
                            <th class="px-6 py-3 text-center">Status</th>
                            <th class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 text-center">{{ $task->task_id }}</td>
                            <td class="px-6 py-3 text-center">{{ $task->name }}</td>
                            <td class="px-6 py-3 text-center">{{ $task->description }}</td>
                            <td class="px-6 py-3 text-center">{{ $task->type }}</td>
                            <td class="px-6 py-3 text-center">{{ $task->leaflets_reward ?? '-' }}</td>
                            <td class="px-6 py-3 text-center">
                                    <span class="px-3 py-1 text-white rounded-lg {{ $task->status == '1' ? 'bg-green-500' : 'bg-red-500' }}">
                                        {{ $task->status == '1' ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-3 text-center">
                                <form action="{{ route('tasks.toggleStatus', $task->task_id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="">
                                        {{ $task->status == '1' ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>

                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if(session('success'))
                <div class="mt-4 p-3 bg-green-500 text-white rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal -->
<div id="taskModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg relative">
        <h6 class="text-lg font-semibold text-gray-700">Add New Task</h6>
        <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mt-4">
                <label for="name" class="block text-gray-700">Task Name</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
            </div>
            <div class="mt-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300" required></textarea>
            </div>
            <div class="mt-4">
                <label for="type" class="block text-gray-700">Type</label>
                <select name="type" id="type" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>
            <div class="mt-4">
                <label for="leaflets_reward" class="block text-gray-700">Leaflets Reward</label>
                <input type="number" name="leaflets_reward" id="leaflets_reward" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>
            <div class="mt-6 flex justify-between">
                <button type="submit" class="!bg-green-600 hover:!bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">Add Task</button>
                <button type="button" onclick="closeModal()" class="!bg-gray-400 hover:!bg-gray-500 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Function to open the modal
    function openModal() {
        document.getElementById('taskModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('taskModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Hide the notification after a delay
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500); // Remove element after fading out
        }
    }, 30); // Change 3000 to the delay time in milliseconds
</script>

@endsection
