@extends('layouts.user')

@section('title', 'Arsip Publikasi - UKM X')

@push('styles')
<link href="{{ asset('css/arsip.css') }}" rel="stylesheet" />
@endpush

@section('content')

<!-- HEro section -->
<section class="arsip-hero">
    <div class="container">
        <h1 class="arsip-hero__title">Publikasi</h1>
        <p class="arsip-hero__desc">
            Arsip penelitian dan studi ilmiah mahasiswa UKM X dalam upaya eksplorasi
            dan pelestarian ekosistem pesisir pantai.
        </p>
    </div>
</section>

<!-- publikasi terbaru -->
<section class="arsip-terbaru">
    <div class="container">
        <h2 class="arsip-section__heading">Publikasi terbaru</h2>

        <div class="row g-3">
            @php
            $publikasiTerbaru = [
            [
            'img' => 'https://images.unsplash.com/photo-1535591273668-578e31182c4f?w=600&q=80',
            'judul' => 'Analisis Ekosistem Biota',
            'penulis' => 'Dr. Aris Pratama',
            'tanggal' => '12 Okt 2023',
            'kutipan' => 'Studi komprehensif mengenai tingkat regenerasi karang...',
            'url' => route('arsip.publikasi.show'),
            ],
            [
            'img' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=600&q=80',
            'judul' => 'Pemetaan Penyebaran',
            'penulis' => 'Dr. Aris Pratama',
            'tanggal' => '12 Okt 2023',
            'kutipan' => 'Program penyelamatan kembali penyu di area...',
            'url' => route('arsip.publikasi.show'),
            ],
            [
            'img' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&q=80',
            'judul' => 'Keanekaragaman Biota Pesisir',
            'penulis' => 'Dr. Aris Pratama',
            'tanggal' => '12 Okt 2023',
            'kutipan' => 'Program eksplorasi biota laut di area...',
            'url' => route('arsip.publikasi.show'),
            ],
            [
            'img' => 'https://images.unsplash.com/photo-1559827291-72ee739d0d9a?w=600&q=80',
            'judul' => 'Studi Bintang laut',
            'penulis' => 'Dr. Aris Pratama',
            'tanggal' => '12 Okt 2023',
            'kutipan' => 'Program studi bintang laut di area...',
            'url' => route('arsip.publikasi.show'),
            ],
            ];
            @endphp

            @foreach ($publikasiTerbaru as $pub)
            <div class="col-6 col-lg-3">
                <div class="pub-card h-100 position-relative">
                    <div class="pub-card__img-wrap">
                        <img
                            src="{{ $pub['img'] }}"
                            alt="{{ $pub['judul'] }}"
                            class="pub-card__img"
                            loading="lazy" />
                    </div>
                    <div class="pub-card__body">
                        <p class="pub-card__meta">
                            {{ $pub['penulis'] }} &bull; {{ $pub['tanggal'] }}
                        </p>
                        <h3 class="pub-card__title">{{ $pub['judul'] }}</h3>
                        <p class="pub-card__kutipan">{{ $pub['kutipan'] }}</p>
                        <a href="{{ $pub['url'] }}" class="pub-card__link stretched-link">
                            Baca publikasi &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- filter and search -->
<section class="arsip-filter">
    <div class="container">
        <div class="arsip-filter__bar">

            {{-- Filter chips --}}
            <div class="arsip-filter__chips">
                <button type="button" class="filter-chip active" data-filter="semua">Semua</button>
                <button type="button" class="filter-chip" data-filter="1">1 tahun terakhir</button>
                <button type="button" class="filter-chip" data-filter="2">2 tahun terakhir</button>
                <button type="button" class="filter-chip" data-filter="5">5 tahun terakhir</button>
            </div>

            {{-- Search --}}
            <div class="arsip-filter__search">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input
                        type="text"
                        id="searchPublikasi"
                        class="form-control"
                        placeholder="Cari Publikasi"
                        autocomplete="off" />
                </div>
            </div>

        </div>
    </div>
</section>

<!-- DAftar Publikasi -->
<section class="arsip-daftar">
    <div class="container">
        <h2 class="arsip-section__heading">Daftar Publikasi</h2>

        @php
        $daftarPublikasi = [
        ['img' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=600&q=80', 'judul' => 'Pemetaan Penyebaran', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Program penyelamatan kembali penyu di area...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1535591273668-578e31182c4f?w=600&q=80', 'judul' => 'Analisis Ekosistem Biota', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Studi komprehensif mengenai tingkat regenerasi karang...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&q=80', 'judul' => 'Keanekaragaman Biota Pesisir', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Program eksplorasi biota laut di area...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1559827291-72ee739d0d9a?w=600&q=80', 'judul' => 'Studi Bintang laut', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Program studi bintang laut di area...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1559827291-72ee739d0d9a?w=600&q=80', 'judul' => 'Studi Bintang laut', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Program studi bintang laut di area...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=600&q=80', 'judul' => 'Pemetaan Penyebaran', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Program penyelamatan kembali penyu di area...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&q=80', 'judul' => 'Keanekaragaman Biota Pesisir', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Program eksplorasi biota laut di area...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1535591273668-578e31182c4f?w=600&q=80', 'judul' => 'Analisis Ekosistem Biota', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Studi komprehensif mengenai tingkat regenerasi karang...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1535591273668-578e31182c4f?w=600&q=80', 'judul' => 'Analisis Ekosistem Biota', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Studi komprehensif mengenai tingkat regenerasi karang...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1559827291-72ee739d0d9a?w=600&q=80', 'judul' => 'Studi Bintang laut', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Program studi bintang laut di area...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=600&q=80', 'judul' => 'Pemetaan Penyebaran', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Program penyelamatan kembali penyu di area...', 'url' => route('arsip.publikasi.show')],
        ['img' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&q=80', 'judul' => 'Keanekaragaman Biota Pesisir', 'penulis' => 'Dr. Aris Pratama', 'tanggal' => '12 Okt 2023', 'kutipan' => 'Program eksplorasi biota laut di area...', 'url' => route('arsip.publikasi.show')],
        ];
        @endphp

        <div class="row g-3" id="daftarGrid">
            @foreach ($daftarPublikasi as $pub)
            <div class="col-6 col-lg-3">
                <div class="pub-card h-100 position-relative">
                    <div class="pub-card__img-wrap">
                        <img
                            src="{{ $pub['img'] }}"
                            alt="{{ $pub['judul'] }}"
                            class="pub-card__img"
                            loading="lazy" />
                    </div>
                    <div class="pub-card__body">
                        <p class="pub-card__meta">
                            {{ $pub['penulis'] }} &bull; {{ $pub['tanggal'] }}
                        </p>
                        <h3 class="pub-card__title">{{ $pub['judul'] }}</h3>
                        <p class="pub-card__kutipan">{{ $pub['kutipan'] }}</p>
                        <a href="{{ $pub['url'] }}" class="pub-card__link stretched-link">
                            Baca publikasi &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

       <!-- Pigination -->
        <nav class="arsip-pagination" aria-label="Navigasi halaman publikasi">
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

        /* ---- Filter chip active ---- */
        const chips = document.querySelectorAll('.filter-chip');
        chips.forEach(function(chip) {
            chip.addEventListener('click', function() {
                chips.forEach(function(c) {
                    c.classList.remove('active');
                });
                chip.classList.add('active');
            });
        });

        /* ---- Live search ---- */
        const searchInput = document.getElementById('searchPublikasi');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const q = this.value.toLowerCase().trim();
                const cards = document.querySelectorAll('#daftarGrid .col-6');
                cards.forEach(function(col) {
                    const judul = col.querySelector('.pub-card__title')?.textContent.toLowerCase() ?? '';
                    col.style.display = (q === '' || judul.includes(q)) ? '' : 'none';
                });
            });
        }

    });
</script>
@endpush