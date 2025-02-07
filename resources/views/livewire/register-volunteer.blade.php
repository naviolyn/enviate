<section class="">
    <div class="py-8 lg:py-16 px-8 mx-auto w-full md:w-3/5 lg:w-1/2 bg-white border border-gray-300 rounded-3xl">
        <h2 class="mb-4 text-4xl tracking-tight text-center font-extrabold text-gray-900">Register to Volunteer</h2>
        <p class="mb-8 lg:mb-16 font-light text-gray-500 sm:text-xl pb-8 text-center">Join our volunteer program and make a difference!</p>

        @if (session()->has('success'))
            <div class="p-4 mb-4 text-green-800 rounded-lg bg-green-50">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="p-4 mb-4 text-red-800 rounded-lg bg-red-50">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="submit" class="space-y-8 w-full">
            @csrf
            <input type="hidden" wire:model="volunteer_id"> <!-- Hidden field untuk volunteer_id -->

            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" wire:model="name" id="name" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500" required>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                <input type="email" wire:model="email" id="email" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500" required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">No. Hp</label>
                <input type="text" wire:model="phone" id="phone" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500" required>
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="reason" class="block mb-2 text-sm font-medium text-gray-900">Your Reason</label>
                <textarea wire:model="reason" id="reason" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                @error('reason') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-darkGreen sm:w-fit hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-primary-300">Register</button>
        </form>
    </div>
</section>
