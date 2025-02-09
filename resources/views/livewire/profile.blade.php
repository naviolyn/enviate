<div class="h-full w-full">
    <div class="font-medium w-full h-full flex flex-col gap-4 lg:gap-8 lg:px-4 px-2">
            <div class="p-2 py-4 md:p-8 flex items-center justify-center h-fit lg:h-[50%] text-gray-600 w-full  border-gray-100 bg-darkGreen rounded-2xl ">
              <!-- Component Start -->
              <div class=" h-full flex flex-col  max-w-full w-full  pe-0">
                  <div class="h-full flex flex-col lg:flex-row items-center text-white align-middle text-center justify-center gap-8">
                    <div class="flex h-full flex-col sm:flex-row items-center w-full">
                      <div class="flex justify-center lg:h-full aspect-square bg-gradient-to-tl from-green-100 to-white rounded-full p-8 align-middle lg:w-fit items-center w-48 h-48">
                        <img src="{{ asset('img/avatar.png') }}" alt="" class="w-full max-w-xl my-auto">
                      </div>

                      <div class="flex flex-col justify-center px-4 w-full sm:w-fit">
                        <h1 class="font-semibold ml-3 text-3xl pt-3 text-left">{{ Auth::user()->username }}</h1>
                        <h1 class="font-semibold ml-3 text-xl pt-3 text-left text-white/85">{{ Auth::user()->email }} </h1>
                      </div>
                    </div>
                    <div class="px-4 h-full w-full max-w-screen-xl lg:py-2 lg:px-4">
                        <div class="w-full lg:max-w-2xl ml-auto">
                            <div class="space-y-3">
                                <!-- Task and Volunteer counters -->
                                <div class="flex flex-row gap-3 justify-end">
                                    <div class="flex flex-row text-center text-amber-400 bg-green-900 rounded-full py-2 px-4 h-fit">
                                        <h3 class="text-sm">{{ $completedTasksCount }} Task Complete</h3>
                                    </div>
                                    <div class="flex flex-row text-center text-amber-400 bg-green-900 rounded-full py-2 px-4 h-fit">
                                        <h3 class="text-sm">{{ $completedVolunteersCount }} Volunteer Complete</h3>
                                    </div>
                                </div>

                                <!-- Level and Leaflets section -->
                                <div class="flex flex-col space-y-2 w-full max-w-lg pt-14">
                                    <!-- Bagian atas: Level dan Leaflets -->
                                    <div class="flex justify-between items-center">
                                        <span class="text-white text-lg font-semibold">Level {{ Auth::user()->level }}</span>
                                        <div class="flex items-center bg-green-900 text-amber-400 px-4 py-1 rounded-full">
                                            <svg class="w-4 h-4 mr-1 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 0C6.14 0 3 3.14 3 7c0 5.25 6.5 13 7 13 .5 0 7-7.75 7-13 0-3.86-3.14-7-7-7zm0 10.5C8.62 10.5 7.5 9.38 7.5 8S8.62 5.5 10 5.5 12.5 6.62 12.5 8 11.38 10.5 10 10.5z"/>
                                            </svg>
                                            <span>{{ Auth::user()->leaflets }} / {{ Auth::user()->level * 100 }}</span>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    <div class="relative w-full h-4 bg-gray-300 rounded-full overflow-hidden pt-6">
                                        <div class="absolute top-0 left-0 h-full bg-amber-400 rounded-full transition-all duration-500"
                                            style="width: {{ (Auth::user()->leaflets % 100) }}%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

                    </div>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4  gap-8 items-center h-fit lg:h-[50%] text-white w-full pb-24 md:p-0">
            <div class="bg-darkGreen rounded-2xl h-full flex flex-col justify-center align-middle items-center p-8">
                <h3 class="mb-2 text-2xl font-extrabold">Badge</h3>
                    <div class="flex justify-center items-center flex-col">
                        @if($badge)
                            <img src="{{ asset('storage/' . $badge->image_path) }}" alt="{{ $badge->name }}" class="w-20 h-20 object-cover">
                            <span class="mt-4 text-xl font-bold text-white">{{ $badge->name }}</span>
                        @else
                            <span class="mt-4 text-xl font-bold text-white">No Badge</span>
                        @endif
                    </div>
            </div>
                <div class="bg-darkGreen rounded-2xl h-full flex flex-col justify-center align-middle items-center p-8">
                  <h3 class="mb-2 text-2xl font-extrabold">Country</h3>
                  <div class="flex justify-center items-baseline">
                    <span class="mt-4 text-5xl font-extrabold text-amber-400">#{{ $this->getUserRank('indonesia') }}</span>
                  </div>
                </div>
                <div class="bg-darkGreen rounded-2xl h-full flex flex-col justify-center align-middle items-center p-8">
                  <h3 class="mb-2 text-2xl font-extrabold">Province</h3>
                  <div class="flex justify-center items-baseline">
                    <span class="mt-4 text-5xl font-extrabold text-amber-400">#{{ $this->getUserRank('province') }}</span>
                  </div>
                </div>
                <div class="bg-darkGreen rounded-2xl h-full flex flex-col justify-center align-middle items-center p-8">
                  <h3 class="mb-2 text-2xl font-extrabold">City</h3>
                  <div class="flex justify-center items-baseline">
                    <span class="mt-4 text-5xl font-extrabold text-amber-400">#{{ $this->getUserRank('city') }}</span>
                  </div>
                </div>
            </div>

      </div>
  </div>

