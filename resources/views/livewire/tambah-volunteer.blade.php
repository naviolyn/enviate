<section class="bg-white">
    <div class="max-w-2xl px-4 py-2 lg:py-2">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Tambahkan Volunteer</h2>
        <form wire:submit.prevent="save">
            <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Volunteer Name</label>
                    <input type="text" wire:model="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type volunteer name" required>
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- upload image --}}
                <div class="relative w-full h-52 border-2 border-gray-300 border-dashed rounded-lg flex items-center justify-center bg-gray-50 cursor-pointer">
                    <input type="file" wire:model="image" id="imageUpload" accept="image/*" class="absolute w-full h-full opacity-0 cursor-pointer">
                    @error('image')  
                    <span class="text-red-500 text-sm">{{ $message }}</span>  
                    @enderror  
                    <img id="previewImage" src="https://placehold.co/400x300" alt="Upload Preview" class="w-full h-52 object-cover rounded-lg hidden">
                    <div id="uploadText" class="absolute text-gray-600 font-semibold text-lg">Upload Gambar</div>
                    @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview Image" class="w-full h-52 object-cover rounded-lg">
                    @endif
                </div>

                <div class="w-full">
                    <label for="crystal_reward" class="block mb-2 text-sm font-medium text-gray-900">Crystal Reward</label>
                    <input type="number" wire:model="crystal_reward" id="crystal_reward" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="2999" required>
                    @error('crystal_reward') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full">
                    <label for="leaflets_reward" class="block mb-2 text-sm font-medium text-gray-900">Leaflets Reward</label>
                    <input type="number" wire:model="leaflets_reward" id="leaflets_reward" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="2999" required>
                    @error('leaflets_reward') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="w-full">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                    <select id="category" wire:model="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option value="Pelestarian Alam">Pelestarian Alam</option>
                        <option value="Edukasi & Kampanye Lingkungan">Edukasi & Kampanye Lingkungan</option>
                        <option value="Pembersihan & Pengelolaan Sampah">Pembersihan & Pengelolaan Sampah</option>
                        <option value="Advokasi Kebijakan Lingkungan">Advokasi Kebijakan Lingkungan</option>
                        <option value="Pemantauan dan Penelitian Lingkungan">Pemantauan dan Penelitian Lingkungan</option>
                    </select>
                    @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-3 sm:col-span-2">
                    <label for="start-date-picker" class="block mb-2 text-sm font-medium text-gray-900">Start Date</label>
                    <input wire:model="start_date" id="start-date-picker" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Select start date" required>
                    @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-3 sm:col-span-2">
                    <label for="end-date-picker" class="block mb-2 text-sm font-medium text-gray-900">End Date</label>
                    <input wire:model="end_date" id="end-date-picker" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Select end date" required>
                    @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea wire:model="description" id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Write a product description here..."></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit" class="bg-darkGreen text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Simpan
                </button>
                <button type="button" class="text-white inline-flex items-center bg-orange font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Delete
                </button>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </form>
        <script>
            document.getElementById('imageUpload').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewImage = document.getElementById('previewImage');
                        previewImage.src = e.target.result;
                        previewImage.classList.remove('hidden');
                        document.getElementById('uploadText').classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Date picker initialization
            const startDatepicker = flatpickr("#start-date-picker", {
                dateFormat: "Y-m-d",
            });

            const endDatepicker = flatpickr("#end-date-picker", {
                dateFormat: "Y-m-d",
                minDate: "today",
            });
        </script>
    </div>
</section>
