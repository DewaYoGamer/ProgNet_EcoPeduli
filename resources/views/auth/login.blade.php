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
            <form action="{{route('login.authenticate')}}" method="POST">
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
                        <input id="remember" type="checkbox" name="remember" class="h-4 w-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900">Ingat Saya</label>
                    </div>
                    <p class="text-right text-sm text-blue-500 hover:underline cursor-pointer" id="forgot-btn">Tidak Bisa Masuk?</a>
                    </p>
                </div>
                <x-turnstile
                    data-size="flexible"
                />
                <div class="mt-6 mb-4 font-bold">
                    <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">MASUK</Button>
                </div>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Belum memiliki akun?
            <a href="/register" class="text-blue-500 hover:underline">Daftar di sini</a>
            </p>
        </div>
        <div id="forgot-modal" class="fixed inset-0 hidden z-50 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg w-[50rem] p-8">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('images/logo.png') }}" class="h-24 mb-5">
                    <h2 class="text-2xl font-bold mb-4 text-primary">APA KENDALA ANDA?</h2>
                    <div class="flex items-center space-x-6 mt-4">
                        <a href="/forgot_username" class="w-[338px] bg-third hover:bg-primary text-white text-center font-bold py-2 px-4 rounded">Lupa Nama Pengguna</a>
                        <a href="/forgot_password" class="w-[338px] bg-third hover:bg-primary text-white text-center font-bold py-2 px-4 rounded">Lupa Kata Sandi</a>
                    </div>
                    <button id="close-modal1" class="w-[44rem] bg-lime-500 hover:bg-[#6da714] font-bold text-white px-4 py-2 rounded-lg mt-6">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to handle modal open and close
        const modals = {
            forgot: { btn: document.getElementById('forgot-btn'), modal: document.getElementById('forgot-modal'), closeBtn: document.getElementById('close-modal1') }
        };

        // Function to open modal
        function openModal(modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');  // Make sure it displays as flex when opened
        }

        // Function to close modal
        function closeModal(modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');  // Remove flex when closing
        }

        for (const key in modals) {
            const { btn, modal, closeBtn } = modals[key];

            // Open modal on button click
            btn.addEventListener('click', () => {
                openModal(modal);
            });

            // Close modal on close button click
            closeBtn.addEventListener('click', () => {
                closeModal(modal);
            });

            // Close modal if clicked outside of the modal content
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal(modal);
                }
            });
        }
    </script>
</x-layout>
