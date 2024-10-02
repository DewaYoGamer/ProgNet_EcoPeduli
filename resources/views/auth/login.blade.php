<x-layout>
    <x-slot name="title">Masuk | Eco Peduli</x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden -mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm mx-6 mb-16">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold mb-6 text-center text-primary">MASUK</h2>
            <form>
                <div class="mb-[12px]">
                <input type="email" placeholder="Nama Pengguna"
                    class="w-full px-5 py-3 text-base border focus:border-primary" />
                </div>
                <div class="mb-[20px]">
                <input type="password" placeholder="Kata Sandi"
                    class="w-full px-5 py-3 text-base border focus:border-primary" />
                </div>
                <div class="mb-8 font-bold">
                    <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">MASUK</Button>
                </div>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Belum memiliki akun?
            <a href="/register" class="text-blue-500 hover:underline">Daftar di sini</a>
            </p>
        </div>
    </div>
</x-layout>
