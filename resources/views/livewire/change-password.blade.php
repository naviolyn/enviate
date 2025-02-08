<div class="bg-bodybg h-full w-full overflow-hidden">
    <div class="w-full font-medium h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
        <div class="flex items-center justify-center h-full w-full bg-white border rounded-2xl">
            @livewire('menu-settings') <!-- Include the settings menu component -->

            <main class="h-full md:w-2/3 lg:w-9/12 pl-4 overflow-scroll py-4">
                <div class="px-2 py-2">
                    <div class="w-full px-6 pb-8 sm:max-w-xl sm:rounded-lg">

                        <!-- Notifikasi -->
                        <div>
    @if (session()->has('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="mb-4">
        <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
        <input type="password" id="current_password" wire:model="current_password"
            class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5">
        @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
        <input type="password" id="new_password" wire:model="new_password"
            class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5">
        @error('new_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
        <input type="password" id="new_password_confirmation" wire:model="new_password_confirmation"
            class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5">
        @error('new_password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <button wire:click="updatePassword"
        class="text-white bg-orange focus:ring-4 focus:outline-none focus:ring-lightGreen font-medium rounded-lg text-sm px-5 py-2.5">
        Update Password
    </button>
</div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Script untuk menghilangkan notifikasi otomatis -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(() => {
                let successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.style.transition = "opacity 0.5s";
                    successMessage.style.opacity = "0";
                    setTimeout(() => successMessage.remove(), 500);
                }
            }, 3000); // Menghilangkan notifikasi setelah 3 detik
        });
    </script>
</div>
