<x-layout_admin>
    <x-slot name="title">Dashboard Admin | Eco Peduli</x-slot>

    <div class="w-4/5 p-4">
        <div class="text-2xl font-bold mb-4 text-primary text-center">LIST PENUKARAN PENGGUNA</div>

        <!-- Penukaran Sampah Section -->
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">Penukaran Sampah</h2>
            <table class="min-w-full bg-white border w-full text-sm">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="py-1 px-2 border">No</th>
                        <th class="py-1 px-2 border">Operator</th>
                        <th class="py-1 px-2 border">Pengguna</th>
                        <th class="py-1 px-2 border">Tanggal Penukaran</th>
                        <th class="py-1 px-2 border">Poin yang diterima</th>
                        <th class="py-1 px-2 border">Bukti Penukaran</th>
                        <th class="py-1 px-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-1 px-2 border text-center">1</td>
                        <td class="py-1 px-2 border">Yoga</td>
                        <td class="py-1 px-2 border">Wiraguna</td>
                        <td class="py-1 px-2 border">Senin, 1 Oktober 2024</td>
                        <td class="py-1 px-2 border">100</td>
                        <td class="py-1 px-2 border">Foto.jpg</td>
                        <td class="py-1 px-2 border">Belum</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">Penukaran Poin</h2>
            <table class="min-w-full bg-white border w-full text-sm">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="py-1 px-2 border">No</th>
                        <th class="py-1 px-2 border">Kode Unik</th>
                        <th class="py-1 px-2 border">Username</th>
                        <th class="py-1 px-2 border">Item yang Ditukar</th>
                        <th class="py-1 px-2 border">Jumlah Poin</th>
                        <th class="py-1 px-2 border">Tanggal Penukaran</th>
                        <th class="py-1 px-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-1 px-2 border text-center">1</td>
                        <td class="py-1 px-2 border">KD002</td>
                        <td class="py-1 px-2 border">Wiraguna</td>
                        <td class="py-1 px-2 border">2 Mie Instan</td>
                        <td class="py-1 px-2 border">20</td>
                        <td class="py-1 px-2 border">Senin, 2 Oktober 2024</td>
                        <td class="py-1 px-2 border">Belum</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Riwayat Penukaran Section -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-2">Riwayat Penukaran</h2>
            <table class="min-w-full bg-white border w-full text-sm">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="py-1 px-2 border">No</th>
                        <th class="py-1 px-2 border">Kode Unik</th>
                        <th class="py-1 px-2 border">Deskripsi</th>
                        <th class="py-1 px-2 border">Waktu Penukaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-1 px-2 border text-center">1</td>
                        <td class="py-1 px-2 border text-center">KD001</td>
                        <td class="py-1 px-2 border">1 Kg Beras, 2 Buah Mie Instan</td>
                        <td class="py-1 px-2 border">Senin, 1 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td class="py-1 px-2 border text-center">2</td>
                        <td class="py-1 px-2 border text-center">KD002</td>
                        <td class="py-1 px-2 border">1 Kg Beras, 2 Buah Mie Instan</td>
                        <td class="py-1 px-2 border">Senin, 1 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td class="py-1 px-2 border text-center">3</td>
                        <td class="py-1 px-2 border text-center">KD003</td>
                        <td class="py-1 px-2 border">1 Kg Beras, 2 Buah Mie Instan</td>
                        <td class="py-1 px-2 border">Senin, 1 Oktober 2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</x-layout_admin>
