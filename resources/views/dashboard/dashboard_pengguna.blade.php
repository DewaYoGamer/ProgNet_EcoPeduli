<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="flex">
        {{-- SIDEBAR --}}
        <div class="bg-[#50623A] h-screen p-5 pt-5 z-[999] w-[300px]">
            {{-- Logo --}}
            <div class="flex w-auto h-32 p-3 items-center flex-col">
                <img src="{{asset('images/logo.png')}}" class="h-16" alt="">
                <p class="mt-2 font-ComicLemon text-3xl whitespace-nowrap text-white">EcoPeduli</p>
            </div>
            {{-- End Logo --}}

            {{-- Opsi Atas --}}
            <div class="flex flex-col w-auto h-56 mt-10 p-5 -ml-3">
                <ul class="flex flex-col space-y-4">
                    <li>
                        <a href="#" class="{{ request()->is('pengguna') ? 'text-secondary bg-lime-600 ': 'text-white hover:bg-transparent hover:text-lime-300 hover:bg-gray-200' }} block py-2 px-3 rounded bg-transparent p-0 font-bold text-2xl">Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="{{ request()->is('') ? 'text-secondary bg-lime-600 ': 'text-white hover:bg-transparent lg:hover:text-lime-300 hover:bg-gray-200' }} block py-2 px-3 rounded bg-transparent p-0 font-bold text-xl -mt-3 ">Penukaran Poin</a>
                    </li>
                    <li>
                        <a href="#" class="{{ request()->is('') ? 'text-secondary bg-lime-600 ': 'text-white lg:hover:bg-transparent lg:hover:text-lime-300 hover:bg-gray-200' }} block py-2 px-3 rounded bg-transparent p-0 font-bold text-xl -mt-3 w-[500px]">Jadwal Pengambilan</a>
                    </li>
                </ul>
            </div>
            {{-- End Opsi Atas --}}

            {{-- Opsi Bawah --}}
            <div class="flex flex-col w-auto h-64 p-5 -ml-3">
                <ul class="flex flex-col space-y-3">
                    <p class="text-[#fafafa] font-bold text-xl -ml-2">Pengaturan Akun</p>
                    <li>
                        <a href="#" class="{{ request()->is('') ? 'text-secondary bg-lime-600 ': 'text-white hover:bg-transparent lg:hover:text-lime-300 hover:bg-gray-200' }} block py-2 px-3 rounded bg-transparent p-0 font-bold text-xl ">Profil Pengguna</a>
                    </li>
                    <li>
                        <a href="#" class="{{ request()->is('') ? 'text-secondary bg-lime-600 ': 'text-white lg:hover:bg-transparent lg:hover:text-lime-300 hover:bg-gray-200' }} block py-2 px-3 rounded bg-transparent p-0 font-bold text-xl -mt-3">Logout</a>
                    </li>
                </ul>
            </div>
            {{-- End Opsi Bawah --}}
        </div>
        {{-- END SIDEBAR --}}

        {{-- Konten Atas --}}
        <nav class="bg-[#789461] fixed w-full h-20 z-20 top-0 start-0">
            
        </nav>

        <div class="flex flex-col space-y-5 p-5 w-[640px] h-[320px] mt-[125px] ml-[50px] bg-[#f1cc1b] rounded-[20px] justify-center">
            <img src="{{asset('images/gambar_fotoprofil_rz.png')}}" class="max-w-[160px]" alt="">
            <div class="text-[#fafafa] font-bold text-3xl">
                <p>@username</p>
            </div>
            <div class="text-[#fafafa] font-bold text-4xl">
                <p class="-mt-2">Nama Lengkap</p>
            </div>
        </div>

        <div class="flex flex-col space-y-5 p-5 w-[640px] h-[320px] mt-[125px] ml-[200px] bg-[#f1cc1b] rounded-[20px] justify-center items-center">
            <div class="text-[#fafafa] font-bold text-3xl">
                <p>Rabu, 02 Oktober 2024</p>
            </div>
            <div class="text-[#fafafa] font-bold text-4xl">
                <p class="-mt-2">Kumpulkan Sampah: </p>
            </div>
            <div class="text-[#fafafa] font-bold text-4xl">
                <p class="-mt-2">Daur Ulang </p>
            </div>
        </div>
        {{-- End Konten Atas --}}
    </div>
</body>
</html>