<nav class="bg-primary fixed w-full z-20 top-0 start-0 border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 flex-shrink-0">
            <img src="{{asset('images/logo.png')}}" class="h-9" alt="Flowbite Logo">
            <span class="font-ComicLemon text-2xl self-center whitespace-nowrap text-white">EcoPeduli</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0">
            <a href="{{ route('login') }}" class="text-black bg-white hover:bg-gray-200 font-medium rounded-lg text-sm px-4 py-2 text-center">Masuk</a>
            <button id="menu-toggle" data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="flex-grow items-center justify-center hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 md:-ml-32 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-[#50623A]">
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'md:text-secondary bg-lime-600 text-white' : 'md:text-white md:hover:bg-transparent md:hover:text-lime-300 hover:bg-gray-100 text-black' }} block py-2 px-3 rounded md:bg-transparent md:p-0">Beranda</a>
                </li>
                <li>
                    <a href="/schedule" class="{{ request()->is('schedule') ? 'md:text-secondary bg-lime-600 text-white' : 'md:text-white md:hover:bg-transparent md:hover:text-lime-300 hover:bg-gray-100 text-black' }} block py-2 px-3 rounded md:bg-transparent md:p-0">Jadwal</a>
                </li>
                <li>
                    <a href="/educate" class="{{ request()->is('educate') ? 'md:text-secondary bg-lime-600 text-white' : 'md:text-white md:hover:bg-transparent md:hover:text-lime-300 hover:bg-gray-100 text-black' }} block py-2 px-3 rounded md:bg-transparent md:p-0">Edukasi</a>
                </li>
                <li>
                    <a href="/exchange" class="{{ request()->is('exchange') ? 'md:text-secondary bg-lime-600 text-white' : 'md:text-white md:hover:bg-transparent md:hover:text-lime-300 hover:bg-gray-100 text-black' }} block py-2 px-3 rounded md:bg-transparent md:p-0">Penukaran</a>
                </li>
                <li>
                    <a href="/about" class="{{ request()->is('about') ? 'md:text-secondary bg-lime-600 text-white' : 'md:text-white md:hover:bg-transparent md:hover:text-lime-300 hover:bg-gray-100 text-black' }} block py-2 px-3 rounded md:bg-transparent md:p-0">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
