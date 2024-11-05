<x-layout_dashboard>
    <x-layout_dashboard>
        <x-slot name="title">Dashboard Pengguna | Eco Peduli</x-slot>
        <div class="flex flex-col">
            <div class="flex justify-center my-6">
                <h2 class="text-center text-black text-4xl md:text-5xl font-bold">
                    Jadwal Pengumpulan Sampah
                </h2>
            </div>
                <div class="flex mb-15 py-10 space-y-24 bg-third ">
                    <div class="flex flex-col">
                    <div class="flex flex-row justify-evenly items-center">
                        <div class="m-3">
                            <x-index_schedule_senin></x-index_schedule_senin>
                        </div>
                        <div class="m-3">
                            <x-index_schedule_selasa></x-index_schedule_selasa>
                        </div>
                        <div class="m-3 hidden lg:flex">
                            <x-index_schedule_rabu></x-index_schedule_rabu>
                        </div>
                        <div class="m-3 pr-4 hidden 2xl:flex">
                            <x-index_schedule_kamis></x-index_schedule_kamis>
                        </div>
                    </div>
                    <div class="flex flex-row py-10 justify-evenly items-center">
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
        </div>
    </x-layout_dashboard>
