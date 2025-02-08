@section('title', 'Register Volunteer -')
<section class="pb-8">
    <div class="py-8 lg:py-8 px-8 mx-auto w-full md:w-3/5 lg:w-1/2 bg-white border border-gray-300 rounded-3xl">
        <h2 class="mb-4 text-4xl tracking-tight text-center font-extrabold text-gray-900">Register to Volunteer</h2>
        <p class="mb-8 lg:mb-8 font-light text-gray-500 sm:text-xl pb-8 text-center">Join our volunteer program and make a difference!</p>

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

        <form wire:submit.prevent="submit" class="space-y-4 w-full">
            @csrf
            <input type="hidden" wire:model="volunteer_id"> <!-- Hidden field untuk volunteer_id -->

            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" wire:model="name" id="name" class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" required>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                <input type="email" wire:model="email" id="email" class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">No. Hp</label>
                <input type="text" wire:model="phone" id="phone" class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" required>
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="reason" class="block mb-2 text-sm font-medium text-gray-900">Your Reason</label>
                <textarea wire:model="reason" id="reason" rows="6" class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen" placeholder="Leave a comment..."></textarea>
                @error('reason') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="inline-flex items-center justify-center text-white focus:ring-4 focus:ring-amber-300 font-medium text-sm px-6 py-2 focus:outline-none bg-amber-500 rounded-full transition duration-200 ease-in-out whitespace-nowrap h-fit w-full">Register</button>
        </form>
    </div>
</section>
