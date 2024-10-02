<x-layout>
    <x-slot name="title">Daftar | Eco Peduli</x-slot>
    <div class = "flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm mb-64">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold mb-6 text-center text-primary">DAFTAR</h2>
                <div class="mb-[12px]">
                    <input type="text" placeholder="Username" class="w-full px-5 py-3 text-base border focus:border-primary" required>
                </div>
                <div class="mb-[12px]">
                    <input type="email" placeholder="Email" class="w-full px-5 py-3 text-base border focus:border-primary" required>
                </div>
                <div class="mb-[12px]">
                    <input type="password" placeholder="Password" class="w-full px-5 py-3 text-base border focus:border-primary" required>
                </div>
                <div class="mb-[20px]">
                    <input type="password" placeholder="Re-Enter Password" class="w-full px-5 py-3 text-base border focus:border-primary" required>
                </div>
                <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">DAFTAR</button>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Sudah memiliki akun?
            <a href="/login" class="text-blue-500 hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</x-layout>
