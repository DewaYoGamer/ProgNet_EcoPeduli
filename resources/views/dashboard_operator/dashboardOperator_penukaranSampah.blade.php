<x-layout_operator>
    <x-slot name="title">Dashboard Operator | Eco Peduli</x-slot>
    <div class="flex h-auto min-h-screen w-screen justify-center mt-12 mb-12">
        <div class="w-[960px] p-4 bg-[#fafafa] border-2">
            @if(session()->has('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <div class="flex justify-center mb-12">
                <div class="text-4xl font-bold text-primary">
                    Tambah Poin Pengguna
                </div>
            </div>

            <!-- Form Layout -->
            <form action="/tukar_sampah" method="POST" class="grid grid-cols-2 gap-6">
                @csrf
                <!-- Username -->
                <div class="col-span-2">
                    <label for="nama_pengguna" class="block text-lg font-semibold">Username</label>
                    <input type="text" id="nama_pengguna" name="nama_pengguna" class="w-full border border-gray-300 p-2 rounded-md" placeholder="Masukkan Nama Pengguna yang Akan Diberi Poin">
                    @error('nama_pengguna')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tipe Sampah -->
                <div>
                    <label for="tipe_sampah" class="block text-lg font-semibold">Tipe Sampah</label>
                    <select id="tipe_sampah" name="tipe_sampah" class="w-full border border-gray-300 p-2 rounded-md required">
                        <option value="">[Pilih Tipe Sampah]</option>
                        <option value="plastik">Sampah Plastik</option>
                        <option value="kaca">Sampah Kaca</option>
                        <option value="kaleng">Sampah Kaleng</option>
                    </select>
                    @error('tipe_sampah')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Total Penukaran (Kg) -->
                <div>
                    <label for="berat" class="block text-lg font-semibold">Total Penukaran (Kg)</label>
                    <input type="number" id="berat" name="berat" class="w-full border border-gray-300 p-2 rounded-md" placeholder="0" min="0">
                    @error('berat')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Catatan -->
                <div class="col-span-2">
                    <label for="catatan" class="block text-lg font-semibold">Catatan</label>
                    <textarea id="catatan" name="catatan" class="w-full border border-gray-300 p-2 rounded-md" rows="4" placeholder="Berikan Catatan atau Keterangan"></textarea>
                </div>

                <!-- Upload Gambar -->
                {{-- <div class="col-span-2 -mt-2">
                    <label for="foto_bukti" class="block text-lg font-semibold">Upload Bukti Sampah</label>
                    <input type="file" id="foto_bukti" name="foto_bukti" class="w-full border border-gray-300 p-2 rounded-md" accept="image/*">
                </div> --}}

                <!-- Total Poin -->
                <div>
                    <label for="total_poin" class="block text-lg font-semibold">Total Poin</label>
                    <input type="text" id="total_poin" name="total_poin" class="w-full border border-gray-300 p-2 rounded-md bg-gray-100" placeholder="Total Poin" readonly>
                </div>

                <!-- Tambah Point Button -->
                <div class="col-span-2 flex justify-center mt-4">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md font-semibold hover:bg-green-700">
                        Tambah Poin!
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.getElementById('tipe_sampah').addEventListener('change', calculatePoints);
        document.getElementById('berat').addEventListener('input', calculatePoints);

        function calculatePoints() {
            const tipeSampah = document.getElementById('tipe_sampah').value;
            const berat = parseFloat(document.getElementById('berat').value) || 0;
            let poinPerKg = 0;

            // Tentukan nilai poin per kg berdasarkan tipe sampah
            if (tipeSampah === 'plastik') {
                poinPerKg = 50;
            } else if (tipeSampah === 'kaca') {
                poinPerKg = 100;
            } else if (tipeSampah === 'kaleng') {
                poinPerKg = 200;
            }

            // Hitung total poin
            const totalPoin = berat * poinPerKg;
            document.getElementById('total_poin').value = totalPoin;
        }
    </script>
</x-layout_operator>
