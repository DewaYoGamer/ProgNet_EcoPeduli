<x-layout_admin>
    <x-slot name="title">Dashboard Pengguna | Eco Peduli</x-slot>
    <div class="w-4/5 p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">KONFIRMASI DATA PENUKARAN SAMPAH PENGGUNA</h2>

                <!-- Penukaran Poin Section -->
                <div class="flex-col items-center">
                    <input type="text" id="kodeUnik" placeholder="Masukkan Kode Unik" class="border m-4  p-2 rounded w-48 text-center">
                    <button class="bg-third hover:bg-primary text-white py-2 px-6 rounded">CARI DATA</button>
                    <button class="bg-third hover:bg-primary text-white py-2 px-6 rounded">KONFIRMASI STATUS</button>
                </div>

                <!-- Informasi Username dan Status -->
                <div class="m-4">
                    <table class="table-auto w-full mt-4 ">
                        <thead>
                            <tr class="bg-third text-white">
                                <th class="py-1 px-2">No</th>
                                <th class="py-1 px-2">Operator</th>
                                <th class="py-1 px-2">Pengguna</th>
                                <th class="py-1 px-2">Tanggal Penukaran</th>
                                <th class="py-1 px-2">Poin yang diterima</th>
                                <th class="py-1 px-2">Bukti Penukaran</th>
                                <th class="py-1 px-2">Status</th>
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
                            <td colspan="4" class="px-4 py-2 text-center">Belum ada kode unik</td>
                        </tr>
                    @endforelse
                </tbody>
                    </table>
                </div>
            </div>
        </x-layout_admin>
