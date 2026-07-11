@extends('layouts.user')

@section('title', 'Informasi Kegiatan - UKM X')

@push('styles')
<link href="{{ asset('css/kegiatan.css') }}" rel="stylesheet" />
@endpush

@section('content')

<!-- HEader -->
<section class="page-header">
  <div class="container">
    <h1>Informasi Kegiatan</h1>
    <p>Informasi kegiatan dalam UKM X dalam mewujudkan visi misi organisasi</p>
  </div>
</section>

<!-- Ongoing Section -->
<section class="section-ongoing">
  <div class="container">
    <h2 class="section-title">Kegiatan Sedang Berjalan</h2>

    <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-lg-4">

      @php
      $kegiatanBerjalan = [
      [
      'img' => 'https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=600&q=80',
      'alt' => 'Restorasi Terumbu',
      'judul' => 'Restorasi Terumbu',
      'tgl' => '12 Okt 2026 – 14 Okt 2026',
      'desc' => 'Program penanaman kembali karang di area...',
      'url' => route('kegiatan.show'),
      ],
      [
      'img' => 'https://images.unsplash.com/photo-1615441000196-cae8adec6ebe?q=80&w=764',
      'alt' => 'Penyelamatan Penyu',
      'judul' => 'Penyelamatan Penyu',
      'tgl' => '12 Okt 2026 – 14 Okt 2026',
      'desc' => 'Program penyelamatan kembali penyu di area...',
      'url' => route('kegiatan.show'),
      ],
      [
      'img' => 'https://plus.unsplash.com/premium_photo-1710673365954-4f943feb75ec?q=80&w=1074',
      'alt' => 'Eksplorasi Biota Laut',
      'judul' => 'Eksplorasi biota laut',
      'tgl' => '12 Okt 2026 – 14 Okt 2026',
      'desc' => 'Program eksplorasi biota laut di area...',
      'url' => route('kegiatan.show'),
      ],
      [
      'img' => 'https://plus.unsplash.com/premium_photo-1694250866050-6153c23d112e?q=80&w=881',
      'alt' => 'Studi Bintang Laut',
      'judul' => 'Studi Bintang laut',
      'tgl' => '12 Okt 2026 – 14 Okt 2026',
      'desc' => 'Program studi bintang laut di area...',
      'url' => route('kegiatan.show'),
      ],
      ];
      @endphp

      @foreach ($kegiatanBerjalan as $item)
      <div class="col">
        <x-card-item
          variant="kegiatan"
          :img="$item['img']"
          :alt="$item['alt']"
          :meta="$item['tgl']"
          :title="$item['judul']"
          :desc="$item['desc']"
          :url="$item['url']"
          link-text="Lihat detail" />
      </div>
      @endforeach

    </div>
  </div>
</section>

<!-- Filter and search -->
<div class="filter-bar">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

      <x-filter-buttons variant="kegiatan" :options="[
          ['label' => 'Semua', 'filter' => 'semua', 'active' => true],
          ['label' => 'Minggu ini', 'filter' => 'minggu'],
          ['label' => 'Bulan ini', 'filter' => 'bulan'],
          ['label' => 'Tahun ini', 'filter' => 'tahun'],
      ]" />

      <x-search-box variant="kegiatan" id="searchInput" placeholder="Cari Kegiatan" />

    </div>
  </div>
</div>

