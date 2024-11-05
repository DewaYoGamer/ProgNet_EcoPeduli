<x-layout_admin>
    @php
        $data = session('data'); // Ambil data dari session
    @endphp
    <x-slot name="title">Dashboard Admin | Eco Peduli</x-slot>
    <div class="flex h-auto min-h-screen w-screen justify-center mt-12 mb-12">
        <div class="w-[960px] p-4 bg-[#fafafa] border-2">
            @if(session()->has('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <div class="flex justify-center mb-12">
                <div class="text-4xl font-bold text-primary">
                    Kelola Penukaran Poin Pengguna
                </div>
            </div>

            <!-- Form Layout -->
            <form action="/cari_data_poin" method="POST" class="grid grid-cols-2 gap-6">
                @csrf
                <!-- Form Pencarian Data Penukaran Sampah -->
                <div class="col-span-2 text-center mb-6">
                    <h2 class="text-xl font-bold text-green-700">PENCARIAN KODE UNIK PENGGUNA</h2>
                    <label for="kode_unik" class="block text-lg font-bold mt-4">Masukkan Kode Unik</label>
                    <input type="text" name="kode_unik" id="kode_unik" class="w-1/2 p-2 border border-gray-300 rounded mt-2">
                    @error('kode_unik')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 mt-4 rounded">CARI KODE UNIK!</button>
                </div>

                <!-- Username dan Status -->
                <div class="flex flex-col items-center">
                    <label for="nama_pengguna" class="block text-lg font-bold">Username</label>
                    <input type="text" id="nama_pengguna" name="nama_pengguna" class="w-full p-2 border border-gray-300 rounded bg-gray-100 text-center" value="{{ $data->username ?? '' }}" readonly>
                </div>
                <div class="flex flex-col items-center">
                    <label for="status" class="block text-lg font-bold">Status</label>
                    <input type="text" id="status" name="status" class="w-full p-2 border border-gray-300 rounded bg-gray-100 text-center" value="{{ $data->status ?? '' }}" readonly>
                </div>

                <!-- Poin Pengguna -->
                <div class="col-span-2 text-center mt-6">
                    <label for="catatan" class="block text-lg font-bold">Poin yang Dibutuhkan</label>
                    <input type="text" id="catatan" name="catatan" class="w-full p-2 border  border-gray-300 rounded bg-gray-100 text-center" value="{{ $data->poin ?? '' }}" readonly>
                </div>

                <!-- Keterangan Barang -->
                <div class="col-span-2 text-center mt-6">
                    <label for="keterangan_penukaran" class="block text-lg font-bold">BARANG YANG DITUKARKAN</label>
                    <input type="text" id="keterangan_penukaran" name="keterangan_penukaran" class="w-full p-2 border border-gray-300 rounded bg-gray-100 text-center" value="{{ $data->keterangan_penukaran ?? '' }}" readonly>
                </div>
            </form>

            <!-- Tombol Terima Penukaran Muncul -->
            @if(session()->has('data') && session('data')->status === 'pending')
                <div class="flex justify-center mt-6">
                    <form action="/terima_penukaran_poin" method="POST">
                        @csrf
                        <input type="hidden" name="kode_unik" value="{{ $data->kode_unik }}">
                        <input type="hidden" name="username" value="{{ $data->username }}">
                        <input type="hidden" name="poin" value="{{ $data->poin }}">
                        <button type="submit" class="bg-primary text-white text-2xl px-6 py-2 rounded">Terima Penukaran Barang</button>
                    </form>
                </div>
            @endif
        </div>        
    </div>
</x-layout_admin>
