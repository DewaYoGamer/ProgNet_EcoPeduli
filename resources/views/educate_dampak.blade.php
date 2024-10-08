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
                <div class="bg-[#FAFAFA] h-[45rem] w-full rounded-xl flex flex-col p-10 items-left justify-between border-slate-200 border-2">
                    <div class="flex flex-row">
                        <img src="{{ asset('images/dampak.jpg') }}" class="w-[30rem] h-[34rem] rounded object-cover">
                        <div class="px-10 self-stretch text-2xl flex">
                            <p class="font-normal text-justify">
                                <span class="font-semibold">Dampak Buruk Sampah</span>
                                <br>Sampah yang menumpuk dan dibuang sembarangan memiliki dampak buruk yang signifikan terhadap lingkungan, kesehatan masyarakat, dan kesejahteraan ekonomi. Berikut beberapa dampak buruk dari sampah yang tidak dikelola dengan baik:
                                <br>1. Kerusakan Ekosistem:
                                Sampah yang dibuang sembarangan ke laut atau sungai dapat mengancam kehidupan satwa liar. Banyak hewan seperti penyu, burung, dan ikan terjerat atau memakan sampah plastik, yang dapat mengakibatkan kematian. Selain itu, mikroplastik dari sampah dapat masuk ke rantai makanan dan mempengaruhi kesehatan manusia.
                                <br>2. Banjir:
                                Sampah yang dibuang sembarangan ke saluran air dan selokan dapat menyumbat aliran air, terutama di daerah perkotaan. Hal ini meningkatkan risiko banjir, terutama saat hujan deras. Banjir yang diakibatkan oleh sampah dapat merusak infrastruktur, menghancurkan rumah, dan menimbulkan kerugian ekonomi besar.
                                <br>3. Penyebaran Penyakit:
                                Sampah yang menumpuk di lingkungan dapat menjadi sarang bagi berbagai vektor penyakit, seperti nyamuk, lalat, dan tikus. Kondisi ini menciptakan tempat berkembang biak yang ideal bagi nyamuk pembawa penyakit seperti demam berdarah dan malaria.
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
