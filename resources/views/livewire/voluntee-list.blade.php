<div>
    <!-- Konten Utama -->
    <div class="h-full">
        <div class="flex font-medium w-full h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
            <div class="flex items-center justify-center h-full text-gray-600 w-full">
                <div class="max-w-full w-full h-full pe-0">
                    <div class="flex justify-between mb-6 text-darkGreen align-middle">
                        <div class="flex items-center mb-6 text-darkGreen">
                            <i class="fa-solid fa-puzzle-piece w-6 text-2xl"></i>
                            <h4 class="font-semibold ml-3 text-lg">Voluntee List for {{ $volunteerName }}</h4>
                        </div>
                    </div>
                    
                    <div class="overflow-y-auto">
                        <div class="max-w-screen-2xl w-full">
                            <div class="relative overflow-hidden bg-bodybg sm:rounded-lg">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead class="text-xs text-gray-700 uppercase">
                                            <tr>
                                                <th scope="col" class="px-4 py-3">Nama</th>
                                                <th scope="col" class="px-4 py-3">Email</th>
                                                <th scope="col" class="px-4 py-3">No.Hp</th>
                                                <th scope="col" class="px-4 py-3">Alasan</th>
                                                <th scope="col" class="px-4 py-3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($registrations->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="text-center">Tidak ada pendaftar.</td>
                                                </tr>
                                            @else
                                                @foreach($registrations as $registration)
                                                    <tr class="border-b hover:bg-darkGreen/20">
                                                        <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                            {{ $registration->name }}
                                                        </th>
                                                        <td class="px-4 py-2">
                                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded">
                                                                {{ $registration->email }}
                                                            </span>
                                                        </td>
                                                        <td class="px-4 py-2">
                                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded">
                                                                {{ $registration->phone }}
                                                            </span>
                                                        </td>
                                                        <td class="px-4 py-2">
                                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded">
                                                                {{ $registration->reason }}
                                                            </span>
                                                        </td>
                                                        </td>
                                                        <td class="px-4 py-2">
                                                            <button wire:click="completeReward({{ $registration->id }})" type="button" class="bg-darkGreen text-white font-medium py-1 rounded-lg transition-colors px-3 mr-2">
                                                                Selesai
                                                            </button>
                                                            <button wire:click="confirmDelete({{ $registration->id }})" type="button" class="bg-red-600 text-white font-medium py-1 rounded-lg transition-colors px-3">
                                                                Hapus
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @if (session()->has('message'))
                        <div class="mt-4 p-4 bg-green-500 text-white rounded">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    @if($confirmDeleteId)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Konfirmasi Penghapusan</h3>
                <p class="mb-6">Apakah Anda yakin ingin menghapus pendaftar ini?</p>
                <div class="flex justify-end space-x-4">
                    <button wire:click="deleteRegistration" type="button" class="bg-darkGreen text-white px-4 py-2 rounded">
                        Ya, Hapus
                    </button>
                    <button wire:click="$set('confirmDeleteId', null)" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Modal (jika diperlukan, ini modal tambahan) -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative px-4 my-16 py-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Terms of Service
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500">
                        dapat sekian yakin betul bla bla bla
                    </p>
                    <p class="text-base leading-relaxed text-gray-500">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="default-modal" type="button" class="bg-darkGreen text-white font-medium py-2 rounded-lg transition-colors px-3 mr-2">I accept</button>
                    <button data-modal-hide="default-modal" type="button" class="bg-orange text-white font-medium py-2 rounded-lg transition-colors px-3">Decline</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script (juga dalam root) -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tambahkan logika JavaScript jika diperlukan untuk modal
        });
    </script>
</div>