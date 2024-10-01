<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <x-navbar></x-navbar>
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" class="h-24" alt="Flowbite Logo">
            </div>
            <h2 class="text-2xl font-bold mb-6 text-center text-primary">LOGIN </h2>
            <form>
                <div class="mb-[22px]">
                  <input type="email" placeholder="Email"
                    class="w-full px-5 py-3 text-base border focus:border-primary" />
                </div>
                <div class="mb-[22px]">
                  <input type="password" placeholder="Password"
                    class="w-full px-5 py-3 text-base border focus:border-primary" />
                </div>
                <div class="mb-8 font-bold">
                  <input type="submit" value="LOGIN"
                    class="w-full px-5 py-3 text-base text-white border-primary bg-primary" />
                </div>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Belum memiliki akun?
            <a href="/register" class="text-blue-500 hover:underline">Daftar di sini</a>
            </p>
        </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('navbar-sticky');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
