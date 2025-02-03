<section class="bg-white">
    <div class="max-w-2xl px-4 py-2 lg:py-2">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Tambahkan Volunteer</h2>
        
        <form wire:submit.prevent="save">
            <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Volunteer Name</label>
                    <input type="text" wire:model.defer="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type volunteer name" required>
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Upload Image --}}
                <div class="relative w-full h-52 border-2 border-gray-300 border-dashed rounded-lg flex items-center justify-center bg-gray-50 cursor-pointer">
                    <input type="file" wire:model="image" id="imageUpload" accept="image/*" class="absolute w-full h-full opacity-0 cursor-pointer">
                    @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror  
                    <img id="previewImage" src="https://placehold.co/400x300" alt="Upload Preview" class="w-full h-52 object-cover rounded-lg hidden">
                    <div id="uploadText" class="absolute text-gray-600 font-semibold text-lg">Upload Gambar</div>
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="Preview Image" class="w-full h-52 object-cover rounded-lg">
                    @endif
                </div>

                <div class="w-full">
                    <label for="crystal_reward" class="block mb-2 text-sm font-medium text-gray-900">Crystal Reward</label>
                    <input type="number" wire:model.defer="crystal_reward" id="crystal_reward" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="2999" required>
                    @error('crystal_reward') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full">
                    <label for="leaflets_reward" class="block mb-2 text-sm font-medium text-gray-900">Leaflets Reward</label>
                    <input type="number" wire:model.defer="leaflets_reward" id="leaflets_reward" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="2999" required>
                    @error('leaflets_reward') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                    <select id="category" wire:model.defer="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option value="">Pilih Kategori</option>
                        <option value="Pelestarian Alam">Pelestarian Alam</option>
                        <option value="Edukasi & Kampanye Lingkungan">Edukasi & Kampanye Lingkungan</option>
                        <option value="Pembersihan & Pengelolaan Sampah">Pembersihan & Pengelolaan Sampah</option>
                        <option value="Advokasi Kebijakan Lingkungan">Advokasi Kebijakan Lingkungan</option>
                        <option value="Pemantauan dan Penelitian Lingkungan">Pemantauan dan Penelitian Lingkungan</option>
                    </select>
                    @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-3 sm:col-span-2">
                    <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">Start Date</label>
                    <input type="date" wire:model.defer="start_date" id="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-3 sm:col-span-2">
                    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900">End Date</label>
                    <input type="date" wire:model.defer="end_date" id="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea wire:model.defer="description" id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Write a product description here..."></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit" class="bg-darkGreen text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Simpan
                </button>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </form>
    </div>
</section>
