@extends('admin.app-admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-xl p-6">
        <div class="pb-4 border-b border-gray-200 flex justify-between items-center">
            <h6 class="text-lg font-semibold text-gray-700">Styles for <b>{{ $avatars->name }}</b></h6>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">ID</th>
                        <th scope="col" class="px-6 py-3 text-center">Name</th>
                        <th scope="col" class="px-6 py-3 text-center">Leaflet Cost</th>
                        <th scope="col" class="px-6 py-3 text-center">Image</th>
                        <th scope="col" class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($styles as $style)
                    <tr class="border-b">
                        <td class="px-6 py-3 text-center">{{ $style->id }}</td>
                        <td class="px-6 py-3 text-center">{{ $style->name }}</td>
                        <td class="px-6 py-3 text-center">{{ $style->leaflet_cost }}</td>
                        <td class="px-6 py-3 text-center">
                            <img src="{{ asset('storage/' . $style->path) }}" class="w-16 h-16 rounded-md mx-auto">
                        </td>
                        <td class="px-6 py-3 text-center">
                            <button onclick="openEditStyleModal({{ $style->id }}, '{{ $style->name }}', '{{ $style->leaflet_cost }}', '{{ asset('storage/' . $style->path) }}')"
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

<!-- Modal Edit Style -->
<div id="editStyleModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-96">
        <h6 class="text-lg font-semibold mb-4">Edit Style</h6>
        <form id="editStyleForm" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
            
            <input type="hidden" name="id" id="edit_style_id">

            <div class="mb-4">
                <label for="edit_style_name" class="block text-gray-700">Style Name</label>
                <input type="text" name="name" id="edit_style_name" class="w-full p-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="edit_leaflet_cost" class="block text-gray-700">Leaflet Cost</label>
                <input type="number" name="leaflet_cost" id="edit_leaflet_cost" class="w-full p-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="edit_style_image" class="block text-gray-700">Upload New Image</label>
                <input type="file" name="image" id="edit_style_image" class="w-full p-2 border rounded-md">
                <img id="preview_style_image" src="" alt="Current Style" class="w-16 h-16 rounded-md mt-2">
            </div>
            <div class="mt-6 flex justify-between">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">Update</button>
                <button type="button" onclick="closeEditStyleModal()" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditStyleModal(id, name, leafletCost, imageUrl) {
        document.getElementById('edit_style_id').value = id;
        document.getElementById('edit_style_name').value = name;
        document.getElementById('edit_leaflet_cost').value = leafletCost;
        document.getElementById('preview_style_image').src = imageUrl;

        document.getElementById('editStyleForm').action = "/style/" + id;
        document.getElementById('editStyleModal').classList.remove('hidden');
    }

    function closeEditStyleModal() {
        document.getElementById('editStyleModal').classList.add('hidden');
    }
</script>
@endsection
