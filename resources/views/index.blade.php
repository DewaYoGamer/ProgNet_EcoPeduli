<x-layout>
    <x-slot name="title">Beranda | Eco Peduli</x-slot>
    <style>
        @media (max-width: 1023px) {
            #custom-bg {
                position: relative;
                overflow: hidden;
            }

            #custom-bg::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background-image: url('{{ asset('images/images1.svg') }}');
                background-size: 1225px;
                background-position: center top;
                opacity: 0.2;
                z-index: -1;
            }
        }
    </style>
    <div class="flex flex-col h-[2580px] lg:h-[1500px]">
        <div class="flex-grow lg:p-4 xl:p-12 2xl:p-20" id="custom-bg">
            <div class="relative px-20 xl:px-0 lg:pr-[560px] xl:pr-[725px] 2xl:pr-[850px] lg:mx-0 xl:mx-5 2xl:mx-0 flex justify">
                <img src="{{ asset('images/images1.svg') }}" class="hidden lg:flex absolute right-0 rounded-[20px] lg:h-[280px] lg:mt-44 lg:mr-12 xl:mr-6 xl:h-[375px] xl:mt-20 2xl:h-auto 2xl:mt-0 2xl:mr-12">
                <div class="lg:w-[400px] xl:w-[500px] 2xl:w-[648px] pt-12 2xl:pt-0 lg:ml-0 xl:ml-6 2xl:ml-12">
                    <div class="text-center lg:text-left self-stretch text-black text-3xl lg:text-5xl font-bold">
                        Selamatkan dan Hijaukan<br>Lingkungan Melalui<br>Bank Sampah
                    </div>
                    <div class="self-stretch h-[130px] mt-12 text-justify">
                        Peran Setiap Individu <b class="text-primary">Sangat Penting</b> untuk Menjaga dan Menyelamatkan Lingkungan. Tidak Ada Kata Terlambat dalam Menjaga dan Menyelamatkan Lingkungan.
                        Salah Satu Usaha yang Dapat Dilakukan adalah Dengan Membuat <b class="text-primary">Bank Sampah</b> di Lingkungan Sekitar Kita.
                        Mari Kita Mulai dari Sekarang Memulai Usaha untuk Menjaga Lingkungan yang Dimulai dengan Langkah Kecil.
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row justify-between items-center w-full h-[1650px] lg:h-[650px] left-0 top-[750px] absolute bg-primary px-8 py-20 lg:py-0">
                <div class="w-[284.58px] h-[434.48px] px-[40.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px] inline-flex lg:mt-0 xl:ml-24 2xl:ml-48">
                    <img src="{{asset('images/sorting.png')}}" class="h-48">
                    <div class="self-stretch text-black text-2xl font-semibold">Memilah</div>
                    <div class="self-stretch text-black text-base font-medium">Memilah Sampah yang Memiliki <b class="text-primary">Nilai Tukar</b>. Seperti Botol dan Kaleng. </div>
                </div>
                <div class="w-[284.58px] h-[434.48px] px-[40.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px] inline-flex">
                    <img src="{{asset('images/collecting.png')}}" class="h-48">
                    <div class="self-stretch text-black text-2xl font-semibold">Mengumpulkan</div>
                    <div class="self-stretch text-black text-base font-medium">Mengumpulkan Sampah yang <b class="text-primary">Telah Dipilah</b> untuk Dikumpulkan pada Pengepul dan <b class="text-primary">Mendapatkan Poin</b>.</div>
                </div>
                <div class="w-[284.58px] h-[434.48px] px-[40.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px] inline-flex lg:mb-0 xl:mr-24 2xl:mr-48">
                    <img src="{{asset('images/exchanging.png')}}" class="h-48">
                    <div class="self-stretch text-black text-2xl font-semibold">Menukarkan</div>
                    <div class="self-stretch text-black text-base font-medium">Menukarkan Poin yang Telah Didapatkan Sebelumnya dengan <b class="text-primary">Sembako</b>. Seperti Beras, Gula, dan sebagainya. </div>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</x-layout>
