<x-layout>
    <x-slot name="title">Kata Sandi Baru | Eco Peduli</x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden -mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-md mx-6 mb-16">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold mb-6 text-center text-primary">MASUKKAN KATA SANDI BARU</h2>
            <form>
                <div class="mb-[12px]">
                <input type="password" placeholder="Kata Sandi Baru"
                    class="w-full px-5 py-3 text-base border focus:border-primary" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong!')">
                </div>
                <div class="mb-[20px]">
                <input type="password" placeholder="Masukkan Ulang Kata Sandi Baru"
                    class="w-full px-5 py-3 text-base border focus:border-primary" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong!')">
                </div>
                <div class="mb-4 font-bold">
                    <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">KIRIM</Button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
