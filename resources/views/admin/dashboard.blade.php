@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

{{-- Heading --}}
<div class="mb-4">
    <h1 class="fw-bold fs-3 text-dark mb-1">Dashboard Admin</h1>
    <p class="text-muted small mb-0">
        Pantau statistik pengunjung, publikasi, dan dokumentasi serta kelola<br>
        konten portal UKM X secara terpusat.
    </p>
</div>

{{-- ===== STAT CARDS ===== --}}
<div class="row g-3 mb-4">

    {{-- Card 1 --}}
    <div class="col-12 col-md-4">
        <div class="stat-card">
            <i class="bi bi-people stat-icon"></i>
            <div class="stat-label">Total Pengunjung</div>
            <div class="stat-number">12,111</div>
            <div class="stat-trend text-primary">↑ +99.9% bulan ini</div>
        </div>
    </div>

    {{-- Card 2 --}}
    <div class="col-12 col-md-4">
        <div class="stat-card">
            <i class="bi bi-book stat-icon"></i>
            <div class="stat-label">Total Publikasi</div>
            <div class="stat-number">999</div>
            <div class="stat-trend text-primary">↑ +9 Semester ini</div>
        </div>
    </div>

    {{-- Card 3 --}}
    <div class="col-12 col-md-4">
        <div class="stat-card">
            <i class="bi bi-file-text stat-icon"></i>
            <div class="stat-label">Dokumentasi</div>
            <div class="stat-number">99</div>
            <div class="stat-trend text-secondary">↺ Terakhir diupdate kemarin</div>
        </div>
    </div>

</div>

{{-- ===== CHARTS ===== --}}
<div class="row g-3">

    {{-- Line Chart --}}
    <div class="col-12 col-lg-7">
        <div class="chart-card">
            <div class="d-flex justify-content-between align-items-center">
                <span class="chart-title">Tren Pengunjung Bulanan</span>
                <select class="filter-dropdown">
                    <option>6 Bulan Terakhir</option>
                    <option>3 Bulan Terakhir</option>
                    <option>1 Tahun Terakhir</option>
                </select>
            </div>
            <hr class="chart-divider">
            <canvas id="lineChart"></canvas>
        </div>
    </div>

    {{-- Donut Chart --}}
    <div class="col-12 col-lg-5">
        <div class="chart-card">
            <div class="chart-title">Kategori Publikasi</div>
            <hr class="chart-divider">
            <div class="d-flex justify-content-center my-3">
                <canvas id="donutChart" width="200" height="200"></canvas>
            </div>
            <div class="mt-2">
                <div class="legend-item">
                    <div><span class="legend-dot" style="background:#2563eb;"></span>Algae</div>
                    <span>45%</span>
                </div>
                <div class="legend-item">
                    <div><span class="legend-dot" style="background:#0f766e;"></span>Echinodermata</div>
                    <span>30%</span>
                </div>
                <div class="legend-item">
                    <div><span class="legend-dot" style="background:#bfdbfe;"></span>Mollusca</div>
                    <span>25%</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script src="{{ asset('js/admin-dashboard.js') }}"></script>
@endpush