<!-- Daftar Kegiatan -->
<section class="section-daftar">
  <div class="container">
    <h2 class="section-title">Daftar Kegiatan</h2>

    @php
    $daftarKegiatan = [
    ['img' => 'https://images.unsplash.com/photo-1615441000196-cae8adec6ebe?q=80&w=764', 'alt' => 'Penyelamatan Penyu', 'judul' => 'Penyelamatan Penyu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penyelamatan kembali penyu di area...', 'url' => route('kegiatan.show'), 'filter' => 'penyelamatan penyu'],
    ['img' => 'https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=600&q=80', 'alt' => 'Restorasi Terumbu', 'judul' => 'Restorasi Terumbu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penanaman kembali karang di area...', 'url' => route('kegiatan.show'), 'filter' => 'restorasi terumbu'],
    ['img' => 'https://plus.unsplash.com/premium_photo-1694250866050-6153c23d112e?q=80&w=881', 'alt' => 'Studi Bintang Laut', 'judul' => 'Studi Bintang laut', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program studi bintang laut di area...', 'url' => route('kegiatan.show'), 'filter' => 'studi bintang laut'],
    ['img' => 'https://plus.unsplash.com/premium_photo-1710673365954-4f943feb75ec?q=80&w=1074', 'alt' => 'Eksplorasi Biota Laut','judul' => 'Eksplorasi biota laut','tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program eksplorasi biota laut di area...', 'url' => route('kegiatan.show'), 'filter' => 'eksplorasi biota laut'],
    ['img' => 'https://images.unsplash.com/photo-1615441000196-cae8adec6ebe?q=80&w=764', 'alt' => 'Eksplorasi Biota Laut','judul' => 'Eksplorasi biota laut','tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program eksplorasi biota laut di area...', 'url' => route('kegiatan.show'), 'filter' => 'eksplorasi biota laut'],
    ['img' => 'https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=600&q=80', 'alt' => 'Penyelamatan Penyu', 'judul' => 'Penyelamatan Penyu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penyelamatan kembali penyu di area...', 'url' => route('kegiatan.show'), 'filter' => 'penyelamatan penyu'],
    ['img' => 'https://plus.unsplash.com/premium_photo-1694250866050-6153c23d112e?q=80&w=881', 'alt' => 'Restorasi Terumbu', 'judul' => 'Restorasi Terumbu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penanaman kembali karang di area...', 'url' => route('kegiatan.show'), 'filter' => 'restorasi terumbu'],
    ['img' => 'https://plus.unsplash.com/premium_photo-1710673365954-4f943feb75ec?q=80&w=1074', 'alt' => 'Studi Bintang Laut', 'judul' => 'Studi Bintang laut', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program studi bintang laut di area...', 'url' => route('kegiatan.show'), 'filter' => 'studi bintang laut'],
    ['img' => 'https://images.unsplash.com/photo-1615441000196-cae8adec6ebe?q=80&w=764', 'alt' => 'Penyelamatan Penyu', 'judul' => 'Penyelamatan Penyu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penyelamatan kembali penyu di area...', 'url' => route('kegiatan.show'), 'filter' => 'penyelamatan penyu'],
    ['img' => 'https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=600&q=80', 'alt' => 'Studi Bintang Laut', 'judul' => 'Studi Bintang laut', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program studi bintang laut di area...', 'url' => route('kegiatan.show'), 'filter' => 'studi bintang laut'],
    ['img' => 'https://plus.unsplash.com/premium_photo-1694250866050-6153c23d112e?q=80&w=881', 'alt' => 'Eksplorasi Biota Laut','judul' => 'Eksplorasi biota laut','tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program eksplorasi biota laut di area...', 'url' => route('kegiatan.show'), 'filter' => 'eksplorasi biota laut'],
    ['img' => 'https://plus.unsplash.com/premium_photo-1710673365954-4f943feb75ec?q=80&w=1074', 'alt' => 'Restorasi Terumbu', 'judul' => 'Restorasi Terumbu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penanaman kembali karang di area...', 'url' => route('kegiatan.show'), 'filter' => 'restorasi terumbu'],
    ];
    @endphp

    <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4" id="kegiatanGrid">
      @foreach ($daftarKegiatan as $item)
      <div class="col kegiatan-item" data-title="{{ $item['filter'] }}">
        <x-card-item
          variant="kegiatan"
          :img="$item['img']"
          :alt="$item['alt']"
          :meta="$item['tgl']"
          :title="$item['judul']"
          :desc="$item['desc']"
          :url="$item['url']"
          link-text="Lihat detail" />
      </div>
      @endforeach
    </div>

    {{-- Empty state --}}
    <div id="emptyState" class="text-center py-5 d-none">
      <i class="bi bi-search" style="font-size:2.5rem; color:#6B7280;"></i>
      <p class="mt-3" style="color:#6B7280;">Tidak ada kegiatan yang ditemukan.</p>
    </div>

  </div>
</section>

<x-pagination variant="kegiatan" :total-pages="4" />

@endsection

<!-- js -->
@push('scripts')
<script src="{{ asset('js/kegiatan.js') }}"></script>
@endpush