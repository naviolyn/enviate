<div class="bg-lightGreen h-full">
    <div class="flex font-medium w-full h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
        <div class="flex items-center justify-center h-full text-gray-600 w-full bg-white py-2 rounded-2xl">
            {{-- Flash Messages --}}
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

            <div class="w-full h-full pe-0">
                <div class="h-full overflow-hidden">
                    <div class="h-full">
                        <div class="h-full">
                            <div class="relative sm:rounded-lg h-full">
                                <div class="flex justify-center min-h-[100%]">
                                    <ul class="mx-auto flex gap-2 max-w-full w-full px-2">
                                        <li>
                                            <input class="peer sr-only" type="radio" value="yes" name="answer" id="yes" checked />
                                            <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-8 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:bg-darkGreen transition-all duration-500 ease-in-out peer-checked:text-white w-fit h-10" for="yes">Preview Avatars</label>
                                            <div class="absolute left-0 px-2 mt-2 rounded-lg w-[99%] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1 h-[calc(100%-3rem)]">
                                                <div class="flex gap-2 h-full">
                                                    {{-- Preview Section --}}
                                                    <div class="w-9/12 bg-lightGreen rounded-xl h-full py-2">
                                                        <div x-data="imageSlider" class="relative mx-auto max-w-3xl overflow-hidden rounded-md p-2 sm:p-4 h-full">
                                                            <button @click="previous()" class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-fadeGreen">
                                                                <i class="fas fa-chevron-left text-2xl font-bold text-white"></i>
                                                            </button>
                                                            <button @click="forward()" class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-fadeGreen">
                                                                <i class="fas fa-chevron-right text-2xl font-bold text-white"></i>
                                                            </button>
                                                            <div class="relative h-full items-center">
                                                                <div class="absolute top-0 align-middle w-full h-full p-16 flex flex-col justify-center">
                                                                    <template x-for="(avatar, index) in images" :key="index">
                                                                        <div x-show="currentIndex === index" class="flex flex-col items-center">
                                                                            <img :src="getCurrentImage(avatar)"
                                                                                 :alt="avatar.name"
                                                                                 class="w-max max-h-[100%] aspect-square rounded-sm object-cover mx-auto" />
                                                                            <div>
                                                                                <p class="mt-8 text-center text-xl text-black font-bold" x-text="avatar.name"></p>
                                                                                <p class="mt-2 text-center text-sm">Cost: <span x-text="avatar.leaflet_reward"></span> leaflets</p>
                                                                            </div>
                                                                        </div>
                                                                    </template>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            document.addEventListener('alpine:init', () => {
                                                                Alpine.data('imageSlider', () => ({
                                                                    currentIndex: 0,
                                                                    currentStyleIndex: 0,
                                                                    images: @json($this->getAvatarData()),

                                                                    previous() {
                                                                        if (this.currentIndex > 0) {
                                                                            this.currentIndex--;
                                                                            this.currentStyleIndex = 0;
                                                                            this.updateSelectedAvatar();
                                                                        }
                                                                    },
                                                                    forward() {
                                                                        if (this.currentIndex < this.images.length - 1) {
                                                                            this.currentIndex++;
                                                                            this.currentStyleIndex = 0;
                                                                            this.updateSelectedAvatar();
                                                                        }
                                                                    },
                                                                    selectStyle(styleIndex) {
                                                                        this.currentStyleIndex = styleIndex;
                                                                        const currentAvatar = this.images[this.currentIndex];
                                                                        if (currentAvatar.styles[styleIndex]) {
                                                                            $wire.selectStyle(currentAvatar.styles[styleIndex].id);
                                                                        }
                                                                    },
                                                                    getCurrentImage(avatar) {
                                                                        if (avatar.styles && avatar.styles.length > 0 && this.currentStyleIndex < avatar.styles.length) {
                                                                            return avatar.styles[this.currentStyleIndex].path;
                                                                        }
                                                                        return avatar.path;
                                                                    },
                                                                    updateSelectedAvatar() {
                                                                        $wire.selectAvatar(this.images[this.currentIndex].id);
                                                                    }
                                                                }));
                                                            });
                                                            </script>
                                                    </div>

                                                    {{-- Styles Section --}}
                                                    <div class="w-3/12 rounded-xl bg-lightGreen h-full">
                                                        <div class="flex flex-col h-full">
                                                            <div class="text-center py-2 border-b border-b-1 border-b-fadeGreen rounded-t-xl">Style</div>
                                                            <div class="flex flex-col p-4 gap-2 items-center overflow-scroll no-scrollbar">
                                                                @foreach($styles as $style)
                                                                    <div class="aspect-square w-32 rounded-lg p-4 hover:bg-fadeGreen transition-all duration-300 ease-in-out cursor-pointer">
                                                                        <img src="{{ asset('storage/' . $style->path) }}" alt="{{ $style->name }}">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <input class="peer sr-only" type="radio" value="no" name="answer" id="no" />
                                            <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-8 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:bg-darkGreen transition-all duration-500 ease-in-out peer-checked:text-white w-fit" for="no">All Avatars</label>
                                            <div class="absolute left-0 px-2 mt-2 rounded-lg w-[99%] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1 h-[calc(100%-3rem)]">
                                                {{-- All Avatars Grid --}}
                                                <div class="h-full bg-lightGreen rounded-xl">
                                                    <div class="grid grid-cols-4 items-center gap-4 p-4 bg-lightGreen rounded-xl overflow-scroll h-max no-scrollbar">
                                                        @foreach($avatars as $avatar)
                                                            <div class="aspect-square px-8 hover:bg-fadeGreen transition-all duration-300 ease-in-out rounded-lg flex flex-col justify-center items-center cursor-pointer"
                                                                 wire:click="selectAvatar({{ $avatar->id }})">
                                                                <img src="{{ asset('storage/' . $avatar->path) }}" alt="{{ $avatar->name }}">
                                                                <div class="flex flex-col text-center mt-2">
                                                                    <h3 class="text-sm font-bold">{{ $avatar->name }}</h3>
                                                                    <p class="text-xs">{{ $avatar->leaflet_reward }} leaflets</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        {{-- Buy Button --}}
                                        <li class="ml-auto pr-3">
                                            <div class="flex justify-end">
                                                <button type="button"
                                                        wire:click="buyAvatar"
                                                        class="text-white bg-orange focus:ring-4 focus:outline-none focus:ring-lightGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center disabled:opacity-50 disabled:cursor-not-allowed"
                                                        @if(!$selectedAvatar || $userLeaflets < optional($selectedAvatar)->leaflet_reward) disabled @endif>
                                                    Save
                                                </button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
