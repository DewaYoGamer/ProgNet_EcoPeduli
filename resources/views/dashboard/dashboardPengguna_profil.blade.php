<x-layout_dashboard>
    <x-slot name="title">Profil | Eco Peduli</x-slot>
    <div x-data="{ editMode: false }" class="flex flex-row w-screen h-screen p-12">
        <div class="w-7/12 pr-20">
            <p class="font-bold text-3xl">
                Informasi Pengguna
            </p>
            <template x-if="!editMode">
                <div class="space-y-8 mt-12">
                    <div class="flex flex-row space-x-12">
                        <div class="w-full">
                            <p class="text-gray-600 text-sm font-semibold">Nama Lengkap</p>
                            <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-2 inline-block">
                                <p class="text-gray-800 font-medium">{{ $user->name }}</p>
                            </div>
                            @error('name')
                                <p id="error-alert" class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <p class="text-gray-600 text-sm font-semibold">Nama Pengguna</p>
                            <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-2 inline-block">
                                <p class="text-gray-800 font-medium">{{ $user->username }}</p>
                            </div>
                            @error('username')
                                <p id="error-alert" class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Email</p>
                        <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-2 inline-block">
                            <p class="text-gray-800 font-medium">
                                @if($user->email)
                                    {{ $user->email }}
                                @else
                                    Belum ditambahkan
                                @endif
                            </p>
                        </div>
                        @error('email')
                            <p id="error-alert" class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        @if (is_null(auth()->user()->email_verified_at) && $user->email)
                            <div class="mb-4">
                                Email belum diverifikasi, Verifikasi Email <a href="{{ route('user.sendVerificationEmail') }}" class="text-primary underline">di sini.</a>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Nomor Telepon</p>
                        <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-2 inline-block">
                            <p class="text-gray-800 font-medium">
                                @if($user->notelp)
                                    {{ $user->notelp }}
                                @else
                                    Belum ditambahkan
                                @endif
                            </p>
                        </div>
                        @error('notelp')
                            <p id="error-alert" class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        @if (is_null(auth()->user()->phone_verified_at) && $user->notelp)
                            <div class="mb-4">
                                Nomor Telepon belum diverifikasi, Verifikasi Nomor Telepon <a href="{{ route('user.sendVerificationTelp') }}" class="text-primary underline">di sini.</a>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Alamat</p>
                        <div class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-2 inline-block">
                            <p class="text-gray-800 font-medium">
                                @if($user->address)
                                    {{ $user->address }}
                                @else
                                    Belum ditambahkan
                                @endif
                            </p>
                        </div>
                        @error('address')
                            <p id="error-alert" class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Tanggal Lahir</p>
                        <div class="flex items-center bg-gray-100 border border-gray-300 rounded-md px-4 py-2 mt-2 h-12 w-[13rem]">
                            <p class="text-gray-800 font-medium">
                                @if($user->date_birth)
                                    {{ \Carbon\Carbon::parse($user->date_birth)->format('d/m/Y') }}
                                @else
                                    Belum ditambahkan
                                @endif
                            </p>
                        </div>
                        @error('date_birth')
                            <p id="error-alert" class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button @click="editMode = true" class="w-[12rem] bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">Edit Profil</button>
                    </div>
                </div>
            </template>

            <template x-if="editMode">
                <form method="POST" action="{{ route('user.update') }}" class="space-y-8 mt-12">
                    @csrf
                    <div class="flex flex-row space-x-12">
                        <div class="w-full">
                            <p class="text-gray-600 text-sm font-semibold">Nama Lengkap</p>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-2">
                        </div>
                        <div class="w-full">
                            <p class="text-gray-600 text-sm font-semibold">Nama Pengguna</p>
                            <input type="text" name="username" id="username" value="{{ $user->username }}" class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-2">
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Email</p>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-2">
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Nomor Telepon</p>
                        <input type="tel" name="notelp" id="notelp" value="{{ $user->notelp }}" class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-2">
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Alamat</p>
                        <input type="text" name="address" value="{{ $user->address }}" class="bg-gray-100 border border-gray-300 w-full rounded-md px-4 py-2 mt-2">
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Tanggal Lahir</p>
                        <input type="date" name="date_birth" value="{{ $user->date_birth }}" class="bg-gray-100 border border-gray-300 rounded-md px-4 py-2 mt-2 h-12 w-[13rem]">
                    </div>
                    <button type="submit" class="w-[12rem] bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">Simpan</button>
                    <button type="button" @click="editMode = false" class="w-[12rem] bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4">Batal</button>
                </form>
            </template>
            @if(session('success'))
                <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
        </div>
        <div class="flex flex-col w-5/12 space-y-10">
            <p class="font-bold text-3xl">
                Foto Profil Pengguna
            </p>
            <div class="flex flex-col justify-center items-center space-y-8">
                <img id="profile-picture" src="{{ $user->avatar ? Storage::url($user->avatar) : asset('images/noavatar.png') }}" alt="Profile Picture" class="w-64 rounded-full">
                <input type="file" id="upload-image" accept="image/*" class="hidden">
                <button onclick="document.getElementById('upload-image').click()" class="w-[12rem] bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded">Ganti Foto Profil</button>
                @if(session('success2'))
                    <div id="success2-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                        <span class="block sm:inline">{{ session('success2') }}</span>
                    </div>
                @endif
            </div>

        </div>

        <!-- Modal for Image Cropper -->
        <div id="cropper-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-4 rounded">
                <div>
                    <img id="image-to-crop" src="" alt="Image to Crop" class="cropper-image">
                </div>
                <div class="flex justify-between mt-4">
                    <button id="kembali-button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-32">Kembali</button>
                    <button id="crop-button" class="bg-third hover:bg-primary text-white font-bold py-2 px-4 rounded w-32">Ganti</button>
                </div>
            </div>
        </div>
    </div>
    <x-script.upimage />
    <script>
        // Check if the success alert or error alert exists and hide them after 3 seconds
        document.addEventListener('DOMContentLoaded', function () {
            // Success Alert Dismissal
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 3000); // 3 seconds
            }

            // Error Alert Dismissal
            const errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 3000); // 3 seconds
            }

            // Success2 Alert Dismissal
            const success2Alert = document.getElementById('success2-alert');
            if (success2Alert) {
                setTimeout(function() {
                    success2Alert.style.display = 'none';
                }, 3000); // 3 seconds
            }
        });
    </script>
</x-layout_dashboard>
