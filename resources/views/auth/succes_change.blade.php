<x-layout>
    <x-slot name="title">Kata Sandi Baru | Eco Peduli</x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden -mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-lg mx-6 mb-16">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold mb-3 text-center text-primary">KATA SANDI BERHASIL DIPERBARUI</h2>
            <p class="text-center text-gray-600">Silahkan
                <a href="/login" class="text-blue-500 hover:underline">masuk</a>
                dengan kata sandi baru Anda.
            </p>
        </div>
    </div>
</x-layout>
