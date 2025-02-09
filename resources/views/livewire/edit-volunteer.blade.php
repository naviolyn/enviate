<div class="w-full h-full p-4">
    <div class="bg-white p-8 rounded-xl border border-gray-200">
        @if (session()->has('message'))
            <div class="bg-darkGreen text-white p-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="update">
            <!-- Volunteer Name -->
            <div class="mb-4">
                <p class="text-lg font-semibold pb-4">
                    Edit Volunteer
                </p>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-900">Volunteer Name</label>
                <input type="text" wire:model="name" id="name" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Crystal Reward -->
            <div class="mb-4">
                <label for="crystal_reward" class="block text-sm font-medium text-gray-900">Crystal Reward</label>
                <input type="number" wire:model="crystal_reward" id="crystal_reward" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen">
                @error('crystal_reward') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Leaflets Reward -->
            <div class="mb-4">
                <label for="leaflets_reward" class="block text-sm font-medium text-gray-900">Leaflets Reward</label>
                <input type="number" wire:model="leaflets_reward" id="leaflets_reward" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen">
                @error('leaflets_reward') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-900">Category</label>
                <select wire:model="category" id="category" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen">
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
                <input type="date" wire:model="start_date" id="start_date" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen">
                @error('start_date') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- End Date -->
            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-900">End Date</label>
                <input type="date" wire:model="end_date" id="end_date" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen">
                @error('end_date') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
                <textarea wire:model="description" id="description" rows="4" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-900">Email Template</label>
                <input type="text" wire:model="email" id="email" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen">
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center space-x-4">
                <button type="submit" class="bg-darkGreen text-white px-5 py-2 rounded-lg">Simpan</button>
                <a href="{{ route('mitra-volunteer') }}" class="bg-orange text-white px-5 py-2 rounded-lg">Batal</a>
            </div>
        </form>
    </div>
</div>
