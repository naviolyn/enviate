<div class="bg-bodybg h-full w-full overflow-hidden">
    <div class="w-full font-medium h-full flex-col sm:flex-col md:flex-row gap-4 lg:gap-8 lg:px-4 px-2">
        <div class="flex items-center justify-center h-full w-full bg-white border rounded-2xl ">
            @livewire('menu-settings') <!-- Include the settings menu component -->
            
            <main class="h-full md:w-2/3 lg:w-9/12 pl-4 overflow-scroll py-4">
                <div class="px-2 py-2">
                    <div class="w-full px-6 pb-8 sm:max-w-xl sm:rounded-lg">
                        <h2 class="text-2xl font-bold sm:text-xl">Public Profile</h2>
        
                        <div class="grid max-w-2xl mx-auto mt-8">
                            <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">
        
                                <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-darkGreen"
                                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGZhY2V8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="Bordered avatar">
        
                                <div class="flex flex-col space-y-5 sm:ml-8">
                                    <button type="button"
                                        class="py-2 px-7 text-base font-medium text-white focus:outline-none bg-orange rounded-full border">
                                        Customize Avatar
                                    </button>
                                </div>
                            </div>
        
                            <div class="items-center mt-8 sm:mt-14 text-[#202142]">
        
                                <div
                                    class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                    <div class="w-full">
                                        <label for="first_name"
                                            class="block mb-2 text-sm font-medium  ">Your
                                            first name</label>
                                        <input type="text" id="first_name"
                                            class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen "
                                            placeholder="Your first name" value="First name" required>
                                    </div>
        
                                    <div class="w-full">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium  ">Your
                                            last name</label>
                                        <input type="text" id="last_name"
                                            class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen"
                                            placeholder="Your last name" value="Ferguson" required>
                                    </div>
        
                                </div>
        
                                <div class="mb-2 sm:mb-6">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium  ">Your
                                        email</label>
                                    <input type="email" id="email"
                                        class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen"
                                        placeholder="your.email@mail.com" required>
                                </div>
        
                                <div class="mb-2 sm:mb-6">
                                    <label for="profession"
                                        class="block mb-2 text-sm font-medium  ">Profession</label>
                                    <input type="text" id="profession"
                                        class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen"
                                        placeholder="your profession" required>
                                </div>
        
                                <div class="mb-6">
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium  ">Bio</label>
                                    <textarea id="message" rows="4"
                                        class="bg-white border border-gray-200 text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 focus:bg-lightGreen"
                                        placeholder="Write your bio here..."></textarea>
                                </div>
        
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="text-white bg-orange focus:ring-4 focus:outline-none focus:ring-lightGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Save</button>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>