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
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background"></div>
    <div class="h-screen flex flex-col">
        @include('components.navbar')
        <div class="h-full">
            @yield('content')
        </div>
    </div>        

</body>
</html>

<style>
    html, body {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    box-sizing: border-box; /* Standardize box model */
    overflow-x: hidden;
}
    .background {
        position: absolute;
        top: 0;
        left: 0;
        width: 110%;
        height: 100%;
        background: 
        url('{{ asset('img/bg.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: blur(3px); /* Only blur the background */
        z-index: -1; /* Send it behind everything */
        margin: -8px;
        overflow: hidden;
    }
    .background::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6); /* Darken effect */
        z-index: 1;
    }
    /* Content styles */
    .content {
        position: relative; /* Keep content unaffected by background styling */
        z-index: 2; /* Ensure content appears above background */
        color: white;
        font-size: 2rem;
        text-align: center;
    }
</style>