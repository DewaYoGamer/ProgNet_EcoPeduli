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
    <div class="flex flex-col h-full">
        <div class="flex-grow" id="custom-bg">
            <div class="relative px-20 xl:px-0 lg:pr-[560px] xl:pr-[650px] 2xl:pr-[800px] lg:mx-0 xl:mx-12 2xl:mx-24 flex mt-16">
                <img src="{{ asset('images/images1.svg') }}" class="invisible lg:visible absolute right-0 rounded-[20px] lg:h-[280px] lg:mt-44 lg:mr-12 xl:mr-6 xl:h-[375px] xl:mt-20 2xl:h-auto 2xl:mt-0 2xl:mr-12">
                <div class="lg:w-[400px] xl:w-[500px] 2xl:w-[648px] pt-12 2xl:pt-0 lg:ml-0 xl:ml-6 2xl:ml-12">
                    <div class="text-center lg:text-left self-stretch text-black text-3xl lg:text-5xl font-bold xl:leading-tight">
                        Selamatkan dan Hijaukan<br>Lingkungan Melalui<br>Bank Sampah
                    </div>
                    <div class="self-stretch mt-6 text-justify xl:text-lg 2xl:text-xl 2xl:leading-8">
                        Peran Setiap Individu <b class="text-primary">Sangat Penting</b> untuk Menjaga dan Menyelamatkan Lingkungan. Tidak Ada Kata Terlambat dalam Menjaga dan Menyelamatkan Lingkungan.
                        Salah Satu Usaha yang Dapat Dilakukan adalah Dengan Membuat <b class="text-primary">Bank Sampah</b> di Lingkungan Sekitar Kita.
                        Mari Kita Mulai dari Sekarang Memulai Usaha untuk Menjaga Lingkungan yang Dimulai dengan Langkah Kecil.
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row justify-between items-center w-full h-[1650px] lg:h-[650px] left-0 top-[750px] bg-primary px-8 py-20 lg:py-0 mt-24">
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
            <div class="mb-28">
                <div class="text-center self-stretch text-black text-3xl lg:text-5xl font-bold xl:leading-tight mt-12">
                    Tahukah Anda?
                </div>
                <div class="text-2xl mt-6 text-center mb-6">
                    <span class="text-primary font-bold">Sampah Daur Ulang</span> yang anda miliki dapat ditukarkan menjadi <span class="text-primary font-bold">Poin</span> <br>dengan jumlah yang beragam!
                </div>
                <div class="flex flex-row justify-around">
                    <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 items-center justify-between border-slate-200 border-2">
                        <div class="flex flex-col -mt-4">
                            <div class="self-stretch text-sm font-semibold text-center text-slate-400 mb-4">
                                50 Poin / KG
                            </div>
                            <div class="self-stretch text-4xl font-semibold text-center">
                                Sampah Plastik
                            </div>
                        </div>
                        <div class="flex flex-row space-x-3">
                            <img src="{{ asset('images/gambar_botolPlastik.png') }}" class="w-[15rem] h-[15rem] rounded-full object-cover">
                        </div>
                        <form action="/exchange">
                            <button type="submit" class="bg-lime-500 text-center p-3 rounded-[8px] text-white font-bold text-xl">
                                Tukarkan Poinmu!
                            </button>
                        </form>
                    </div>
                    <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 items-center justify-between border-slate-200 border-2">
                        <div class="flex flex-col -mt-4">
                            <div class="self-stretch text-sm font-semibold text-center text-slate-400 mb-4">
                                100 Poin / KG
                            </div>
                            <div class="self-stretch text-5xl font-semibold text-center">
                                Kaleng
                            </div>
                        </div>
                        <div class="flex flex-row space-x-3">
                            <img src="{{ asset('images/gambar_kaleng.png') }}" class="w-[15rem] h-[15rem] rounded-full object-cover">
                        </div>
                        <form action="/exchange">
                            <button type="submit" class="bg-lime-500 text-center p-3 rounded-[8px] text-white font-bold text-xl">
                                Tukarkan Poinmu!
                            </button>
                        </form>
                    </div>
                    <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 items-center justify-between border-slate-200 border-2 mb-8">
                        <div class="flex flex-col -mt-4">
                            <div class="self-stretch text-sm font-semibold text-center text-slate-400 mb-4">
                                200 POIN / KG
                            </div>
                            <div class="self-stretch text-5xl font-semibold text-center">
                                Botol Kaca
                            </div>
                        </div>
                        <div class="flex flex-row space-x-3">
                            <img src="{{ asset('images/gambar_botolKaca.png') }}" class="w-[15rem] h-[15rem] rounded-full object-cover">
                        </div>
                        <form action="/exchange">
                            <button type="submit" class="bg-lime-500 text-center p-3 rounded-[8px] text-white font-bold text-xl">
                                Tukarkan Poinmu!
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</x-layout>
