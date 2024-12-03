<x-layout>
    <x-slot name="title">Lupa Kata Sandi | Eco Peduli</x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 overflow-hidden -mt-20">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm mx-6 mb-16">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24">
            </div>
            <h2 class="text-2xl font-bold text-center text-primary">LUPA KATA SANDI</h2>
            <form>
                <div class="my-6">
                    <div class="mb-[6px]">
                        <input type="email" placeholder="Email"
                            class="w-full px-5 py-3 text-base border focus:border-primary" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong!')">
                        </div>
                        <div class="flex items-center">
                            <input id="telepon" type="checkbox" class="h-4 w-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="telepon" class="ml-2 text-sm font-medium text-gray-900">Gunakan Nomor Telepon</label>
                        </div>
                </div>
                <div class="mb-4 font-bold">
                    <button type="submit" class="w-full bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">
                      KIRIM
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
