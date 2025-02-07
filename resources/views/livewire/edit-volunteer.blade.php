<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<!-- Form Edit Volunteer -->
<form action="{{ route('mitra-volunteer.update', $volunteer->volunteer_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- This specifies that it's a PUT request -->
    <!-- Form fields -->
    
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-900">Volunteer Name</label>
        <input type="text" name="name" id="name" class="w-full p-2 border rounded" value="{{ old('name', $volunteer->name) }}" required>
    </div>
    
    <div class="mb-4">
        <label for="crystal_reward" class="block text-sm font-medium text-gray-900">Crystal Reward</label>
        <input type="number" name="crystal_reward" id="crystal_reward" class="w-full p-2 border rounded" value="{{ old('crystal_reward', $volunteer->crystal_reward) }}" required>
    </div>
    
    <div class="mb-4">
        <label for="leaflets_reward" class="block text-sm font-medium text-gray-900">Leaflets Reward</label>
        <input type="number" name="leaflets_reward" id="leaflets_reward" class="w-full p-2 border rounded" value="{{ old('leaflets_reward', $volunteer->leaflets_reward) }}" required>
    </div>

    <div class="mb-4">
        <label for="category" class="block text-sm font-medium text-gray-900">Category</label>
        <select name="category" id="category" class="w-full p-2 border rounded" required>
            <option value="Pelestarian Alam" {{ $volunteer->category == 'Pelestarian Alam' ? 'selected' : '' }}>Pelestarian Alam</option>
            <option value="Edukasi & Kampanye Lingkungan" {{ $volunteer->category == 'Edukasi & Kampanye Lingkungan' ? 'selected' : '' }}>Edukasi & Kampanye Lingkungan</option>
            <option value="Pembersihan & Pengelolaan Sampah" {{ $volunteer->category == 'Pembersihan & Pengelolaan Sampah' ? 'selected' : '' }}>Pembersihan & Pengelolaan Sampah</option>
            <option value="Advokasi Kebijakan Lingkungan" {{ $volunteer->category == 'Advokasi Kebijakan Lingkungan' ? 'selected' : '' }}>Advokasi Kebijakan Lingkungan</option>
            <option value="Pemantauan dan Penelitian Lingkungan" {{ $volunteer->category == 'Pemantauan dan Penelitian Lingkungan' ? 'selected' : '' }}>Pemantauan dan Penelitian Lingkungan</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="start_date" class="block text-sm font-medium text-gray-900">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="w-full p-2 border rounded" value="{{ old('start_date', $volunteer->start_date) }}" required>
    </div>

    <div class="mb-4">
        <label for="end_date" class="block text-sm font-medium text-gray-900">End Date</label>
        <input type="date" name="end_date" id="end_date" class="w-full p-2 border rounded" value="{{ old('end_date', $volunteer->end_date) }}" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
        <textarea name="description" id="description" rows="4" class="w-full p-2 border rounded" required>{{ old('description', $volunteer->description) }}</textarea>
    </div>

    <div class="flex items-center space-x-4">
        <button type="submit" class="bg-darkGreen text-white px-5 py-2 rounded">Simpan</button>
        <a href="{{ route('mitra-volunteer') }}" class="bg-gray-500 text-white px-5 py-2 rounded">Batal</a>
    </div>
</form>
