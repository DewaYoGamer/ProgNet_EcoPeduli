<x-layout_operator>
    <x-slot name="title">Dashboard Operator | Eco Peduli</x-slot>
    <div class="w-full h-full bg-white shadow-md overflow-hidden">
        <div class="w-full h-[22rem] text-center bg-gray-200 p-6 text-white flex items-center justify-center">
            <div class="flex flex-row">
                <div class="w-[26rem] h-[19rem] mr-16 text-left bg-[#e7c41a] p-6 text-white">
                    <div class="flex justify-center">
                        <img src="{{ asset('images/arya.jpg') }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">
                    </div>
                    <div class="text-left mt-3">
                        <p class="text-gray-600 text-sm font-semibold">Username</p>
                        <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-1 inline-block">
                            <p class="text-gray-800 font-medium">{{ $user -> username }}</p>
                        </div>
                        <p class="text-gray-600 text-sm font-semibold mt-4">Nama</p>
                        <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-1 inline-block">
                            <p class="text-gray-800 font-medium">{{ $user -> name}}</p>
                        </div>
                    </div>
                </div>
                <div class="w-[45rem] h-[19rem] text-left bg-[#e7c41a] p-6 text-white">
                    <div class="text-left">
                        <p class="text-white text-4xl font-semibold">Pengingat Yang Berjalan:</p>
                        <p class="text-white text-3xl font-medium mt-3">Senin, 24 Oktober 2024</p>
                        <p class="text-white text-3xl font-medium">Daur Ulang</p>
                        <p class="text-white text-3xl font-semibold mt-10 mb-4">Perbarui Pengingat?</p>
                        <a class="w-[12rem] bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded" href="/operator/jadwal_pengambilan">Edit Pengingat</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Body Content -->
        <div class="p-6">
            <h2 class="text-3xl text-center font-bold mb-10">INFORMASI PROSES PENAMBAHAN</h2>
            <!-- Bagian Kode Unik Yang Dimiliki -->
            <div class="mb-10">
                <p class="font-semibold text-2xl">Proses Penambahan Poin:</p>
                <table class="table-auto w-full text-left mt-4 border">
                    <thead>
                        <tr class="bg-third text-white">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Username</th>
                            <th class="px-4 py-2">Berat Sampah Daur Ulang</th>
                            <th class="px-4 py-2">Poin Didapat</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($informasi_penukaran as $index_operator => $code)
                            <tr>
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $code->nama_pengguna }}</td>
                                <td class="border px-4 py-2">{{ $code->berat }}</td>
                                <td class="border px-4 py-2">{{ $code->total_poin }}</td>
                                <td class="border px-4 py-2">{{ $code->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border px-4 py-2 text-center">Belum ada kode unik</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Bagian Jumlah Penukaran -->
            <div>
                <p class="font-semibold text-2xl">Riwayat Penambahan Poin:</p>
                <table class="table-auto w-full text-left mt-4 border">
                    <thead>
                        <tr class="bg-third text-white">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Username</th>
                            <th class="px-4 py-2">Berat Sampah Daur Ulang</th>
                            <th class="px-4 py-2">Poin Didapat</th>
                            <th class="px-4 py-2">Tanggal Disetujui</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayatPenukaran as $index_operator => $code)
                            <tr>
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $code->nama_pengguna }}</td>
                                <td class="border px-4 py-2">{{ $code->berat }}</td>
                                <td class="border px-4 py-2">{{ $code->total_poin }}</td>
                                <td class="border px-4 py-2">{{ $code->updated_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border px-4 py-2 text-center">Belum ada kode unik</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout_operator>
