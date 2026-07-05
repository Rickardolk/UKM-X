@php
$dokumentasi = [
'judul' => 'Dokumentasi Outbound',
'kategori' => 'Eksplorasi',
'tanggal' => '12 Okt 2023',
'deskripsi' => 'Penelitian ini mengevaluasi kondisi kesehatan terumbu karang di kawasan Taman Nasional Kepulauan Seribu dengan fokus pada keanekaragaman hayati dan tingkat pemutihan karang (bleaching). Melalui pengamatan lapangan intensif selama dua belas bulan, kami mengidentifikasi korelasi antara fluktuasi suhu permukaan laut dan resistensi spesies Acropora tertentu. Hasil penelitian menunjukkan adanya zona pemulihan aktif namun tetap rentan terhadap aktivitas antropogenik di pesisir utara.',
'img_utama' => 'https://images.unsplash.com/photo-1533587851505-d119e13fa0d7?w=1000&q=80',
'thumbnails' => [
'https://images.unsplash.com/photo-1502680390469-be75c86b636f?w=500&q=80',
'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=500&q=80',
'https://images.unsplash.com/photo-1533240332313-0db49b459ad6?w=500&q=80',
'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=500&q=80',
],
'download_url' => '#',
];
@endphp

@extends('layouts.user')

@section('title', $dokumentasi['judul'] . ' - UKM X')

@push('styles')
<link href="{{ asset('css/arsip.css') }}" rel="stylesheet" />
@endpush

@section('content')

<section class="detail-dok">
    <div class="container">

        <a href="{{ route('arsip.dokumentasi') }}" class="btn-kembali">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <h1 class="detail-dok__title">{{ $dokumentasi['judul'] }}</h1>

        <!-- gallery -->
        <div class="detail-dok__gallery">
            <div class="detail-dok__main-img">
                <img src="{{ $dokumentasi['img_utama'] }}" alt="{{ $dokumentasi['judul'] }}" />
            </div>
            <div class="detail-dok__thumbs">
                @foreach ($dokumentasi['thumbnails'] as $thumb)
                <img src="{{ $thumb }}" alt="{{ $dokumentasi['judul'] }} - dokumentasi tambahan" loading="lazy" />
                @endforeach
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="detail-dok__info">
            <div class="detail-dok__desc">
                <h2>Deskripsi</h2>
                <p>{{ $dokumentasi['deskripsi'] }}</p>
            </div>

            <div class="detail-dok__meta">
                <h2>Informasi Publikasi</h2>

                <div class="detail-dok__meta-row">
                    <span class="detail-dok__meta-label">Judul</span>
                    <span class="detail-dok__meta-value">{{ $dokumentasi['judul'] }}</span>
                </div>
                <div class="detail-dok__meta-row">
                    <span class="detail-dok__meta-label">Kategori</span>
                    <span class="detail-dok__meta-value">{{ $dokumentasi['kategori'] }}</span>
                </div>
                <div class="detail-dok__meta-row">
                    <span class="detail-dok__meta-label">Tanggal</span>
                    <span class="detail-dok__meta-value">{{ $dokumentasi['tanggal'] }}</span>
                </div>

                <a href="{{ $dokumentasi['download_url'] }}" class="btn-download text-center d-inline-block text-decoration-none">
                    Download Dokumentasi
                </a>
            </div>
        </div>

    </div>
</section>

<section class="detail-dok__cta">
    <div class="container">
        Ada pertanyaan lain? <a href="{{ route('layanan.peminjaman') }}">Hubungi</a>
    </div>
</section>

@endsection