<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDokumentasiController extends Controller
{
    public function index()
    {
        return view('admin.dokumentasi.index');
    }

    public function create()
    {
        return view('admin.dokumentasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string',
            'tanggal'  => 'required|date',
            'gambar.*' => 'nullable|image|max:20480',
        ]);

        // Proses simpan ke database di sini nanti
        return redirect()->route('admin.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil ditambahkan.');
    }
}
