<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Eco Peduli' }}</title>
    {{-- Link Section --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    {{-- CSS Section --}}
    <style>
        .sidebar {
            width: 288px; /* Default size */
            transition: width 0.5s;
        }

        .sidebar.collapsed {
            width: 132px; /* Reduced size */
        }

        .ikon-min{
            transition: transform 0.5s ease-in-out;
        }

        .ikon-min.rotate{
            transition: transform 0.5s ease-in-out;
            transform: rotate(180deg);
        }

        /* Transisi untuk teks dan elemen yang menghilang */
        .logo-text,
        .text-navigasi-1,
        .text-navigasi-2,
        .text-dashboard,
        .text-penukaran,
        .text-jadwal,
        .text-profil,
        .text-beranda,
        .text-logout {
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }

        .disappear {
            opacity: 0;
            height: 0;
            visibility: hidden;
        }

        /* Ukuran font ikon yang disesuaikan */
        .adjusting {
            font-size: 42px;
            transition: font-size 0.5s ease;
        }
    </style>

    {{-- Script Section --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body>
    <div class="flex flex-row">
        <x-sidebar></x-sidebar>
        {{ $slot }}
    </div>
    {{-- KODE JS --}}
    <script>
        document.querySelector('.ikon-min').addEventListener('click', function() {
            var sidebar = document.querySelector('.sidebar');
            var ikon = document.querySelector('.ikon-min');
            var elementsToToggle = [
                document.querySelector('.logo-text'),
                document.querySelector('.text-navigasi-1'),
                document.querySelector('.text-navigasi-2'),
                document.querySelector('.text-dashboard'),
                document.querySelector('.text-penukaran'),
                document.querySelector('.text-jadwal'),
                document.querySelector('.text-profil'),
                document.querySelector('.text-beranda'),
                document.querySelector('.text-logout')
            ];
            var iconsToResize = [
                document.querySelector('.dashboard'),
                document.querySelector('.penukaran'),
                document.querySelector('.jadwal'),
                document.querySelector('.profil'),
                document.querySelector('.beranda'),
                document.querySelector('.logout')
            ];

            sidebar.classList.toggle('collapsed');
            ikon.classList.toggle('rotate');

            elementsToToggle.forEach(function(element) {
                element.classList.toggle('disappear');
            });

            iconsToResize.forEach(function(icon) {
                icon.classList.toggle('adjusting');
            });
        });
    </script>
</body>
</html>
