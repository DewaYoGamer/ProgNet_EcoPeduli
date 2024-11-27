<x-layout>
    <x-slot name="title">Daftar | Eco Peduli</x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm mx-6">
            @if(session()->has('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
            @endif
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold mb-6 text-center text-primary">DAFTAR</h2>
            <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="mb-[12px]">
                    <input type="text" name="username" id="username" placeholder="Nama Pengguna" class="w-full px-5 py-3 text-base border focus:border-primary" required value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-[12px]">
                    <input type="text" name="name" id="name" placeholder="Nama Lengkap" class="w-full px-5 py-3 text-base border focus:border-primary" required value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-[6px]">
                    <input type="{{ old('notelp') || session('error') === 'number_already_registered' ? 'tel' : 'email' }}"
                            name="{{ old('notelp') || session('error') === 'number_already_registered' ? 'notelp' : 'email' }}"
                            id="email"
                            placeholder="{{ old('notelp') || session('error') === 'number_already_registered' ? 'Nomor Telepon' : 'Email' }}"
                            class="w-full px-5 py-3 text-base border focus:border-primary"
                            required
                            value="{{ old('notelp') ?? old('email') }}">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    @error('notelp')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex items-center mb-4">
                    <input id="telepon" type="checkbox" class="h-4 w-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                           {{ old('notelp') || session('error') === 'number_already_registered' ? 'checked' : '' }}>
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
                <div class="mb-4">
                    <x-turnstile
                        data-size="flexible"
                    />
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const username = document.getElementById('username');
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');

            form.addEventListener('submit', function (event) {
                let valid = true;

                // Clear previous error messages
                document.querySelectorAll('.text-red-500').forEach(el => el.textContent = '');

                // Validate username
                if (username.value.trim() === '' || username.value.length < 5) {
                    showError(username, 'Nama Pengguna Terlalu Pendek');
                    valid = false;
                }

                // Validate name
                if (name.value.trim() === '' || name.value.length < 5) {
                    showError(name, 'Nama Lengkap Terlalu Pendek');
                    valid = false;
                }

                // Validate phone number
                if (email.type === 'tel' && !validatePhone(email.value)) {
                    showError(email, 'Nomor Telepon Tidak Valid');
                    valid = false;
                }

                // Validate password
                if (password.value.length < 5) {
                    showError(password, 'Kata Sandi Harus Lebih dari 5 Karakter');
                    valid = false;
                }

                // Validate password confirmation
                if (password.value !== passwordConfirmation.value) {
                    showError(passwordConfirmation, 'Kata Sandi Tidak Sama');
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault();
                }
            });

            function showError(input, message) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'text-red-500';
                errorDiv.textContent = message;
                input.parentNode.appendChild(errorDiv);
            }

            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(String(email).toLowerCase());
            }

            function validatePhone(phone) {
                const re = /^\+?\d{10,13}$/;
                return re.test(String(phone).toLowerCase());
            }
        });
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
