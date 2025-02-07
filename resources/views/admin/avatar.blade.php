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
                <h6 class="text-lg font-semibold text-gray-700">Avatar List</h6>
                <!-- Modal Button -->
<button onclick="openModal()" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">+ Add Avatar</button>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-center">ID</th>
                                <th class="px-6 py-3 text-center">Name</th>
                                <th class="px-6 py-3 text-center">Leaflet Reward</th>
                                <th class="px-6 py-3 text-center">Image</th>
                                <th class="px-6 py-3 text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($avatar as $avatar)
                            <tr>
                                <td class="px-6 py-3 text-center">{{ $avatar->id }}</td>
                                <td class="px-6 py-3 text-center">{{ $avatar->name }}</td>
                                <td class="px-6 py-3 text-center">{{ $avatar->leaflet_reward }}</td>
                                <td class="px-6 py-3 text-center">
                                    <img src="{{ asset('storage/' . $avatar->image) }}" alt="Avatar Image" class="w-16 h-16 rounded-md mx-auto">
                                </td>
                                <td class="px-6 py-3 text-center">
            <button onclick="openEditModal({{ $avatar->id }}, '{{ $avatar->name }}', '{{ $avatar->leaflet_reward }}', '{{ asset('storage/' . $avatar->image) }}')" 
                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300">
                Edit
            </button>
        </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="avatarModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-96">
        <h6>Add New Avatar</h6>
        <form action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block">Avatar Name</label>
                <input type="text" name="name" id="name" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="leaflet_reward" class="block">Leaflet Reward</label>
                <input type="number" name="leaflet_reward" id="leaflet_reward" class="form-input w-full">
            </div>
            <div class="mb-4">
                <label for="image" class="block">Upload Image</label>
                <input type="file" name="image" id="image" class="form-input w-full">
            </div>
            <div class="mt-6 flex justify-between">
                <button type="submit" class="!bg-green-600 hover:!bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">Add Avatar</button>
                <button type="button" onclick="closeModal()" class="!bg-gray-400 hover:!bg-gray-500 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editAvatarModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-96">
        <h6>Edit Avatar</h6>
        <form id="editAvatarForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="edit_id">

            <div class="mb-4">
                <label for="edit_name" class="block">Avatar Name</label>
                <input type="text" name="name" id="edit_name" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="edit_leaflet_reward" class="block">Leaflet Reward</label>
                <input type="number" name="leaflet_reward" id="edit_leaflet_reward" class="form-input w-full">
            </div>
            <div class="mb-4">
                <label for="edit_image" class="block">Upload Image</label>
                <input type="file" name="image" id="edit_image" class="form-input w-full">
                <img id="preview_image" src="" alt="Current Avatar" class="w-16 h-16 rounded-md mt-2">
            </div>
            <div class="mt-6 flex justify-between">
                <button type="submit" class="!bg-green-600 hover:!bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">Update Avatar</button>
                <button type="button" onclick="closeEditModal()" class="!bg-gray-400 hover:!bg-gray-500 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Cancel</button>
            </div>
        </form>
    </div>
</div>


<script>
    function openModal() {
        document.getElementById('avatarModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('avatarModal').classList.add('hidden');
    }

    function openEditModal(id, name, leaflet_reward, imageUrl) {
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_leaflet_reward').value = leaflet_reward;
        document.getElementById('preview_image').src = imageUrl;

        // Update action URL sesuai avatar yang diedit
        document.getElementById('editAvatarForm').action = "/avatar/" + id;

        document.getElementById('editAvatarModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editAvatarModal').classList.add('hidden');
    }
</script>

@endsection
