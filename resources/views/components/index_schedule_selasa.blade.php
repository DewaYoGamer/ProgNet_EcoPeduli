<div x-data="{ clicked: false }" class="select-none cursor-pointer bg-white h-[15rem] w-[15rem] md:h-[20rem] md:w-[20rem] rounded-xl flex flex-col py-6 md:py-10 items-center justify-between transition-transform duration-200 hover:scale-105" @click="clicked = !clicked">
    <div class="self-stretch text-3xl md:text-5xl font-semibold text-center">
        Selasa
    </div>
    <!-- Default View -->
    <div x-show="!clicked" class="bg-yellow-500 text-center p-3 rounded-[8px] text-white font-bold md:text-xl">
        DAUR ULANG
    </div>
    <div x-show="!clicked" class="w-full h-[4rem] -mb-2 flex flex-col justify-center items-center">
        <div class="border-t-2 border-t-gray-300 w-[12rem] md:w-[16rem] mb-4">
        </div>
        <div class="flex flex-row space-x-3">
            <img src="{{ asset('images/nyoman.jpg') }}" class="w-10 h-10 rounded-full object-cover">
            <img src="{{ asset('images/yoga.jpg') }}" class="w-10 h-10 rounded-full object-cover">
            <img src="{{ asset('images/wira.jpg') }}" class="w-10 h-10 rounded-full object-cover">
            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-black text-sm font-bold">
                +2
            </div>
        </div>
    </div>

    <!-- Clicked View -->
    <div x-show="clicked" class="min-w-full min-h-full flex flex-col items-center p-4">
        <div class="w-[16rem] text-black font-bold md:text-xl p-2">
            <div class="flex flex-col space-y-2">
                <div class="flex flex-row items-center">
                    <img src="{{ asset('images/nyoman.jpg') }}" class="w-10 h-10 rounded-full object-cover mr-3">
                    <div class="text-base font-medium">
                        Nyoman Wiprayanka
                    </div>
                </div>
                <div class="flex flex-row items-center">
                    <img src="{{ asset('images/yoga.jpg') }}" class="w-10 h-10 rounded-full object-cover mr-3">
                    <div class="text-base font-medium">
                        Dewa Putu Ananta Prayoga
                    </div>
                </div>
                <div class="flex flex-row items-center">
                    <img src="{{ asset('images/wira.jpg') }}" class="w-10 h-10 rounded-full object-cover mr-3">
                    <div class="text-base font-medium">
                        Agus Arya Wiraguna
                    </div>
                </div>
                <div class="flex flex-row items-center">
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-black text-sm font-bold mr-3">
                        +2
                    </div>
                    <div class="text-base font-medium">
                        2 Orang Lainnya
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
