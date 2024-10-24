<nav class="flex">
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
            <li class="{{ request()->is('pengguna') ? 'text-secondary' : 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-2">
                <span class="material-symbols-outlined dashboard">
                    dashboard
                </span>
                <a href="/pengguna" class="text-dashboard">Dashboard</a>
            </li>
            <li class="{{ request()->is('pengguna/penukaran_poin') ? 'text-secondary': 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-2">
                <span class="material-symbols-outlined penukaran">
                    currency_exchange
                </span>
                <a href="/pengguna/penukaran_poin" class="text-penukaran">Penukaran</a>
            </li>
            <li class="{{ request()->is('pengguna/jadwal') ? 'text-secondary': 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-2">
                <span class="material-symbols-outlined jadwal">
                    today
                </span>
                <a href="/pengguna/jadwal" class="text-jadwal">Jadwal</a>
            </li>
        </ul>
        {{-- End Opsi Atas --}}

        {{-- Opsi Bawah --}}
        <ul class="pt-2">
            <div class="text-navigasi-2 pt-4 text-slate-300 text-opacity-35 text-xl font-bold -mb-2 text-samping">
                Pengaturan Akun
            </div>
            <li class="{{ request()->is('pengguna/profil') ? 'text-secondary': 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-2">
                <span class="material-symbols-outlined profil">
                    person
                </span>
                <a href="/pengguna/profil" class="text-profil">Profil Pengguna</a>
            </li>
            <li class="{{ request()->is('/') ? 'text-secondary': 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-2">
                <span class="material-symbols-outlined beranda">
                    home
                </span>
                <a href="/" class="text-beranda">Beranda</a>
            </li>
            <li class="{{ request()->is('login') ? 'text-secondary': 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-2" id="logoutButton">
                <span class="material-symbols-outlined logout">
                    logout
                </span>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="text-logout" id="logoutButton">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
        {{-- End Opsi Bawah --}}
    </div>
    {{-- END SIDEBAR --}}
</nav>