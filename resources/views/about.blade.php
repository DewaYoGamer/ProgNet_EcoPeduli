<x-layout>
    <x-slot name="title">Tentang | Eco Peduli</x-slot>
        <div class="flex flex-col min-h-screen">
            <div class="flex-grow py-16">
                <div class="relative flex justify-center items-center">
                    <div class="w-[1000px] px-8 ">
                        <div class="text-center self-stretch text-black text-5xl font-bold ">
                            Temui Tim <span class="text-primary font-bold">Eco-Peduli</span>
                        </div>
                        <div class="self-stretch text-xl h-[130px] mt-12 -mb-6 xl:mt-12 xl:-mb-0 text-center">
                            Tim yang senantiasa berkomitmen untuk memberikan yang terbaik bagi lingkungan dan masyarakat.
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-between items-center w-full xl:h-[700px] left-0 bg-primary px-8 py-24 space-y-12">
                    <div class="flex flex-row justify-evenly items-center w-full px-12 space-x-12">
                        <div class="w-[284.58px] h-[434.48px] px-[35.99px] pd-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px] inline-flex">
                            <img src="{{asset('images/arya.jpg')}}" class="-mt-10 rounded-[10px]">
                            <div class="self-stretch text-primary text-2xl font-semibold">Arya</div>
                            <div class="self-stretch text-black text-base font-medium">Arya merupakan Pemimpin dari Project ini.</div>
                        </div>
                        <div class="w-[284.58px] h-[434.48px] px-[35.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px] inline-flex">
                            <img src="{{asset('images/nyoman.jpg')}}" class="-mt-6 rounded-[10px]">
                            <div class="self-stretch text-primary text-2xl font-semibold">Nyoman</div>
                            <div class="self-stretch text-black text-base font-medium">Nyoman merupakan Wakil Pemimpin dari Project ini.</div>
                        </div>
                        <div class="hidden xl:flex w-[284.58px] h-[434.48px] px-[35.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px]">
                            <img src="{{asset('images/wira.jpg')}}" class="-mt-10 rounded-[10px]">
                            <div class="self-stretch text-primary text-2xl font-semibold">Wira</div>
                            <div class="self-stretch text-black text-base font-medium">Wira merupakan Designer dari Project ini.</div>
                        </div>
                        <div class="hidden xl:flex w-[284.58px] h-[434.48px] px-[35.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px]">
                            <img src="{{asset('images/yoga.jpg')}}" class="-mt-6 rounded-[10px]">
                            <div class="self-stretch text-primary text-2xl font-semibold">Yoga</div>
                            <div class="self-stretch text-black text-base font-medium">Yoga merupakan Programmer dari Project ini</div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly items-center w-full px-12 space-x-12">
                        <div class="flex xl:hidden w-[284.58px] h-[434.48px] px-[35.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px]">
                            <img src="{{asset('images/wira.jpg')}}" class="-mt-10 rounded-[10px]">
                            <div class="self-stretch text-primary text-2xl font-semibold">Wira</div>
                            <div class="self-stretch text-black text-base font-medium">Wira merupakan Designer dari Project ini.</div>
                        </div>
                        <div class="flex xl:hidden w-[284.58px] h-[434.48px] px-[35.99px] py-[29.28px] bg-white rounded-[20px] flex-col justify-center items-center gap-[16.40px]">
                            <img src="{{asset('images/yoga.jpg')}}" class="-mt-6 rounded-[10px]">
                            <div class="self-stretch text-primary text-2xl font-semibold">Yoga</div>
                            <div class="self-stretch text-black text-base font-medium">Yoga merupakan Programmer dari Project ini</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center pt-32 px-8">
                    <img src="{{ asset('images/nature.jpg') }}" class="rounded-[15px] w-[1250px] h-[400px] object-cover">
                </div>
                <div class="relative flex justify-center items-center mt-12 space-y-12 px-8">
                    <div class="w-[1050px] flex flex-col">
                        <div class="self-stretch text-black text-3xl lg:text-5xl font-bold xl:leading-tight">
                            Misi Kami
                        </div>
                        <div class="self-stretch h-[130px] mt-6 text-justify">
                            Misi utama dari <span class="text-primary font-bold">Eco-Peduli</span> adalah untuk mengajak masyarakat agar peduli terhadap lingkungan melalui hal-hal yang positif dan tentunya memberikan banyak keuntungan. Kami berkomitmen untuk memberikan yang terbaik bagi lingkungan dan masyarakat. Dengan adanya <span class="text-primary font-bold">Eco-Peduli</span>, maka masalah sampah yang selama ini menjadi momok bagi lingkungan dapat diatasi dengan baik.
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-center w-full min-h-screen mt-12 bg-primary py-20">
                    <div class="w-[1000px] pl-28 pr-12 flex flex-col">
                        <div class="self-stretch text-white text-3xl lg:text-5xl font-bold lg:leading-snug">
                            Pertanyaan yang<br>sering ditanyakan
                        </div>
                        <div class="mt-8 space-y-8">
                            <div class="border-b border-gray-200 py-4">
                                <h3 class="text-lg font-bold text-white">
                                    Apa itu EcoPeduli?
                                </h3>
                                <div class="mt-3 text-white">
                                    EcoPeduli merupakan Program Bank Sampah untuk mendapatkan poin yang dapat ditukarkan menjadi berbagai macam barang.
                                </div>
                            </div>
                            <div class="border-b border-gray-200 py-4">
                                <h3 class="text-lg font-bold text-white">
                                    Bagaimana cara menggunakannya?
                                </h3>
                                <div class="mt-3 text-white">
                                    Anda bisa mendaftar terlebih dahulu dan Anda bisa menukarkan sampah sesuai dengan jadwal dan kategori sampah tersebut.
                                </div>
                            </div>
                            <div class="border-b border-gray-200 py-4">
                                <h3 class="text-lg font-bold text-white">
                                    Apa benefit dari poin yang didapatkan?
                                </h3>
                                <div class="mt-3 text-white">
                                    Poin dapat ditukarkan menjadi berbagai macam barang, mulai dari Beras, Gula, Garam, dan sebagainya.
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('images/question.svg') }}" class="h-[500px] mt-20 mr-12 rotate-12">
                </div>
            </div>
            <x-footer></x-footer>
        </div>
</x-layout>
