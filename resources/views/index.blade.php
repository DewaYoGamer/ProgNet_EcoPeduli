<x-layout>
    <x-slot name="title">Beranda | Eco Peduli</x-slot>
    <div class="flex flex-col h-[1500px]">
        <div class="flex-grow p-20">
            <div class="relative mx-20">
                <img src="{{ asset('images/images1.svg') }}" class="absolute right-0 rounded-[20px]" alt="Flowbite Logo">
                <div class="w-[648px] pt-12">
                    <div class="self-stretch text-black text-5xl font-bold">Selamatkan dan Hijaukan<br>Lingkungan Melalui<br>Bank Sampah</div>
                    <div class="self-stretch h-[130px] mt-12 text-justify">
                        Peran Setiap Individu <b class="text-primary">Sangat Penting</b> untuk Menjaga dan Menyelamatkan Lingkungan. Tidak Ada Kata Terlambat dalam Menjaga dan Menyelamatkan Lingkungan.
                        Salah Satu Usaha yang Dapat Dilakukan adalah Dengan Membuat <b class="text-primary">Bank Sampah</b> di Lingkungan Sekitar Kita.
                        Mari Kita Mulai dari Sekarang Memulai Usaha untuk Menjaga Lingkungan yang Dimulai dengan Langkah Kecil.
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center w-full h-[650px] left-0 top-[750px] absolute bg-primary px-8">
                <div class="w-[284.58px] h-[434.48px] px-[40.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px] inline-flex ml-48">
                    <img src="{{asset('images/sorting.png')}}" class="h-48" alt="Flowbite Logo">
                    <div class="self-stretch text-black text-2xl font-semibold">Memilah</div>
                    <div class="self-stretch text-black text-base font-medium">Memilah Sampah yang Memiliki <b class="text-primary">Nilai Tukar</b>. Seperti Botol dan Kaleng. </div>
                </div>
                <div class="w-[284.58px] h-[434.48px] px-[40.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px] inline-flex">
                    <img src="{{asset('images/collecting.png')}}" class="h-48" alt="Flowbite Logo">
                    <div class="self-stretch text-black text-2xl font-semibold">Mengumpulkan</div>
                    <div class="self-stretch text-black text-base font-medium">Mengumpulkan Sampah yang <b class="text-primary">Telah Dipilah</b> untuk Dikumpulkan pada Pengepul dan <b class="text-primary">Mendapatkan Poin</b>.</div>
                </div>
                <div class="w-[284.58px] h-[434.48px] px-[40.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px] inline-flex mr-48">
                    <img src="{{asset('images/exchanging.png')}}" class="h-48" alt="Flowbite Logo">
                    <div class="self-stretch text-black text-2xl font-semibold">Menukarkan</div>
                    <div class="self-stretch text-black text-base font-medium">Menukarkan Poin yang Telah Didapatkan Sebelumnya dengan <b class="text-primary">Sembako</b>. Seperti Beras, Gula, dan sebagainya. </div>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</x-layout>
