<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="https://kit.fontawesome.com/9db9644a22.js" crossorigin="anonymous"></script>
  <title>Enviate</title>
  <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>
<body>
    <div class="h-screen flex flex-col">
        @include('components.navbar')
        <div class="h-full">
            @yield('content')
        </div>
    </div>
            
            

</body>
</html>