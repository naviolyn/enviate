     <!-- Sidebar -->
     <div class="flex flex-shrink-0 transition-all fixed h-screen z-10 text-white">
        <div
          x-show="isSidebarOpen"
          @click="isSidebarOpen = false"
          class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden"
        ></div>
        <div x-show="isSidebarOpen" class="fixed inset-y-0 z-10 w-16 bg-darkGreen"></div>
  
        <!-- Mobile bottom bar -->
        <nav
          aria-label="Options"
          class="bg-darkGreen fixed inset-x-0 bottom-0 flex flex-row-reverse items-center justify-between px-4 py-2 sm:hidden shadow-t rounded-t-3xl"
        >
          <!-- Menu button -->
          <button
            @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'slide'"
            class="p-2 transition-colors rounded-lg hover:bg-darkGreen hover:text-white focus:outline-none"
            :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-fadeGreen' : 'text-white'"
          >
            <span class="sr-only">Toggle sidebar</span>
            <i class="fa-solid fa-bars"></i>
          </button>
  
          <!-- Logo -->
          <a href="/today-task">
            <img
              class="w-10 h-auto"
              src="{{ asset('img/logo.png') }}"
              alt="K-UI"
            />
          </a>
  
          <!-- User avatar button -->
          <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
            <button
              @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
              class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none"
            >
              <img
                class="w-8 h-8 rounded-lg shadow-md"
                src="{{ asset('img/avatar.png') }}"
                alt=""
              />
              <span class="sr-only">User menu</span>
            </button>
            <div
              x-show="isOpen"
              @click.away="isOpen = false"
              @keydown.escape="isOpen = false"
              x-ref="userMenu"
              tabindex="-1"
              class="absolute w-48 py-1 mt-2 origin-bottom-left rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
              role="menu"
              aria-orientation="vertical"
              aria-label="user menu"
            >
              <span id="username" class="block px-4 py-2 text-sm text-gray-700">
                  Name
              </span>
              <hr>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                  Sign Out
                </button>
              </form>
            </div>
          </div>
        </nav>
  
        <!-- Left mini bar -->
        <nav
          aria-label="Options"
          class="z-20 flex-col items-center flex-shrink-0 hidden w-16 py-4 border-0 sm:flex rounded-tr-3xl rounded-br-3xl bg-darkGreen" style="border: 0px solid white"
        >
          <!-- Logo -->
          <div class="flex-shrink-0 py-4">
            <a href="/today-task">
              <img
                class="w-10 h-auto"
                src="{{ asset('img/nobg-logo.png') }}"
                alt="K-UI"
              />
            </a>
          </div>
          <div class="flex flex-col items-center flex-1 p-2 space-y-4">
            <!-- Menu button -->
            <button
              @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
              class="p-2 transition-colors rounded-lg hover:text-white focus:outline-none {{ Request::is('today-task*') ? 'bg-fadeGreen' : '' }}"
              :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white ' : 'text-white'"
            >
              <span class="sr-only">Toggle sidebar</span>
              <i class="fa-solid fa-calendar-check w-6 text-2xl"></i>
            </button>
            <!-- Challenge button -->  
            <a href="/challenge" class="p-0 m-0">
                <button
              class="p-2 transition-colors rounded-lg  hover:text-white focus:outline-none {{ Request::is('challenge*') ? 'bg-fadeGreen' : '' }}"
              :class="(isSidebarOpen && currentSidebarTab == 'challengeTab') ? 'text-white bg-fadeGreen' : 'text-white'"
            >
              <span class="sr-only">Toggle challenge panel</span>
              <i class="fa-solid fa-cubes-stacked w-6 text-2xl"></i>
            </button>
            </a>
            
            {{-- leaderboard button --}}
            <a href="/leaderboard" class="p-0 m-0">
            <button
              class="p-2 transition-colors rounded-lg hover:text-white focus:outline-none {{ Request::is('leaderboard*') ? 'bg-fadeGreen' : '' }}"
              :class="(isSidebarOpen && currentSidebarTab == 'leaderboardTab') ? 'text-white' : 'text-white'"
            >
            <span class="sr-only">Toggle leaderboard panel</span>
              <i class="fa-solid fa-chart-simple w-6 text-2xl"></i>
            </button>
            </a>
            {{-- Volunteer button --}}
            <button
              @click="(isSidebarOpen && currentSidebarTab == volunteerTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'volunteerTab'"
              class="p-2 transition-colors rounded-lg  hover:text-white focus:outline-none"
              :class="(isSidebarOpen && currentSidebarTab == 'volunteerTab') ? 'text-white bg-fadeGreen' : 'text-white'"
            >
              <span class="sr-only">Toggle challenge panel</span>
              <i class="fa-solid fa-puzzle-piece w-6 text-2xl"></i>
            </button>
            <!-- Notifications button -->
            <button
              @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab'"
              class="p-2 transition-colors rounded-lg  hover:text-white focus:outline-none"
              :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-fadeGreen' : 'text-white'"
            >
              <span class="sr-only">Toggle notifications panel</span>
              <i class="fa-solid fa-bell w-6 text-2xl"></i>
            </button>
          </div>
  
          <!-- User avatar -->
          <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
            <button
              @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
              class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none"
            >
              <img
                class="w-10 h-10 rounded"
                src="{{ asset('img/avatar.png') }}"
                alt="Ahmed Kamel"
              />
              <span class="sr-only">User menu</span>
            </button>
            <div
              x-show="isOpen"
              @click.away="isOpen = false"
              @keydown.escape="isOpen = false"
              x-ref="userMenu"
              tabindex="-1"
              class="z-50 absolute w-48 py-1 mt-2 origin-bottom-left rounded-md border border-gray-200 left-10 bottom-14 focus:outline-none bg-bodybg"
              role="menu"
              aria-orientation="vertical"
              aria-label="user menu"
            >
              <span id="username" class="block px-4 py-2 text-sm text-gray-700">
                  Name
              </span>
              <hr>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
              <a href="/edit-profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                  Sign Out
                </button>
              </form>
            </div>
          </div>
        </nav>
  
        <div
          x-transition:enter="transform transition-transform duration-300"
          x-transition:enter-start="-translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transform transition-transform duration-300"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="-translate-x-full"
          x-show="isSidebarOpen"
           class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 border-0 sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-64 bg-darkGreen"
        ><nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full">
          <!-- Links -->
          <div class="flex-1 px-4 space-y-2 hover:overflow-auto py-10">
            <a href="/today-task" class="flex items-center w-full space-x-2 text-white rounded-lg {{ Request::is('today-task*') ? 'bg-fadeGreen' : '' }}">
              <span aria-hidden="true" class="p-2 rounded-lg">
                <i class="fa-solid fa-calendar-day"></i>
              </span>
              <span>Today Task</span>
            </a>
            <a
              href="#"
              class="flex items-center space-x-2 text-white rounded-lg {{ Request::is('weekly-task*') ? 'bg-fadeGreen' : '' }}"
            >
              <span
                aria-hidden="true"
                class="p-2 transition-colors rounded-lg"
              >
              <i class="fa-solid fa-calendar-week"></i>
              </span>
              <span>Weekly Task</span>
            </a>
            <a
              href="#"
              class="flex items-center space-x-2 text-white rounded-lg "
            >
              <span
                aria-hidden="true"
                class="p-2 transition-colors rounded-lg"
              >
              <i class="fa-solid fa-calendar-days"></i>
              </span>
              <span>Monthly Task</span>
            </a>
          </div>
          
        </nav>
        <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-10">
          <div class="w-full flex justify-between items-center pl-2"><h2 class="text-lg text-white font-semibold">Notifications</h2>
            
          </div> 
        </section> 

        </div>
        <div
          x-transition:enter="transform transition-transform duration-300"
          x-transition:enter-start="-translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transform transition-transform duration-300"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="-translate-x-full"
          x-show="isSidebarOpen"
           class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 border-0 sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-64 md:hidden text-left"
        >
          <nav x-show="currentSidebarTab == 'slide'" aria-label="Main" class="flex flex-col h-full">
            <div class="flex flex-col flex-1 space-y-4 px-2">
              <!-- Menu button -->
              <div class="h-fit">
                <button onclick="toggleAccordion(1001)" class="flex justify-start py-5 text-slate-800 text-left w-0">
                  <span class="flex flex-row">
                    <button onclick="toggleAccordion(1001)"
                    class="px-4 py-2 flex justify-between items-center align-middle text-left transition-colors rounded-lg hover:text-white focus:outline-none w-full {{ Request::is('today-task*') ? 'bg-fadeGreen' : '' }}"                  >
                    <div><i class="fa-solid fa-calendar-check w-6 text-2xl mr-2"></i>
                      <span>Tasks</span></div>
                    <span id="icon-1001" class="text-white transition-transform duration-300 ps-2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                      </svg>
                    </span>
                  </button>
                </span>
              </button>

                <div id="content-1001" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out ">
                    <div>
                      <div class="flex-1 px-4 space-y-1 hover:overflow-auto pt-4">
                        <a href="/today-task" class="flex items-center w-full space-x-2 text-white rounded-lg {{ Request::is('today-task*') ? 'bg-fadeGreen' : '' }}">
                          <span aria-hidden="true" class="p-2 rounded-lg">
                            <i class="fa-solid fa-calendar-day"></i>
                          </span>
                          <span>Today Task</span>
                        </a>
                        <a
                          href="#"
                          class="flex items-center space-x-2 text-white rounded-lg {{ Request::is('weekly-task*') ? 'bg-fadeGreen' : '' }}"
                        >
                          <span
                            aria-hidden="true"
                            class="p-2 transition-colors rounded-lg"
                          >
                          <i class="fa-solid fa-calendar-week"></i>
                          </span>
                          <span>Weekly Task</span>
                        </a>
                        <a
                          href="#"
                          class="flex items-center space-x-2 text-white rounded-lg "
                        >
                          <span
                            aria-hidden="true"
                            class="p-2 transition-colors rounded-lg"
                          >
                          <i class="fa-solid fa-calendar-days"></i>
                          </span>
                          <span>Monthly Task</span>
                        </a>
                      </div>
                    </div>
                </div>
              </div>
              <script>
                function toggleAccordion(index) {
                  const content = document.getElementById(`content-${index}`);
                  const icon = document.getElementById(`icon-${index}`);
               
                  // SVG for Minus icon
                  const minusSVG = `
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                      <path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z" />
                    </svg>
                  `;
               
                  // SVG for Plus icon
                  const plusSVG = `
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                      <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                  `;
               
                  // Toggle the content's max-height for smooth opening and closing
                  if (content.style.maxHeight && content.style.maxHeight !== '0px') {
                    content.style.maxHeight = '0';
                    icon.innerHTML = plusSVG;
                  } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.innerHTML = minusSVG;
                  }
                }
              </script>
              
              
              <!-- Challenge button -->  
              <a href="/challenge" class="p-0 m-0">
                  <button
                class="w-full text-left px-4 py-2 transition-colors rounded-lg  hover:text-white focus:outline-none {{ Request::is('challenge*') ? 'bg-fadeGreen' : '' }}"
              >
                <i class="fa-solid fa-cubes-stacked w-6 text-2xl mr-2 "></i>
                <span>Challenge</span>
              </button>
              </a>
              
              {{-- leaderboard button --}}
              <a href="/leaderboard" class="p-0 m-0">
              <button
                class="w-full text-left px-4 py-2 transition-colors rounded-lg hover:text-white focus:outline-none {{ Request::is('leaderboard*') ? 'bg-fadeGreen' : '' }}"
              >
                <i class="fa-solid fa-chart-simple w-6 text-2xl mr-2"></i>
                <span>Leaderboard</span>
              </button>
              </a>
              {{-- Volunteer button --}}
              <a href="/volunteer" class="p-0 m-0">
              <button
                class="w-full text-left px-4 py-2 transition-colors rounded-lg  hover:text-white focus:outline-none  {{ Request::is('volunteer*') ? 'bg-fadeGreen' : '' }}"
              >
                
                <i class="fa-solid fa-puzzle-piece w-6 text-2xl mr-2"></i>
                <span>Volunteer</span>
              </button>
              </a>
              <!-- Notifications button -->
              <button
                @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab2') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab2'"
                class="w-full text-left px-4 py-2 transition-colors rounded-lg  hover:text-white focus:outline-none"
              >
                <i class="fa-solid fa-bell w-6 text-2xl mr-2"></i>
                <span>Notifications</span>
              </button>
            </div>
            
          </nav>

          <section x-show="currentSidebarTab == 'notificationsTab2'" class="px-4 py-10 static lg:hidden">
            <div class="w-full flex justify-between items-center pl-2"><h2 class="text-lg text-white font-semibold">Notifications</h2>
              <button
              @click="
              if (currentSidebarTab === 'notificationsTab2') {
                currentSidebarTab = 'slide';
              } else {
                currentSidebarTab = 'notificationsTab2';
              }
              isSidebarOpen = true;
            "
                  class="w-full text-right px-4 py-2 transition-colors rounded-lg  hover:text-white focus:outline-none"
                >
                <i class="fa-solid fa-xmark"></i>
                </button>
            </div> 
          </section> 
        </div>
        
      </div>