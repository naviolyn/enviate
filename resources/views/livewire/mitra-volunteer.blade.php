<div class="h-full">
    <div class="flex  font-medium w-full h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
        <div class="flex items-center justify-center h-full text-gray-600  w-full">
            <!-- Component Start -->
            <div class="max-w-full w-full h-full pe-0">
                <div class="flex justify-between mb-6 text-darkGreen align-middle">
                    <div class="flex items-center mb-6 text-darkGreen">
                    <i class="fa-solid fa-puzzle-piece w-6 text-2xl"></i>   
                    <h4 class="font-semibold ml-3 text-lg">Volunteer</h4>
                    </div>
                    <div class="flex gap-2">
                        
                        <button onclick="window.location='{{ route('tambah-volunteer') }}'" 
                        class="text-white bg-darkGreen font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center h-fit">
                        Tambah Volunteer
                        </button>
                       
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
                                                <th scope="col" class="px-4 py-3">Name</th>
                                                <th scope="col" class="px-4 py-3">Tanggal</th>
                                                <th scope="col" class="px-4 py-3">Status</th>
                                                <th scope="col" class="px-4 py-3">Jumlah Pendaftar</th>
                                                <th scope="col" class="px-4 py-3"></th>
                                                <th scope="col" class="px-4 py-3"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b hover:bg-darkGreen/20">
                                                <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                    aisesx
                                                </th>
                                                <td class="px-4 py-2">
                                                    <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded">9999</span>
                                                </td>
                                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <img src="{{ asset('img/logo.png') }}" alt="" class="w-4">
                                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded">10</span>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-2">
                                                    <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded">9999</span>
                                                </td>
                                                <td class="px-4 py-2">
                                                    <button class="bg-orange  text-white font-medium py-1 rounded-lg transition-colors px-3">
                                                        List
                                                      </button>
                                                </td>
                                                <td class="px-4 py-2">
                                                    <a href="{{ route('edit-volunteer') }}">
                                                        <i class="fa-solid fa-pen-to-square cursor-pointer"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
  
  