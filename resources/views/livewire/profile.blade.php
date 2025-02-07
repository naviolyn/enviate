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
                      

                      <div class="px-4 h-full w-full max-w-screen-xl lg:py-2 lg:px-4 flex flex-col justify-between items-end">
                        <div class="flex flex-row gap-2">
                                <div class="flex flex-col text-center text-white bg-green-900 rounded-full border-none py-2 xl:px-4 mb-2 px-4 h-fit w-fit">
                                  <h3 class="text-sm">100 Task Completed</h3>
                                  </div>
                                  <div class="flex flex-col text-center text-white bg-green-900 rounded-full border-none py-2 xl:px-4 mb-2 px-4 h-fit w-fit">
                                    <h3 class="text-sm">100 Volunteer Completed</h3>
                                    </div>
                            
                            </div>

                        <div class="flex flex-row gap-2 w-full items-center justify-end">
                                <div class="flex items-center py-3 w-full lg:max-w-2xl">
                                  <div class="space-y-3 flex-1 w-full">
                                    <div class="flex items-center">
                                      <h4 class="font-medium text-md mr-auto text-white flex items-center">
                                        level 100
                                      </h4>
                                      <div class="flex flex-row text-center text-amber-400 bg-green-900 rounded-full border-none py-2 xl:px-4 mb-2 px-4 h-fit w-fit justify-end">
                                        <img src="{{ asset('img/nobg-logo.png') }}" alt="" class="w-5 h-6=5 mr-2 object-cover">
                                        <h3 class="text-sm">{{ Auth::user()->leaflets }}/jumlah lfts selanjutnyta Leaflets</h3>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden bg-blue-50 h-6 rounded-full w-full">
                                      <span class="h-full bg-amber-400 w-full block rounded-full" style="width: 62%"></span>
                                    </div>
                                  </div>
                                </div>
                                {{-- <div class="w-[70%] h-4 mb-4 bg-gray-200 rounded-full ">
                                  <div class="h-4 bg-amber-400 rounded-full " style="width: 45%"></div>
                                </div> --}}
                            
                            </div>
                        </div>
                  </div>

                    </div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4  gap-8 items-center h-fit lg:h-[50%] text-white w-full pb-24 md:p-0">
              <div class="bg-darkGreen rounded-2xl h-full flex flex-col justify-center align-middle items-center p-8">
                <h3 class="mb-2 text-2xl font-extrabold">Badge</h3>
                <div class="flex justify-center items-baseline">
                  <span class="mt-4 text-5xl font-extrabold text-amber-400">#1</span>
                </div>
              </div>
                <div class="bg-darkGreen rounded-2xl h-full flex flex-col justify-center align-middle items-center p-8">
                  <h3 class="mb-2 text-2xl font-extrabold">Country</h3>
                  <div class="flex justify-center items-baseline">
                    <span class="mt-4 text-5xl font-extrabold text-amber-400">#1</span>
                  </div>
                </div>
                <div class="bg-darkGreen rounded-2xl h-full flex flex-col justify-center align-middle items-center p-8">
                  <h3 class="mb-2 text-2xl font-extrabold">Province</h3>
                  <div class="flex justify-center items-baseline">
                    <span class="mt-4 text-5xl font-extrabold text-amber-400">#1</span>
                  </div>
                </div>
                <div class="bg-darkGreen rounded-2xl h-full flex flex-col justify-center align-middle items-center p-8">
                  <h3 class="mb-2 text-2xl font-extrabold">City</h3>
                  <div class="flex justify-center items-baseline">
                    <span class="mt-4 text-5xl font-extrabold text-amber-400">#1</span>
                  </div>
                </div>
            </div>

      </div>
  </div>

