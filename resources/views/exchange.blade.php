<x-layout>
    <x-slot name="title">Tukar | Eco Peduli</x-slot>
    <div class="flex flex-col">
        <div class="flex flex-col justify-center items-center pt-6">
            <div class="text-center self-stretch text-black text-3xl lg:text-5xl font-bold xl:leading-tight mt-12">
                Ayo Tukarkan <span class="text-primary">Poinmu!</span>
            </div>
            <div class="font mt-1 text-center">
                Tukarkan <span class="text-primary font-bold">poin</span> yang anda miliki menjadi berbagai <span class="text-primary font-bold">sembako</span> yang bermanfaat
            </div>
        </div>
        <div class="flex flex-col mb-36 py-18 space-y-24 mt-20">
            <div class="flex flex-row justify-evenly items-center">
                <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 items-center justify-between border-slate-200 border-2">
                    <div class="flex flex-col -mt-4">
                        <div class="self-stretch text-sm font-semibold text-center text-slate-400 mb-4">
                            Sembako
                        </div>
                        <div class="self-stretch text-5xl font-semibold text-center">
                            Beras
                        </div>
                    </div>
                    <div class="flex flex-row space-x-3">
                        <img src="{{ asset('images/gambar_beras.png') }}" class="w-[15rem] h-[15rem] rounded-full object-cover">
                    </div>
                    <div class="bg-lime-500 text-center p-3 rounded-[8px] text-white font-bold text-xl">
                        Tukarkan Sekarang!
                    </div>
                </div>
                <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 items-center justify-between border-slate-200 border-2">
                    <div class="flex flex-col -mt-4">
                        <div class="self-stretch text-sm font-semibold text-center text-slate-400 mb-4">
                            Sembako
                        </div>
                        <div class="self-stretch text-5xl font-semibold text-center">
                            Gula
                        </div>
                    </div>
                    <div class="flex flex-row space-x-3">
                        <img src="{{ asset('images/gambar_gula.png') }}" class="w-[15rem] h-[15rem] rounded-full object-cover">
                    </div>
                    <div class="bg-lime-500 text-center p-3 rounded-[8px] text-white font-bold text-xl">
                        Tukarkan Sekarang!
                    </div>
                </div>
                <div class="bg-[#FAFAFA] h-[30rem] w-[20rem] rounded-xl flex flex-col py-10 items-center justify-between border-slate-200 border-2">
                    <div class="flex flex-col -mt-4">
                        <div class="self-stretch text-sm font-semibold text-center text-slate-400 mb-4">
                            Sembako
                        </div>
                        <div class="self-stretch text-5xl font-semibold text-center">
                            Dsb.
                        </div>
                    </div>
                    <div class="flex flex-row space-x-3">
                        <img src="{{ asset('images/gambar_sembako.png') }}" class="w-[15rem] h-[15rem] rounded-full object-cover">
                    </div>
                    <div class="bg-lime-500 text-center p-3 rounded-[8px] text-white font-bold text-xl">
                        Tukarkan Sekarang!
                    </div>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</x-layout>
