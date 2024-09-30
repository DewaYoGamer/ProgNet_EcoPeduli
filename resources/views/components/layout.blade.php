<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Eco Peduli' }}</title>
</head>
<body>
    <x-navbar></x-navbar>
    <div class="mt-16 p-4">
        {{ $slot }}
    </div>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('navbar-sticky');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
