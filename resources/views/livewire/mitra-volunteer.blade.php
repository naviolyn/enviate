<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div class="h-full">
    <div class="flex font-medium w-full h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
        <div class="flex items-center justify-center h-full text-gray-600 w-full">
            <div class="max-w-full w-full h-full pe-0">
                <div class="flex justify-between mb-6 text-darkGreen align-middle">
                    <div class="flex items-center mb-6 text-darkGreen">
                        <i class="fa-solid fa-puzzle-piece w-6 text-2xl"></i>   
                        <h4 class="font-semibold ml-3 text-lg"><a href="{{ route('mitra-volunteer') }}">Daftar Volunteer</a></h4>
                    </div>
                    <div class="flex gap-2">
                        <div x-data="{ openModal: false }">
                            <button @click="openModal = true" class="text-white bg-darkGreen font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center h-fit">
                                Tambah Volunteer
                            </button>
                            <div x-show="openModal" class="overflow-hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0">
                                <div class="bg-white rounded-lg shadow-lg max-w-2xl w-full p-6 relative max-h-[95vh] overflow-scroll">
                                    <button @click="openModal = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">✕</button>
                                    <h2 class="mb-4 text-xl font-bold text-gray-900">Tambahkan Volunteer</h2>
                                    <form action="{{ route('mitra-volunteer.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                                            <div class="sm:col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Volunteer Name</label>
                                                <input type="text" name="name" id="name" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" required>
                                                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Upload Image</label>
                                                <input type="file" name="image" id="image" accept="image/*" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen">
                                                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="crystal_reward" class="block mb-2 text-sm font-medium text-gray-900">Crystal Reward</label>
                                                <input type="number" name="crystal_reward" id="crystal_reward" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" required>
                                                @error('crystal_reward') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="leaflets_reward" class="block mb-2 text-sm font-medium text-gray-900">Leaflets Reward</label>
                                                <input type="number" name="leaflets_reward" id="leaflets_reward" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" required>
                                                @error('leaflets_reward') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                                <select name="category" id="category" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen">
                                                    <option value="Pelestarian Alam">Pelestarian Alam</option>
                                                    <option value="Edukasi & Kampanye Lingkungan">Edukasi & Kampanye Lingkungan</option>
                                                    <option value="Pembersihan & Pengelolaan Sampah">Pembersihan & Pengelolaan Sampah</option>
                                                    <option value="Advokasi Kebijakan Lingkungan">Advokasi Kebijakan Lingkungan</option>
                                                    <option value="Pemantauan dan Penelitian Lingkungan">Pemantauan dan Penelitian Lingkungan</option>
                                                </select>
                                                @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">Start Date</label>
                                                <input type="date" name="start_date" id="start_date" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" required>
                                                @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900">End Date</label>
                                                <input type="date" name="end_date" id="end_date" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" required>
                                                @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                                <textarea name="description" id="description" rows="4" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" required></textarea>
                                                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            </div>
                                        
                                        <div class="sm:col-span-2">
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Pesan Email</label>
                                            <textarea name="email" id="email" rows="4" class="mt-1 bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" required></textarea>
                                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                        <div class="flex items-center space-x-4">
                                            <button type="submit" class="bg-darkGreen text-white px-5 py-2 rounded-lg">Simpan</button>
                                            <button type="button" @click="openModal = false" class="bg-orange text-white px-5 py-2 rounded-lg">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="overflow-y-auto">
                    <div>
                        <div class="max-w-screen-2xl w-full">
                            <div class="relative overflow-hidden bg-bodybg sm:rounded-lg">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead class="text-xs text-gray-700 uppercase">
                                            <tr>
                                                <th scope="col" class="px-4 py-3">Nama</th>
                                                <th scope="col" class="px-4 py-3">Tanggal</th>
                                                <th scope="col" class="px-4 py-3">Deskripsi</th>
                                                <th scope="col" class="px-4 py-3">Kategori</th>
                                                <th scope="col" class="px-4 py-3">Jumlah Pendaftar</th>
                                                <th scope="col" class="px-4 py-3">List</th>
                                                <th scope="col" class="px-4 py-3">Detail</th>
                                                <th scope="col" class="px-4 py-3">Edit</th>
                                                <th scope="col" class="px-4 py-3">Hapus</th>
                                            </tr>
                                        </thead>
                                        @if(isset($volunteers) && $volunteers->count() > 0)
                                            <tbody>
                                                @foreach($volunteers as $volunteer)
                                                    <tr class="border-b hover:bg-darkGreen/20 text-xs">
                                                        <th scope="row" class="bg-primary-100 text-gray-900 text-xs font-medium px-2 py-0.5 rounded">
                                                            {{ $volunteer->name }}
                                                        </th>
                                                        <td class="px-4 py-3">
                                                            <span class="bg-primary-100 text-gray-900 text-xs font-medium px-2 py-0.5 rounded">
                                                                {{ \Carbon\Carbon::parse($volunteer->start_date)->format('d M Y') }} - 
                                                                {{ \Carbon\Carbon::parse($volunteer->end_date)->format('d M Y') }}
                                                            </span>
                                                        </td>
                                                        <td scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                            {{ strlen($volunteer->description) > 15 ? substr($volunteer->description, 0, 15) . '...' : $volunteer->description }}
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded">
                                                                {{ $volunteer->category }}
                                                            </span>
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            @php
                                                                $registrationsCount = $volunteer->registrations()->count();
                                                            @endphp
                                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded">
                                                                {{ $registrationsCount }} {{-- Menampilkan jumlah pendaftar --}}
                                                            </span>
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            <a href="{{ route('mitra-volunteer.user', $volunteer->volunteer_id) }}" class="bg-orange text-white font-medium py-1 rounded-lg transition-colors px-3 inline-block text-center">
                                                                List
                                                            </a>
                                                        </td>

                                                        <!-- Bagian dari mitra-volunteer.blade.php -->
                                                        <td class="px-4 py-3">
                                                            <a href="{{ route('mitra-volunteer.detail', $volunteer->volunteer_id) }}">
                                                                <i class="fa-solid fa-eye cursor-pointer"></i> Detail
                                                            </a>  
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            <a href="{{ route('mitra-volunteer.edit', $volunteer->volunteer_id) }}" 
                                                               class="bg-orange-500 hover:bg-orange-600 text-dark font-medium py-1 px-3 rounded-lg transition-colors">
                                                                Edit
                                                            </a>
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            <form action="{{ route('mitra-volunteer.destroy', $volunteer->volunteer_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus volunteer ini?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="bg-orange text-white font-medium py-1 rounded-lg transition-colors px-3">
                                                                   Hapus
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        @else
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" class="text-center text-gray-500 py-4">Tidak ada data volunteer.</td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
