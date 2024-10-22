<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dashboard Pengguna | Eco Peduli</title>
    {{-- LINK KE GOOGLE ICON --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    {{-- CSS INFILE --}}
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
            visibility: hidden;
        }

        /* Ukuran font ikon yang disesuaikan */
        .adjusting {
            font-size: 42px;
            transition: font-size 0.5s ease;
        }
    </style>
</head>
<body>
    <div class="flex">
        {{-- SIDEBAR --}}
        <div class="sidebar bg-[#50623A] h-screen p-5 pt-8 relative">
            {{-- Tombol Arrow --}}
            <span class="ikon-min material-symbols-outlined bg-[#fafafa] rounded-full absolute -right-4 top-9 border-4 border-[#50623A] cursor-pointer" style="font-size: 38px">
                chevron_left
            </span>
            {{-- End Tombol Arrow --}}

            {{-- Logo --}}
            <div class="flex w-auto h-24 items-center flex-col">
                <img src="{{asset('images/logo.png')}}" class="h-12" alt="">
                <p class="logo-text mt-2 font-ComicLemon text-2xl whitespace-nowrap text-white">EcoPeduli</p>
            </div>
            {{-- End Logo --}}

            {{-- Opsi Atas --}}
            <ul class="pt-2">
                <div class="text-navigasi-1 text-samping pt-4 text-slate-300 text-opacity-35 text-xl font-bold -mb-2">
                    Navigasi Utama
                </div>
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl">
                    <span class="material-symbols-outlined block float-left dashboard">
                        dashboard
                    </span>
                    <a href="#" class="text-dashboard">Dashboard</a>
                </li>
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl">
                    <span class="material-symbols-outlined penukaran">
                        currency_exchange
                    </span>
                    <a href="#" class="text-penukaran">Penukaran</a>
                </li>
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl">
                    <span class="material-symbols-outlined jadwal">
                        today
                    </span>
                    <a href="#" class="text-jadwal">Jadwal</a>
                </li>
            </ul>
            {{-- End Opsi Atas --}}

            {{-- Opsi Bawah --}}
            <ul class="pt-2">
                <div class="text-navigasi-2 pt-4 text-slate-300 text-opacity-35 text-xl font-bold -mb-2 text-samping">
                    Pengaturan Akun
                </div>
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl">
                    <span class="material-symbols-outlined profil">
                        person
                    </span>
                    <a href="#" class="text-profil">Profil Pengguna</a>
                </li>
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl">
                    <span class="material-symbols-outlined beranda">
                        home
                    </span>
                    <a href="/" class="text-beranda">Beranda</a>
                </li>
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl">
                    <span class="material-symbols-outlined logout">
                        logout
                    </span>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="text-logout">
                            Logout
                        </button>
                    </form>
                </li>

            </ul>
            {{-- End Opsi Bawah --}}
        </div>
        {{-- END SIDEBAR --}}

        {{-- KONTEN --}}
        <div class="text-5xl">
            Main Page
        </div>
        {{-- END KONTEN --}}
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