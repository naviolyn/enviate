<div>
    <!-- Main Content -->
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

        <!-- Main Avatar and Style Selection -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" x-data="{
            currentIndex: 0,
            avatars: {{ Js::from($avatars) }},
            styles: {{ Js::from($styles) }},
            ownedStyles: {{ Js::from($ownedStyles) }},
            selectedStyle: null,

            getCurrentAvatar() {
                return this.avatars[this.currentIndex];
            },

            getStylesForCurrentAvatar() {
    return this.styles.filter(style => style.avatar_id === this.getCurrentAvatar().id);
},

            selectStyle(style) {
                this.selectedStyle = style;
            },

            isOwnedStyle(styleId) {
                return this.ownedStyles.includes(styleId);
            }
        }">
            <!-- Avatar Section -->
            <div class="flex flex-col items-center bg-white p-6 rounded-xl shadow">
                <div class="flex flex-col items-center">
                    <img :src="'/storage/' + getCurrentAvatar().path" 
                         :alt="getCurrentAvatar().name" 
                         class="w-40 h-40 rounded-md" />
                    <p class="text-xl font-bold mt-4" x-text="getCurrentAvatar().name"></p>
                    <p class="text-sm mt-2">Cost: <span x-text="getCurrentAvatar().leaflet_reward"></span> leaflets</p>
                </div>

                <div class="flex gap-4 mt-6">
                <button @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : avatars.length - 1; selectedStyle = null;" 
        class="px-4 py-2 bg-darkGreen text-white rounded-lg shadow hover:bg-green-700">
    Previous
</button>
<button @click="currentIndex = (currentIndex + 1) % avatars.length; selectedStyle = null;" 
        class="px-4 py-2 bg-darkGreen text-white rounded-lg shadow hover:bg-green-700">
    Next
</button>
                </div>
            </div>

            <!-- Style Section -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-bold mb-4">Styles for <span x-text="getCurrentAvatar().name"></span></h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <template x-for="style in getStylesForCurrentAvatar()" :key="style.id">
        <div class="border p-4 rounded-lg cursor-pointer hover:shadow-lg transition"
             :class="{ 'border-blue-500': selectedStyle && selectedStyle.id === style.id }"
             @click="selectStyle(style)">
             <img :src="'/storage/' + style.path" 
     :alt="style.name || 'Style unavailable'" 
     class="w-full h-32 object-cover rounded-md mb-2">
            <h3 class="text-lg font-semibold" x-text="style.name"></h3>
            <p class="text-sm text-gray-500">Cost: <span x-text="style.leaflet_cost"></span> Leaflets</p>
            <button type="button" 
                    class="mt-2 px-4 py-2 rounded-lg transition w-full"
                    :class="{
                        'bg-gray-500 text-white cursor-not-allowed': isOwnedStyle(style.id),
                        'bg-blue-500 text-white hover:bg-blue-600': !isOwnedStyle(style.id)
                    }"
                    @click="$wire.buyStyle(style.id)"
                    :disabled="isOwnedStyle(style.id)">
                <span x-text="isOwnedStyle(style.id) ? 'Already Owned' : 'Buy'"></span>
            </button>
        </div>
    </template>
</div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('showModal') }">
        <button @click="open = true"
            class="bg-darkGreen text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition-all">
            Show Owned Avatars & Styles
        </button>

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

                <!-- Style Details -->
<div x-show="selectedStyle" class="mt-8 p-4 border rounded-lg bg-gray-100">
    <h2 class="text-xl font-bold mb-2">Selected Style</h2>
    <img :src="'/storage/' + selectedStyle.path" 
         :alt="selectedStyle.name" 
         class="w-48 h-48 object-cover rounded-lg mb-4">
    <p><strong>Name:</strong> <span x-text="selectedStyle.name"></span></p>
    <p><strong>Price:</strong> <span x-text="selectedStyle.leaflet_cost"></span> Leaflets</p>
    <p><strong>Status:</strong> <span x-text="isOwnedStyle(selectedStyle.id) ? 'Owned' : 'Not Owned'"></span></p>
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
