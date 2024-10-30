<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Eco Peduli' }}</title>
    {{-- Link Section --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

    {{-- CSS Section --}}
    <style>
        /* Sidebar & Transition Styling */
        .sidebar { width: 288px; transition: width 0.5s; }
        .sidebar.collapsed { width: 132px; }
        .ikon-min { transition: transform 0.5s ease-in-out; }
        .ikon-min.rotate { transform: rotate(180deg); }
        .logo-text, .text-navigasi-1, .text-navigasi-2, .text-dashboard, .text-penukaran, .text-jadwal, .text-profil, .text-beranda, .text-logout {
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }
        .disappear { opacity: 0; height: 0; visibility: hidden; }
        .adjusting { font-size: 42px; transition: font-size 0.5s ease; }
        .cropper-image { max-width: 70vw; max-height: 60vh; }
    </style>

    {{-- Script Section --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
</head>
<body>
    <div class="flex flex-row">
        <x-sidebar></x-sidebar>
        {{ $slot }}
    </div>

    {{-- JavaScript Section --}}
    <script>
        document.querySelector('.ikon-min').addEventListener('click', function() {
            var sidebar = document.querySelector('.sidebar');
            var ikon = document.querySelector('.ikon-min');
            var elementsToToggle = [
                document.querySelector('.logo-text'),
                document.querySelector('.text-navigasi-1'),
                document.querySelector('.text-navigasi-2'),
                document.querySelector('.text-dashboard'),
                document.querySelector('.text-penukaran'),
                document.querySelector('.text-jadwal'),
                document.querySelector('.text-profil'),
                document.querySelector('.text-beranda'),
                document.querySelector('.text-logout')
            ];
            var iconsToResize = [
                document.querySelector('.dashboard'),
                document.querySelector('.penukaran'),
                document.querySelector('.jadwal'),
                document.querySelector('.profil'),
                document.querySelector('.beranda'),
                document.querySelector('.logout')
            ];

            sidebar.classList.toggle('collapsed');
            ikon.classList.toggle('rotate');

            elementsToToggle.forEach(function(element) {
                element.classList.toggle('disappear');
            });

            iconsToResize.forEach(function(icon) {
                icon.classList.toggle('adjusting');
            });
        });

        document.getElementById('logoutButton').addEventListener('click', function(event) {
            if (!confirm('Apakah Anda yakin ingin logout?')) {
                event.preventDefault();
            }
        });

        document.getElementById('upload-image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file && file.size <= 2 * 1024 * 1024) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-to-crop').src = e.target.result;
                    document.getElementById('cropper-modal').classList.remove('hidden');
                    initializeCropper();
                };
                reader.readAsDataURL(file);
            } else {
                alert('Ukuran File tidak boleh melebihi 2MB');
            }
        });

        let cropper;
        function initializeCropper() {
            const image = document.getElementById('image-to-crop');
            if (cropper) cropper.destroy();
            cropper = new Cropper(image, { aspectRatio: 1, viewMode: 1 });
        }

        document.getElementById('crop-button').addEventListener('click', function() {
            cropper.getCroppedCanvas().toBlob(function(blob) {
                const formData = new FormData();
                formData.append('cropped_image', blob, 'cropped_image.png');
                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                if (!csrfToken) return alert('CSRF token not found');

                fetch('{{ route('upload.cropped.image') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('profile-picture').src = data.image_url;
                        document.getElementById('cropper-modal').classList.add('hidden');
                        cropper.destroy();
                        cropper = null;
                        document.getElementById('upload-image').value = '';
                        window.location.reload();
                    } else alert('Failed to upload image');
                })
                .catch(error => console.error('Error:', error));
            });
        });

        document.getElementById('kembali-button').addEventListener('click', function() {
            document.getElementById('cropper-modal').classList.add('hidden');
            if (cropper) cropper.destroy();
            cropper = null;
            document.getElementById('upload-image').value = '';
        });
    </script>
</body>
</html>
