<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource (untuk user dan admin).
     */
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource (admin only).
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage (admin only).
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:10',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'konten' => 'required',
        ]);

        // dd($request->only(['judul', 'konten', 'foto']));
        $path = $request->file('foto')->store('berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'foto' => $path,
            'konten' => $request->konten,
            'user_id' => Auth::id(),
        ]);



        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource (admin only).
     */
    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage (admin only).
     */
    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|min:10',
            'konten' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }
            $path = $request->file('foto')->store('berita', 'public');
            $berita->foto = $path;
        }

        $berita->judul = $request->judul;
        $berita->konten = $request->konten;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage (admin only).
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->foto) {
            Storage::disk('public')->delete($berita->foto);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
