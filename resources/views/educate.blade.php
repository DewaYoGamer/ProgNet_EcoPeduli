<x-layout>
    <x-slot name="title">Edukasi | Eco Peduli</x-slot>
    <div class="flex flex-col">
        <div class="flex flex-col justify-center items-center pt-6">
            <div class="text-center self-stretch text-black text-3xl lg:text-6xl font-bold xl:leading-tight mt-12">
                Edukasi Sampah
            </div>
            <div class="mt-12 text-center text-2xl w-[55rem]">
                Di sini, Anda dapat mempelajari cara <span class="text-primary font-bold">mengelola sampah</span>
                dengan benar, mulai dari <span class="text-primary font-bold">pemilahan yang tepat</span>,
                <span class="text-primary font-bold">langkah-langkah pengelolaan sampah</span> di rumah, hingga
                <span class="text-primary font-bold">dampak buruk dari pembuangan sampah sembarangan</span>. Yuk,
                mulai langkah kecil untuk bumi yang lebih baik dengan membaca <span class="text-primary font-bold">informasi penting</span> ini!
            </div>
        </div>

        <!-- Carousel Section -->
        <div class="flex flex-col mb-20 py-24 space-y-24 mt-20 bg-primary">
            <div class="flex flex-col justify-center items-center relative w-full h-[35rem] overflow-hidden">
                <div class="flex items-center transition-transform duration-500 ease-in-out transform" id="carousel" style="transform: translateX(-100%);">
                    <!-- Clone Last Item (for infinite loop) -->
                    <div class="w-full flex-shrink-0 flex justify-center">
                        <div class="bg-gradient-to-r from-third to-fourth h-[30rem] w-[80rem] rounded-xl flex flex-col py-10 px-9 shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <div class="flex flex-col justify-between h-full">
                                <div class="flex flex-col">
                                    <div class="self-stretch text-5xl font-semibold text-left text-white">Dampak Buruk Sampah</div>
                                    <p class="text-white text-left text-2xl mt-2">Kenali bahaya dari sampah yang dibuang sembarangan dan dampaknya terhadap lingkungan!</p>
                                </div>
                                <div class="flex flex-row justify-end">
                                    <img src="{{ asset('images/dampak.jpg') }}" class="w-[15rem] h-[15rem] rounded-full object-cover shadow-md">
                                </div>
                                <div class="mt-4">
                                    <a href="/educate/dampak" class="bg-white w-full text-center p-3 rounded-[8px]  text-lime-600 font-bold text-2xl shadow-md hover:bg-lime-600 hover:text-white transition-colors">
                                        Pelajari Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 1 (Pemilahan Sampah) -->
                    <div class="w-full flex-shrink-0 flex justify-center">
                        <div class="bg-gradient-to-r from-third to-fourth h-[30rem] w-[80rem] rounded-xl flex flex-col py-10 px-9 shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <div class="flex flex-col justify-between h-full">
                                <div class="flex flex-col">
                                    <div class="self-stretch text-5xl font-semibold text-left text-white">Pemilahan Sampah</div>
                                    <p class="text-white text-left text-2xl mt-2">Pelajari cara memilah sampah yang benar untuk menjaga lingkungan kita!</p>
                                </div>
                                <div class="flex flex-row justify-end">
                                    <img src="{{ asset('images/pemilahan.jpg') }}" class="w-[15rem] h-[15rem] rounded-full object-cover shadow-md">
                                </div>
                                <div class="mt-4">
                                    <a href="/educate/pemilahan" class="bg-white w-full text-center p-3 rounded-[8px] text-lime-600 font-bold text-2xl shadow-md hover:bg-lime-600 hover:text-white transition-colors">
                                        Pelajari Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 (Pengelolaan Sampah) -->
                    <div class="w-full flex-shrink-0 flex justify-center">
                        <div class="bg-gradient-to-r from-third to-fourth h-[30rem] w-[80rem] rounded-xl flex flex-col py-10 px-9 shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <div class="flex flex-col justify-between h-full">
                                <div class="flex flex-col">
                                    <div class="self-stretch text-5xl font-semibold text-left text-white">Pengelolaan Sampah</div>
                                    <p class="text-white text-left text-2xl mt-2">Ketahui langkah-langkah pengelolaan sampah di rumah untuk mengurangi limbah!</p>
                                </div>
                                <div class="flex flex-row justify-end">
                                    <img src="{{ asset('images/pengelolaan.jpg') }}" class="w-[15rem] h-[15rem] rounded-full object-cover shadow-md">
                                </div>
                                <div class="mt-4">
                                    <a href="/educate/pengelolaan" class="bg-white w-full text-center p-3 rounded-[8px] text-lime-600 font-bold text-2xl shadow-md hover:bg-lime-600 hover:text-white transition-colors">
                                        Pelajari Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 (Dampak Buruk Sampah) -->
                    <div class="w-full flex-shrink-0 flex justify-center">
                        <div class="bg-gradient-to-r from-third to-fourth h-[30rem] w-[80rem] rounded-xl flex flex-col py-10 px-9 shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <div class="flex flex-col justify-between h-full">
                                <div class="flex flex-col">
                                    <div class="self-stretch text-5xl font-semibold text-left text-white">Dampak Buruk Sampah</div>
                                    <p class="text-white text-left text-2xl mt-2">Kenali bahaya dari sampah yang dibuang sembarangan dan dampaknya terhadap lingkungan!</p>
                                </div>
                                <div class="flex flex-row justify-end">
                                    <img src="{{ asset('images/dampak.jpg') }}" class="w-[15rem] h-[15rem] rounded-full object-cover shadow-md">
                                </div>
                                <div class="mt-4">
                                    <a href="/educate/dampak" class="bg-white w-full text-center p-3 rounded-[8px]  text-lime-600 font-bold text-2xl shadow-md hover:bg-lime-600 hover:text-white transition-colors">
                                        Pelajari Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Clone First Item (for infinite loop) -->
                    <div class="w-full flex-shrink-0 flex justify-center">
                        <div class="bg-gradient-to-r from-third to-fourth h-[30rem] w-[80rem] rounded-xl flex flex-col py-10 px-9 shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <div class="flex flex-col justify-between h-full">
                                <div class="flex flex-col">
                                    <div class="self-stretch text-5xl font-semibold text-left text-white">Pemilahan Sampah</div>
                                    <p class="text-white text-left text-2xl mt-2">Pelajari cara memilah sampah yang benar untuk menjaga lingkungan kita!</p>
                                </div>
                                <div class="flex flex-row justify-end">
                                    <img src="{{ asset('images/pemilahan.jpg') }}" class="w-[15rem] h-[15rem] rounded-full object-cover shadow-md">
                                </div>
                                <div class="mt-4">
                                    <a href="/educate/pemilahan" class="bg-white w-full text-center p-3 rounded-[8px] text-lime-600 font-bold text-2xl shadow-md hover:bg-lime-600 hover:text-white transition-colors">
                                        Pelajari Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button id="prev" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-black bg-opacity-50 p-2 text-white rounded-full">
                    &#10094;
                </button>
                <button id="next" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-black bg-opacity-50 p-2 text-white rounded-full">
                    &#10095;
                </button>
            </div>
        </div>

        <x-footer></x-footer>
    </div>

    <!-- JavaScript for Infinite Carousel -->
    <script>
        const carousel = document.getElementById('carousel');
        const totalItems = 5; // Total including clones
        let currentIndex = 1; // Start from index 1 (Pemilahan Sampah)
        const autoSlideInterval = 5000; // 5 seconds
        let isAutoSliding = true;

        const updateCarousel = () => {
            carousel.style.transition = 'transform 0.5s ease-in-out';
            carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
        };

        const checkIndex = () => {
            if (currentIndex === 0) {
                carousel.style.transition = 'none'; // Disable transition for instant jump
                currentIndex = totalItems - 2; // Move to the last real item
                carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            } else if (currentIndex === totalItems - 1) {
                carousel.style.transition = 'none'; // Disable transition for instant jump
                currentIndex = 1; // Move to the first real item
                carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            }
        };

        document.getElementById('next').addEventListener('click', () => {
            if (currentIndex < totalItems - 1) {
                currentIndex++;
            }
            updateCarousel();
        });

        document.getElementById('prev').addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
            }
            updateCarousel();
        });

        carousel.addEventListener('transitionend', checkIndex);

        const autoSlide = () => {
            if (isAutoSliding) {
                currentIndex++;
                updateCarousel();
            }
        };

        // Auto-slide every 5 seconds
        setInterval(autoSlide, autoSlideInterval);

        // Pause auto-slide when user interacts
        document.getElementById('next').addEventListener('click', () => isAutoSliding = false);
        document.getElementById('prev').addEventListener('click', () => isAutoSliding = false);
    </script>
</x-layout>
