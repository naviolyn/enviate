<div class="bg-lightGreen h-full p-4">
    <!-- Flash Messages -->
    @if (session()->has('error'))
        <div class="absolute top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="absolute top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div x-data="{
        currentIndex: 0,
        selectedStyle: null,
        avatars: {{ Js::from($avatars) }},
        styles: {{ Js::from($styles) }},
        ownedStyles: {{ Js::from($ownedStyles) }},

        getCurrentImage() {
            let avatar = this.avatars[this.currentIndex];
            return this.selectedStyle ? '/storage/' + this.selectedStyle.path : '/storage/' + avatar.path;
        },

        getCurrentPrice() {
            let avatar = this.avatars[this.currentIndex];
            return this.selectedStyle ? this.selectedStyle.leaflet_cost : avatar.leaflet_reward;
        },

        selectStyle(index) {
            this.selectedStyle = this.styles[index];
        },

        isOwnedStyle(styleId) {
            return this.ownedStyles.includes(styleId);
        }
    }">

        <!-- Avatar Preview Section -->
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex flex-col items-center w-full lg:w-1/2 bg-white p-6 rounded-xl shadow">
                <template x-for="(avatar, index) in avatars" :key="index">
                    <div x-show="currentIndex === index" class="flex flex-col items-center">
                        <img :src="getCurrentImage()" :alt="avatar.name" class="w-40 h-40 rounded-md" />
                        <p class="text-xl font-bold mt-4" x-text="avatar.name"></p>
                        <p class="text-sm mt-2">Cost: <span x-text="getCurrentPrice()"></span> leaflets</p>
                    </div>
                </template>

                <div class="flex gap-4 mt-6">
                    <button @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : avatars.length - 1; selectedStyle = null;" class="px-4 py-2 bg-darkGreen text-white rounded-lg shadow hover:bg-green-700">
                        Previous
                    </button>
                    <button @click="currentIndex = (currentIndex + 1) % avatars.length; selectedStyle = null;" class="px-4 py-2 bg-darkGreen text-white rounded-lg shadow hover:bg-green-700">
                        Next
                    </button>
                </div>
            </div>

            <div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Style Selection</h1>
    <div>
        <ul class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($styles as $style)
                <li class="border p-4 rounded-lg cursor-pointer hover:shadow-lg transition"
                    :class="{ 'border-blue-500': selectedStyle && selectedStyle.id === {{ $style->id }} }"
                    @click="Livewire.dispatch('selectStyle', { styleId: {{ $style->id }} })">
                    
                    <h2 class="text-xl font-semibold">{{ $style->name }}</h2>
                    <p class="text-gray-500">Price: {{ $style->leaflet_cost }} Leaflets</p>
                    
                    <button type="button"
                        wire:click="buyStyle({{ $style->id }})"
                        class="mt-2 px-4 py-2 rounded-lg transition"
                        :class="{
                            'bg-gray-500 text-white cursor-not-allowed': ownedStyles.includes({{ $style->id }}),
                            'bg-blue-500 text-white hover:bg-blue-600': !ownedStyles.includes({{ $style->id }})
                        }"
                        @if (in_array($style->id, $ownedStyles) || $userLeaflets < $style->leaflet_cost) disabled @endif>
                        {{ in_array($style->id, $ownedStyles) ? 'Already Owned' : 'Buy' }}
                    </button>
                </li>
            @endforeach
        </ul>

        @if ($selectedStyle)
            <div class="mt-8 p-4 border rounded-lg">
                <h2 class="text-xl font-bold mb-2">Selected Style</h2>
                <img src="{{ asset('storage/' . $selectedStyle->path) }}" alt="{{ $selectedStyle->name }}" class="w-48 h-48 object-cover rounded-lg mb-4">
                <p><strong>Name :</strong> {{ $selectedStyle->name }}</p>
                <p><strong>Price :</strong> {{ $selectedStyle->leaflet_cost }} Leaflets</p>
                <p><strong>Status :</strong> {{ in_array($selectedStyle->id, $ownedStyles) ? 'Owned' : 'Not Owned' }}</p>
            </div>
        @endif
    </div>
</div>

<div>
<!-- Modal Background -->
<div x-data="{ open: @entangle('showModal') }">
    <button @click="open = true"
        class="bg-darkGreen text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition-all">
        Show Owned Avatars & Styles
    </button>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 relative">


            <button @click="open = false" class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded">
                ✖
            </button>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Avatars</h3>
                <div class="grid grid-cols-3 gap-4">
                    @foreach($avatars as $avatar)
                        @if(in_array($avatar->id, $ownedAvatars))
                            <div class="flex flex-col items-center p-2 border rounded-lg">
                                <img src="{{ asset('storage/' . $avatar->path) }}" alt="{{ $avatar->name }}" class="w-20 h-20">
                                <p class="mt-2">{{ $avatar->name }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold">Styles</h3>
                <div class="grid grid-cols-3 gap-4">
                    @foreach($styles as $style)
                        @if(in_array($style->id, $ownedStyles))
                            <div class="flex flex-col items-center p-2 border rounded-lg">
                                <img src="{{ asset('storage/' . $style->path) }}" alt="{{ $style->name }}" class="w-20 h-20">
                                <p class="mt-2">{{ $style->name }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('imageSlider', () => ({
        currentIndex: 0,
        selectedStyle: null,
        avatars: @json($avatars),
        styles: @json($styles),
        ownedStyles: @json($ownedStyles),

        getCurrentImage() {
            let avatar = this.avatars[this.currentIndex];
            return this.selectedStyle ? '/storage/' + this.selectedStyle.path : '/storage/' + avatar.path;
        },

        getCurrentPrice() {
            let avatar = this.avatars[this.currentIndex];
            return this.selectedStyle ? this.selectedStyle.leaflet_cost : avatar.leaflet_reward;
        },

        selectStyle(index) {
            this.selectedStyle = this.styles[index];
        },

        isOwnedStyle(styleId) {
            return this.ownedStyles.includes(styleId);
        }
    }));

    Livewire.on('stylePurchased', updatedStyles => {
        Alpine.store('imageSlider').ownedStyles = updatedStyles;
    });
});
</script>
