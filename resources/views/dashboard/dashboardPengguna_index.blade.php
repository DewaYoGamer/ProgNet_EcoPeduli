<x-layout_dashboard>
    @php
        $data_awal = DB::table('tb_jadwal_pengambilan')
            ->orderBy('id', 'desc')  // Mengurutkan berdasarkan id secara descending
            ->first();  // Ambil baris pertama setelah diurutkan
    @endphp
    <x-slot name="title">Dashboard Pengguna | Eco Peduli</x-slot>
    <div class="w-full h-full bg-white shadow-md overflow-hidden">
        <div class="w-full h-[22rem] text-center bg-gray-200 p-6 text-white flex items-center justify-center">
            <div class="flex flex-row">
                <div class="w-[26rem] h-[19rem] mr-16 text-left bg-[#e7c41a] p-6 text-white">
                    <div class="flex justify-center">
                        <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('images/noavatar.png') }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">
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
                        <p class="text-white text-3xl font-semibold">{{ $data_awal->tanggal }}</p>
                        <p class="text-white text-3xl font-semibold mt-10">{{ $data_awal->jenis_sampah }}</p>
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
                        @forelse ($kodeUniks as $index => $code)
                            <tr>
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $code->kode_unik }}</td>
                                <td class="border px-4 py-2">{{ $code->keterangan_penukaran }}</td>
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
                        @forelse ($riwayatPenukaran as $index => $history)
                            <tr>
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $history->kode_unik }}</td>
                                <td class="border px-4 py-2">{{ $history->keterangan_penukaran }}</td>
                                <td class="border px-4 py-2">{{ $history->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border px-4 py-2 text-center">Belum ada riwayat penukaran</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout_dashboard>
