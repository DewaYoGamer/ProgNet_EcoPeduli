<x-layout_operator>
    <style>
        /* Custom styling untuk tanggal yang dipilih */
        .flatpickr-day.selected, .flatpickr-day.selected:hover {
            background-color: #789461 !important; /* Warna hijau */
            color: white !important; /* Warna teks */
            border-radius: 50%; /* Membuat bulat untuk estetika */
        }
    </style>

    <x-slot name="title">Dashboard Operator | Eco Peduli</x-slot>

    <div class="w-full h-full bg-white shadow-md">
        <!-- Body Content -->
        <div class="p-6">
            <h2 class="text-3xl text-center font-bold mt-10 mb-20">TAMBAHKAN PENGINGAT JADWAL</h2>
            <!-- Bagian Hari dan Tanggal Yang Dimiliki -->
            <div class="mb-14">
                <p class="font-semibold text-2xl">Hari, Tanggal:</p>
                <div class="w-[20rem] relative">
                    <input
                        type="text"
                        id="tanggal"
                        name="tanggal"
                        class="border rounded p-2 w-full text-gray-700 pr-10"
                        readonly
                    />
                    <!-- Ikon kalender -->
                    <span class="absolute right-3 mt-2 text-gray-500">
                        <i class="fas fa-calendar-alt"></i>
                    </span>
                </div>
            </div>

            <!-- Bagian Jenis Sampah -->
            <div class="mb-14">
                <p class="font-semibold text-2xl">Jenis Sampah:</p>
                <input
                    type="text"
                    id="jenis_sampah"
                    name="jenis_sampah"
                    class="border rounded p-2 w-[20rem] text-gray-700"
                />
            </div>
            <button class="w-[13rem] bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">Tetapkan Pengingat</button>
        </div>
    </div>

    <!-- Link Font Awesome untuk ikon kalender -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#tanggal", {
                dateFormat: "l, d F Y", // Format menampilkan hari, tanggal, dan bulan
                onChange: function(selectedDates, dateStr) {
                    const tanggal = new Date(dateStr);
                    const options = { weekday: 'long' }; // Ambil nama hari
                    const hari = tanggal.toLocaleDateString('id-ID', options);
                    const formattedDate = tanggal.toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });
                    // Gabungkan hari dan tanggal
                    const displayValue = `${hari}, ${formattedDate}`;
                    this.input.value = displayValue; // Tampilkan di input field

                    // Set jenis sampah berdasarkan hari
                    const jenisSampahInput = document.getElementById("jenis_sampah");
                    let jenisSampah = '';
                    switch(hari.toLowerCase()) {
                        case 'senin':
                            jenisSampah = 'Organik';
                            break;
                        case 'selasa':
                            jenisSampah = 'Daur Ulang';
                            break;
                        case 'rabu':
                            jenisSampah = 'Organik';
                            break;
                        case 'kamis':
                            jenisSampah = 'Organik';
                            break;
                        case 'jumat':
                            jenisSampah = 'Residu';
                            break;
                        case 'sabtu':
                            jenisSampah = 'Organik';
                            break;
                        case 'minggu':
                            jenisSampah = 'Organik';
                            break;
                        default:
                            jenisSampah = 'Belum Ditentukan';
                    }
                    jenisSampahInput.value = jenisSampah;
                }
            });
        });
    </script>
</x-layout_operator>
