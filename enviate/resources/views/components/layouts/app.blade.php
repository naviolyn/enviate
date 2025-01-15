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
  <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    </head>
    <body>
                @livewire('sidebar')

        {{ $slot }}
        

    </body>
    @livewireScripts

</html>
