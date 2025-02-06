<header>
    <nav class="border-gray-200 px-4 lg:px-6 py-4 backdrop:blur-lg">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl text-white">
            <a href="/" class="flex items-center w-32">
                <img src="{{ asset('img/nobg-logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Enviate Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap">Enviate</span>
            </a> 
            <div class="flex items-center justify-end lg:order-2 w-32">
                <div class="flex space-x-4 items-center">
                    @auth
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="inline-flex items-center text-white font-medium text-sm px-4 py-2 bg-amber-500 rounded-full focus:outline-none" type="button">{{ Auth::user()->username }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                    </button>
                    
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                          <li>
                            <a href="/dashboard " class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                          </li>
                          <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Logout</button>
                            </form>
                          </li>
                        </ul>
                    </div>
                    
                    @else
                        <a href="/login" class="inline-flex items-center justify-center text-white focus:ring-4 focus:ring-amber-300 font-medium text-sm px-6 py-2 focus:outline-none bg-amber-500 rounded-full transition duration-200 ease-in-out whitespace-nowrap h-fit">
                            Log in
                        </a>
                        <a href="/register" class="inline-flex items-center justify-center text-amber-400 focus:ring-4 focus:ring-gray-300 font-medium text-sm px-6 py-2 focus:outline-none border border-amber-400 rounded-full transition duration-200 ease-in-out whitespace-nowrap h-fit">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="/" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Home</a>
                    </li>
                    <li>
                        <a href="#feature" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Feature</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">FAQ</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
