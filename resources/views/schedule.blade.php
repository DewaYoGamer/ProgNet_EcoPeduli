<x-layout>
    <x-slot name="title">Jadwal | Eco Peduli</x-slot>
    <div class="flex flex-col">
        <div class="flex flex-col justify-center items-center my-12 pt-6">
                <div class="text-center self-stretch text-black text-4xl md:text-5xl font-bold xl:leading-tight">
                    Jadwal Pengumpulan
                </div>
                <div class="w-[30rem] md:w-[45rem] mt-12 text-center -mb-12">
                    Pengumpulan sampah dilakukan setiap hari sesuai dengan jadwal yang tertera. Pengumpulan sampah dilakukan oleh petugas kami yang akan <span class="text-primary font-bold">datang ke rumah anda</span>. Sampah <span class="text-primary font-bold">daur ulang</span> dapat ditukarkan menjadi <span class="text-primary font-bold">poin</span> sesuai dengan berat dari sampah yang anda kumpulkan.
                </div>
        </div>
        <div class="flex flex-col mb-20 py-28 space-y-24 bg-primary mt-20">
            <div class="flex flex-row justify-evenly items-center">
                <div>
                    <x-index_schedule_senin></x-index_schedule_senin>
                </div>
                <div>
                    <x-index_schedule_selasa></x-index_schedule_selasa>
                </div>
                <div class="hidden lg:flex">
                    <x-index_schedule_rabu></x-index_schedule_rabu>
                </div>
                <div class="hidden 2xl:flex">
                    <x-index_schedule_kamis></x-index_schedule_kamis>
                </div>
            </div>
            <div class="flex flex-row justify-evenly items-center">
                <div class="flex lg:hidden">
                    <x-index_schedule_rabu></x-index_schedule_rabu>
                </div>
                <div class="flex 2xl:hidden">
                    <x-index_schedule_kamis></x-index_schedule_kamis>
                </div>
                <div class="hidden lg:flex">
                    <x-index_schedule_jumat></x-index_schedule_jumat>
                </div>
                <div class="hidden lg:flex">
                    <x-index_schedule_sabtu></x-index_schedule_sabtu>
                </div>
                <div class="hidden 2xl:flex">
                    <x-index_schedule_minggu></x-index_schedule_minggu>
                </div>
            </div>
            <div class="flex 2xl:hidden flex-row justify-evenly items-center">
                <div class="flex lg:hidden">
                    <x-index_schedule_jumat></x-index_schedule_jumat>
                </div>
                <div class="flex lg:hidden">
                    <x-index_schedule_sabtu></x-index_schedule_sabtu>
                </div>
                <div class="hidden lg:flex">
                    <x-index_schedule_minggu></x-index_schedule_minggu>
                </div>
            </div>
            <div class="flex lg:hidden flex-row justify-evenly items-center">
                <div>
                    <x-index_schedule_minggu></x-index_schedule_minggu>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</x-layout>
