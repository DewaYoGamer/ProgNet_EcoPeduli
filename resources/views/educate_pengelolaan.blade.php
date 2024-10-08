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
                <div class="bg-[#FAFAFA] h-[57rem] w-full rounded-xl flex flex-col p-10 items-left justify-between border-slate-200 border-2">
                    <div class="flex flex-row">
                        <img src="{{ asset('images/pengelolaan.jpg') }}" class="w-[30rem] h-[46rem] rounded object-cover">
                        <div class="px-10 self-stretch text-2xl flex">
                            <p class="font-normal text-justify">
                                <span class="font-semibold">Pengelolaan Sampah</span>
                                <br>Pengelolaan sampah yang efektif dimulai dari pemisahan sampah di sumbernya, yakni di rumah atau tempat usaha. Masyarakat disarankan untuk memisahkan sampah organik dan anorganik secara teratur, sesuai dengan jadwal yang telah ditentukan oleh EcoPeduli. Dengan pemisahan yang tepat, proses daur ulang dan pengelolaan lingkungan menjadi lebih efisien dan berkelanjutan.
                                <br>Khusus untuk sampah anorganik, seperti plastik, kertas, logam, dan kaca, EcoPeduli menawarkan solusi inovatif berupa penukaran sampah dengan poin. Setiap kali masyarakat mengumpulkan sampah anorganik pada hari yang telah dijadwalkan, mereka akan mendapatkan poin sebagai bentuk penghargaan. Poin-poin tersebut dapat diakumulasikan dan ditukarkan dengan kebutuhan pokok, seperti sembako, melalui platform EcoPeduli.
                                <br>Dengan mematuhi jadwal pengumpulan sampah anorganik yang sudah ditentukan, masyarakat tidak hanya membantu menjaga kebersihan lingkungan, tetapi juga mendapatkan manfaat langsung dalam bentuk poin. Selain itu, pemisahan sampah yang konsisten membantu mengurangi jumlah sampah yang berakhir di tempat pembuangan akhir, sekaligus meningkatkan proses daur ulang dan pengelolaan sampah yang berkelanjutan.
                                <br>Melalui partisipasi aktif dalam pengumpulan sampah yang terjadwal, masyarakat turut mendukung upaya mengurangi pencemaran lingkungan dan menciptakan lingkungan yang lebih sehat dan bersih untuk generasi mendatang. Ayo mulai mengumpulkan sampah anorganik Anda sesuai jadwal, tukarkan dengan poin, dan nikmati manfaatnya bersama EcoPeduli!
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
