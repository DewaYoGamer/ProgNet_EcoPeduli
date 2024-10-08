<x-layout>
    <x-slot name="title">Verifikasi | Eco Peduli</x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden -mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-md mx-6 mb-16">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold text-center text-primary">MASUKKAN KODE VERIFIKASI</h2>
            <p class="text-center text-gray-600">Silahkan masukkan kode verifikasi yang telah kami kirimkan ke xxx.</p>
            <form>
                <div class="my-6">
                    <input type="text" placeholder="Kode verifikasi"
                        class="w-full px-5 py-3 text-base border focus:border-primary" required>
                </div>
                <a href="/verification" class="mb-4 font-bold">
                    <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">KIRIM</Button>
                </a>
            </form>
        </div>
    </div>
</x-layout>
