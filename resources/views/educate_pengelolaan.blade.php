<x-layout>
    <x-slot name="title">Pengelolaan Sampah | Eco Peduli</x-slot>
    <div class="flex flex-col">
        <div class="flex flex-col justify-center items-center pt-6">
            <div class="relative text-center self-stretch text-black text-3xl lg:text-5xl font-bold xl:leading-tight mt-32">
                <img src="{{ asset('images/background.jpg') }}" class="absolute inset-0 w-full h-[365px] rounded object-cover opacity-25 -mt-40">
                <span class="relative">Pengelolaan Sampah</span>
            </div>
        </div>
        <div class="flex flex-col mb-20 p-20 space-y-24 mt-36 bg-primary">
            <div class="flex flex-row justify-evenly items-center">
                <div class="bg-[#FAFAFA] h-[33rem] w-full rounded-xl flex flex-col p-10 items-left justify-between border-slate-200 border-2">
                    <div class="flex flex-row">
                        <img src="{{ asset('images/pengelolaan.jpg') }}" class="w-[38rem] h-[22rem] rounded object-cover">
                        <div class="px-10 self-stretch text-2xl flex">
                            <p class="font-normal text-justify">
                                <span class="font-bold text-5xl">Pengelolaan Sampah</span>
                                <br>
                                <span class="mt-10 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:underline" id="topik1-btn">1. Bagaimana Cara Pengelolaan Sampah yang Baik dan Benar di Rumah Tangga?</span>
                                <br>
                                <span class="mt-4 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:underline" id="topik2-btn">2. Apa dampak dari pengelolaan sampah yang buruk terhadap lingkungan?</span>
                                <br>
                                <span class="mt-4 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:underline" id="topik3-btn">3. Apa Tantangan dalam Pengelolaan Sampah dan Bagaimana Mengatasinya?</span>
                                <br>
                                <span class="mt-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:underline" id="topik4-btn">4. Apa Peran Bank Sampah dalam Pengelolaan Sampah dan Sistem Kerjanya?</span>
                            </p>
                        </div>
                    </div>
                    <a href="/educate" class="bg-lime-500 w-full text-center p-3 rounded-[8px] text-white font-bold text-xl my-10">
                        KEMBALI
                    </a>
                </div>
            </div>
        </div>

        <!-- Modal overlay for Topik 1 -->
        <div id="topik1-modal" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg w-[90rem] p-8">
                <h2 class="text-4xl font-bold mb-4">1. Bagaimana Cara Pengelolaan Sampah yang Baik dan Benar di Rumah Tangga?</h2>
                <p class="text-2xl">
                    Cara Pengelolaan Sampah yang Baik dan Benar di Rumah Tangga adalah dengan memisahkan sampah organik, anorganik, dan berbahaya, serta menerapkan prinsip 3R (Reduce, Reuse, Recycle). Sampah organik dapat dijadikan kompos, sedangkan sampah anorganik seperti plastik, kertas, dan logam dapat didaur ulang. Mengurangi penggunaan barang sekali pakai dan membuang sampah berbahaya (B3) di tempat yang benar juga penting untuk menjaga kebersihan dan kesehatan lingkungan.
                </p>
                <button id="close-modal1" class="bg-lime-500 font-bold text-white px-4 py-2 rounded-lg mt-6">Tutup</button>
            </div>
        </div>

        <!-- Modal overlay for Topik 2 -->
        <div id="topik2-modal" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg w-[90rem] p-8">
                <h2 class="text-4xl font-bold mb-4">2. Apa dampak dari pengelolaan sampah yang buruk terhadap lingkungan?</h2>
                <p class="text-2xl">
                    Dampak dari Pengelolaan Sampah yang Buruk terhadap Lingkungan meliputi pencemaran tanah, air, dan udara akibat sampah yang tidak terolah dengan baik, terutama plastik dan limbah berbahaya. Sampah yang tidak terkelola dapat menyebabkan banjir, merusak ekosistem, dan mengancam kesehatan manusia dengan memicu penyakit yang disebabkan oleh limbah beracun atau polusi udara dari pembakaran sampah.
                </p>
                <button id="close-modal2" class="bg-lime-500 font-bold text-white px-4 py-2 rounded-lg mt-6">Tutup</button>
            </div>
        </div>

        <!-- Modal overlay for Topik 3 -->
        <div id="topik3-modal" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg w-[95rem] p-8">
                <h2 class="text-4xl font-bold mb-4">3. Apa Tantangan Utama dalam Pengelolaan Sampah di Perkotaan dan Bagaimana Cara Mengatasinya?</h2>
                <p class="text-2xl">
                    Tantangan Utama dalam Pengelolaan Sampah di Perkotaan adalah meningkatnya volume sampah, kurangnya kesadaran masyarakat dalam memilah sampah, terbatasnya infrastruktur pengolahan, serta pengelolaan sampah plastik yang sulit didaur ulang. Untuk mengatasi hal ini, diperlukan edukasi yang lebih luas, peningkatan fasilitas daur ulang, kebijakan pengurangan plastik sekali pakai, serta pengembangan teknologi pengolahan sampah yang lebih efisien.
                </p>
                <button id="close-modal3" class="bg-lime-500 font-bold text-white px-4 py-2 rounded-lg mt-6">Tutup</button>
            </div>
        </div>

        <!-- Modal overlay for Topik 4 -->
        <div id="topik4-modal" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg w-[90rem] p-8">
                <h2 class="text-4xl font-bold mb-4">4. Apa Peran Bank Sampah dalam Pengelolaan Sampah dan Bagaimana Sistem Kerjanya?</h2>
                <p class="text-2xl">
                    Peran Bank Sampah dalam Pengelolaan Sampah adalah membantu masyarakat dalam memilah dan menukar sampah anorganik yang dapat didaur ulang dengan uang atau barang. Bank sampah mendorong kesadaran lingkungan dengan mengurangi sampah yang masuk ke TPA, meningkatkan ekonomi lokal, dan mendukung program daur ulang dengan mendistribusikan sampah ke industri pengolahan. Sistem kerjanya melibatkan pengumpulan, pemilahan, dan penukaran sampah dari masyarakat.
                </p>
                <button id="close-modal4" class="bg-lime-500 font-bold text-white px-4 py-2 rounded-lg mt-6">Tutup</button>
            </div>
        </div>


        <x-footer></x-footer>
    </div>

    <script>
        // JavaScript to handle modal open and close
        const modals = {
            topik1: { btn: document.getElementById('topik1-btn'), modal: document.getElementById('topik1-modal'), closeBtn: document.getElementById('close-modal1') },
            topik2: { btn: document.getElementById('topik2-btn'), modal: document.getElementById('topik2-modal'), closeBtn: document.getElementById('close-modal2') },
            topik3: { btn: document.getElementById('topik3-btn'), modal: document.getElementById('topik3-modal'), closeBtn: document.getElementById('close-modal3') },
            topik4: { btn: document.getElementById('topik4-btn'), modal: document.getElementById('topik4-modal'), closeBtn: document.getElementById('close-modal4') }
        };

        // Function to open modal
        function openModal(modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');  // Make sure it displays as flex when opened
        }

        // Function to close modal
        function closeModal(modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');  // Remove flex when closing
        }

        for (const key in modals) {
            const { btn, modal, closeBtn } = modals[key];

            // Open modal on button click
            btn.addEventListener('click', () => {
                openModal(modal);
            });

            // Close modal on close button click
            closeBtn.addEventListener('click', () => {
                closeModal(modal);
            });

            // Close modal if clicked outside of the modal content
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal(modal);
                }
            });
        }
    </script>
</x-layout>
