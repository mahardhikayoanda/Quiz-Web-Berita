@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="max-w-xl mx-auto">
    <h2 class="text-2xl font-bold text-center mb-6 text-blue-700">
        Edit Berita
    </h2>
    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded-xl shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="judul" class="block font-semibold mb-1">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul) }}" class="w-full border rounded px-3 py-2" required minlength="10">
            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="foto" class="block font-semibold mb-1">Foto</label>
            <input type="file" name="foto" id="foto" class="w-full" accept="image/jpeg,image/png,image/jpg">
            @if($berita->foto)
                <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto Berita" class="mt-2 max-w-xs rounded">
            @endif
            @error('foto')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="konten" class="block font-semibold mb-1">Konten</label>
            <textarea name="konten" id="konten" rows="5" class="w-full border rounded px-3 py-2" required>{{ old('konten', $berita->konten) }}</textarea>
            @error('konten')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition">
            🔄 Update
        </button>
    </form>
</div>
@endsection
