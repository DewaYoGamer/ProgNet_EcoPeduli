<x-layout_admin>
    <x-slot name="title">Dashboard Admin | Eco Peduli</x-slot>

    <div class="w-4/5 p-4">
        <div class="text-3xl font-bold mb-4 text-primary text-center mt-10">INFORMASI PENUKARAN ECO-PEDULI</div>

        <!-- Penukaran Sampah Section -->
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">Penukaran Sampah</h2>
                <table class="table-auto w-full mt-4 ">
                    <thead>
                        <tr class="bg-third text-white">
                        <th class="py-1 px-2 ">No</th>
                        <th class="py-1 px-2 ">Operator</th>
                        <th class="py-1 px-2 ">Pengguna</th>
                        <th class="py-1 px-2 ">Tanggal Penukaran</th>
                        <th class="py-1 px-2 ">Poin yang diterima</th>
                        <th class="py-1 px-2 ">Bukti Penukaran</th>
                        <th class="py-1 px-2 ">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $data_tb_penukaran_sampah = DB::table('tb_penukaran_sampah')->get();
                    @endphp
                    @forelse ($data_tb_penukaran_sampah as $index => $code)
                        <tr>
                            <td class=" px-4 py-2">{{ $index + 1 }}</td>
                            <td class=" px-4 py-2">{{ $code->nama_operator }}</td>
                            <td class=" px-4 py-2">{{ $code->nama_pengguna }}</td>
                            <td class=" px-4 py-2">{{ $code->created_at }}</td>
                            <td class=" px-4 py-2">{{ $code->total_poin }}</td>
                            <td class=" px-4 py-2">{{ $code->foto_bukti }}</td>
                            <td class=" px-4 py-2">{{ $code->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class=" px-4 py-2 text-center">Belum ada kode unik</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">Penukaran Poin</h2>
                <table class="table-auto w-full mt-4 ">
                    <thead>
                        <tr class="bg-third text-white">
                        <th class="py-1 px-2 ">No</th>
                        <th class="py-1 px-2 ">Kode Unik</th>
                        <th class="py-1 px-2 ">Username</th>
                        <th class="py-1 px-2 ">Item yang Ditukar</th>
                        <th class="py-1 px-2 ">Jumlah Poin</th>
                        <th class="py-1 px-2 ">Tanggal Penukaran</th>
                        <th class="py-1 px-2 ">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $data_tb_penukaran_poin = DB::table('tb_penukaran_poin')->get();
                    @endphp
                    @forelse ($data_tb_penukaran_poin as $index => $code)
                        <tr>
                            <td class=" px-4 py-2">{{ $index + 1 }}</td>
                            <td class=" px-4 py-2">{{ $code->kode_unik }}</td>
                            <td class=" px-4 py-2">{{ $code->username }}</td>
                            <td class=" px-4 py-2">{{ $code->keterangan_penukaran }}</td>
                            <td class=" px-4 py-2">{{ $code->poin }}</td>
                            <td class=" px-4 py-2">{{ $code->created_at }}</td>
                            <td class=" px-4 py-2">{{ $code->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class=" px-4 py-2 text-center">Belum ada kode unik</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Riwayat Penukaran Section -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-2">Riwayat Penukaran</h2>
                <table class="table-auto w-full mt-4 ">
                    <thead>
                        <tr class="bg-third text-white">
                        <th class="py-1 px-2 ">No</th>
                        <th class="py-1 px-2 ">Kode Unik</th>
                        <th class="py-1 px-2 ">Deskripsi</th>
                        <th class="py-1 px-2 ">Waktu Penukaran</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $data_tb_penukaran_poin = DB::table('tb_penukaran_poin')->where('status', 'accepted')->get();
                    @endphp
                    @forelse ($data_tb_penukaran_poin as $index => $code)
                        <tr>
                            <td class=" px-4 py-2">{{ $index + 1 }}</td>
                            <td class=" px-4 py-2">{{ $code->kode_unik }}</td>
                            <td class=" px-4 py-2">{{ $code->keterangan_penukaran }}</td>
                            <td class=" px-4 py-2">{{ $code->updated_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class=" px-4 py-2 text-center">Belum ada kode unik</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
</x-layout_admin>
