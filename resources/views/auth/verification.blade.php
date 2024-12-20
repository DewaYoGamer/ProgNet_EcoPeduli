<x-layout>
    <x-slot name="title">Verifikasi | Eco Peduli</x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden -mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-md mx-6 mb-16">
            @if (session('error'))
                <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            @if (session('success'))
                <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold text-center text-primary">MASUKKAN KODE VERIFIKASI</h2>
            <p class="text-center text-gray-600">Silahkan masukkan kode verifikasi yang telah dikirimkan ke {{ request('email') }}{{ request('notelp') }}.</p>
            <form action="{{ route('verification.verify') }}" method="POST">
                @csrf
                <input type="hidden" name="id_token" value="{{ request('id_token') }}">
                <div class="my-6 flex justify-between">
                    <input type="text" name="digit1" maxlength="1" class="w-12 h-12 text-center text-base border focus:border-primary" required pattern="[0-9]*" inputmode="numeric">
                    <input type="text" name="digit2" maxlength="1" class="w-12 h-12 text-center text-base border focus:border-primary" required pattern="[0-9]*" inputmode="numeric">
                    <input type="text" name="digit3" maxlength="1" class="w-12 h-12 text-center text-base border focus:border-primary" required pattern="[0-9]*" inputmode="numeric">
                    <input type="text" name="digit4" maxlength="1" class="w-12 h-12 text-center text-base border focus:border-primary" required pattern="[0-9]*" inputmode="numeric">
                    <input type="text" name="digit5" maxlength="1" class="w-12 h-12 text-center text-base border focus:border-primary" required pattern="[0-9]*" inputmode="numeric">
                </div>
                <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">KIRIM</button>
            </form>
            <div class="text-sm mt-4 mb-4">
                Tidak menerima kode verifikasi?
                @if (request('email'))
                    <form action="{{ route('user.sendVerificationEmail') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id_token" value="{{ request('id_token') }}">
                        <input type="hidden" name="email" value="{{ request('email') }}">
                        <input type="hidden" name="type" value="{{ request('type') }}">
                        <button type="submit" class="text-primary">Kirim ulang</button>
                    </form>
                @else
                    <form action="{{ route('user.sendVerificationTelp') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id_token" value="{{ request('id_token') }}">
                        <input type="hidden" name="notelp" value="{{ request('notelp') }}">
                        <input type="hidden" name="type" value="{{ request('type') }}">
                        <button type="submit" class="text-primary">Kirim ulang</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 3000); // 3 seconds
            }

            const errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 3000); // 3 seconds
            }

            const inputs = document.querySelectorAll('input[type="text"]');
            inputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (input.value.length > 1) {
                        input.value = input.value.slice(0, 1);
                    }
                    if (input.value.match(/[^0-9]/)) {
                        input.value = '';
                    }
                    if (input.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', function(event) {
                    if (event.key === 'Backspace' && input.value.length === 0 && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });
        });
    </script>
</x-layout>
