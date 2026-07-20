<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKontenController extends Controller
{
    public function index()
    {
        return view('admin.konten.index');
    }

    public function create()
    {
        return view('admin.konten.create');
    }

    public function store(Request $request)
    {
        return redirect()
            ->route('admin.konten.index')
            ->with('success', 'Konten berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('admin.konten.edit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        return redirect()
            ->route('admin.konten.index')
            ->with('success', 'Konten berhasil diperbarui.');
    }
}
