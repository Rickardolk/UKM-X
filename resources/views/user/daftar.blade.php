@extends('layouts.user')

@section('title', 'Informasi Pendaftaran - UKM X')

@push('styles')
<link href="{{ asset('css/daftar.css') }}" rel="stylesheet" />
@endpush

@section('content')

<!-- hero section -->
<section class="daftar-hero">
    <div class="container">
        <h1 class="daftar-hero__title">Informasi Pendaftaran</h1>
        <p class="daftar-hero__desc">Alur prosedur untuk melakukan peminjaman peralatan riset</p>
    </div>
</section>

<!-- Card information section -->
<section class="daftar-content">
    <div class="container">
        <div class="daftar-card">
            <div class="daftar-card__icon">
                <i class="bi bi-file-earmark-text"></i>
            </div>
            <h2 class="daftar-card__title">Informasi dan Formulir</h2>
            <p class="daftar-card__desc">
                Akses informasi dan formulir pendaftaran anggota baru pada tautan dibawah ini
            </p>
            <div class="daftar-card__actions">
                <a href="#" class="btn-daftar-primary">Informasi Pendaftaran</a>
                <a href="#" class="btn-daftar-link">
                    Formulir pendaftaran <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection