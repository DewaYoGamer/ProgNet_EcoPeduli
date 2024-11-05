<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Eco Peduli' }}</title>
    {{-- Link Section --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

    {{-- CSS Section --}}
    <style>
        /* Sidebar & Transition Styling */
        .sidebar { width: 288px; transition: width 0.5s; }
        .sidebar.collapsed { width: 132px; }
        .ikon-min { transition: transform 0.5s ease-in-out; }
        .ikon-min.rotate { transform: rotate(180deg); }
        .logo-text, .text-navigasi-1, .text-navigasi-2, .text-dashboard, .text-penukaran, .text-jadwal, .text-profil, .text-beranda, .text-logout {
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }
        .disappear { opacity: 0; height: 0; visibility: hidden; }
        .adjusting { font-size: 42px; transition: font-size 0.5s ease; }
        .cropper-image { max-width: 70vw; max-height: 60vh; }
    </style>

    {{-- Script Section --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
</head>
<body>
    <div class="flex flex-row">
        <x-sidebar></x-sidebar>
        {{ $slot }}
    </div>

    {{-- JavaScript Section --}}
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

        document.getElementById('logoutButton').addEventListener('click', function(event) {
            if (!confirm('Apakah Anda yakin ingin logout?')) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
