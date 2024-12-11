<?php

namespace App\Http\Controllers;

use App\Models\Kursi;
use Illuminate\Http\Request;

class KursiController extends Controller
{
    // Menampilkan semua data kursi
    public function index()
    {
        $kursis = Kursi::all();
        return view('v2.admin.kursi.index', compact('kursis'));
    }

    // Menampilkan form untuk menambahkan kursi baru
    public function create()
    {
        return view('v2.admin.kursi.create');
    }

    // Function store kursi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'baris' => 'required|string|max:1',
            'no_kursi' => 'required|integer|max:50',
        ]);

        Kursi::create($request->all());

        return redirect()->route('admin.kursi.index')->with('success', 'Kursi berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kursi
    public function edit($id)
    {
        $kursi = Kursi::findOrFail($id);
        return view('v2.admin.kursi.edit', compact('kursi'));
    }

    // Function update data kursi di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'baris' => 'required|string|max:1',
            'no_kursi' => 'required|integer|max:50' . $id, 
        ]);

        $kursi = Kursi::findOrFail($id);
        $kursi->update($request->all());

        return redirect()->route('admin.kursi.index')->with('success', 'Kursi berhasil diperbarui.');
    }

    // Function delete kursi dari database
    public function destroy($id)
    {
        $kursi = Kursi::findOrFail($id);
        $kursi->delete();

        return redirect()->route('admin.kursi.index')->with('success', 'Kursi berhasil dihapus.');
    }
}
