<div class="bg-lightGreen h-full">
    <div class="flex font-medium w-full h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
        {{-- <div class="flex items-center justify-center h-full text-gray-600 w-full md:w-2/6  border-gray-100 bg-darkGreen rounded-2xl py-4">
            <!-- Component Start -->
            <div class="flex flex-col  max-w-full w-full h-full pe-0 justify-center">
                <div class="flex flex-col items-center text-white align-middle text-center justify-center p-4">
                    <div class="w-full bg-bodybg rounded-full p-4 align-middle">
                      <img src="{{ asset('img/avatar.png') }}" alt="" class="w-full">
                    </div>
                    <h4 class="font-semibold ml-3 text-xl pt-3">nama aatar</h4>
                </div>
                  </div>
        </div> --}}
        
        <div class="flex items-center justify-center h-full text-gray-600  w-full bg-white py-2 rounded-2xl">
            <!-- Component Start -->
            <div class="w-full h-full pe-0">
                <div class=" h-full overflow-hidden">
                    <div class="h-full">
                        <div class="h-full">
                            <div class="relative sm:rounded-lg h-full"><!-- component -->
                                <div class="flex justify-center min-h-[100%]">
                                <ul class="mx-auto flex gap-2 max-w-full w-full px-2">
                                  <li class="">
                                    <input class="peer sr-only" type="radio" value="yes" name="answer" id="yes" checked />
                                    <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-8 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:bg-darkGreen transition-all duration-500 ease-in-out peer-checked:text-white w-fit h-10" for="yes">Preview Avatars</label>
                                
                                        <div class="absolute left-0 px-2  mt-2 rounded-lg w-[99%] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1 h-[calc(100%-3rem)]">
                                      <div class="flex gap-2 h-full">

                                        <div class="w-9/12 bg-lightGreen rounded-xl h-full py-2">
                                          <div x-data="imageSlider" class="relative mx-auto max-w-3xl overflow-hidden rounded-md p-2 sm:p-4 h-full">
                                      
                                              <button @click="previous()" class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-fadeGreen">
                                                  <i class="fas fa-chevron-left text-2xl font-bold text-white"></i>
                                              </button>
                                      
                                              <button @click="forward()" class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-fadeGreen">
                                                  <i class="fas fa-chevron-right text-2xl font-bold text-white"></i>
                                              </button>
                                      
                                              <div class="relative h-full items-center" >
                                                  <template x-for="(image, index) in images">
                                                      <div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0 align-middle w-full h-full p-16 flex flex-col justify-center">
                                                          <img :src="image" alt="image" class="w-max max-h-[100%] aspect-square rounded-sm object-cover mx-auto" />
                                                          <div><p class="mt-8 text-center text-xl text-black font-bold">nama</p>
                                                            <p class="mt-2 text-center text-sm">Earn 1000 leaflets</p>

                                                          </div>
                                                          
                                                      </div>
                                                      
                                                  </template>
                                              </div>
                                          </div> 
                                      
                                      <script>
                                        document.addEventListener("alpine:init", () => {
                                          Alpine.data("imageSlider", () => ({
                                            currentIndex: 1,
                                            images: [
                                              "https://unsplash.it/640/425?image=30",
                                              "https://unsplash.it/640/425?image=40",
                                              "https://unsplash.it/640/425?image=50",
                                            ],
                                            previous() {
                                              if (this.currentIndex > 1) {
                                                this.currentIndex = this.currentIndex - 1;
                                              }
                                            },
                                            forward() {
                                              if (this.currentIndex < this.images.length) {
                                                this.currentIndex = this.currentIndex + 1;
                                              }
                                            },
                                          }));
                                        });
                                      </script>
                                            
                                        </div>
                                        
                                        <div class="w-3/12  rounded-xl bg-lightGreen h-full">
                                          <div class="flex flex-col h-full">
                                            <div class="text-center py-2 border-b border-b-1 border-b-fadeGreen rounded-t-xl">Style</div>
                                            <div class="flex flex-col p-4 gap-2 items-center overflow-scroll no-scrollbar">
                                              <div class="aspect-square w-32 rounded-lg p-4 hover:bg-fadeGreen transition-all duration-300 ease-in-out">
                                                <img src="{{ asset('img/avatar.png') }}" alt="">
                                              </div>
                                              <div class="aspect-square w-32 rounded-lg p-4 hover:bg-fadeGreen transition-all duration-300 ease-in-out">
                                                <img src="{{ asset('img/avatar.png') }}" alt="">
                                              </div>
                                              <div class="aspect-square w-32 rounded-lg p-4 hover:bg-fadeGreen transition-all duration-300 ease-in-out">
                                                <img src="{{ asset('img/avatar.png') }}" alt="">
                                              </div>
                                              <div class="aspect-square w-32 rounded-lg p-4 hover:bg-fadeGreen transition-all duration-300 ease-in-out">
                                                <img src="{{ asset('img/avatar.png') }}" alt="">
                                              </div>
                                              <div class="aspect-square w-32 rounded-lg p-4 hover:bg-fadeGreen transition-all duration-300 ease-in-out">
                                                <img src="{{ asset('img/avatar.png') }}" alt="">
                                              </div>

                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>
                                  </li>
                                
                                  <li class="">
                                    <input class="peer sr-only" type="radio" value="no" name="answer" id="no" />
                                    <label class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-8 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:bg-darkGreen transition-all duration-500 ease-in-out peer-checked:text-white w-fit" for="no">All avatars</label>
                                
                                        <div class="absolute left-0 px-2  mt-2 rounded-lg w-[99%] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1 h-[calc(100%-3rem)]">
                                          <div class="h-full bg-lightGreen rounded-xl">
                                            <div class="grid grid-cols-4 items-center gap-4 p-4 bg-lightGreen rounded-xl  overflow-scroll h-max no-scrollbar">
                                              <div class="aspect-square px-8 hover:bg-fadeGreen transition-all duration-300 ease-in-out rounded-lg flex flex-col justify-center items-center">
                                                <img src="{{ asset('img/avatar.png') }}" alt="">
                                                <div class="flex flex-row text-center text-black/80  rounded-full border-none py-1.5 xl:px-4 mt-2 px-4 h-fit w-fit justify-center">
                                                  <h3 class="text-sm">nama</h3>
                                                  </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                          
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
            <!-- Component End  -->    
              </div>
        </div>
        
    </div>
    
  </div>

