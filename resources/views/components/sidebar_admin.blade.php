<nav class="flex">
    {{-- SIDEBAR --}}
    <div class="sidebar bg-[#50623A] h-auto min-h-screen p-5 pt-8 relative">
        {{-- Tombol Arrow --}}
        <span class="ikon-min material-symbols-outlined bg-[#fafafa] rounded-full absolute -right-4 top-9 border-4 border-[#50623A] cursor-pointer" style="font-size: 38px">
            chevron_left
        </span>
        {{-- End Tombol Arrow --}}

        {{-- Logo --}}
        <div class="flex w-auto h-24 items-center flex-col logo-eco -ml-[20px]">
            <a href="/">
                <img src="{{asset('images/logo.png')}}" class="h-12" alt="logo-eco-peduli">
            </a>
            
            <p class="logo-text mt-2 font-ComicLemon text-2xl whitespace-nowrap text-white">EcoPeduli</p>
        </div>
        {{-- End Logo --}}

        {{-- Opsi Atas --}}
        <ul class="pt-2">
            <div class="text-navigasi-1 text-samping pt-4 text-slate-300 text-opacity-35 text-xl font-bold -mb-2">
                Navigasi Utama
            </div>
            <li class="{{ request()->is('admin') ? 'text-secondary' : 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-2">
                <a href="/admin">
                    <span class="material-symbols-outlined dashboard">
                        dashboard
                    </span>
                </a>
                <a href="/admin" class="text-dashboard -mt-1.5">
                    Dashboard
                </a>
            </li>
            <li class="{{ request()->is('admin/penukaran_sampah') ? 'text-secondary': 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-1 w-[300px]">
                <a href="/admin/penukaran_sampah">
                    <span class="material-symbols-outlined penukaran">
                        currency_exchange
                    </span>
                </a>
                <a href="/admin/penukaran_sampah" class="text-penukaran -mt-1.5">Penukaran Sampah</a>
            </li>
            <li class="{{ request()->is('admin/penukaran_poin') ? 'text-secondary': 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-1">
                <a href="/admin/penukaran_poin">
                    <span class="material-symbols-outlined jadwal">
                        today
                    </span>
                </a>
                <a href="/admin/penukaran_poin" class="text-jadwal -mt-1.5">Penukaran Poin</a>
            </li>
        </ul>
        {{-- End Opsi Atas --}}

        {{-- Opsi Bawah --}}
        <ul class="pt-2">
            <div class="text-navigasi-2 pt-4 text-slate-300 text-opacity-35 text-xl font-bold -mb-2 text-samping">
                Pengaturan Akun
            </div>
            <li class="{{ request()->is('/') ? 'text-secondary': 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-2">
                <a href="/">
                    <span class="material-symbols-outlined beranda">
                        home
                    </span>
                </a>
                <a href="/" class="text-beranda -mt-1.5">Beranda</a>
            </li>
            <li class="{{ request()->is('login') ? 'text-secondary': 'text-white hover:text-lime-300' }} flex items-center gap-x-4 p-2 font-bold text-xl mt-1" id="logoutButton">
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