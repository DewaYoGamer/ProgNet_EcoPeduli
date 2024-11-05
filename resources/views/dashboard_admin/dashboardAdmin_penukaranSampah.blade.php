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
                    Kelola Penambahan Poin Pengguna
                </div>
            </div>

            <!-- Form Layout -->
            <form action="/cari_data_sampah" method="POST" class="grid grid-cols-2 gap-6">
                @csrf
                <!-- Form Pencarian Data Penukaran Sampah -->
                <div class="col-span-2 text-center mb-6">
                    <h2 class="text-xl font-bold text-green-700">PENCARIAN DATA PENUKARAN SAMPAH</h2>
                    <label for="id" class="block text-lg font-bold mt-4">Masukkan ID Penukaran</label>
                    <input type="text" name="id" id="id" class="w-1/2 p-2 border border-gray-300 rounded mt-2">
                    @error('id')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 mt-4 rounded">CARI DATA!</button>
                </div>

                <!-- Username dan Status -->
                <div class="flex flex-col items-center">
                    <label for="nama_pengguna" class="block text-lg font-bold">Username</label>
                    <input type="text" id="nama_pengguna" name="nama_pengguna" class="w-full p-2 border border-gray-300 rounded bg-gray-100 text-center" value="{{ $data->nama_pengguna ?? '' }}" readonly>
                </div>
                <div class="flex flex-col items-center">
                    <label for="status" class="block text-lg font-bold">Status</label>
                    <input type="text" id="status" name="status" class="w-full p-2 border border-gray-300 rounded bg-gray-100 text-center" value="{{ $data->status ?? '' }}" readonly>
                </div>

                <!-- Catatan -->
                <div class="col-span-2 text-center mt-6">
                    <label for="catatan" class="block text-lg font-bold">Catatan Operator</label>
                    <input type="text" id="catatan" name="catatan" class="w-full p-2 border  border-gray-300 rounded bg-gray-100 text-center" value="{{ $data->catatan ?? '' }}" readonly>
                </div>

                <!-- Poin Tambahan -->
                <div class="col-span-2 text-center mt-6">
                    <label for="total_poin" class="block text-lg font-bold">TOTAL POIN</label>
                    <input type="text" id="total_poin" name="total_poin" class="w-full p-2 border border-gray-300 rounded bg-gray-100 text-center" value="{{ $data->total_poin ?? '' }}" readonly>
                </div>
            </form>

            <!-- Tombol Terima Penukaran Muncul -->
            @if(session()->has('data') && session('data')->status === 'pending')
                <div class="flex justify-center mt-6">
                    <form action="/terima_penukaran_sampah" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="nama_pengguna" value="{{ $data->nama_pengguna }}">
                        <input type="hidden" name="total_poin" value="{{ $data->total_poin }}">
                        <button type="submit" class="bg-primary text-white text-2xl px-6 py-2 rounded">Terima Penukaran</button>
                    </form>
                </div>
            @endif
        </div>        
    </div>
</x-layout_admin>
