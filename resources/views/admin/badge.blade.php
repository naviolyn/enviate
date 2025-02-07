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
                <h6 class="text-lg font-semibold text-gray-700">Badge List</h6>
                <!-- Modal Button -->
<button onclick="openModal()" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">+ Add Badge</button>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-center">ID</th>
                                <th class="px-6 py-3 text-center">Name</th>
                                <th class="px-6 py-3 text-center">Description</th>
                                <th class="px-6 py-3 text-center">Image</th>
                                <th class="px-6 py-3 text-center">Required Level</th>
                                <th class="px-6 py-3 text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($badge as $badge)
                            <tr>
                                <td class="px-6 py-3 text-center">{{ $badge->badge_id }}</td>
                                <td class="px-6 py-3 text-center">{{ $badge->name }}</td>
                                <td class="px-6 py-3 text-center">{{ $badge->description }}</td>
                                <td class="px-6 py-3 text-center">
                                    <img src="{{ asset('storage/' . $badge->image_path) }}" alt="Badge Image" class="w-16 h-16 rounded-md mx-auto">
                                </td>
                                <td class="px-6 py-3 text-center">{{ $badge->required_level }}</td>
                                <td class="px-6 py-3 text-center">
                                <button onclick="openEditModal('{{ $badge->badge_id }}', '{{ $badge->name }}', '{{ $badge->description }}', '{{ asset('storage/' . $badge->image_path) }}', '{{ $badge->required_level }}')"
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
<div id="badgeModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-96">
        <h6>Add New Badge</h6>
        <form action="{{ route('badge.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block">Badge Name</label>
                <input type="text" name="name" id="name" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block">Description</label>
                <input type="text" name="description" id="description" class="form-input w-full">
            </div>
            <div class="mb-4">
                <label for="image" class="block">Upload Image</label>
                <input type="file" name="image" id="image" class="form-input w-full">
            </div>
            <div class="mb-4">
                <label for="required_level" class="block">Required Level</label>
                <input type="number" name="required_level" id="required_level" class="form-input w-full">
            </div>
            <div class="mt-6 flex justify-between">
                <button type="submit" class="!bg-green-600 hover:!bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">Add Badge</button>
                <button type="button" onclick="closeModal()" class="!bg-gray-400 hover:!bg-gray-500 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editBadgeModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-96">
        <h6>Edit Badge</h6>
        <form id="editBadgeForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="edit_id">

            <div class="mb-4">
                <label for="edit_name" class="block">Badge Name</label>
                <input type="text" name="name" id="edit_name" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="edit_description" class="block">Description</label>
                <input type="text" name="description" id="edit_description" class="form-input w-full">
            </div>
            <div class="mb-4">
                <label for="edit_image" class="block">Upload Image</label>
                <input type="file" name="image" id="edit_image" class="form-input w-full" onchange="previewSelectedImage(event)">
                <img id="edit_preview_image" src="" alt="Preview Image" class="w-24 h-24 rounded-md mt-2">
            </div>
            <div class="mb-4">
                <label for="edit_required_level" class="block">Required Level</label>
                <input type="number" name="required_level" id="edit_required_level" class="form-input w-full">
            </div>
            <div class="mt-6 flex justify-between">
                <button type="submit" class="!bg-green-600 hover:!bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">Update Badge</button>
                <button type="button" onclick="closeEditModal()" class="!bg-gray-400 hover:!bg-gray-500 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Cancel</button>
            </div>
        </form>
    </div>
</div>


<script>
    function openModal() {
        document.getElementById('badgeModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('badgeModal').classList.add('hidden');
    }

    function openEditModal(id, name, description, imageUrl, required_level) {
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_description').value = description;

        // Pastikan gambar lama tetap terlihat sebelum diubah
        document.getElementById('edit_preview_image').src = imageUrl;

        document.getElementById('edit_required_level').value = required_level;

        document.getElementById('editBadgeForm').action = "/badge/" + id;

        document.getElementById('editBadgeModal').classList.remove('hidden');
    }

    let previewImage = document.getElementById('preview_image');
if (previewImage) {
    previewImage.src = imageUrl;
}

    function closeEditModal() {
        document.getElementById('editBadgeModal').classList.add('hidden');
    }

    function previewSelectedImage(event) {
    let image = document.getElementById('edit_preview_image');
    let file = event.target.files[0];

    if (file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            image.src = e.target.result; // Set preview ke gambar yang baru dipilih
        };
        reader.readAsDataURL(file);
    }
}
</script>

@endsection
