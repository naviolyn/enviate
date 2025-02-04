<section class="bg-white">
    
    <div class="max-w-2xl px-4 py-2 lg:py-2">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Update Volunteer</h2>
        <form action=# method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Volunteer Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="Apple iMac 27&ldquo;" placeholder="Type product name" required>
                </div>
                {{-- uplod gambar --}}
                <div class="relative w-full h-52 border-2 border-gray-300 border-dashed rounded-lg flex items-center justify-center bg-gray-50 cursor-pointer">
                    <input type="file" id="imageUpload" accept="image/*" class="absolute w-full h-full opacity-0 cursor-pointer">
                    <img id="previewImage" src="https://placehold.co/400x300" alt="Upload Preview" class="w-full h-52 object-cover rounded-lg hidden">
                    <div id="uploadText" class="absolute text-gray-600 font-semibold text-lg">Upload Gambar</div>
                </div>
                
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">created_by</label>
                    <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="Apple" placeholder="Product brand" required>
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">crystal_reward</label>
                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="2999" placeholder="$299" required>
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">leaflets_reward</label>
                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="2999" placeholder="$299" required>
                </div>

                 <div class="w-full">
                 <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                 <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option value="Pelestarian Alam">Pelestarian Alam</option>
                    <option value="Edukasi & Kampanye Lingkungan">Edukasi & Kampanye Lingkungan</option>
                    <option value="Pembersihan & Pengelolaan Sampah">Pembersihan & Pengelolaan Sampah</option>
                    <option value="Advokasi Kebijakan Lingkungan">Advokasi Kebijakan Lingkungan</option>
                    <option value="Pemantauan dan Penelitian Lingkungan">Pemantauan dan Penelitian Lingkungan</option>
                </select>
            </div>
                
                {{-- <div>
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900">start date</label>
                    <input type="date" name="item-weight" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5" value="15" placeholder="Ex. 12" required>
                </div> 
                <div>
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900">end_date</label>
                    <input type="date" name="item-weight" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5" value="15" placeholder="Ex. 12" required>
                </div>  --}}
                <div class="mt-3 sm:col-span-2">
                    <div class="relative h-10 w-full min-w-[200px]">
                      <input
                        id="start-date-picker"
                        class="peer h-full w-full rounded-[7px] border border-gray-800 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-800 placeholder-shown:border-t-gray-900 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-50 focus:ring-0 ring-transparent"
                        placeholder=" "
                      />
                      <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-500">
                        Start Date
                      </label>
                    </div>
                  
                    <div class="relative h-10 w-full min-w-[200px] mt-4">
                      <input
                        id="end-date-picker"
                        class="peer h-full w-full rounded-[7px] border border-gray-800 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-800 placeholder-shown:border-t-gray-900 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-50 focus:ring-0 ring-transparent"
                        placeholder=" "
                      />
                      <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-500">
                        End Date
                      </label>
                    </div>
                  
                    <script>
                      const startDatepicker = flatpickr("#start-date-picker", {
                        dateFormat: "Y-m-d", // Set the date format
                      });
                  
                      const endDatepicker = flatpickr("#end-date-picker", {
                        dateFormat: "Y-m-d", // Set the date format
                        minDate: "today", // Ensure end date is always today or after the start date
                      });
                  
                      // Optional: Add some style customizations for both date pickers
                      const startCalendarContainer = startDatepicker.calendarContainer;
                      const endCalendarContainer = endDatepicker.calendarContainer;
                      const startCalendarMonthNav = startDatepicker.monthNav;
                      const endCalendarMonthNav = endDatepicker.monthNav;
                  
                      startCalendarContainer.className = `${startCalendarContainer.className} bg-white p-4 border border-gray-50 rounded-lg shadow-lg shadow-gray-500/10 font-sans text-sm font-normal text-gray-500 focus:outline-none break-words whitespace-normal`;
                      endCalendarContainer.className = `${endCalendarContainer.className} bg-white p-4 border border-gray-50 rounded-lg shadow-lg shadow-gray-500/10 font-sans text-sm font-normal text-gray-500 focus:outline-none break-words whitespace-normal`;
                  
                      startCalendarMonthNav.className = `${startCalendarMonthNav.className} flex items-center justify-between mb-4 [&>div.flatpickr-month]:-translate-y-3`;
                      endCalendarMonthNav.className = `${endCalendarMonthNav.className} flex items-center justify-between mb-4 [&>div.flatpickr-month]:-translate-y-3`;
                    </script>
                  </div>
                  
                       
                      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                    
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Write a product description here...">Standard glass, 3.8GHz 8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, 16GB 2666MHz DDR4 memory, Radeon Pro 5500 XT with 8GB of GDDR6 memory, 256GB SSD storage, Gigabit Ethernet, Magic Mouse 2, Magic Keyboard - US</textarea>
                </div>
                
            </div>
            
            <div class="flex items-center space-x-4">
                <button type="submit" class="bg-darkGreen text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update 
                </button>
                <button type="button" class="text-white inline-flex items-center bg-orange font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Delete
                </button>
            </div>
            
            </div>
              
            


        </form>
        
    </div>
    <div>
        <div>
            
    </div>
</section>