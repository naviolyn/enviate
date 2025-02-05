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
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background overflow-hidden"></div>
    <div class="h-screen flex flex-col">
        @include('components.layouts.navbar')
        <div class="h-full">
            @yield('content')
            @include('components.layouts.footer')
        </div>
        
    </div>    
        
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
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

html {
    overflow: hidden;
    ::-webkit-scrollbar {
    width: 0.3rem; /* Equivalent to w-2 in Tailwind */
  }
  
  /* Scrollbar track */
  ::-webkit-scrollbar-track {
    border-radius: 9999px; /* Equivalent to rounded-full */
    background-color: #f3f4f600; /* Equivalent to bg-gray-100 */
    margin-block: 10px;
  }
  
  /* Scrollbar thumb */
  ::-webkit-scrollbar-thumb {
    border-radius: 9999px; /* Equivalent to rounded-full */
    background-color: #d1dbd8a7; /* Equivalent to bg-gray-300 */
    height: 10px;
  }
}
    .background {
        position: absolute;
        top: 0;
        left: 0;
        width: 130vw;
        height: 110vh;
        background: 
        url('{{ asset('img/bg.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: blur(3px); /* Only blur the background */
        z-index: -1; /* Send it behind everything */
        margin: -10px;
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