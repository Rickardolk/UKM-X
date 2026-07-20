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

    public function edit($id)
    {
        // Data dummy sementara — nanti ganti dengan query database asli
        // Contoh nanti: $dokumentasi = Dokumentasi::findOrFail($id);
        $dokumentasi = [
            'judul'     => 'Dokumentasi Outbound',
            'kategori'  => 'eksplorasi',
            'tanggal'   => '2023-10-12',
            'deskripsi' => 'Penelitian ini mengevaluasi kondisi kesehatan terumbu karang di kawasan Taman Nasional Kepulauan Seribu dengan fokus pada keanekaragaman hayati dan tingkat pemutihan karang (bleaching). Melalui pengamatan lapangan intensif selama dua belas bulan, kami mengidentifikasi korelasi antara fluktuasi suhu permukaan laut dan resistensi spesies Acropora tertentu. Hasil penelitian menunjukkan adanya zona pemulihan aktif namun tetap rentan terhadap aktivitas antropogenik di pesisir utara.',
            'gambar_utama' => 'https://images.unsplash.com/photo-1533106497176-45ae19e68ba2?w=1200&q=80',
            'gambar_lain' => [
                'https://images.unsplash.com/photo-1516214104703-d870798883c5?w=400&q=80',
                'https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=400&q=80',
                'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&q=80',
            ],
            'gambar_lain_sisa' => 1,
        ];

        return view('admin.dokumentasi.edit', compact('dokumentasi'));
    }

    public function update(Request $request, $id)
    {
        // Logika update ke database nanti di sini
        // Contoh nanti:
        // $dokumentasi = Dokumentasi::findOrFail($id);
        // $dokumentasi->update($request->validated());

        return redirect()
            ->route('admin.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil diperbarui.');
    }
}
