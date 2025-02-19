@section('title', 'Volunteer -')
<div class="h-full bg-bodybg">
  <div class="flex  font-medium w-full h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
      <div class="flex items-center justify-center h-full text-gray-600  w-full">
          <!-- Component Start -->
          <div class="max-w-full w-full h-full pe-0">
              <div class="flex flex-col md:flex-row justify-between mb-6 text-darkGreen align-middle">
                  <div class="flex items-center mb-6 text-darkGreen">
                  <i class="fa-solid fa-puzzle-piece w-6 text-2xl"></i>
                  <h4 class="font-semibold ml-3 text-lg">Volunteer</h4>

                  </div>
                  <div class="flex gap-2">
                    <button id="dropdownPlace" data-dropdown-toggle="dropdown-place" data-dropdown-placement="bottom-end" class="text-white bg-darkGreen font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center h-fit" type="button">
                        {{ $selectedCategory ?? 'All Categories' }}
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <div id="dropdown-place" class="z-10 hidden bg-darkGreen divide-y divide-gray-100 rounded-lg w-44">
                        <ul class="py-2 text-sm text-white" aria-labelledby="dropdownPlace">
                            <li>
                                <a href="#" wire:click.prevent="setCategory(null)" class="block px-4 py-2">All Categories</a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="#" wire:click.prevent="setCategory('{{ $category }}')" class="block px-4 py-2">{{ $category }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
              </div>
              </div>
              <div class="overflow-y-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 md:gap-4 md:grid-cols-2 xl:grid-cols-4 justify-between">
                    @foreach ($volunteers as $volunteer)
                    <div class="w-full bg-white rounded-xl border-fadeGreen border-solid border overflow-hidden h-fit">
                        <div class="relative">
                            <img src="{{ asset($volunteer->image) }}" alt="{{ $volunteer->name }}" class="w-full h-52 object-cover">
                            <span style="top: 1.25rem; right: 0.75rem;" class="absolute bg-darkGreen text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ \Carbon\Carbon::parse($volunteer->start_date)->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($volunteer->end_date)->format('d M Y') }}
                            </span>
                        </div>
                        <div class="p-5 space-y-4">
                            <div>
                                <p class="text-xl font-bold text-gray-900">{{ $volunteer->name }}</p>
                                <p class="text-md font-bold text-darkGreen">{{ $volunteer->creator->username }}</p>
                                <p class="text-gray-500 mt-1 text-sm">{{ Str::limit($volunteer->description, 200, '...') }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-500">Benefits</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <div class="text-sm text-darkGreen">{{ $volunteer->crystal_reward }} Crystals</div>
                                    <span class="text-sm text-darkGreen">{{ $volunteer->leaflets_reward }} Leaflets</span>
                                </div>
                            </div>
                            <button wire:navigate href="/register-volunteer?volunteer_id={{ $volunteer->volunteer_id }}"
                                class="w-full bg-orange text-white font-medium py-2 rounded-lg transition-colors">
                                Register
                            </button>

                        </div>
                    </div>
                    @endforeach
                </div>

                </div>
          </div>
      </div>
  </div>
</div>

