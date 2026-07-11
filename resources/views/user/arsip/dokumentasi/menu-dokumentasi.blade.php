@extends('layouts.user')

@section('title', 'Arsip Dokumentasi - UKM X')

@push('styles')
<link href="{{ asset('css/arsip.css') }}" rel="stylesheet" />
@endpush

@section('content')

<!-- Hero section -->
<section class="arsip-hero">
    <div class="container">
        <h1 class="arsip-hero__title">Dokumentasi Kegiatan</h1>
        <p class="arsip-hero__desc">
            Arsip dokumentasi dan studi ilmiah mahasiswa UKM X dalam upaya eksplorasi
            dan pelestarian ekosistem pesisir pantai.
        </p>
    </div>
</section>

<!-- Dokumentasi terbaru -->
<section class="arsip-terbaru">
    <div class="container">
        <h2 class="arsip-section__heading">Dokumentasi terbaru</h2>

        <div class="row g-3">
            @php
            $dokumentasiTerbaru = [
            [
            'img' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600&q=80',
            'judul' => 'Dokumentasi Sosialisasi Program Kerja 2026',
            'tanggal' => '24 Feb 2026',
            'url' => route('arsip.dokumentasi.show'),
            ],
            [
            'img' => 'https://images.unsplash.com/photo-1533587851505-d119e13fa0d7?w=600&q=80',
            'judul' => 'Dokumentasi Outbound',
            'tanggal' => '5 Feb 2026',
            'url' => route('arsip.dokumentasi.show'),
            ],
            [
            'img' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=600&q=80',
            'judul' => 'Dokumentasi Gerpas',
            'tanggal' => '12 Feb 2026',
            'url' => route('arsip.dokumentasi.show'),
            ],
            [
            'img' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&q=80',
            'judul' => 'Dokumentasi Diklatsar',
            'tanggal' => '13-15 Feb 2026',
            'url' => route('arsip.dokumentasi.show'),
            ],
            ];
            @endphp

            @foreach ($dokumentasiTerbaru as $dok)
            <div class="col-6 col-lg-3">
                <x-card-item
                    :img="$dok['img']"
                    :alt="$dok['judul']"
                    :meta="$dok['tanggal']"
                    :title="$dok['judul']"
                    :url="$dok['url']"
                    link-text="Lihat Dokumentasi" />
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Filter and search -->
<section class="arsip-filter">
    <div class="container">
        <div class="arsip-filter__bar">

            <x-filter-buttons :options="[
                ['label' => 'Semua', 'filter' => 'semua', 'active' => true],
                ['label' => 'Eksplorasi', 'filter' => 'eksplorasi'],
                ['label' => 'Studi', 'filter' => 'studi'],
                ['label' => 'Edukasi', 'filter' => 'edukasi'],
            ]" />

            <x-search-box id="searchDokumentasi" placeholder="Cari Dokumentasi" js-hook="js-arsip-search" />

        </div>
    </div>
</section>

<!-- Daftar Dokumentasi -->
<section class="arsip-daftar">
    <div class="container">
        <h2 class="arsip-section__heading">Daftar Dokumentasi</h2>

        @php
        $daftarDokumentasi = [
        ['img' => 'https://images.unsplash.com/photo-1533587851505-d119e13fa0d7?w=600&q=80', 'judul' => 'Dokumentasi Outbound', 'tanggal' => '5 Feb 2026', 'kategori' => 'eksplorasi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&q=80', 'judul' => 'Dokumentasi Diklatsar', 'tanggal' => '13-15 Feb 2026', 'kategori' => 'edukasi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=600&q=80', 'judul' => 'Dokumentasi Gerpas', 'tanggal' => '12 Feb 2026', 'kategori' => 'studi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600&q=80', 'judul' => 'Dokumentasi Sosialisasi Program Kerja 2026', 'tanggal' => '24 Feb 2026', 'kategori' => 'edukasi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1533587851505-d119e13fa0d7?w=600&q=80', 'judul' => 'Dokumentasi Outbound', 'tanggal' => '5 Feb 2026', 'kategori' => 'eksplorasi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600&q=80', 'judul' => 'Dokumentasi Sosialisasi Program Kerja 2026', 'tanggal' => '24 Feb 2026', 'kategori' => 'edukasi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=600&q=80', 'judul' => 'Dokumentasi Gerpas', 'tanggal' => '12 Feb 2026', 'kategori' => 'studi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&q=80', 'judul' => 'Dokumentasi Diklatsar', 'tanggal' => '13-15 Feb 2026', 'kategori' => 'edukasi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=600&q=80', 'judul' => 'Dokumentasi Gerpas', 'tanggal' => '12 Feb 2026', 'kategori' => 'studi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600&q=80', 'judul' => 'Dokumentasi Sosialisasi Program Kerja 2026', 'tanggal' => '24 Feb 2026', 'kategori' => 'edukasi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&q=80', 'judul' => 'Dokumentasi Diklatsar', 'tanggal' => '13-15 Feb 2026', 'kategori' => 'edukasi', 'url' => route('arsip.dokumentasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1533587851505-d119e13fa0d7?w=600&q=80', 'judul' => 'Dokumentasi Outbound', 'tanggal' => '5 Feb 2026', 'kategori' => 'eksplorasi', 'url' => route('arsip.dokumentasi.show')],
        ];
        @endphp

        <div class="row g-3" id="daftarGrid">
            @foreach ($daftarDokumentasi as $dok)
            <div class="col-6 col-lg-3" data-kategori="{{ $dok['kategori'] }}">
                <x-card-item
                    :img="$dok['img']"
                    :alt="$dok['judul']"
                    :meta="$dok['tanggal']"
                    :title="$dok['judul']"
                    :url="$dok['url']"
                    link-text="Lihat Dokumentasi" />
            </div>
            @endforeach
        </div>

        <x-pagination :total-pages="4" aria-label="Navigasi halaman dokumentasi" />

    </div>
</section>

@endsection

<!-- js -->
@push('scripts')
<script src="{{ asset('js/arsip.js') }}"></script>
@endpush