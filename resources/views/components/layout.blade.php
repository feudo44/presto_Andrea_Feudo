<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presto.it</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <x-navbar />
    <div class="container mt-3">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
            </div>
        @endif

        @if (session('errorMessage'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('errorMessage') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
            </div>
        @endif
    </div>
    <div class="min-vh-100">
        {{ $slot }}
    </div>
    <x-footer />
    @livewireScripts
</body>

</html>