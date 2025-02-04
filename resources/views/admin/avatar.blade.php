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
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Tasks Table</h6>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-center">IssD</th>
                                <th class="px-6 py-3 text-left">Task Name</th>
                                <th class="px-6 py-3 text-left">Description</th>
                                <th class="px-6 py-3 text-left">Type</th>
                                <th class="px-6 py-3 text-left">Leaflets Reward</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-3 text-center"></td>
                                <td class="px-6 py-3"></td>
                                <td class="px-6 py-3"></td>
                                <td class="px-6 py-3">{}</td>
                                <td class="px-6 py-3"></td>
                            </tr>
                        </tbody>
                    </table>
                        <div class="mt-4 text-green-500">
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Button -->
<button onclick="openModal()" class="btn btn-primary mb-4">Add Task</button>

<!-- Modal -->
<div id="taskModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-96">
        <h6>Add New Task</h6>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="name" class="block">Task Name</label>
                <input type="text" name="name" id="name" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block">Description</label>
                <textarea name="description" id="description" class="form-input w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="type" class="block">Type</label>
                <select name="type" id="type" class="form-input w-full" required>
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="leaflets_reward" class="block">Leaflets Reward</label>
                <input type="number" name="leaflets_reward" id="leaflets_reward" class="form-input w-full">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="btn btn-primary">Add Task</button>
                <button type="button" onclick="closeModal()" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Fungsi untuk membuka modal
    function openModal() {
        document.getElementById('taskModal').classList.remove('hidden');
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        document.getElementById('taskModal').classList.add('hidden');
    }
</script>

@endsection