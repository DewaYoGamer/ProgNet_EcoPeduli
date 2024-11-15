<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Verifikasi Email</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .container {
            width: 50%;
            text-align: center;
            padding: 20px;
        }
        .verification-code {
            font-size: 32px;
            font-weight: bold;
            color: #50623A;
            margin: 20px 0;
        }
        .instructions {
            font-weight: bold;
            margin: 20px 0;
        }
        .code-box {
            font-size: 24px;
            font-weight: bold;
            color: #000;
            border: 2px solid #f0f0f0;
            border-radius: 8px;
            padding: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="verification-code">Kode Verifikasi</div>
        <div class="instructions">
            Masukkan kode verifikasi berikut ke<br>dalam halaman verifikasi EcoPeduli:
        </div>
        <div class="code-box">
            {{$token}}
        </div>
    </div>
</body>
</html>
