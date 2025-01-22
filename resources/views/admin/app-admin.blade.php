<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Enviate</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9db9644a22.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  </head>

  <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    @include('admin.components.sidebar')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        @include('admin.components.navabr')
        <div class="w-full px-6 py-6 mx-auto">
    @yield('content')
    <footer class="pt-4">
        <div class="w-full px-6 mx-auto">
          <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
            <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
              <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                ©
                <script>
                  document.write(new Date().getFullYear() + " ");
                </script>
              </div>
            </div>
            <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
              <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                <li class="nav-item">
                  <a href="https://github.com/naviolyn/enviate" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">SheTech</a>
                </li>
                <li class="nav-item">
                  <a href="https://github.com/naviolyn/enviate" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">About Us</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
    </main>
    
          <!-- plugin for charts  -->
          <script src="{{asset('assets/js/plugins/chartjs.min.js') }}" async></script>
          <!-- plugin for scrollbar  -->
          <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
          <!-- github button -->
          <script async defer src="https://buttons.github.io/buttons.js"></script>
          <!-- main script file  -->
          <script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>    <!--   Core JS Files   -->
          <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
          <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
          <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
          <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
          <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
          <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  </body>

  </html>