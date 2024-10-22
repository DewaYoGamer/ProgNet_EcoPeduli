<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Eco Peduli' }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <x-navbar></x-navbar>
    <div class="mt-20">
        {{ $slot }}
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleButton = document.getElementById('menu-toggle');
            const navbar = document.getElementById('navbar-sticky');

            toggleButton.addEventListener('click', function () {
                navbar.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
