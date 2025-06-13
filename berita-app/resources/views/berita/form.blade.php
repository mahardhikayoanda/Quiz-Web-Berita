<div class="space-y-4">
    <div>
        <label for="judul" class="block font-medium mb-1">Judul</label>
        <input type="text" name="judul"
               value="{{ old('judul', $berita->judul ?? '') }}"
               class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400"
               required>
        @error('judul') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div>
        <label for="foto" class="block font-medium mb-1">Foto</label>
        <input type="file" name="foto" class="w-full border border-gray-300 rounded px-4 py-2">
        @if(isset($berita) && $berita->foto)
            <img src="{{ asset('storage/' . $berita->foto) }}" class="mt-2 w-28 rounded shadow">
        @endif
        @error('foto') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>

    <div>
        <label for="konten" class="block font-medium mb-1">Konten</label>
        <textarea name="konten" rows="6"
                  class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400"
                  required>{{ old('konten', $berita->konten ?? '') }}</textarea>
        @error('konten') <small class="text-red-600">{{ $message }}</small> @enderror
    </div>
</div>
