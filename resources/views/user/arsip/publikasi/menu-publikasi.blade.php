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
                <x-card-item
                    :img="$pub['img']"
                    :alt="$pub['judul']"
                    :meta="$pub['penulis'] . ' • ' . $pub['tanggal']"
                    :title="$pub['judul']"
                    :desc="$pub['kutipan']"
                    :url="$pub['url']"
                    link-text="Baca publikasi" />
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- filter and search -->
<section class="arsip-filter">
    <div class="container">
        <div class="arsip-filter__bar">

            <x-filter-buttons :options="[
                ['label' => 'Semua', 'filter' => 'semua', 'active' => true],
                ['label' => '1 tahun terakhir', 'filter' => '1'],
                ['label' => '2 tahun terakhir', 'filter' => '2'],
                ['label' => '5 tahun terakhir', 'filter' => '5'],
            ]" />

            <x-search-box id="searchPublikasi" placeholder="Cari Publikasi" js-hook="js-arsip-search" />

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
                <x-card-item
                    :img="$pub['img']"
                    :alt="$pub['judul']"
                    :meta="$pub['penulis'] . ' • ' . $pub['tanggal']"
                    :title="$pub['judul']"
                    :desc="$pub['kutipan']"
                    :url="$pub['url']"
                    link-text="Baca publikasi" />
            </div>
            @endforeach
        </div>

        <x-pagination :total-pages="4" aria-label="Navigasi halaman publikasi" />

    </div>
</section>

@endsection

<!-- js -->
@push('scripts')
<script src="{{ asset('js/arsip.js') }}"></script>
@endpush