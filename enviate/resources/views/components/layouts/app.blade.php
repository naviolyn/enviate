<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @livewireStyles

        <title>Enviate{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://kit.fontawesome.com/9db9644a22.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    </head>
    <body>
        <div x-data="setup()" @resize.window="watchScreen()">
            <div class="flex h-screen antialiased text-gray-900 dark:bg-dark dark:text-light">
              <!-- Sidebar -->
              @livewire('sidebar')
              <div class="w-full h-full">
                  <main class="px-4 py-8 h-full">
                  {{ $slot }}
                  </main>
              </div>
            </div>            
        </div>

              

        
        

    </body>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script>
        const setup = () => {
            return {
            isSidebarOpen: false,
            currentSidebarTab: null,
            isSettingsPanelOpen: false,
            isSubHeaderOpen: false,
            watchScreen() {
                if (window.innerWidth <= 1024) {
                this.isSidebarOpen = false
                }
            },
        }
      }
    </script>
</html>
