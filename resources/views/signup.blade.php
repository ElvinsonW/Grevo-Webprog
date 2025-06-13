<!-- NEW YA BANG GW TAMBAHIN PAGE INI -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up to GREVO</title>
    {{-- Font Inter sudah diimpor via @theme di app.css (jika ada), tapi untuk kepastian dan fallback, bisa tetap di sini --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')

    <style>
        body {
            /* Menggunakan variabel CSS untuk font-sans dari app.css, atau Inter jika tidak didefinisikan di @theme */
            font-family: var(--font-sans, 'Inter', sans-serif);
            background-image: url('{{ asset('images/loginandregBG.png') }}');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            /* Mengatur warna background body ke warna krem butek*/
            background-color: var(--color-yellow-2);
        }
    </style>
</head>
{{-- Menghapus kelas 'font-inter' dari body karena font diatur via style tag dengan var() --}}
<body class="min-h-screen flex items-center justify-center relative bg-gray-100">

    {{-- Logo Grevo di kiri atas --}}
    <div class="absolute top-10 left-10 z-10">
        <img src="{{ asset('images/GrevoHD.svg') }}" alt="Grevo Logo" class="h-15">
    </div>

    {{-- Tombol Sign In di kanan atas --}}
    <div class="absolute top-10 right-10 z-10">
        <a href="{{ route('signin') }}" style="background-color: var(--color-green-1); color: var(--color-green-3);" class="border-none rounded-md px-6 py-2 text-sm font-semibold cursor-pointer inline-block leading-normal hover:bg-gray-400 transition-colors duration-300">SIGN IN</a>
    </div>

    {{-- Card utama untuk form Sign Up --}}
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-10 text-center relative z-20">
        <h2 class="text-2xl text-gray-800 mb-2 font-semibold">Sign up to GREVO</h2>
        <p class="text-sm text-gray-600 mb-8">Quick & Simple way to your online shopping</p>

        {{-- Pesan sukses (misalnya dari redirect setelah register) --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 px-4 py-3 rounded-md mb-5 text-sm" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan error validasi dari Laravel --}}
        @if($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-3 rounded-md mb-5 text-sm text-left" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf {{-- CSRF token buat keamanan form --}}

            {{-- Field FIRST NAME --}}
            <div class="mb-5 text-left">
                <label for="first_name" class="block text-xs text-gray-700 uppercase font-semibold mb-1">FIRST NAME</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Ivy" required autocomplete="name" autofocus
                       class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-[var(--color-green-3)]"
                       style="border-color: var(--color-green-3);"> {{-- Menggunakan --color-green-3 dari app.css untuk fokus --}}
            </div>

            {{-- Field EMAIL ADDRESS --}}
            <div class="mb-5 text-left">
                <label for="email" class="block text-xs text-gray-700 uppercase font-semibold mb-1">EMAIL ADDRESS</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="ivy@stay.com" required autocomplete="email"
                       class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-[var(--color-green-3)]"
                       style="border-color: var(--color-green-3);">
            </div>

            {{-- Field PASSWORD si toggle mata-mata --}}
            <div class="mb-5 text-left relative">
                <label for="password" class="block text-xs text-gray-700 uppercase font-semibold mb-1">PASSWORD</label>
                <input type="password" id="password" name="password" placeholder="********" required autocomplete="new-password"
                       class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-[var(--color-green-3)]"
                       style="border-color: var(--color-green-3);">
                <span class="absolute right-4 top-1/2 -translate-y-2 cursor-pointer text-gray-400 text-lg p-1" onclick="togglePasswordVisibility('password')">
                    <i class="fa-solid fa-eye-slash"></i>
                </span>
            </div>

            {{-- Field CONFIRM PASSWORD ya --}}
            <div class="mb-8 text-left relative">
                <label for="password_confirmation" class="block text-xs text-gray-700 uppercase font-semibold mb-1">CONFIRM PASSWORD</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="********" required autocomplete="new-password"
                       class="w-full px-4 py-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-[var(--color-green-3)]"
                       style="border-color: var(--color-green-3);">
                <span class="absolute right-4 top-1/2 -translate-y-2 cursor-pointer text-gray-400 text-lg p-1" onclick="togglePasswordVisibility('password_confirmation')">
                    <i class="fa-solid fa-eye-slash"></i>
                </span>
            </div>

            {{-- Checkbox Terms & Privacy Policy : belum diarahin kemana nya bang --}}
            <div class="flex items-center mb-8 text-sm text-gray-700 text-left">
                <input type="checkbox" id="terms" name="terms" {{ old('terms') ? 'checked' : '' }} required
                       class="mr-2 min-w-4 min-h-4 cursor-pointer" style="accent-color: var(--color-green-3);"> {{-- Menggunakan --color-green-3 untuk accent-color --}}
                <label for="terms">I agree to the <a href="#" class="no-underline hover:underline" style="color: var(--color-green-3);">terms of Service</a> and <a href="#" class="no-underline hover:underline" style="color: var(--color-green-3);">Privacy Policy</a>.</label>
            </div>

            {{-- Tombol CREATE AN ACCOUNT --}}
            <button type="submit" class="w-full py-3 text-white rounded-md text-base font-semibold cursor-pointer hover:bg-green-600 transition-colors duration-300" style="background-color: var(--color-green-2);">CREATE AN ACCOUNT</button>
        </form>
    </div>

    {{-- Copyright footer --}}
    <div class="absolute bottom-8 text-xs text-gray-500">
        © 2025 All Rights Reserved. GREVO
    </div>

    {{-- JeEs nya mata-mata --}}
    <script>
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const toggleIcon = field.nextElementSibling.querySelector('i');
            if (field.type === 'password') {
                field.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                field.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
</body>
</html>