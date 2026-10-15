<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presto.it</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- @livewireStyles -->
</head>
<body>
    <x-navbar />
    <div class="min-vh-100">
        {{ $slot }}
    </div>
    <x-footer />
    <!-- @livewireScripts -->
</body>
</html>