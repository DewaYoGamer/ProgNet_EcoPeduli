<x-layout_dashboard>
    <x-slot name="title">Dashboard Pengguna | Eco Peduli</x-slot>

    <div class="w-full h-full bg-white shadow-md overflow-hidden">
        <!-- Header -->

        <div class="w-full h-[22rem] text-center bg-gray-300 p-6 text-white flex items-center justify-center">
            <div class="flex flex-row">
                <div class="w-[26rem] h-[19rem] mr-16 text-left bg-yellow-500 p-6 text-white">
                    <div class="flex justify-center">
                        <img src="{{ asset('images/yoga.jpg') }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">
                    </div>
                    <div class="text-left mt-3">
                        <p class="text-gray-600 text-sm font-semibold">Username</p>
                        <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-1 inline-block">
                                <p class="text-gray-800 font-medium">@wiraguna</p>
                        </div>
                        <p class="text-gray-600 text-sm font-semibold mt-4">Nama</p>
                        <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-1 inline-block">
                             <p class="text-gray-800 font-medium">Agus Arya Wiraguna</p>
                        </div>
                    </div>
                </div>
                <div class="w-[45rem] h-[19rem] text-left bg-yellow-500 p-6 text-white">
                    <div class="text-left">
                        <p class="text-white text-3xl font-semibold">Senin,</p>
                        <p class="text-white text-4xl font-semibold">24 Oktober 2024</p>
                        <p class="text-white text-3xl font-semibold mt-10">Kumpulkan Sampah:</p>
                        <p class="text-white text-4xl font-medium mt-4">Daur Ulang</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Body Content -->
        <div class="p-6">
            <h2 class="text-2xl text-center font-bold mb-10">INFORMASI TERPADU</h2>

            <div class="mb-10">
                <p class="font-semibold text-2xl">Kode Unik Yang Dimiliki:</p>
                <p class="text-red-500 text-2xl">-</p>
            </div>

            <div>
                <p class="font-semibold text-2xl">Jumlah Penukaran:</p>
                <p class="text-red-500 text-2xl">-</p>
            </div>
        </div>
    </div>
</x-layout_dashboard>
