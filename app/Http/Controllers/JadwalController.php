<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Menampilkan semua data jadwal
    public function index()
    {
        $jadwals = Jadwal::with('film')->get();
        return view('v2.admin.jadwal.index', compact('jadwals'));
    }

    // Menampilkan form untuk menambahkan jadwal baru
    public function create()
    {
        $films = Film::all();
        return view('v2.admin.jadwal.create', compact('films'));
    }

    // Function store jadwal baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'tgl_tayang' => 'required|date',
            'jam_tayang' => 'required|date_format:H:i',
            'harga' => 'required|numeric|min:0',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit jadwal
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $films = Film::all();
        return view('v2.admin.jadwal.edit', compact('jadwal', 'films'));
    }

    // Function update data jadwal di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'tgl_tayang' => 'required|date',
            'jam_tayang' => 'required|date_format:H:i',
            'harga' => 'required|numeric|min:0',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    // Function delete jadwal dari database
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
