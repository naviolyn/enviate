<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update">
        <!-- Volunteer Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-900">Volunteer Name</label>
            <input type="text" wire:model="name" id="name" class="w-full p-2 border rounded">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Crystal Reward -->
        <div class="mb-4">
            <label for="crystal_reward" class="block text-sm font-medium text-gray-900">Crystal Reward</label>
            <input type="number" wire:model="crystal_reward" id="crystal_reward" class="w-full p-2 border rounded">
            @error('crystal_reward') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Leaflets Reward -->
        <div class="mb-4">
            <label for="leaflets_reward" class="block text-sm font-medium text-gray-900">Leaflets Reward</label>
            <input type="number" wire:model="leaflets_reward" id="leaflets_reward" class="w-full p-2 border rounded">
            @error('leaflets_reward') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Category -->
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-900">Category</label>
            <select wire:model="category" id="category" class="w-full p-2 border rounded">
                <option value="Pelestarian Alam">Pelestarian Alam</option>
                <option value="Edukasi & Kampanye Lingkungan">Edukasi & Kampanye Lingkungan</option>
                <option value="Pembersihan & Pengelolaan Sampah">Pembersihan & Pengelolaan Sampah</option>
                <option value="Advokasi Kebijakan Lingkungan">Advokasi Kebijakan Lingkungan</option>
                <option value="Pemantauan dan Penelitian Lingkungan">Pemantauan dan Penelitian Lingkungan</option>
            </select>
            @error('category') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Start Date -->
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-900">Start Date</label>
            <input type="date" wire:model="start_date" id="start_date" class="w-full p-2 border rounded">
            @error('start_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- End Date -->
        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-900">End Date</label>
            <input type="date" wire:model="end_date" id="end_date" class="w-full p-2 border rounded">
            @error('end_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
            <textarea wire:model="description" id="description" rows="4" class="w-full p-2 border rounded"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
            <input type="email" wire:model="email" id="email" class="w-full p-2 border rounded">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-darkGreen text-white px-5 py-2 rounded">Simpan</button>
            <a href="{{ route('mitra-volunteer') }}" class="bg-gray-500 text-white px-5 py-2 rounded">Batal</a>
        </div>
    </form>
</div>