<x-layout_dashboard>
    <x-slot name="title">Dashboard Pengguna | Eco Peduli</x-slot>

    <div class="w-full h-full bg-white shadow-md overflow-hidden">
        <!-- Header -->

        <div class="w-full h-[20rem] text-center bg-gray-300 p-4 text-white flex items-center justify-between">
            <div class="flex flex-row">
                <div class="w-[26rem] h-[18rem] mr-20 text-left bg-yellow-500 p-6 text-white">
                    <img src="{{ asset('images/yoga.jpg') }}" class="w-20 h-20 rounded-full object-cover">
                    <p class="font-semibold mt-10 flex flex-col space-y-4">@wiraguna
                        <br>
                        <span class="font-normal">Agus Arya</span>
                    </p>
                </div>
                <div class="w-[45rem] h-[18rem] text-center bg-yellow-500 p-4 text-white flex items-center justify-center">
                    <p class="font-semibold">@wiraguna</p>
                    <p class="text-sm">Agus Arya</p>
                </div>
            </div>
        </div>

        <!-- Body Content -->
        <div class="p-6 text-left">
            <h2 class="text-2xl font-bold mb-4">INFORMASI TERPADU</h2>

            <div class="mb-4">
                <p class="font-semibold">Kode Unik Yang Dimiliki:</p>
                <p class="text-red-500">-</p>
            </div>

            <div>
                <p class="font-semibold">Jumlah Penukaran:</p>
                <p class="text-red-500">-</p>
            </div>
        </div>
    </div>
</x-layout_dashboard>
