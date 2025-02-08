@section('title', 'Edit Profile -')
<div class="bg-bodybg h-full w-full overflow-hidden">
    <div class="w-full font-medium h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
        <div class="flex items-center justify-center h-full w-full bg-white border rounded-2xl">
            @livewire('menu-settings') <!-- Include the settings menu component -->

            <main class="h-full md:w-2/3 lg:w-9/12 pl-4 overflow-scroll py-4">
                <div class="px-2 py-2">
                    <div class="w-full px-6 pb-8 sm:max-w-xl sm:rounded-lg">
                        <h2 class="text-2xl font-bold sm:text-xl">Edit Profile</h2>

                        <div class="grid max-w-2xl mx-auto mt-8">
                            <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">
                                <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-darkGreen"
                                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGZhY2V8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="Bordered avatar">

                                    <div class="flex flex-col space-y-5 sm:ml-8">
    <button type="button"
        onclick="window.location.href='{{ route('customize-avatar') }}'"
        class="py-2 px-7 text-base font-medium text-white focus:outline-none bg-orange rounded-full border">
        Customize Avatar
    </button>
</div>
                            </div>

                            <div class="items-center mt-8 sm:mt-14 text-[#202142]">

                                <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                    <div class="w-full">
                                        <label for="username"
                                            class="block mb-2 text-sm font-medium">Username</label>
                                        <input type="text" id="username" wire:model="username"
                                            class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen "
                                            placeholder="Username" required>
                                    </div>
                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium">Email</label>
                                    <input type="email" id="email" wire:model="email"
                                        class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen"
                                        placeholder="email@gmail.com" required>
                                </div>

                                <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                    <div class="w-full">
                                        <label for="province"
                                            class="block mb-2 text-sm font-medium">Province</label>
                                        <input type="text" id="province" wire:model="province"
                                            class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen "
                                            placeholder="Province" required>
                                    </div>

                                    <div class="w-full">
                                        <label for="city"
                                            class="block mb-2 text-sm font-medium">City</label>
                                        <input type="text" id="city" wire:model="city"
                                            class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen"
                                            placeholder="City" required>
                                    </div>
                                </div>

                                <div class="flex justify-end">
                                    <button type="button" wire:click="save"
                                        class="text-white bg-orange focus:ring-4 focus:outline-none focus:ring-lightGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                        Save
                                    </button>
                                </div>

                                <!-- Menampilkan pesan setelah berhasil disimpan -->
                                @if (session()->has('message'))
                                    <div class="mt-4 text-green-500">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
