@php
$publikasi = [
'judul' => 'Analisis Ekosistem Biota Laut di Pantai Baron terhadap Kemungkinan Perubahan Iklim',
'tanggal' => '12 Okt 2023',
'penulis' => 'Dr. Aris Pratama',
'penulis_sub' => 'Dosen Universitas XX',
'abstrak' => 'Penelitian ini mengevaluasi kondisi kesehatan terumbu karang di kawasan Taman Nasional Kepulauan Seribu dengan fokus pada keanekaragaman hayati dan tingkat pemutihan karang (bleaching). Melalui pengamatan lapangan intensif selama dua belas bulan, kami mengidentifikasi korelasi antara fluktuasi suhu permukaan laut dan resistensi spesies Acropora tertentu. Hasil penelitian menunjukkan adanya zona pemulihan aktif namun tetap rentan terhadap aktivitas antropogenik di pesisir utara.',
'img' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1000&q=80',
'journal' => 'BIOLOGI INTERNATIONAL JOURNAL',
'doi' => '10.4213/mbe.2023.01',
'akreditasi' => 'SINTA S1',
'download_url' => '#',
'baca_url' => '#',
];
@endphp

@extends('layouts.user')

@section('title', $publikasi['judul'] . ' - UKM X')

@push('styles')
<link href="{{ asset('css/arsip.css') }}" rel="stylesheet" />
@endpush

@section('content')

<section class="detail-pub">
    <div class="container">

        <a href="{{ route('arsip.index') }}" class="btn-kembali">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <p class="detail-pub__tanggal">{{ $publikasi['tanggal'] }}</p>
        <h1 class="detail-pub__title">{{ $publikasi['judul'] }}</h1>

        <div class="detail-pub__penulis">
            <p class="detail-pub__penulis-nama mb-0">{{ $publikasi['penulis'] }}</p>
            <p class="detail-pub__penulis-sub mb-0">{{ $publikasi['penulis_sub'] }}</p>
        </div>

        {{-- Gambar & Informasi Publikasi --}}
        <div class="detail-pub__media">
            <div class="detail-pub__img-wrap">
                <img src="{{ $publikasi['img'] }}" alt="{{ $publikasi['judul'] }}" />
            </div>

            <div class="detail-pub__info">
                <h2>Informasi Publikasi</h2>

                <div class="detail-pub__info-row">
                    <span class="detail-pub__info-label">Journal</span>
                    <span class="detail-pub__info-value">{{ $publikasi['journal'] }}</span>
                </div>
                <div class="detail-pub__info-row">
                    <span class="detail-pub__info-label">DOI</span>
                    <span class="detail-pub__info-value">{{ $publikasi['doi'] }}</span>
                </div>
                <div class="detail-pub__info-row">
                    <span class="detail-pub__info-label">Akreditasi</span>
                    <span class="detail-pub__info-value">{{ $publikasi['akreditasi'] }}</span>
                </div>

                <a href="{{ $publikasi['download_url'] }}" class="btn-download text-center d-inline-block text-decoration-none">
                    Download PDF
                </a>

                <a href="{{ $publikasi['baca_url'] }}" class="detail-pub__baca">
                    Baca Publikasi &rarr;
                </a>
            </div>
        </div>

        {{-- Abstrak --}}
        <div class="detail-pub__abstrak">
            <h2>Abstrak</h2>
            <p>{{ $publikasi['abstrak'] }}</p>
        </div>

    </div>
</section>

<section class="detail-dok__cta">
    <div class="container">
        Ada pertanyaan lain? <a href="{{ route('layanan.peminjaman') }}">Hubungi</a>
    </div>
</section>

@endsection