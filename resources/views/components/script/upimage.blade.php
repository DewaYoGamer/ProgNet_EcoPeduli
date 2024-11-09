<script>
    document.getElementById('upload-image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file && file.size <= 2 * 1024 * 1024) { // Check if file size is less than or equal to 2MB
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
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 1,
        });
    }

    document.getElementById('crop-button').addEventListener('click', function() {
        const canvas = cropper.getCroppedCanvas({
            width: 200,
            height: 200
        });
        canvas.toBlob(function(blob) {
            const formData = new FormData();
            formData.append('cropped_image', blob, 'cropped_image.png');

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                alert('CSRF token not found');
                return;
            }

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
                    window.location.href = data.redirect_url;
                } else {
                    alert('Gagal mengunggah foto profil');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });

    document.getElementById('kembali-button').addEventListener('click', function() {
        document.getElementById('cropper-modal').classList.add('hidden');
        if (cropper) {
            cropper.destroy(); // Destroy the cropper instance
            cropper = null; // Reset the cropper variable
        }
        document.getElementById('upload-image').value = ''; // Reset the file input value
    });
</script>
