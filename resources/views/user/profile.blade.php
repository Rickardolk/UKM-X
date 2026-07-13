@php
$sejarah = [
'img' => 'https://images.unsplash.com/photo-1777583187888-af3ba93b3926?w=1170&q=80',
'paragraf' => [
'UKM X merupakan salah satu kelompok studi yang ada di lingkungan intern Fakultas Biologi X. Berdirinya kelompok studi ini diawali dengan terbentuknya Forum Studi Laut pada tahun 2000 oleh para mahasiswa biologi yang mempunyai minat dan kepedulian akan laut. Kemudian pada tanggal 19 September 2000, kelompok studi ini resmi didirikan dengan nama Kelompok Studi Laut Biologi dan menunjuk X sebagai Ketua Umum periode pertama.',
'Pada MUSYANG II (Musyawarah Anggota) 19 September 2001, kelompok studi ini mengalami perubahan nama dari Kelompok Studi Laut menjadi Kelompok Studi Kelautan Fakultas Biologi X. Perubahan nama ini berkaitan dengan obyek kajian yang dikaji, yakni kelautan yang meliputi daerah pesisir dan laut.',
],
];

$strukturImg = asset('images/img-org.png');

$kelasKeilmuan = [
['nama' => 'Algae', 'img' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=300&q=80'],
['nama' => 'Crustacea', 'img' => 'https://images.unsplash.com/photo-1550747545-c896b5f89ff7?w=300&q=80'],
['nama' => 'Echinodermata', 'img' => 'https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=300&q=80'],
['nama' => 'Mollusca', 'img' => 'https://images.unsplash.com/photo-1518877593221-1f28583780b4?w=300&q=80'],
['nama' => 'Pisces', 'img' => 'https://images.unsplash.com/photo-1524704796725-9fc3044a58b2?w=300&q=80'],
];

$programKerja = [
[
'judul' => 'Eksplorasi',
'desc' => 'Program penanaman kembali karang di area...',
'img' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=700&q=80',
],
[
'judul' => 'Studi',
'desc' => 'Membagikan jurnal dan materi',
'img' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=700&q=80',
],
[
'judul' => 'Edukasi',
'desc' => 'Kegiatan pembinaan dan pelatihan anggota',
'img' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=700&q=80',
],
];
@endphp

@extends('layouts.user')

@section('title', 'Profil UKM X')

@push('styles')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet" />
@endpush

@section('content')

{{-- Hero --}}
<section class="profile-hero">
    <div class="container">
        <h1 class="profile-hero__title">Profil UKM X</h1>
        <p class="profile-hero__desc">Alur prosedur untuk melakukan peminjaman peralatan riset</p>
    </div>
</section>

{{-- Sejarah --}}
<section class="profile-sejarah">
    <div class="container">
        <div class="profile-sejarah__media">
            <div class="profile-sejarah__img">
                <img src="{{ $sejarah['img'] }}" alt="Sejarah UKM X" />
            </div>
            <div class="profile-sejarah__text">
                <h2>Sejarah UKM X</h2>
                @foreach ($sejarah['paragraf'] as $p)
                <p>{{ $p }}</p>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Struktur Organisasi --}}
<section class="profile-struktur">
    <div class="container">
        <h2 class="profile-struktur__title">Struktur UKM X</h2>
        <div class="profile-struktur__img-wrap">
            <img src="{{ $strukturImg }}" alt="Struktur Organisasi UKM X" />
        </div>
    </div>
</section>

{{-- Kelas Keilmuan --}}
<section class="profile-kelas">
    <div class="container">
        <h2 class="profile-kelas__title">Kelas Keilmuan</h2>
        <div class="kelas-cards">
            @foreach ($kelasKeilmuan as $kelas)
            <div class="kelas-card">
                <img src="{{ $kelas['img'] }}" alt="{{ $kelas['nama'] }}" class="kelas-card__img" />
                <p class="kelas-card__label">{{ $kelas['nama'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Program Kerja --}}
<section class="profile-program">
    <div class="container">
        <h2 class="profile-program__title">Program Kerja</h2>
        <div class="program-cards">
            @foreach ($programKerja as $program)
            <div class="program-card">
                <div class="program-card__img-wrap">
                    <img src="{{ $program['img'] }}" alt="{{ $program['judul'] }}" />
                </div>
                <div class="program-card__body">
                    <h3 class="program-card__title">{{ $program['judul'] }}</h3>
                    <p class="program-card__desc">{{ $program['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection