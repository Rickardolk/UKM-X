<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPublikasiController extends Controller
{
    public function index()
    {
        return view('admin.publikasi.index');
    }

    public function create()
    {
        return view('admin.publikasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'jurnal'  => 'required|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf|max:20480',
        ]);

        // Proses simpan ke database di sini nanti
        // Untuk prototype, langsung redirect
        return redirect()->route('admin.publikasi.index')
            ->with('success', 'Publikasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Untuk prototype, data dummy langsung di view
        return view('admin.publikasi.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'jurnal'  => 'nullable|string|max:255',
            'doi'     => 'nullable|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf|max:20480',
        ]);

        // Proses update ke database di sini nanti
        return redirect()->route('admin.publikasi.index')
            ->with('success', 'Publikasi berhasil diperbarui.');
    }
}
