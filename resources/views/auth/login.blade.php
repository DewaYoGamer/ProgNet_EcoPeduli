<x-layout>
    <x-slot name="title">Masuk | Eco Peduli</x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm mx-6 mb-16">
            @if(session()->has('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if(session()->has('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold mb-6 text-center text-primary">MASUK</h2>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-[12px]">
                    <input type="text" name="username" id="username" placeholder="Nama Pengguna" class="w-full px-5 py-3 text-base border focus:border-primary" autofocus required value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-[20px]">
                    <input type="password" name="password" id="password" placeholder="Kata Sandi" class="w-full px-5 py-3 text-base border focus:border-primary" required>
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center">
                        <input id="remember" type="checkbox" class="h-4 w-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900">Ingat Saya</label>
                    </div>
                    <p class="text-right text-sm text-blue-500 hover:underline">
                        <a href="/forgot">Lupa Kata Sandi?</a>
                    </p>
                </div>
                <x-turnstile />
                <div class="mb-4 font-bold">
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
