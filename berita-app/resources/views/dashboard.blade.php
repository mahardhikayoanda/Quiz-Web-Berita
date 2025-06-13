@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 py-6 animate-fade-in">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Jumlah Berita -->
        <div class="bg-blue-100 p-6 rounded-lg shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold text-blue-800 mb-2">Jumlah Berita</h2>
            <p class="text-4xl font-bold text-blue-900">{{ $jumlahBerita }}</p>
        </div>

        <!-- Jumlah User -->
        <div class="bg-green-100 p-6 rounded-lg shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold text-green-800 mb-2">Jumlah User</h2>
            <p class="text-4xl font-bold text-green-900">{{ $jumlahUser }}</p>
        </div>
    </div>
</div>

<!-- Animasi fade-in -->
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out;
    }
</style>
@endsection
