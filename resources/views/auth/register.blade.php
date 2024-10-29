<x-layout>
    <x-slot name="title">Daftar | Eco Peduli</x-slot>
    <div class = "flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden -mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm mx-6">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold mb-6 text-center text-primary">DAFTAR</h2>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-[12px]">
                    <input type="text" name="username" id="username" placeholder="Nama Pengguna" class="w-full px-5 py-3 text-base border focus:border-primary" required value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-[12px]">
                    <input type="text" name="name" id="name" placeholder="Nama Lengkap" class="w-full px-5 py-3 text-base border focus:border-primary" required value="{{ old('name') }}">
                    @error('username')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-[6px]">
                    <input type="email" name="email" id="email" placeholder="Email" class="w-full px-5 py-3 text-base border focus:border-primary" required value="{{ old('email') }}" >
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex items-center mb-4">
                    <input id="telepon" name="notelp" id="notelp" type="checkbox" class="h-4 w-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="telepon" class="ml-2 text-sm font-medium text-gray-900">Gunakan Nomor Telepon</label>
                </div>
                <div class="mb-[12px]">
                    <input type="password" name="password" id="password" placeholder="Kata Sandi" class="w-full px-5 py-3 text-base border focus:border-primary" required>
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-[20px]">
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Masukkan Ulang Kata Sandi" class="w-full px-5 py-3 text-base border focus:border-primary" required>
                    @error('password_confirmation')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4 font-bold">
                    <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">DAFTAR</Button>
                </div>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Sudah memiliki akun?
                <a href="/login" class="text-blue-500 hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</x-layout>
