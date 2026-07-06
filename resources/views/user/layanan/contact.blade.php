@php
$kontakList = [
[
'label' => 'Whatsapp',
'icon' => 'bi-whatsapp',
'type' => 'whatsapp',
'url' => '#',
],
[
'label' => 'Instagram',
'icon' => 'bi-instagram',
'type' => 'instagram',
'url' => '#',
],
[
'label' => 'Email',
'icon' => 'bi-envelope',
'type' => 'email',
'url' => '#',
],
];
@endphp

@extends('layouts.user')

@section('title', 'Kontak Kami - UKM X')

@push('styles')
<link href="{{ asset('css/layanan.css') }}" rel="stylesheet" />
@endpush

@section('content')

<section class="layanan-hero">
    <div class="container">
        <h1 class="layanan-hero__title">Kontak Kami</h1>
        <p class="layanan-hero__desc">Punya pertanyaan dan keluhan terkait UKM X, hubungi kami melalui kontak dibawah ini</p>
    </div>
</section>

<section class="kontak-section">
    <div class="container">
        <div class="kontak-cards">
            @foreach ($kontakList as $kontak)
            <a href="{{ $kontak['url'] }}" class="kontak-card kontak-card--{{ $kontak['type'] }}">
                <i class="bi {{ $kontak['icon'] }} kontak-card__icon"></i>
                <p class="kontak-card__label">{{ $kontak['label'] }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection