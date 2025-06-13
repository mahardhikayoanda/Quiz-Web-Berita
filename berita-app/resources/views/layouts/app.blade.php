<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeritaApp - @yield('title', 'Portal Berita')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Animasi dan Font (Opsional) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow sticky top-0 z-50 transition duration-300">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-blue-600 tracking-wide hover:scale-105 transition">
                <a href="{{ route('berita.index') }}">📰 BeritaApp</a>
            </div>
            <div class="space-x-4 text-sm font-medium">
                <a href="{{ route('berita.index') }}" class="text-gray-700 hover:text-blue-600 transition">Beranda</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 transition">Dashboard</a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('berita.create') }}" class="text-gray-700 hover:text-blue-600 transition">Tambah</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-1 container mx-auto px-4 py-8 animate-fade-in">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow py-4 mt-auto">
        <div class="text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} BeritaApp. Semua hak dilindungi.
        </div>
    </footer>
    
</body>
</html>
