<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    // Menampilkan semua data makanan
    public function index()
    {
        $makanans = Makanan::all();
        return view('v2.admin.makanan.index', compact('makanans'));
    }

    // Menampilkan form untuk menambahkan makanan baru
    public function create()
    {
        return view('v2.admin.makanan.create');
    }

    // Function store makanan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'gambar_url' => 'nullable|url',
        ]);

        Makanan::create($request->all());

        return redirect()->route('admin.makanan.index')->with('success', 'Makanan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit makanan
    public function edit($id)
    {
        $makanan = Makanan::findOrFail($id);
        return view('v2.admin.makanan.edit', compact('makanan'));
    }

    // Function update data makanan di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'gambar_url' => 'nullable|url',
        ]);

        $makanan = Makanan::findOrFail($id);
        $makanan->update($request->all());

        return redirect()->route('admin.makanan.index')->with('success', 'Makanan berhasil diperbarui.');
    }

    // Function delete makanan dari database
    public function destroy($id)
    {
        $makanan = Makanan::findOrFail($id);
        $makanan->delete();

        return redirect()->route('admin.makanan.index')->with('success', 'Makanan berhasil dihapus.');
    }
}
