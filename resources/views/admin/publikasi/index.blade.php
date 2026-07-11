@extends('layouts.admin')

@section('title', 'Publikasi - Admin')

@section('content')

    {{-- Heading --}}
    <div class="mb-4">
        <h1 class="fw-bold fs-3 text-dark mb-1">Publikasi</h1>
        <p class="text-muted small mb-0">Kelola dan tinjau kiriman riset terbaru</p>
    </div>

    {{-- Search & Action Bar --}}
    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
        {{-- Search --}}
        <div class="pub-search-wrapper">
            <i class="bi bi-search pub-search-icon"></i>
            <input type="text" class="pub-search-input" placeholder="Cari Publikasi..." />
        </div>

        <div class="d-flex align-items-center gap-2 ms-auto">
            {{-- Filter Dropdown --}}
            <div class="dropdown">
                <button class="btn-filter dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Terbaru
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Terbaru</a></li>
                    <li><a class="dropdown-item" href="#">Terlama</a></li>
                    <li><a class="dropdown-item" href="#">Status: Terbit</a></li>
                    <li><a class="dropdown-item" href="#">Status: Draf</a></li>
                </ul>
            </div>

            {{-- Tambah Button --}}
            <a href="{{ route('admin.publikasi.create') }}" class="btn-tambah">
                <i class="bi bi-plus-lg"></i> Tambah Publikasi
            </a>
        </div>
    </div>

    {{-- Info Banner --}}
    <div class="pub-info-banner mb-4">
        <i class="bi bi-info-circle-fill text-primary"></i>
        <div>
            <span class="fw-semibold">Pengarsipan</span><br>
            <span class="text-muted small">
                Publikasi yang ditandai sebagai 'Draf' akan dinonaktifkan secara otomatis setelah 30 hari
            </span>
        </div>
    </div>

    {{-- Table --}}
    <div class="pub-table-card">
        <table class="pub-table">
            <thead>
                <tr>
                    <th>JUDUL RISET</th>
                    <th>PENULIS</th>
                    <th>TANGGAL<br>DIKIRIM</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $publikasi = [
                        [
                            'judul' => 'Pemetaan Penyebaran',
                            'jurnal' => 'Journal Fakultas Biologi',
                            'penulis' => 'Dr. A. Pratama',
                            'tanggal' => '12 Okt 2023',
                            'status' => 'terbit',
                        ],
                        [
                            'judul' => 'Pemetaan Penyebaran',
                            'jurnal' => 'Journal Fakultas Biologi',
                            'penulis' => 'Dr. A. Pratama',
                            'tanggal' => '12 Okt 2023',
                            'status' => 'terbit',
                        ],
                        [
                            'judul' => 'Pemetaan Penyebaran',
                            'jurnal' => 'Journal Fakultas Biologi',
                            'penulis' => 'Dr. A. Pratama',
                            'tanggal' => '12 Okt 2023',
                            'status' => 'draf',
                        ],
                        [
                            'judul' => 'Pemetaan Penyebaran',
                            'jurnal' => 'Journal Fakultas Biologi',
                            'penulis' => 'Dr. A. Pratama',
                            'tanggal' => '12 Okt 2023',
                            'status' => 'terbit',
                        ],
                        [
                            'judul' => 'Pemetaan Penyebaran',
                            'jurnal' => 'Journal Fakultas Biologi',
                            'penulis' => 'Dr. A. Pratama',
                            'tanggal' => '12 Okt 2023',
                            'status' => 'terbit',
                        ],
                    ];
                @endphp

                @foreach ($publikasi as $item)
                    <tr>
                        {{-- Judul --}}
                        <td>
                            <div class="pub-judul">{{ $item['judul'] }}</div>
                            <div class="pub-jurnal">{{ $item['jurnal'] }}</div>
                        </td>

                        {{-- Penulis --}}
                        <td class="pub-penulis">{{ $item['penulis'] }}</td>

                        {{-- Tanggal --}}
                        <td class="pub-tanggal">{{ $item['tanggal'] }}</td>

                        {{-- Status --}}
                        <td>
                            @if ($item['status'] === 'terbit')
                                <span class="badge-terbit">
                                    <span class="badge-dot bg-success"></span> Terbit
                                </span>
                            @else
                                <span class="badge-draf">
                                    <span class="badge-dot bg-danger"></span>
                                    Draf<br>
                                    <small>(kadaluwarsa dalam 30 hari)</small>
                                </span>
                            @endif
                        </td>

                        {{-- Aksi --}}
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ route('admin.publikasi.edit', 1) }}" class="aksi-btn aksi-edit" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="#" class="aksi-btn aksi-hapus" title="Hapus"
                                    onclick="return confirm('Yakin ingin menghapus publikasi ini?')">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="pub-pagination">
            <span class="text-muted small">Menampilkan 1 - 5 dari 124 publikasi</span>
            <div class="page-nav">
                <button class="page-btn" disabled><i class="bi bi-chevron-left"></i></button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">4</button>
                <button class="page-btn"><i class="bi bi-chevron-right"></i></button>
            </div>
        </div>
    </div>

@endsection
