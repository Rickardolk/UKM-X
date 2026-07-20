@extends('layouts.admin')

@section('title', 'Manajemen Konten - Admin')

@push('styles')
<link href="{{ asset('css/admin-konten.css') }}" rel="stylesheet" />
@endpush

@section('content')

{{-- Heading + Action Buttons --}}
<div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-3">
    <div>
        <h1 class="fw-bold fs-3 text-dark mb-1">Manajemen Konten</h1>
        <p class="text-muted small mb-0">Kelola berita, kegiatan dan jadwal acara</p>
    </div>
    <div class="d-flex gap-2 mt-1">
        <div class="dropdown">
            <button class="kon-btn-tampilan dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Tampilan
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="bi bi-list-ul me-2"></i>List</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-grid me-2"></i>Grid</a></li>
            </ul>
        </div>
        <a href="{{ route('admin.konten.create') }}" class="kon-btn-tambah">
            <i class="bi bi-plus-lg"></i> Tambah Konten
        </a>
    </div>
</div>

<hr class="kon-divider mb-4">

{{-- Search + Filter Row --}}
<div class="d-flex flex-wrap align-items-center gap-2 mb-4">

    <div class="kon-search-wrapper">
        <i class="bi bi-search kon-search-icon"></i>
        <input type="text" class="kon-search-input" id="kontenSearch" placeholder="Cari Publikasi..." />
    </div>

    <div class="kon-filter-tabs">
        <button class="kon-tab active" data-filter="semua">Semua</button>
        <button class="kon-tab" data-filter="berita">Berita</button>
        <button class="kon-tab" data-filter="kegiatan">Kegiatan</button>
    </div>

    <button class="kon-btn-outline ms-lg-auto">
        <i class="bi bi-sliders"></i> Filter
    </button>
    <button class="kon-btn-outline">
        <i class="bi bi-sort-down"></i> Terbaru
    </button>

</div>

{{--
    Data dummy — ganti dengan data dari controller.
    Contoh di controller:
        $konten = Konten::latest()->paginate(5);
        return view('admin.konten.index', compact('konten'));
--}}
@php
$konten = [
['id' => 1, 'judul' => 'Penyelamatan Penyu', 'kategori' => 'kegiatan', 'tanggal' => '12 Okt -14 Okt 2026', 'status' => 'terunggah'],
['id' => 2, 'judul' => 'Restorasi Terumbu', 'kategori' => 'kegiatan', 'tanggal' => '12 Okt -14 Okt 2026', 'status' => 'terunggah'],
['id' => 3, 'judul' => 'Penyelamatan Penyu', 'kategori' => 'kegiatan', 'tanggal' => '12 Okt -14 Okt 2026', 'status' => 'terunggah'],
['id' => 4, 'judul' => 'Eksplorasi biota laut','kategori' => 'kegiatan', 'tanggal' => '12 Okt -14 Okt 2026', 'status' => 'terunggah'],
];

$totalPostingan = 94;
$halamanAwal = 1;
$halamanAkhir = 5;
@endphp

{{-- Table Card --}}
<div class="kon-table-card">
    <table class="kon-table">
        <thead>
            <tr>
                <th>Judul Post</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th class="text-end">Aksi</th>
            </tr>
        </thead>
        <tbody id="kontenTableBody">
            @foreach ($konten as $item)
            <tr data-kategori="{{ $item['kategori'] }}" data-judul="{{ strtolower($item['judul']) }}">
                <td>
                    <span class="kon-judul">{{ $item['judul'] }}</span>
                </td>
                <td>
                    <span class="kon-kategori">{{ ucfirst($item['kategori']) }}</span>
                </td>
                <td>
                    <span class="kon-tanggal">{{ $item['tanggal'] }}</span>
                </td>
                <td>
                    <span class="kon-badge-terunggah">
                        <span class="kon-badge-dot"></span> Terunggah
                    </span>
                </td>
                <td class="text-end">
                    <a href="{{ route('admin.konten.edit', $item['id']) }}" class="kon-aksi-btn" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination Footer --}}
    <div class="kon-pagination">
        <span class="kon-pagination__info">
            Menampilkan {{ $halamanAwal }} - {{ $halamanAkhir }} dari {{ $totalPostingan }} Postingan
        </span>
        <div class="page-nav">
            <button class="page-btn" disabled><i class="bi bi-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/admin-konten.js') }}"></script>
@endpush