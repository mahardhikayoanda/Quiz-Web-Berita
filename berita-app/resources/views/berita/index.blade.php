@extends('layouts.app')

@section('title', 'Daftar Berita')

@section('content')
<div>
    <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">📰 Daftar Berita</h2>

    @auth
        @if(auth()->user()->role === 'admin')
            <div class="flex justify-end mb-6">
                <a href="{{ route('berita.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow transition">
                    ➕ Tambah Berita
                </a>
            </div>
        @endif
    @endauth

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($beritas as $berita)
            <div class="bg-white rounded-xl shadow hover:shadow-lg overflow-hidden transition-all">
                <img src="{{ asset('storage/' . $berita->foto) }}" alt="foto"
                     class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $berita->judul }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ Str::limit($berita->konten, 100) }}</p>
                    <p class="text-xs text-gray-400 mb-3">🖊️ {{ $berita->user->name }} | {{ $berita->created_at->format('d M Y') }}</p>
                    <div class="flex gap-2">
                        <a href="{{ route('berita.show', $berita->id) }}"
                           class="bg-teal-600 hover:bg-teal-700 text-white text-xs px-3 py-1 rounded">
                            👁️ Lihat
                        </a>
                        @if(auth()->user()?->role === 'admin')
                            <a href="{{ route('berita.edit', $berita->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-black text-xs px-3 py-1 rounded">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded">🗑️ Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 col-span-3">Tidak ada berita tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
