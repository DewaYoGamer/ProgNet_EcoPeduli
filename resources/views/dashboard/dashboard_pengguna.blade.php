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

        .logo-text {
            transition: opacity 0.3s ease-in-out;
        }

        .logo-text.disappear {
            transition: opacity 0.3s ease-in-out;
            opacity: 0;
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
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl ">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                    <a href="#">Dashboard</a>
                </li>
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl ">
                    <span class="material-symbols-outlined">
                        currency_exchange
                    </span>
                    <a href="#">Penukaran</a>
                </li>
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl ">
                    <span class="material-symbols-outlined">
                        today
                    </span>
                    <a href="#">Jadwal</a>
                </li>
            </ul>
            {{-- End Opsi Atas --}}

            {{-- Opsi Bawah --}}
            <ul class="pt-2">
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl ">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                    <a href="#">Profil Pengguna</a>
                </li>
                <li class="{{ request()->is('') ? 'text-secondary': 'text-white hover:text-lime-300 rounded-md mt-2' }} flex items-center gap-x-4 p-2 font-bold text-xl ">
                    <a href="#">Keluar</a>
                </li>

                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="bg-lime-500 text-center p-3 rounded-[8px] text-white font-bold text-2xl mt-6 -mb-6">
                        Logout
                    </button>
                </form>
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
            var logo = document.querySelector('.logo-text');
            sidebar.classList.toggle('collapsed');
            ikon.classList.toggle('rotate');
            logo.classList.toggle('disappear');
        });
    </script>
</body>
</html>