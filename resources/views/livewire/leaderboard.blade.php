@section('title', 'Leaderboard -')
<div class="bg-lightGreen h-full">
    <div class="flex  font-medium w-full h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
        <div class="flex items-center justify-center h-full text-gray-600  w-full md:w-4/6">
            <!-- Component Start -->
            <div class="max-w-full w-full h-full pe-0">
                <div class="flex justify-between mb-6 text-darkGreen align-middle">
                    <div class="flex items-center mb-6 text-darkGreen">
                    <i class="fa-solid fa-chart-simple w-6 text-2xl"></i>
                    <h4 class="font-semibold ml-3 text-lg">Leaderboard</h4>
                    </div>
                    <div class="flex gap-2">

                    <button id="dropdownPlace" data-dropdown-toggle="dropdown-place" data-dropdown-placement="bottom-end"
                            class="text-white bg-darkGreen font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center h-fit"
                            type="button">
                                        {{ ucfirst($category) }}
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                        <!-- Dropdown-pleace menu -->
                        <div id="dropdown-place" class="z-10 hidden bg-darkGreen divide-y divide-gray-100 rounded-lg w-44">
                            <ul class="py-2 text-sm text-white" aria-labelledby="dropdownPlace">
                                <li>
                                    <a href="#" wire:click.prevent="$set('category', 'indonesia')" class="block px-4 py-2">Indonesia</a>
                                  </li>
                                  <li>
                                    <a href="#" wire:click.prevent="$set('category', 'province')" class="block px-4 py-2">Province</a>
                                  </li>
                                  <li>
                                    <a href="#" wire:click.prevent="$set('category', 'city')" class="block px-4 py-2">City</a>
                                  </li>
                            </ul>
                        </div>
                </div>
                </div>
                <div class="overflow-y-auto">
                    <div>
                        <div class="max-w-screen-2xl w-full">
                            <div class="relative overflow-hidden bg-bodybg sm:rounded-lg ">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead class="text-xs text-gray-700 uppercase ">
                                            <tr>
                                                <th scope="col" class="px-4 py-3">Rank</th>
                                                <th scope="col" class="px-4 py-3">Username</th>
                                                <th scope="col" class="px-4 py-3">Level</th>
                                                <th scope="col" class="px-4 py-3">Leaflets</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr class="border-b hover:bg-darkGreen/20">
                                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                                    <td class="px-4 py-3">{{ $user->username }}</td>
                                                    <td class="px-4 py-3">{{ $user->level }}</td>
                                                    <td class="px-4 py-3 font-medium text-gray-900">
                                                        <div class="flex items-center">
                                                            <img src="{{ asset('img/black-logo.png') }}" class="w-4">
                                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded">{{ $user->leaflets }}</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            </div>
            <!-- Component End  -->

            <div class="flex items-center justify-center h-full text-gray-600 w-full md:w-2/6  border-gray-100 bg-darkGreen rounded-2xl py-4">
              <!-- Component Start -->
              <div class="flex flex-col  max-w-full w-full h-full pe-0">
                  <div class="flex flex-col items-center text-white align-middle text-center justify-center">
                      <div class="w-48 bg-bodybg rounded-full p-4 align-middle">
                        <img src="{{ asset('img/avatar.png') }}" alt="" class="w-full">
                      </div>
                      <h4 class="font-semibold ml-3 text-xl pt-3">{{ Auth::user()->username }}</h4>
                      <div class="px-4 mx-auto max-w-screen-xl lg:py-2 lg:px-4">
                        <div class="flex flex-row gap-2">
                            <div class="flex flex-row text-center text-amber-400 bg-green-900 rounded-full border-none py-2 xl:px-4 mb-2 px-4 h-fit w-fit">
                                <img src="{{ asset('img/nobg-logo.png') }}" alt="" class="w-5 h-6=5 mr-2">
                                <h3 class="text-sm">{{ Auth::user()->leaflets }} Leaflets</h3>
                                </div>
                            <div class="flex flex-col text-center text-white bg-green-900 rounded-full border-none py-2 xl:px-4 mb-2 px-4 h-fit w-fit">
                                <h3 class="text-sm">Level {{ Auth::user()->level }}</h3>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="overflow-y-auto no-scrollbar h-full">
                      <div>
                        <div class="mx-4 flex flex-col text-center text-white bg-green-900 rounded-lg border-none xl:p-4 mb-2 p-4">
                            <h3 class="mb-2 text-2xl font-extrabold text-amber-400">Indonesia</h3>
                            <div class="flex justify-center items-baseline mt-1">
                                <span class="mr-2 text-2xl font-extrabold">#{{ $this->getUserRank('indonesia') }}</span>
                            </div>
                        </div>
                        <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-2 lg:px-4">
                            <div class="space-y-8 lg:grid lg:grid-cols-2 sm:gap-4 xl:gap-4 lg:space-y-0 grid ">
                                <div class="flex flex-col text-center text-white bg-green-900 rounded-lg border-none xl:p-4 mb-2 p-4 h-fit">
                                    <h3 class="mb-2 text-2xl font-extrabold text-amber-400">Province</h3>
                                    <div class="flex justify-center items-baseline mt-1">
                                        <span class="mr-2 text-2xl font-extrabold">#{{ $this->getUserRank('province') }}</span>
                                    </div>
                                </div>
                                <div class="flex flex-col text-center text-white bg-green-900 rounded-lg border-none xl:p-4 mb-2 p-4 h-fit">
                                    <h3 class="mb-2 text-2xl font-extrabold text-amber-400">City</h3>
                                    <div class="flex justify-center items-baseline mt-2">
                                        <span class="mr-2 text-2xl font-extrabold">#{{ $this->getUserRank('city') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mx-4 flex flex-col text-center text-white bg-green-900 rounded-lg border-none xl:p-4 mb-2 p-4">
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

                        </div>
                  </div>
                    </div>
              </div>
              </div>
        </div>
    </div>
  </div>

