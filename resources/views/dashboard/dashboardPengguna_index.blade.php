<x-layout_dashboard>
    <x-slot name="title">Dashboard Pengguna | Eco Peduli</x-slot>
    <div class="w-full h-full bg-white shadow-md overflow-hidden">
        <div class="w-full h-[22rem] text-center bg-gray-200 p-6 text-white flex items-center justify-center">
            <div class="flex flex-row">
                <div class="w-[26rem] h-[19rem] mr-16 text-left bg-[#e7c41a] p-6 text-white">
                    <div class="flex justify-center">
                        <img src="{{ asset($user->avatar ? 'images/users/' . $user->avatar : 'images/noavatar.png') }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">
                    </div>
                    <div class="text-left mt-3">
                        <p class="text-gray-600 text-sm font-semibold">Nama Pengguna</p>
                        <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-1 inline-block">
                            <p class="text-gray-800 font-medium">{{ $user -> username }}</p>
                        </div>
                        <p class="text-gray-600 text-sm font-semibold mt-4">Nama Lengkap</p>
                        <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-1 inline-block">
                             <p class="text-gray-800 font-medium">{{ $user -> name}}</p>
                        </div>
                    </div>
                </div>
                <div class="w-[45rem] h-[19rem] text-left bg-[#e7c41a] p-6 text-white">
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
            <h2 class="text-3xl text-center font-bold mb-10">INFORMASI TERPADU</h2>

            <!-- Bagian Kode Unik Yang Dimiliki -->
            <div class="mb-10">
                <p class="font-semibold text-2xl">Kode Unik Yang Dimiliki:</p>
                <table class="table-auto w-full text-left mt-4 border">
                    <thead>
                        <tr class="bg-third text-white">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Kode Unik</th>
                            <th class="px-4 py-2">Barang Ditukarkan</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">1</td>
                            <td class="border px-4 py-2">KD005</td>
                            <td class="border px-4 py-2">4 Kg Beras, 2 Kg Gula</td>
                            <td class="border px-4 py-2">Belum Ditukarkan</td>
                        </tr>
                        <!-- Tambahkan baris sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>

            <!-- Bagian Jumlah Penukaran -->
            <div>
                <p class="font-semibold text-2xl">Riwayat Penukaran:</p>
                <table class="table-auto w-full text-left mt-4 border">
                    <thead>
                        <tr class="bg-third text-white">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Kode Unik</th>
                            <th class="px-4 py-2">Deskripsi</th>
                            <th class="px-4 py-2">Waktu Penukaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">1</td>
                            <td class="border px-4 py-2">KD001</td>
                            <td class="border px-4 py-2">1 Kg Beras, 2 Buah Mie Instan</td>
                            <td class="border px-4 py-2">Senin, 1 Oktober 2024</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">2</td>
                            <td class="border px-4 py-2">KD002</td>
                            <td class="border px-4 py-2">2 Kg Gula</td>
                            <td class="border px-4 py-2">Jumat, 11 Oktober 2024</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">3</td>
                            <td class="border px-4 py-2">KD003</td>
                            <td class="border px-4 py-2">3 Kg Beras</td>
                            <td class="border px-4 py-2">Kamis, 17 Oktober 2024</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">4</td>
                            <td class="border px-4 py-2">KD004</td>
                            <td class="border px-4 py-2">5 Buah Mie Instant</td>
                            <td class="border px-4 py-2">Rabu, 23 Oktober 2024</td>
                        </tr>
                        <!-- Tambahkan baris sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout_dashboard>
