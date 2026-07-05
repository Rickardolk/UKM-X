@extends('layouts.user')

@section('title', 'Arsip Dokumentasi - UKM X')

@push('styles')
<link href="{{ asset('css/arsip.css') }}" rel="stylesheet" />
@endpush

@section('content')

<!-- Hero Section -->
<section class="arsip-hero">
    <div class="container">
        <h1 class="arsip-hero__title">Dokumentasi Kegiatan</h1>
        <p class="arsip-hero__desc">
            Arsip dokumentasi dan studi ilmiah mahasiswa UKM X dalam upaya eksplorasi
            dan pelestarian ekosistem pesisir pantai.
        </p>
    </div>
</section>

<!-- dokumentasi terbaru -->
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
                <div class="pub-card h-100 position-relative">
                    <div class="pub-card__img-wrap">
                        <img
                            src="{{ $dok['img'] }}"
                            alt="{{ $dok['judul'] }}"
                            class="pub-card__img"
                            loading="lazy" />
                    </div>
                    <div class="pub-card__body">
                        <p class="pub-card__meta">{{ $dok['tanggal'] }}</p>
                        <h3 class="pub-card__title">{{ $dok['judul'] }}</h3>
                        <a href="{{ $dok['url'] }}" class="pub-card__link stretched-link">
                            Lihat Dokumentasi &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Filter and search -->
<section class="arsip-filter">
    <div class="container">
        <div class="arsip-filter__bar">

            {{-- Filter chips --}}
            <div class="arsip-filter__chips">
                <button type="button" class="filter-chip active" data-filter="semua">Semua</button>
                <button type="button" class="filter-chip" data-filter="eksplorasi">Eksplorasi</button>
                <button type="button" class="filter-chip" data-filter="studi">Studi</button>
                <button type="button" class="filter-chip" data-filter="edukasi">Edukasi</button>
            </div>

            {{-- Search --}}
            <div class="arsip-filter__search">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input
                        type="text"
                        id="searchDokumentasi"
                        class="form-control"
                        placeholder="Cari Dokumentasi"
                        autocomplete="off" />
                </div>
            </div>

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
                <div class="pub-card h-100 position-relative">
                    <div class="pub-card__img-wrap">
                        <img
                            src="{{ $dok['img'] }}"
                            alt="{{ $dok['judul'] }}"
                            class="pub-card__img"
                            loading="lazy" />
                    </div>
                    <div class="pub-card__body">
                        <p class="pub-card__meta">{{ $dok['tanggal'] }}</p>
                        <h3 class="pub-card__title">{{ $dok['judul'] }}</h3>
                        <a href="{{ $dok['url'] }}" class="pub-card__link stretched-link">
                            Lihat Dokumentasi &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <nav class="arsip-pagination" aria-label="Navigasi halaman dokumentasi">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Sebelumnya">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Berikutnya">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</section>

@endsection

<!-- script -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        /* ---- Filter chip active + kategori filter ---- */
        const chips = document.querySelectorAll('.filter-chip');
        const cards = document.querySelectorAll('#daftarGrid [data-kategori]');

        chips.forEach(function(chip) {
            chip.addEventListener('click', function() {
                chips.forEach(function(c) {
                    c.classList.remove('active');
                });
                chip.classList.add('active');

                const filter = chip.dataset.filter;
                cards.forEach(function(col) {
                    const kategori = col.dataset.kategori;
                    col.style.display = (filter === 'semua' || kategori === filter) ? '' : 'none';
                });
            });
        });

        /* ---- Live search ---- */
        const searchInput = document.getElementById('searchDokumentasi');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const q = this.value.toLowerCase().trim();
                cards.forEach(function(col) {
                    const judul = col.querySelector('.pub-card__title')?.textContent.toLowerCase() ?? '';
                    col.style.display = (q === '' || judul.includes(q)) ? '' : 'none';
                });
            });
        }

    });
</script>
@endpush