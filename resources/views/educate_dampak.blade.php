<x-layout>
    <x-slot name="title">Dampak Buruk Sampah | Eco Peduli</x-slot>
    <div class="flex flex-col">
        <div class="flex flex-col justify-center items-center pt-6">
            <div class="relative text-center self-stretch text-black text-3xl lg:text-5xl font-bold xl:leading-tight mt-32">
                <img src="{{ asset('images/background.jpg') }}" class="absolute inset-0 w-full h-[365px] rounded object-cover opacity-25 -mt-40">
                <span class="relative">Dampak Buruk Sampah</span>
            </div>
        </div>
        <div class="flex flex-col mb-20 p-20 space-y-24 mt-36 bg-primary">
            <div class="flex flex-row justify-evenly items-center">
                <div class="bg-[#FAFAFA] h-full w-full rounded-xl flex flex-col p-10 items-left justify-between border-slate-200 border-2">
                    <div class="flex flex-col">
                        <img src="{{ asset('images/dampak1.jpg') }}" class="w-full h-[30rem] rounded object-cover object-top">
                        <div class="flex flex-row mt-8 items-center">
                            <img src="{{ asset('images/Asset 8.png') }}" class="w-[6rem] h-[3rem] mr-8">
                            <p class="text-justify underline mt-5 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:text-third" id="topik1-btn">Apa Dampak Buruk Sampah Terhadap Kesehatan dan Lingkungan?</p>
                        </div>
                        <div class="flex flex-row mt-8 items-center">
                            <img src="{{ asset('images/Asset 9.png') }}" class="w-[6rem] h-[3rem] mr-8">
                            <p class="text-justify underline mt-5 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:text-third" id="topik2-btn">Apa Dampak Sampah Plastik terhadap Ekosistem Laut?</p>
                        </div>
                        <div class="flex flex-row mt-8 items-center">
                            <img src="{{ asset('images/Asset 5.png') }}" class="w-[6rem] h-[3rem] mr-8">
                            <p class="text-justify underline mt-5 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:text-third" id="topik3-btn">Bagaimana Sampah yang Menumpuk Dapat Menyebabkan Banjir?</p>
                        </div>
                        <div class="flex flex-row mt-8 items-center">
                            <img src="{{ asset('images/Asset 10.png') }}" class="w-[4rem] h-[5rem] ml-4 mr-12">
                            <p class="text-justify underline mt-5 mb-4 inline-block cursor-pointer text-primary text-2xl font-semibold hover:text-third" id="topik4-btn">Apa Bahaya Limbah Elektronik bagi Kesehatan dan Lingkungan?</p>
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
                <div class="flex flex-row items-center">
                    <img src="{{ asset('images/Asset 8.png') }}" class="w-[10rem] h-[6rem] mr-8">
                    <div class="flex flex-col">
                            <h2 class="text-4xl font-bold mb-4">Apa Dampak Buruk Sampah Terhadap Kesehatan dan Lingkungan?</h2>
                            <p class="text-2xl">
                                Sampah yang tidak dikelola dengan baik dapat menyebabkan dampak buruk bagi kesehatan dan lingkungan, seperti pencemaran air, tanah, dan udara. Sampah organik yang membusuk menghasilkan gas metana, yang berkontribusi pada pemanasan global, sementara limbah plastik mencemari lautan dan merusak ekosistem laut. Sampah berbahaya (B3) seperti baterai atau bahan kimia dapat mencemari tanah dan sumber air, membahayakan kesehatan manusia. Selain itu, penumpukan sampah di lingkungan menjadi sarang bagi vektor penyakit seperti lalat dan tikus, yang dapat menyebabkan penyebaran penyakit menular.
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
                    <img src="{{ asset('images/Asset 9.png') }}" class="w-[10rem] h-[5rem] mr-8">
                    <div class="flex flex-col">
                            <h2 class="text-4xl font-bold mb-4">Apa Dampak Sampah Plastik terhadap Ekosistem Laut?</h2>
                            <p class="text-2xl">
                                Sampah plastik memiliki dampak yang sangat merusak ekosistem laut. Plastik yang terbuang ke laut dapat terurai menjadi mikroplastik yang dimakan oleh hewan laut, mengganggu rantai makanan, dan mengancam kesehatan manusia yang mengonsumsi hasil laut. Hewan laut seperti penyu, burung, dan ikan sering kali terjebak atau memakan plastik, yang menyebabkan cedera, kematian, atau gangguan reproduksi. Selain itu, sampah plastik mencemari pantai dan mengurangi keindahan serta fungsi ekosistem pesisir.
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
                    <img src="{{ asset('images/Asset 5.png') }}" class="w-[10rem] h-[5rem] mr-8">
                    <div class="flex flex-col">
                            <h2 class="text-4xl font-bold mb-4">Bagaimana Sampah yang Menumpuk Dapat Menyebabkan Banjir?</h2>
                            <p class="text-2xl">
                                Sampah yang tidak dibuang dengan benar sering menyumbat saluran air, seperti selokan, got, atau sungai, sehingga menghalangi aliran air dan menyebabkan banjir. Penumpukan sampah terutama terjadi di daerah perkotaan yang padat penduduk, di mana limbah rumah tangga dan plastik menumpuk di aliran air. Saat hujan deras, saluran yang tersumbat tidak bisa mengalirkan air dengan baik, yang akhirnya menyebabkan genangan dan banjir yang dapat merusak infrastruktur serta menyebabkan kerugian ekonomi dan kesehatan.
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
                    <img src="{{ asset('images/Asset 10.png') }}" class="w-[10rem] h-[10rem] mr-8">
                    <div class="flex flex-col">
                            <h2 class="text-4xl font-bold mb-4">Apa Bahaya Limbah Elektronik bagi Kesehatan dan Lingkungan?</h2>
                            <p class="text-2xl">
                                Limbah elektronik (e-waste) mengandung bahan berbahaya seperti timbal, merkuri, dan kadmium yang dapat mencemari tanah dan air jika tidak dikelola dengan benar. Ketika limbah elektronik dibuang secara sembarangan, bahan kimia beracun ini dapat meresap ke dalam tanah dan masuk ke sumber air, meracuni tanaman, hewan, dan manusia. Selain itu, paparan langsung terhadap bahan-bahan beracun dari limbah elektronik dapat menyebabkan masalah kesehatan serius, seperti gangguan saraf, kerusakan organ, dan kanker, terutama di daerah-daerah yang tidak memiliki fasilitas pengelolaan e-waste yang memadai.
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
