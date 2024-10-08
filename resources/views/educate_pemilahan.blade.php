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
                <div class="bg-[#FAFAFA] h-[49rem] w-full rounded-xl flex flex-col p-10 items-left justify-between border-slate-200 border-2">
                    <div class="flex flex-row">
                        <img src="{{ asset('images/pemilahan.jpg') }}" class="w-[30rem] h-[38rem] rounded object-cover">
                        <div class="px-10 self-stretch text-2xl flex">
                            <p class="font-normal text-justify">
                                <span class="font-semibold">Pemilahan Sampah</span>
                                <br>Pemilahan sampah yang baik dan benar sangat penting untuk mendukung pengelolaan sampah yang efektif dan mengurangi dampak negatif terhadap lingkungan. Berikut adalah langkah-langkah pemilahan sampah yang dapat diterapkan:
                                <br>1. Menyiapkan Tempat Sampah Terpisah:
                                Pastikan ada beberapa tempat sampah dengan kategori yang jelas. Biasanya pemisahan dilakukan berdasarkan jenis sampah, antara lain:
                                Sampah Organik: Sampah yang mudah terurai, seperti sisa makanan, daun, dan kulit buah.
                                Sampah Anorganik: Sampah yang tidak mudah terurai, seperti plastik, kertas, kaleng, dan kaca.
                                Sampah Berbahaya (B3): Bahan berbahaya dan beracun seperti baterai, lampu neon, atau obat-obatan.
                                <br>2. Memahami Jenis-Jenis Sampah:
                                Penting untuk memahami jenis sampah agar pemisahan berjalan efektif:
                                Sampah Organik: Sampah basah yang dapat diolah menjadi kompos.
                                Sampah Anorganik Daur Ulang: Seperti botol plastik, kertas, dan logam yang dapat diolah kembali.
                                Sampah Anorganik Tidak Daur Ulang: Seperti styrofoam atau bahan campuran plastik dan logam yang sulit didaur ulang. Sampah B3: Sampah yang membutuhkan penanganan khusus.
                                <br>3. Melakukan Pemilahan di Rumah atau Tempat Usaha:
                                Lakukan pemilahan dari sumbernya, yaitu rumah atau tempat usaha. Pisahkan sampah sesuai kategori yang sudah disiapkan di tempat sampah yang berbeda.
                            </p>
                        </div>
                    </div>
                    <a href="/educate" class="bg-lime-500 w-full text-center p-3 rounded-[8px] text-white font-bold text-xl my-10">
                        KEMBALI
                    </a>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</x-layout>
