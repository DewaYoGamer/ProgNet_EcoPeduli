<x-layout>
    <x-slot name="title">Kata Sandi Baru | Eco Peduli</x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden -mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-md mx-6 mb-16">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold mb-6 text-center text-primary">MASUKKAN KATA SANDI BARU</h2>
            <form action="{{ route('forgotPasswordRedirect') }}" method="POST">
                @csrf
                <input type="hidden" name="id_token" value="{{ request('id_token') }}">
                <div class="mb-[12px]">
                <input name="password" id="password" type="password" placeholder="Kata Sandi Baru"
                    class="w-full px-5 py-3 text-base border focus:border-primary">
                </div>
                <div class="mb-[20px]">
                <input id="passwordconfirm" type="password" placeholder="Masukkan Ulang Kata Sandi Baru"
                    class="w-full px-5 py-3 text-base border focus:border-primary">
                </div>
                <div class="text-red-500 mb-4">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-4 font-bold">
                    <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">KIRIM</Button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const password = document.getElementById('password');
            const passwordconfirm = document.getElementById('passwordconfirm');
            const form = document.querySelector('form');

            form.addEventListener('submit', function (e) {
                if (password.value !== passwordconfirm.value) {
                    e.preventDefault();
                    const errorMessage = document.querySelector('.text-red-500');
                    errorMessage.textContent = 'Kata sandi tidak sama';

                    // Remove the error message after 5 seconds
                    setTimeout(function () {
                        errorMessage.textContent = '';
                    }, 5000);
                }
                if (password.value.length < 5) {
                    e.preventDefault();
                    const errorMessage = document.querySelector('.text-red-500');
                    errorMessage.textContent = 'Kata sandi minimal 5 karakter.';

                    // Remove the error message after 5 seconds
                    setTimeout(function () {
                        errorMessage.textContent = '';
                    }, 5000);
                }
                if (password.value.length > 255) {
                    e.preventDefault();
                    const errorMessage = document.querySelector('.text-red-500');
                    errorMessage.textContent = 'Kata sandi maksimal 255 karakter.';

                    // Remove the error message after 5 seconds
                    setTimeout(function () {
                        errorMessage.textContent = '';
                    }, 5000);
                }
            });
        });
    </script>
</x-layout>
