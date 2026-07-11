@php
$kegiatan = [
'judul' => 'Eksplorasi biota laut',
'subtitle' => 'Kegiatan eksplorasi tahunan UKM X',
'hero_img' => 'https://images.unsplash.com/photo-1471922694854-ff1b63b20054?w=1600&q=80',
'img' => 'https://images.unsplash.com/photo-1582623838120-455da222cdc7?q=80&w=1074',
'deskripsi' => 'Terumbu karang bukan sekadar pemandangan indah; mereka adalah pondasi kehidupan laut yang menyokong 25% biodiversitas samudra. Namun, pemanasan global dan aktivitas destruktif telah merusak ribuan hektar karang di nusantara. Program Restorasi UKM X hadir untuk membalikkan keadaan dengan menanam harapan di dasar laut.',
'jadwal' => [
[
'tanggal' => '17 Mei',
'hari_jam' => 'Senin, 08:00 WIB',
'judul' => 'Eksplorasi di pantai baron',
'desc' => 'Eksplorasi dipantai baron gunung kidul',
'lokasi' => 'Pantai Baron',
],
[
'tanggal' => '15 Mei',
'hari_jam' => 'Sabtu, 08:00 WIB',
'judul' => 'Briefing Awal dan Pelatihan',
'desc' => 'Fokus pada melakukan pelatihan dan instruksi sebelum eksplorasi di lokasi',
'lokasi' => 'Base camp',
],
],
'tujuan' => 'Kegiatan eksplorasi ini bertujuan untuk melakukan eksplorasi biota laut di pantai baron untuk memetakan sebaran biota, jumlah dan mengetahui kondisi lingkungan.',
'penanggung_jawab' => [
'Ketua UKM',
'Koordinator 5 Keilmuan',
'PH bidang Media dan informasi',
],
];
@endphp

@extends('layouts.user')

@section('title', $kegiatan['judul'] . ' - UKM X')
@section('hide_footer', true)

@push('styles')
<link href="{{ asset('css/kegiatan.css') }}" rel="stylesheet" />
@endpush

@section('content')

<!-- Hero Section -->
<section class="detail-keg__hero" style="background-image: url('{{ $kegiatan['hero_img'] }}');">
    <div class="container detail-keg__hero-inner">
        <a href="{{ route('kegiatan.index') }}" class="detail-keg__kembali">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <h1 class="detail-keg__title">{{ $kegiatan['judul'] }}</h1>
        <p class="detail-keg__subtitle">{{ $kegiatan['subtitle'] }}</p>
    </div>
</section>

<!-- deskripsi -->
<section class="detail-keg__desc-section">
    <div class="container">
        <div class="row align-items-center detail-keg__desc-media">

            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="detail-keg__desc-img">
                    <img src="{{ $kegiatan['img'] }}" alt="{{ $kegiatan['judul'] }}" />
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1">
                <div class="detail-keg__desc-text">
                    <h2>Deskripsi Kegiatan</h2>
                    <p>{{ $kegiatan['deskripsi'] }}</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Section Jadwal Kegiatan -->
<section class="detail-keg__jadwal">
    <div class="container">
        <h2 class="section-title mb-4">Jadwal Kegiatan</h2>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">

                @foreach ($kegiatan['jadwal'] as $jadwal)
                <div class="jadwal-item">
                    <div class="jadwal-item__date">
                        <div class="jadwal-item__date-day">{{ $jadwal['tanggal'] }}</div>
                        <div class="jadwal-item__date-time">{{ $jadwal['hari_jam'] }}</div>
                    </div>
                    <div class="jadwal-item__content">
                        <h3 class="jadwal-item__title">{{ $jadwal['judul'] }}</h3>
                        <p class="jadwal-item__desc">{{ $jadwal['desc'] }}</p>
                    </div>
                    <div class="jadwal-item__lokasi">
                        <p class="jadwal-item__lokasi-label mb-0">Lokasi</p>
                        <p class="jadwal-item__lokasi-value mb-0">{{ $jadwal['lokasi'] }}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</section>

<!-- tujuan dan penanggung jawab -->
<section class="detail-keg__info-grid">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                
                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <div class="detail-keg__info-block">
                            <h2>
                                <i class="bi bi-bullseye text-primary me-2"></i> 
                                Tujuan Kegiatan
                            </h2>
                            <p>{{ $kegiatan['tujuan'] }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-keg__info-block">
                            <h2>
                                <i class="bi bi-rocket-takeoff text-primary me-2"></i> 
                                Penanggung Jawab
                            </h2>
                            <ol>
                                @foreach ($kegiatan['penanggung_jawab'] as $pj)
                                <li>{{ $pj }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="detail-keg__cta">
    <div class="container">
        Ada pertanyaan lain? <a href="{{ route('layanan.peminjaman') }}">Hubungi</a>
    </div>
</section>

@endsection