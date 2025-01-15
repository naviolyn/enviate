     <!-- Sidebar -->
      <div class="flex flex-shrink-0 transition-all">
        <div
          x-show="isSidebarOpen"
          @click="isSidebarOpen = false"
          class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden"
        ></div>
        <div x-show="isSidebarOpen" class="fixed inset-y-0 z-10 w-16 bg-lightGreen"></div>
  
        <!-- Mobile bottom bar -->
        <nav
          aria-label="Options"
          class="fixed inset-x-0 bottom-0 flex flex-row-reverse items-center justify-between px-4 py-2 bg-white sm:hidden shadow-t rounded-t-3xl"
        >
          <!-- Menu button -->
          <button
            @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
            class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none"
            :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-indigo-600' : 'text-gray-500 '"
          >
            <span class="sr-only">Toggle sidebar</span>
            <svg
              aria-hidden="true"
              class="w-6 h-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
          </button>
  
          <!-- Logo -->
          <a href="#">
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
                src="{{ asset('img/logo.png') }}"
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
              class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
              role="menu"
              aria-orientation="vertical"
              aria-label="user menu"
            >
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                >Your Profile</a
              >
  
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
  
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
            </div>
          </div>
        </nav>
  
        <!-- Left mini bar -->
        <nav
          aria-label="Options"
          class="z-20 flex-col items-center flex-shrink-0 hidden w-16 py-4 bg-white border-r-2 border-0 sm:flex rounded-tr-3xl rounded-br-3xl bg-gradient-mediumGreen" style="border: 0px solid white"
        >
          <!-- Logo -->
          <div class="flex-shrink-0 py-4">
            <a href="#">
              <img
                class="w-10 h-auto"
                src="{{ asset('img/logo.png') }}"
                alt="K-UI"
              />
            </a>
          </div>
          <div class="flex flex-col items-center flex-1 p-2 space-y-4">
            <!-- Menu button -->
            <button
              @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
              class="p-2 transition-colors rounded-lg hover:bg-emerald-600 hover:text-white focus:outline-none"
              :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-emerald-600' : 'text-white'"
            >
              <span class="sr-only">Toggle sidebar</span>
              <i class="fa-solid fa-calendar-check w-6 text-2xl"></i>
            </button>
            <!-- Challenge button -->  
            <a href="/challenge" class="p-0 m-0">
                <button
              class="p-2 transition-colors rounded-lg hover:bg-emerald-600 hover:text-white focus:outline-none"
              :class="(isSidebarOpen && currentSidebarTab == 'challengeTab') ? 'text-white bg-emerald-600' : 'text-white'"
            >
              <span class="sr-only">Toggle challenge panel</span>
              <i class="fa-solid fa-cubes-stacked w-6 text-2xl"></i>
            </button>
            </a>
            
            {{-- leaderboard button --}}
            <button
              @click="(isSidebarOpen && currentSidebarTab == 'leaderboardTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'leaderboardTab'"
              class="p-2 transition-colors rounded-lg hover:bg-emerald-600 hover:text-white focus:outline-none"
              :class="(isSidebarOpen && currentSidebarTab == 'leaderboardTab') ? 'text-white bg-emerald-600' : 'text-white'"
            >
              <span class="sr-only">Toggle challenge panel</span>
              <i class="fa-solid fa-chart-simple w-6 text-2xl"></i>
            </button>
            {{-- Volunteer button --}}
            <button
              @click="(isSidebarOpen && currentSidebarTab == volunteerTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'volunteerTab'"
              class="p-2 transition-colors rounded-lg hover:bg-emerald-600 hover:text-white focus:outline-none"
              :class="(isSidebarOpen && currentSidebarTab == 'volunteerTab') ? 'text-white bg-emerald-600' : 'text-white'"
            >
              <span class="sr-only">Toggle challenge panel</span>
              <i class="fa-solid fa-puzzle-piece w-6 text-2xl"></i>
            </button>
            <!-- Notifications button -->
            <button
              @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab'"
              class="p-2 transition-colors rounded-lg hover:bg-emerald-600 hover:text-white focus:outline-none"
              :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-indigo-600' : 'text-white'"
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
              class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
              role="menu"
              aria-orientation="vertical"
              aria-label="user menu"
            >
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                >Your Profile</a
              >
  
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
  
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
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
          class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 border-r-2 border-0 sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-64 bg-lightGreen"
        >
          <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full">
  
            <!-- Links -->
            <div class="flex-1 px-4 space-y-2 overflow-hidden hover:overflow-auto py-10">
              <a href="/today-task" class="flex items-center w-full space-x-2 text-white bg-darkGreen rounded-lg">
                <span aria-hidden="true" class="p-2 bg-darkGreen rounded-lg">
                  <i class="fa-solid fa-calendar-day"></i>
                </span>
                <span>Today Task</span>
              </a>
              <a
                href="#"
                class="flex items-center space-x-2 text-indigo-600 transition-colors rounded-lg group hover:bg-indigo-600 hover:text-white "
              >
                <span
                  aria-hidden="true"
                  class="p-2 transition-colors rounded-lg group-hover:bg-indigo-700 group-hover:text-white"
                >
                <i class="fa-solid fa-calendar-week"></i>
                </span>
                <span>Weekly Task</span>
              </a>
              <a
                href="#"
                class="flex items-center space-x-2 text-indigo-600 transition-colors rounded-lg group hover:bg-indigo-600 hover:text-white"
              >
                <span
                  aria-hidden="true"
                  class="p-2 transition-colors rounded-lg group-hover:bg-indigo-700 group-hover:text-white"
                >
                <i class="fa-solid fa-calendar-days"></i>
                </span>
                <span>Monthly Task</span>
              </a>
  
            </div>
  
          </nav>
  
  
          <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
            <h2 class="text-xl">Notifications</h2>
          </section>
        </div>
      </div>