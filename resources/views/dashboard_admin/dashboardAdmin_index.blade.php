<x-layout_admin>
    <x-slot name="title">Dashboard Admin | Eco Peduli</x-slot>
    @php
        $cnt_idx = 0;
    @endphp

    <div class="w-4/5 p-4">
        <div class="text-3xl font-bold mb-4 text-primary text-center mt-10">INFORMASI PENUKARAN ECO-PEDULI</div>

        <!-- Penukaran Sampah Section -->
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">Penukaran Sampah</h2>
            <table class="min-w-full bg-white border w-full text-sm">
                <thead>
                    <tr class="bg-third text-white">
                        <th class="py-1 px-2 border">No</th>
                        <th class="py-1 px-2 border">ID</th>
                        <th class="py-1 px-2 border">Operator</th>
                        <th class="py-1 px-2 border">Pengguna</th>
                        <th class="py-1 px-2 border">Tanggal Penukaran</th>
                        <th class="py-1 px-2 border">Poin yang diterima</th>
                        <th class="py-1 px-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_tb_penukaran_sampah as $index_admin => $code)
                        <tr>
                            <td class="border px-4 py-2">{{ $index_admin + 1 }}</td>
                            <td class="border px-4 py-2 font-bold">{{ $code->id }}</td>
                            <td class="border px-4 py-2">{{ $code->nama_operator }}</td>
                            <td class="border px-4 py-2">{{ $code->nama_pengguna }}</td>
                            <td class="border px-4 py-2">{{ $code->created_at }}</td>
                            <td class="border px-4 py-2">{{ $code->total_poin }}</td>
                            <td class="border px-4 py-2 font-bold">{{ $code->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border px-4 py-2 text-center">Belum ada data Penukaran Sampah</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">Penukaran Poin</h2>
            <table class="min-w-full bg-white border w-full text-sm">
                <thead>
                    <tr class="bg-third text-white">
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
                    @forelse ($data_tb_penukaran_poin as $index_admin => $code)
                        @if ($code->status == 'pending')
                            <tr>
                                <td class="border px-4 py-2">{{ $index_admin + 1 }}</td>
                                <td class="border px-4 py-2 font-bold">{{ $code->kode_unik }}</td>
                                <td class="border px-4 py-2">{{ $code->username }}</td>
                                <td class="border px-4 py-2">{{ $code->keterangan_penukaran }}</td>
                                <td class="border px-4 py-2">{{ $code->poin }}</td>
                                <td class="border px-4 py-2">{{ $code->created_at }}</td>
                                <td class="border px-4 py-2 font-bold">{{ $code->status }}</td>
                            </tr>
                        @else
                            @php
                                $cnt_idx++;
                            @endphp
                        @endif
                    @empty
                        <tr>
                            <td colspan="4" class="border px-4 py-2 text-center">Belum ada data Penukaran Poin</td>
                        </tr>
                    @endforelse
                    @if ($cnt_idx > 0)
                        <tr>
                            <td colspan="4" class="border px-4 py-2 text-center">Penukaran Poin Telah Disetujui Seluruhnya!</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

        <!-- Riwayat Penukaran Section -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-2">Riwayat Penukaran</h2>
            <table class="min-w-full bg-white border w-full text-sm">
                <thead>
                    <tr class="bg-third text-white">
                        <th class="py-1 px-2 border">No</th>
                        <th class="py-1 px-2 border">Kode Unik</th>
                        <th class="py-1 px-2 border">Deskripsi</th>
                        <th class="py-1 px-2 border">Waktu Penukaran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_tb_penukaran_poin_acc as $index_admin => $code)
                        <tr>
                            <td class="border px-4 py-2">{{ $index_admin + 1 }}</td>
                            <td class="border px-4 py-2">{{ $code->kode_unik }}</td>
                            <td class="border px-4 py-2">{{ $code->keterangan_penukaran }}</td>
                            <td class="border px-4 py-2">{{ $code->updated_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border px-4 py-2 text-center">Belum ada Riwayat Penukaran</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
</x-layout_admin>
