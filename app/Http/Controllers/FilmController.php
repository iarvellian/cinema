<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    // Menampilkan semua data film
    public function index()
    {
        $films = Film::all();
        return view('v2.admin.film.index', compact('films'));
    }

    // Menampilkan form untuk menambahkan film baru
    public function create()
    {
        return view('v2.admin.film.create');
    }

    // Function store film baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'cuplikan_url' => 'nullable|url',
            'tgl_tayang' => 'required|date',
            'status' => 'required|in:Now Playing,Coming Soon',
        ]);

        Film::create($request->all());

        return redirect()->route('admin.film.index')->with('success', 'Film berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit film
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('v2.admin.film.edit', compact('film'));
    }

    // Function update data film di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'cuplikan_url' => 'nullable|url',
            'tgl_tayang' => 'required|date',
            'status' => 'required|in:Now Playing,Coming Soon',
        ]);

        $film = Film::findOrFail($id);
        $film->update($request->all());

        return redirect()->route('admin.film.index')->with('success', 'Film berhasil diperbarui.');
    }

    // Function delete film dari database
    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect()->route('admin.film.index')->with('success', 'Film berhasil dihapus.');
    }
}
