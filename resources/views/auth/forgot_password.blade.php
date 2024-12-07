<x-layout>
    <x-slot name="title">Lupa Kata Sandi | Eco Peduli</x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden -mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm mx-6 mb-16">
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold text-center text-primary">LUPA KATA SANDI</h2>
            <form action="{{ route('forgot_password') }}" method="POST">
                @csrf
                <div class="my-6">
                    <div class="mb-[6px]">
                        <input type="email" id="email" name="email" placeholder="Email" required
                            class="w-full px-5 py-3 text-base border focus:border-primary">
                    </div>
                    <div class="flex items-center">
                        <input id="telepon" type="checkbox" class="h-4 w-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="telepon" class="ml-2 text-sm font-medium text-gray-900">Gunakan Nomor Telepon</label>
                    </div>
                </div>
                <div class="mb-4 font-bold">
                    <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">
                      KIRIM OTP
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkbox = document.getElementById('telepon');
            const emailInput = document.getElementById('email');
            const regiontelp = document.getElementById('regiontelp');

            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    emailInput.type = 'tel';
                    emailInput.placeholder = 'Nomor Telepon';
                    emailInput.name = 'notelp';
                    regiontelp.classList.remove('hidden');
                } else {
                    emailInput.type = 'email';
                    emailInput.placeholder = 'Email';
                    emailInput.name = 'email';
                    regiontelp.classList.add('hidden');
                }
            });
        });
    </script>
</x-layout>
