@extends('layouts.admin')

@section('title', 'Manajemen Dokumentasi - Admin')

@push('styles')
    <link href="{{ asset('css/admin-dokumentasi.css') }}" rel="stylesheet" />
@endpush

@section('content')

    {{-- Heading + Action Buttons --}}
    <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-4">
        <div>
            <h1 class="fw-bold fs-3 text-dark mb-1">Manajemen Dokumentasi</h1>
            <p class="text-muted small mb-0">Kelola arsip foto, video, dan dokumentasi dari kegiatan fakultas</p>
        </div>
        <div class="d-flex gap-2 mt-1">
            <div class="dropdown">
                <button class="dok-btn-tampilan dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Tampilan
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-grid me-2"></i>Grid</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-list-ul me-2"></i>List</a></li>
                </ul>
            </div>
            <a href="{{ route('admin.dokumentasi.create') }}" class="dok-btn-tambah">
                <i class="bi bi-plus-lg"></i> Tambah Dokumentasi
            </a>
        </div>
    </div>

    <hr class="dok-divider mb-4">

    {{-- Search + Filter Tabs --}}
    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
        <div class="dok-search-wrapper">
            <i class="bi bi-search dok-search-icon"></i>
            <input type="text" class="dok-search-input" placeholder="Cari Publikasi..." />
        </div>

        <div class="dok-filter-tabs">
            <button class="dok-tab active">Semua</button>
            <button class="dok-tab">Eksplorasi</button>
            <button class="dok-tab">Studi</button>
            <button class="dok-tab">Edukasi</button>
        </div>
    </div>

    {{-- Dummy Data --}}
    @php
        $dokumentasi = [
            [
                'tanggal' => '5 Feb 2026',
                'judul' => 'Dokumentasi Outbound',
                'deskripsi' => 'Lorem ipsum augue velit libero egestas rhoncus dolor ipsum....',
                'file' => 6,
                'img' => 'https://images.unsplash.com/photo-1533106497176-45ae19e68ba2?w=600&q=80',
            ],
            [
                'tanggal' => '24 Feb 2026',
                'judul' => 'Dokumentasi Sosialisasi Program Kerja 2026',
                'deskripsi' => 'Lorem ipsum augue velit libero ...',
                'file' => 6,
                'img' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=80',
            ],
            [
                'tanggal' => '12 Feb 2026',
                'judul' => 'Dokumentasi Gerpas',
                'deskripsi' =>
                    'Lorem ipsum augue velit libero ipsum augue velit libero egestas rhoncus dolor ipsum....',
                'file' => 6,
                'img' => 'https://images.unsplash.com/photo-1529390079861-591de354faf5?w=600&q=80',
            ],
            [
                'tanggal' => '15 Feb 2026',
                'judul' => 'Dokumentasi Diklatsar',
                'deskripsi' =>
                    'Lorem ipsum augue velit libero ipsum augue velit libero egestas rhoncus dolor ipsum....',
                'file' => 6,
                'img' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&q=80',
            ],
            [
                'tanggal' => '5 Feb 2026',
                'judul' => 'Dokumentasi Outbound',
                'deskripsi' => 'Lorem ipsum augue velit libero egestas rhoncus dolor ipsum....',
                'file' => 6,
                'img' => 'https://images.unsplash.com/photo-1533106497176-45ae19e68ba2?w=600&q=80',
            ],
            [
                'tanggal' => '24 Feb 2026',
                'judul' => 'Dokumentasi Sosialisasi Program Kerja 2026',
                'deskripsi' => 'Lorem ipsum augue velit libero ...',
                'file' => 6,
                'img' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=80',
            ],
        ];
    @endphp

    {{-- Grid Cards --}}
    <div class="dok-grid">
        @foreach ($dokumentasi as $item)
            <div class="dok-card">

                {{-- Thumbnail --}}
                <div class="dok-card-img-wrap">
                    <img src="{{ $item['img'] }}" alt="{{ $item['judul'] }}" class="dok-card-img" />
                </div>

                {{-- Body --}}
                <div class="dok-card-body">

                    {{-- Tanggal --}}
                    <div class="dok-card-date">
                        <i class="bi bi-calendar3"></i>
                        {{ $item['tanggal'] }}
                    </div>

                    {{-- Judul --}}
                    <h6 class="dok-card-title">{{ $item['judul'] }}</h6>

                    {{-- Deskripsi --}}
                    <p class="dok-card-desc">{{ $item['deskripsi'] }}</p>

                    <hr class="dok-card-divider">

                    {{-- Footer: file count + aksi --}}
                    <div class="dok-card-footer">
                        <span class="dok-file-count">{{ $item['file'] }} File</span>
                        <div class="d-flex gap-2">
                            <a href="#" class="aksi-btn aksi-edit" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="#" class="aksi-btn aksi-hapus" title="Hapus"
                                onclick="return confirm('Yakin ingin menghapus dokumentasi ini?')">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-5">
        <div class="page-nav">
            <button class="page-btn" disabled><i class="bi bi-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn">4</button>
            <button class="page-btn"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // Filter Tabs
        const tabs = document.querySelectorAll('.dok-tab');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
            });
        });
    </script>
@endpush
