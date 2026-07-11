@php
$stats = [
[
'icon' => 'bi-person',
'label' => 'Total Pengunjung',
'value' => '12,111',
'trend' => '+99.9% bulan ini',
'trend_icon' => 'bi-arrow-up',
],
[
'icon' => 'bi-book',
'label' => 'Total Publikasi',
'value' => '999',
'trend' => '+9 Semester ini',
'trend_icon' => 'bi-arrow-up',
],
[
'icon' => 'bi-file-earmark-text',
'label' => 'Dokumentasi',
'value' => '99',
'trend' => 'Terakhir diupdate kemarin',
'trend_icon' => 'bi-clock-history',
],
];

$kategoriPublikasi = [
['label' => 'Algae', 'value' => 45, 'color' => '#2563EB'],
['label' => 'Echinodermata', 'value' => 30, 'color' => '#0F766E'],
['label' => 'Mollusca', 'value' => 25, 'color' => '#A5B4FC'],
];

$trenPengunjung = [
'labels' => ['Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt'],
'data' => [8500, 9200, 8800, 10500, 11800, 12500],
];
@endphp

@extends('layouts.admin')

@section('title', 'Dashboard Admin - UKM X')

@section('content')

<h1 class="admin-page__title">Dashboard Admin</h1>
<p class="admin-page__desc">
    Pantau statistik pengunjung, publikasi, dan dokumentasi serta kelola konten portal UKM X secara terpusat.
</p>

{{-- Stat cards --}}
<div class="row g-3 mb-3">
    @foreach ($stats as $stat)
    <div class="col-md-4">
        <div class="stat-card">
            <i class="bi {{ $stat['icon'] }} stat-card__icon"></i>
            <p class="stat-card__label">{{ $stat['label'] }}</p>
            <p class="stat-card__value">{{ $stat['value'] }}</p>
            <p class="stat-card__trend mb-0">
                <i class="bi {{ $stat['trend_icon'] }}"></i> {{ $stat['trend'] }}
            </p>
        </div>
    </div>
    @endforeach
</div>

{{-- Charts --}}
<div class="row g-3">
    <div class="col-lg-8">
        <div class="chart-card">
            <h2 class="chart-card__title">Tren Pengunjung Bulanan</h2>
            <canvas id="chartTren" height="110"></canvas>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="chart-card">
            <h2 class="chart-card__title">Kategori Publikasi</h2>
            <canvas id="chartKategori" height="200"></canvas>
            <ul class="chart-legend">
                @foreach ($kategoriPublikasi as $k)
                <li>
                    <span class="legend-label">
                        <span class="dot" style="background: {{ $k['color'] }};"></span>
                        {{ $k['label'] }}
                    </span>
                    <span class="legend-value">{{ $k['value'] }}%</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    window.__trenPengunjung = @json($trenPengunjung);
    window.__kategoriPublikasi = @json($kategoriPublikasi);
</script>
<script src="{{ asset('js/admin-dashboard.js') }}"></script>
@endpush