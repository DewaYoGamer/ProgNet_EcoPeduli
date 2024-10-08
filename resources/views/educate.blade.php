<x-layout>
    <x-slot name="title">Edukasi | Eco Peduli</x-slot>
    <div class="flex flex-col">
        <div class="flex flex-col justify-center items-center pt-6">
            <div class="text-center self-stretch text-black text-3xl lg:text-5xl font-bold xl:leading-tight mt-12">
                Edukasi Sampah
            </div>
            <div class="mt-12 text-center w-[45rem]">
                Di sini, Anda dapat mempelajari cara <span class="text-primary font-bold">mengelola sampah</span> dengan benar, mulai dari <span class="text-primary font-bold">pemilahan yang tepat</span>, <span class="text-primary font-bold">langkah-langkah pengelolaan sampah</span> di rumah, hingga <span class="text-primary font-bold">dampak buruk dari pembuangan sampah sembarangan</span>. Yuk, mulai langkah kecil untuk bumi yang lebih baik dengan membaca <span class="text-primary font-bold">informasi penting </span> ini!
            </div>
        </div>
        <div class="flex flex-col mb-20 py-32 space-y-24 mt-20 bg-primary">
            <div class="flex flex-row justify-evenly items-center">
                <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 px-9 items-center justify-between border-slate-200 border-2">
                    <div class="flex flex-col -mt-4">
                        <div class="self-stretch text-3xl font-semibold text-center">
                            Pemilahan Sampah
                        </div>
                    </div>
                    <div class="flex flex-row space-x-3">
                        <img src="{{ asset('images/pemilahan.jpg') }}" class="w-[15rem] h-[15rem] rounded object-cover">
                    </div>
                    <a href="/pemilahan" class="bg-lime-500 w-full text-center p-3 rounded-[8px] text-white font-bold text-xl">
                        Pelajari Sekarang
                    </a>
                </div>
                <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 px-9 items-center justify-between border-slate-200 border-2">
                    <div class="flex flex-col -mt-4">
                        <div class="self-stretch text-3xl font-semibold text-center">
                            Pengelolaan Sampah
                        </div>
                    </div>
                    <div class="flex flex-row space-x-3">
                        <img src="{{ asset('images/pengelolaan.jpg') }}" class="w-[15rem] h-[15rem] rounded object-cover">
                    </div>
                    <a href="/pengelolaan" class="bg-lime-500 w-full text-center p-3 rounded-[8px] text-white font-bold text-xl">
                        Pelajari Sekarang
                    </a>
                </div>
                <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 px-9 items-center justify-between border-slate-200 border-2">
                    <div class="flex flex-col -mt-4">
                        <div class="self-stretch text-3xl font-semibold text-center">
                            Dampak Buruk Sampah
                        </div>
                    </div>
                    <div class="flex flex-row space-x-3 ">
                        <img src="{{ asset('images/dampak.jpg') }}" class="w-[15rem] h-[15rem] rounded object-cover">
                    </div>
                    <a href="/dampak" class="bg-lime-500 w-full text-center p-3 rounded-[8px] text-white font-bold text-xl">
                        Pelajari Sekarang
                    </a>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</x-layout>
