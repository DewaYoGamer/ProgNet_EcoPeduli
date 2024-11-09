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
                <div class="my-6 flex justify-between">
                    <input type="text" maxlength="1" class="w-12 h-12 text-center text-base border focus:border-primary" required pattern="[0-9]*" inputmode="numeric">
                    <input type="text" maxlength="1" class="w-12 h-12 text-center text-base border focus:border-primary" required pattern="[0-9]*" inputmode="numeric">
                    <input type="text" maxlength="1" class="w-12 h-12 text-center text-base border focus:border-primary" required pattern="[0-9]*" inputmode="numeric">
                    <input type="text" maxlength="1" class="w-12 h-12 text-center text-base border focus:border-primary" required pattern="[0-9]*" inputmode="numeric">
                    <input type="text" maxlength="1" class="w-12 h-12 text-center text-base border focus:border-primary" required pattern="[0-9]*" inputmode="numeric">
                </div>
                <div class="text-sm mb-4">
                    Tidak menerima kode verifikasi? <a href="#" class="text-primary">Kirim ulang</a>
                </div>
                <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">KIRIM</button>
            </form>
        </div>
    </div>
    <style>
        /* Hide the spinner controls for number inputs */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
