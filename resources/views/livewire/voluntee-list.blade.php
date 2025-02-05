<div class="h-full">
    <div class="flex  font-medium w-full h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
        <div class="flex items-center justify-center h-full text-gray-600  w-full">
            <!-- Component Start -->
            <div class="max-w-full w-full h-full pe-0">
                <div class="flex justify-between mb-6 text-darkGreen align-middle">
                    <div class="flex items-center mb-6 text-darkGreen">
                    <i class="fa-solid fa-puzzle-piece w-6 text-2xl"></i>   
                    <h4 class="font-semibold ml-3 text-lg">Voluntee List for nama volunteer</h4>
                    </div>
                    <div class="flex gap-2">
                        
                        
                       
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
                                                <th scope="col" class="px-4 py-3">email</th>
                                                <th scope="col" class="px-4 py-3">Status</th>
                                                <th scope="col" class="px-4 py-3">ss</th>
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
                                                    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="bg-darkGreen  text-white font-medium py-1 rounded-lg transition-colors px-3 mr-2" type="button">
                                                        Selesai
                                                      </button>
                                                      <button class="bg-orange  text-white font-medium py-1 rounded-lg transition-colors px-3">
                                                        tidak
                                                      </button>
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
        
        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative px-4 my-16 py-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4  md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Terms of Service
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <p class="text-base leading-relaxed text-gray-500">
                            dapat sekian yakin betul bla bla bla
                        </p>
                        <p class="text-base leading-relaxed text-gray-500">
                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button data-modal-hide="default-modal" type="button" class="bg-darkGreen  text-white font-medium py-2 rounded-lg transition-colors px-3 mr-2">I accept</button>
                        <button data-modal-hide="default-modal" type="button" class="bg-orange  text-white font-medium py-2 rounded-lg transition-colors px-3">Decline</button>
                    </div>
                </div>
            </div>
        </div>
        

<script>
    document.addEventListener("DOMContentLoaded", function(oke) {
  document.getElementById('deleteButton').click();
});
</script>
</div>

  