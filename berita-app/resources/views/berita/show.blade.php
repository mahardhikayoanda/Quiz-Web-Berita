@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Judul Berita -->
    <h2 class="text-3xl font-bold text-blue-700 mb-2">{{ $berita->judul }}</h2>

    <!-- Metadata Penulis dan Tanggal -->
    <p class="text-sm text-gray-500 mb-4">
        🖊️ Oleh: {{ $berita->user->name }} | {{ $berita->created_at->format('d M Y') }}
    </p>

    <!-- Gambar Berita -->
    <img src="{{ asset('storage/' . $berita->foto) }}" class="w-full rounded-xl shadow-md mb-6" alt="Gambar Berita">

    <!-- Isi Konten -->
    <div class="prose max-w-none prose-p:mb-4 prose-img:rounded-lg text-gray-800 leading-relaxed">
        {!! nl2br(e($berita->konten)) !!}
    </div>

    <!-- Tombol Kembali -->
    <a href="{{ route('berita.index') }}"
       class="inline-block mt-8 bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg transition">
        🔙 Kembali
    </a>
</div>
@endsection
