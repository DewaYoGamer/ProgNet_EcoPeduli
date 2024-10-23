<x-layout>
    <x-slot name="title">Pemilahan Sampah | Eco Peduli</x-slot>
    <div class="flex flex-col">
        <div class="flex flex-col justify-center items-center pt-6">
            <div class="relative text-center self-stretch text-black text-3xl lg:text-5xl font-bold xl:leading-tight mt-32">
                <img src="{{ asset('images/background.jpg') }}" class="absolute inset-0 w-full h-[365px] rounded object-cover opacity-25 -mt-40">
                <span class="relative">Pemilahan Sampah</span>
            </div>
        </div>
        <div class="flex flex-col mb-20 p-20 space-y-24 mt-36 bg-primary">
            <div class="flex flex-row justify-evenly items-center">
                <div class="bg-[#FAFAFA] h-full w-full rounded-xl flex flex-col p-10 items-left justify-between border-slate-200 border-2">
                    <div class="flex flex-col">
                        <img src="{{ asset('images/pemilahan1.jpg') }}" class="w-full h-[30rem] rounded-[12px] object-cover object-top">
                            <div class="flex flex-row mt-8 items-center">
                                <img src="{{ asset('images/Asset 1.png') }}" class="w-[4rem] h-[6rem] mr-8">
                                <p class="text-justify mt-5 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:underline" id="topik1-btn">Apa Pentingnya Pemilahan Sampah dalam Kehidupan Sehari-hari?</p>
                            </div>
                            <div class="flex flex-row mt-8 items-center">
                                <img src="{{ asset('images/Asset 2.png') }}" class="w-[4rem] h-[5rem] mr-8">
                                <p class="text-justify mt-5 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:underline" id="topik2-btn">Bagaimana Cara Melakukan Pemilahan Sampah yang Efektif?</p>
                            </div>
                            <div class="flex flex-row mt-8 items-center">
                                <img src="{{ asset('images/Asset 3.png') }}" class="w-[4rem] h-[4rem] mr-8">
                                <p class="text-justify mt-5 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:underline" id="topik3-btn">Apa Tantangan yang Dihadapi dalam Pemilahan Sampah di Masyarakat?</p>
                            </div>
                            <div class="flex flex-row mt-8 items-center">
                                <img src="{{ asset('images/Asset 4.png') }}" class="w-[4rem] h-[4rem] mr-8">
                                <p class="text-justify mt-5 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:underline" id="topik4-btn">Apa Manfaat Daur Ulang dalam Konteks Pemilahan Sampah?</p>
                            </div>     
                    </div>
                    <a href="/educate" class="bg-lime-500 w-full text-center p-3 rounded-[8px] text-white font-bold text-xl mt-8">
                        KEMBALI
                    </a>
                </div>
            </div>
        </div>

        <!-- Modal overlay for Topik 1 -->
        <div id="topik1-modal" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg w-[90rem] p-8">
                <div class="flex flex-row items-center">
                    <img src="{{ asset('images/Asset 1.png') }}" class="w-[10rem] h-[11rem] mr-8">
                    <div class="flex flex-col">
                            <h2 class="text-4xl font-bold mb-4">Apa Pentingnya Pemilahan Sampah dalam Kehidupan Sehari-hari?</h2>
                            <p class="text-2xl">
                                Pemilahan sampah penting untuk mengurangi jumlah limbah yang masuk ke tempat pembuangan akhir (TPA), sehingga dapat memperpanjang umur TPA dan mengurangi dampak negatif terhadap lingkungan. Dengan memisahkan sampah organik dan anorganik, kita dapat mengoptimalkan proses daur ulang dan pengelolaan limbah, serta mengurangi polusi dan emisi gas rumah kaca.
                            </p>
                    </div>
                </div>
                <button id="close-modal1" class="bg-lime-500 font-bold text-white px-4 py-2 rounded-lg mt-6">Tutup</button>
            </div>
        </div>

        <!-- Modal overlay for Topik 2 -->
        <div id="topik2-modal" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg w-[90rem] p-8">
                <div class="flex flex-row items-center">
                    <img src="{{ asset('images/Asset 2.png') }}" class="w-[10rem] h-[11rem] mr-8">
                    <div class="flex flex-col">
                            <h2 class="text-4xl font-bold mb-4">Bagaimana Cara Melakukan Pemilahan Sampah yang Efektif?</h2>
                            <p class="text-2xl">
                                Melakukan pemilahan sampah yang efektif di rumah dapat dimulai dengan menyediakan beberapa wadah terpisah untuk sampah organik, anorganik, dan daur ulang. Pastikan untuk memberikan informasi yang jelas kepada anggota keluarga mengenai jenis sampah yang harus dibuang ke masing-masing wadah.
                            </p>
                    </div>
                </div>
                <button id="close-modal2" class="bg-lime-500 font-bold text-white px-4 py-2 rounded-lg mt-6">Tutup</button>
            </div>
        </div>

        <!-- Modal overlay for Topik 3 -->
        <div id="topik3-modal" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg w-[90rem] p-8">
                <div class="flex flex-row items-center">
                    <img src="{{ asset('images/Asset 3.png') }}" class="w-[10rem] h-[10rem] mr-8">
                    <div class="flex flex-col">
                            <h2 class="text-4xl font-bold mb-4">Apa Tantangan yang Dihadapi dalam Pemilahan Sampah di Masyarakat?</h2>
                            <p class="text-2xl">
                                Tantangan dalam pemilahan sampah di masyarakat meliputi kurangnya kesadaran dan edukasi mengenai pentingnya pemilahan, fasilitas pengelolaan sampah yang tidak memadai, dan kebiasaan masyarakat yang sulit diubah.
                            </p>
                    </div>
                </div>
                <button id="close-modal3" class="bg-lime-500 font-bold text-white px-4 py-2 rounded-lg mt-6">Tutup</button>
            </div>
        </div>

        <!-- Modal overlay for Topik 4 -->
        <div id="topik4-modal" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg w-[90rem] p-8">
                <div class="flex flex-row items-center">
                    <img src="{{ asset('images/Asset 4.png') }}" class="w-[10rem] h-[10rem] mr-8">
                    <div class="flex flex-col">
                            <h2 class="text-4xl font-bold mb-4">Apa Manfaat Daur Ulang dalam Konteks Pemilahan Sampah?</h2>
                            <p class="text-2xl">
                                Daur ulang memiliki banyak manfaat, seperti mengurangi jumlah sampah yang masuk ke TPA, menghemat sumber daya alam, dan mengurangi pencemaran lingkungan. Daur ulang juga dapat menciptakan lapangan kerja baru dalam industri pengelolaan limbah.
                            </p>
                    </div>
                </div>
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
