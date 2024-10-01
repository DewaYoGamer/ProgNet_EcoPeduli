<nav class="bg-primary fixed w-full h-20 z-20 top-0 start-0">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4 lg:ml-12 lg:mr-12 mt-1">
        <a href="/" class="flex items-center space-x-3">
            <img src="{{asset('images/logo.png')}}" class="h-9" alt="Flowbite Logo">
            <span class="font-ComicLemon text-2xl self-center whitespace-nowrap text-white">EcoPeduli</span>
        </a>
        <div class="flex items-center space-x-3 lg:order-2">
            <a href="/login" type="button" class="text-primary bg-white hover:bg-gray-200 font-bold rounded-lg text-sm px-4 py-2 text-center">Masuk</a>
            <button id="menu-toggle" data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg lg:hidden" aria-controls="navbar-sticky" aria-expanded="false">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="hidden w-full lg:flex lg:items-center lg:space-x-8 lg:w-auto lg:ml-auto lg:mr-8" id="navbar-sticky">
            <ul class="flex flex-col lg:flex-row p-4 lg:p-0 mt-4 lg:mt-0 font-medium rounded-lg bg-white lg:bg-transparent lg:space-x-8">
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'lg:text-secondary bg-lime-600 text-white' : 'lg:text-white lg:hover:bg-transparent lg:hover:text-lime-300 hover:bg-gray-200 text-primary' }} block py-2 px-3 rounded lg:bg-transparent lg:p-0 font-bold">Beranda</a>
                </li>
                <li>
                    <a href="/schedule" class="{{ request()->is('schedule') ? 'lg:text-secondary bg-lime-600 text-white' : 'lg:text-white lg:hover:bg-transparent lg:hover:text-lime-300 hover:bg-gray-200 text-primary' }} block py-2 px-3 rounded lg:bg-transparent lg:p-0 font-bold">Jadwal</a>
                </li>
                <li>
                    <a href="/educate" class="{{ request()->is('educate') ? 'lg:text-secondary bg-lime-600 text-white' : 'lg:text-white lg:hover:bg-transparent lg:hover:text-lime-300 hover:bg-gray-200 text-primary' }} block py-2 px-3 rounded lg:bg-transparent lg:p-0 font-bold">Edukasi</a>
                </li>
                <li>
                    <a href="/exchange" class="{{ request()->is('exchange') ? 'lg:text-secondary bg-lime-600 text-white' : 'lg:text-white lg:hover:bg-transparent lg:hover:text-lime-300 hover:bg-gray-200 text-primary' }} block py-2 px-3 rounded lg:bg-transparent lg:p-0 font-bold">Penukaran</a>
                </li>
                <li>
                    <a href="/about" class="{{ request()->is('about') ? 'lg:text-secondary bg-lime-600 text-white' : 'lg:text-white lg:hover:bg-transparent lg:hover:text-lime-300 hover:bg-gray-200 text-primary' }} block py-2 px-3 rounded lg:bg-transparent lg:p-0 font-bold">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
