<x-layout_dashboard>
    <x-slot name="title">Dashboard Pengguna | Eco Peduli</x-slot>
    <div class="flex h-auto min-h-screen w-screen justify-center mt-6 mb-12">
        <div class="w-[1200px] p-4 bg-[#fafafa] border-2">
            @if(session()->has('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                    @php
                        $lastUniqueCode = DB::table('tb_penukaran_poin')
                            ->where('username', auth()->user()->username)
                            ->pluck('kode_unik'); // Mengambil semua kode unik sebagai koleksi
                        $lastUniqueCode = $lastUniqueCode->last();
                    @endphp
                    <p>Silahkan Tukarkan Kode Unik Anda: <span class="font-bold"> {{ $lastUniqueCode }} </span></p>
                </div>
            @endif
            @error('totalPoints')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <!-- Informasi Pengguna -->
            <div class="flex flex-col p-4 mb-6">
                <div class="text-4xl font-bold">{{ auth()->user()->username }}</div>
                <div class="text-xl">{{ auth()->user()->username }}</div>
                <div class="text-red-500 text-2xl font-bold">{{ auth()->user()->poin }} PTS</div>
            </div>

            <!-- Judul Halaman -->
            <div class="text-center text-3xl font-bold mb-10">
                HALAMAN PENUKARAN POIN PENGGUNA
            </div>

            <form action="/tukar_poin" method="POST">
                @csrf
                <div class="flex flex-row justify-evenly items-center">
                    <!-- Item Beras -->
                    <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 items-center justify-between border-slate-200 border-2">
                        <div class="flex flex-col -mt-4">
                            <div class="self-stretch text-sm font-semibold text-center text-slate-400 mb-4">
                                300 POIN / KG
                            </div>
                            <div class="self-stretch text-5xl font-semibold text-center">
                                Beras
                            </div>
                        </div>
                        <div class="flex flex-row space-x-3">
                            <img src="{{ asset('images/gambar_beras.png') }}" class="w-[15rem] h-[15rem] rounded-full object-cover">
                        </div>
                        <label for="cntBeras" class="block text-lg font-semibold text-slate-400">Jumlah Penukaran</label>
                        <input type="number" id="cntBeras" name="cntBeras" class="w-[90%] border-2 border-secondary p-2 rounded-md -mb-3" min="0" value="0" oninput="calculateTotalPoints()">
                    </div>
    
                    <!-- Item Gula -->
                    <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 items-center justify-between border-slate-200 border-2">
                        <div class="flex flex-col -mt-4">
                            <div class="self-stretch text-sm font-semibold text-center text-slate-400 mb-4">
                                250 POIN / KG
                            </div>
                            <div class="self-stretch text-5xl font-semibold text-center">
                                Gula
                            </div>
                        </div>
                        <div class="flex flex-row space-x-3">
                            <img src="{{ asset('images/gambar_gula.png') }}" class="w-[15rem] h-[15rem] rounded-full object-cover">
                        </div>
                        <label for="cntGula" class="block text-lg font-semibold text-slate-400">Jumlah Penukaran</label>
                        <input type="number" id="cntGula" name="cntGula" class="w-[90%] border-2 border-secondary p-2 rounded-md -mb-3" min="0" value="0" oninput="calculateTotalPoints()">
                    </div>
    
                    <!-- Item Mie -->
                    <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 items-center justify-between border-slate-200 border-2">
                        <div class="flex flex-col -mt-4">
                            <div class="self-stretch text-sm font-semibold text-center text-slate-400 mb-4">
                                60 POIN / PCS
                            </div>
                            <div class="self-stretch text-5xl font-semibold text-center">
                                Mie Instan
                            </div>
                        </div>
                        <div class="flex flex-row space-x-3">
                            <img src="{{ asset('images/gambarMie.png') }}" class="w-[15rem] h-[15rem] rounded-full object-cover">
                        </div>
                        <label for="cntMie" class="block text-lg font-semibold text-slate-400">Jumlah Penukaran</label>
                        <input type="number" id="cntMie" name="cntMie" class="w-[90%] border-2 border-secondary p-2 rounded-md -mb-3" min="0" value="0" oninput="calculateTotalPoints()">
                    </div>
                </div>
    
                <!-- Total Poin -->
                <div class="mt-6 text-3xl font-bold">
                    Total Poin:
                    <input type="number" id="totalPoints" name="totalPoints" class="text-red-500 outline-none p-2" min="0" value="0" readonly>
                </div>
    
                <!-- Tombol Aksi -->
                <div class="flex justify-between mt-6">
                    <button type="button" class="bg-pink-500 text-white text-2xl font-semibold py-2 px-4 rounded-md" onclick="resetFields()">Reset Barang</button>
                    <button type="submit" class="bg-primary text-white text-4xl font-semibold py-2 px-4 rounded-md mr-[60px]" onclick="return confirmExchange()">Tukarkan!</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script untuk Menghitung Total Poin -->
    <script>
        function calculateTotalPoints() {
            const berasPoints = 300;
            const gulaPoints = 250;
            const miePoints = 60;

            const berasQuantity = parseInt(document.getElementById('cntBeras').value) || 0;
            const gulaQuantity = parseInt(document.getElementById('cntGula').value) || 0;
            const mieQuantity = parseInt(document.getElementById('cntMie').value) || 0;

            const totalPoints = (berasQuantity * berasPoints) + (gulaQuantity * gulaPoints) + (mieQuantity * miePoints);

            document.getElementById('totalPoints').value = totalPoints;
        }

        function resetFields() {
            document.getElementById('cntBeras').value = 0;
            document.getElementById('cntGula').value = 0;
            document.getElementById('cntMie').value = 0;
            calculateTotalPoints();
        }

        function confirmExchange() {
            const totalPoints = document.getElementById('totalPoints').value;

            if (totalPoints <= 0) {
                alert("Silakan masukkan jumlah penukaran yang valid.");
                return false;
            }

            const confirmation = confirm(`Apakah Anda yakin ingin menukarkan dengan total ${totalPoints} poin?`);
            return confirmation; // True jika 'OK' diklik, False jika 'Cancel' diklik
        }
    </script>
</x-layout_dashboard>