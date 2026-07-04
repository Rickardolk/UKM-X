@extends('layouts.user')

@section('title', 'Informasi Kegiatan - UKM X')

@push('styles')
<link href="{{ asset('css/kegiatan.css') }}" rel="stylesheet" />
@endpush

@section('content')

<!-- header -->
<section class="page-header">
  <div class="container">
    <h1>Informasi Kegiatan</h1>
    <p>Informasi kegiatan dalam UKM X dalam mewujudkan visi misi organisasi</p>
  </div>
</section>

<!-- Kegiatan Sedang berjalan -->
<section class="section-ongoing">
  <div class="container">
    <h2 class="section-title">Kegiatan Sedang Berjalan</h2>

    <div class="row g-3 row-cols-1 row-cols-sm-2 row-cols-lg-4">

      @php
      $kegiatanBerjalan = [
      [
      'img' => 'https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=600&q=80',
      'alt' => 'Restorasi Terumbu',
      'judul' => 'Restorasi Terumbu',
      'tgl' => '12 Okt 2026 – 14 Okt 2026',
      'desc' => 'Program penanaman kembali karang di area...',
      'url' => '#',
      ],
      [
      'img' => 'https://images.unsplash.com/photo-1591025207163-942350e47db2?w=600&q=80',
      'alt' => 'Penyelamatan Penyu',
      'judul' => 'Penyelamatan Penyu',
      'tgl' => '12 Okt 2026 – 14 Okt 2026',
      'desc' => 'Program penyelamatan kembali penyu di area...',
      'url' => '#',
      ],
      [
      'img' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=600&q=80',
      'alt' => 'Eksplorasi Biota Laut',
      'judul' => 'Eksplorasi biota laut',
      'tgl' => '12 Okt 2026 – 14 Okt 2026',
      'desc' => 'Program eksplorasi biota laut di area...',
      'url' => '#',
      ],
      [
      'img' => 'https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=600&q=80',
      'alt' => 'Studi Bintang Laut',
      'judul' => 'Studi Bintang laut',
      'tgl' => '12 Okt 2026 – 14 Okt 2026',
      'desc' => 'Program studi bintang laut di area...',
      'url' => '#',
      ],
      ];
      @endphp

      @foreach ($kegiatanBerjalan as $item)
      <div class="col">
        <div class="card-kegiatan">
          <div class="card-img-wrap">
            <img src="{{ $item['img'] }}" alt="{{ $item['alt'] }}" loading="lazy" />
          </div>
          <div class="card-body">
            <p class="card-date">{{ $item['tgl'] }}</p>
            <h3 class="card-title-text">{{ $item['judul'] }}</h3>
            <p class="card-desc">{{ $item['desc'] }}</p>
            <a href="{{ $item['url'] }}" class="card-link">
              Lihat detail <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>

<!-- Filter and search -->
<div class="filter-bar">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

      <div class="filter-btns d-flex gap-2 flex-wrap">
        <button class="filter-btn active" data-filter="semua">Semua</button>
        <button class="filter-btn" data-filter="minggu">Minggu ini</button>
        <button class="filter-btn" data-filter="bulan">Bulan ini</button>
        <button class="filter-btn" data-filter="tahun">Tahun ini</button>
      </div>

      <div class="search-wrap">
        <i class="bi bi-search"></i>
        <input
          type="text"
          class="search-input"
          placeholder="Cari Kegiatan"
          id="searchInput"
          aria-label="Cari kegiatan" />
      </div>

    </div>
  </div>
</div>

<!-- Daftar Kegiatan -->
<section class="section-daftar">
  <div class="container">
    <h2 class="section-title">Daftar Kegiatan</h2>

    @php
    $daftarKegiatan = [
    ['img' => 'https://images.unsplash.com/photo-1591025207163-942350e47db2?w=600&q=80', 'alt' => 'Penyelamatan Penyu', 'judul' => 'Penyelamatan Penyu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penyelamatan kembali penyu di area...', 'url' => '#', 'filter' => 'penyelamatan penyu'],
    ['img' => 'https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=600&q=80', 'alt' => 'Restorasi Terumbu', 'judul' => 'Restorasi Terumbu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penanaman kembali karang di area...', 'url' => '#', 'filter' => 'restorasi terumbu'],
    ['img' => 'https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=600&q=80', 'alt' => 'Studi Bintang Laut', 'judul' => 'Studi Bintang laut', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program studi bintang laut di area...', 'url' => '#', 'filter' => 'studi bintang laut'],
    ['img' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=600&q=80', 'alt' => 'Eksplorasi Biota Laut','judul' => 'Eksplorasi biota laut','tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program eksplorasi biota laut di area...', 'url' => '#', 'filter' => 'eksplorasi biota laut'],
    ['img' => 'https://images.unsplash.com/photo-1618671257827-5b55b0cd8b40?w=600&q=80', 'alt' => 'Eksplorasi Biota Laut','judul' => 'Eksplorasi biota laut','tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program eksplorasi biota laut di area...', 'url' => '#', 'filter' => 'eksplorasi biota laut'],
    ['img' => 'https://images.unsplash.com/photo-1560275619-4cc5fa59d3ae?w=600&q=80', 'alt' => 'Penyelamatan Penyu', 'judul' => 'Penyelamatan Penyu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penyelamatan kembali penyu di area...', 'url' => '#', 'filter' => 'penyelamatan penyu'],
    ['img' => 'https://images.unsplash.com/photo-1546026423-cc4642628d2b?w=600&q=80', 'alt' => 'Restorasi Terumbu', 'judul' => 'Restorasi Terumbu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penanaman kembali karang di area...', 'url' => '#', 'filter' => 'restorasi terumbu'],
    ['img' => 'https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=600&q=80', 'alt' => 'Studi Bintang Laut', 'judul' => 'Studi Bintang laut', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program studi bintang laut di area...', 'url' => '#', 'filter' => 'studi bintang laut'],
    ['img' => 'https://images.unsplash.com/photo-1591025207163-942350e47db2?w=600&q=80', 'alt' => 'Penyelamatan Penyu', 'judul' => 'Penyelamatan Penyu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penyelamatan kembali penyu di area...', 'url' => '#', 'filter' => 'penyelamatan penyu'],
    ['img' => 'https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=600&q=80', 'alt' => 'Studi Bintang Laut', 'judul' => 'Studi Bintang laut', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program studi bintang laut di area...', 'url' => '#', 'filter' => 'studi bintang laut'],
    ['img' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=600&q=80', 'alt' => 'Eksplorasi Biota Laut','judul' => 'Eksplorasi biota laut','tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program eksplorasi biota laut di area...', 'url' => '#', 'filter' => 'eksplorasi biota laut'],
    ['img' => 'https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=600&q=80', 'alt' => 'Restorasi Terumbu', 'judul' => 'Restorasi Terumbu', 'tgl' => '12 Okt 2026 – 14 Okt 2026', 'desc' => 'Program penanaman kembali karang di area...', 'url' => '#', 'filter' => 'restorasi terumbu'],
    ];
    @endphp

    <div class="row g-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4" id="kegiatanGrid">
      @foreach ($daftarKegiatan as $item)
      <div class="col kegiatan-item" data-title="{{ $item['filter'] }}">
        <div class="card-kegiatan">
          <div class="card-img-wrap">
            <img src="{{ $item['img'] }}" alt="{{ $item['alt'] }}" loading="lazy" />
          </div>
          <div class="card-body">
            <p class="card-date">{{ $item['tgl'] }}</p>
            <h3 class="card-title-text">{{ $item['judul'] }}</h3>
            <p class="card-desc">{{ $item['desc'] }}</p>
            <a href="{{ $item['url'] }}" class="card-link">
              Lihat detail <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
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

<!-- Paginition -->
<div class="pagination-wrap">
  <button class="page-btn arrow" aria-label="Sebelumnya"><i class="bi bi-chevron-left"></i></button>
  <button class="page-btn active" aria-current="page">1</button>
  <button class="page-btn">2</button>
  <button class="page-btn">3</button>
  <button class="page-btn">4</button>
  <button class="page-btn arrow" aria-label="Berikutnya"><i class="bi bi-chevron-right"></i></button>
</div>

@endsection






<!-- js -->
@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {

    /* ── filter buttons ── */
    const filterBtns = document.querySelectorAll('.filter-btn');
    filterBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        filterBtns.forEach(function(b) {
          b.classList.remove('active');
        });
        btn.classList.add('active');
      });
    });

    /* ── Live search ── */
    const searchInput = document.getElementById('searchInput');
    const items = document.querySelectorAll('.kegiatan-item');
    const emptyState = document.getElementById('emptyState');

    searchInput.addEventListener('input', function() {
      const q = searchInput.value.toLowerCase().trim();
      let visible = 0;

      items.forEach(function(item) {
        const title = item.dataset.title || '';
        const match = title.includes(q);
        item.style.display = match ? '' : 'none';
        if (match) visible++;
      });

      emptyState.classList.toggle('d-none', visible > 0);
    });

    /* ── Pagination active ── */
    const pageBtns = document.querySelectorAll('.page-btn:not(.arrow)');
    pageBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        pageBtns.forEach(function(b) {
          b.classList.remove('active');
          b.removeAttribute('aria-current');
        });
        btn.classList.add('active');
        btn.setAttribute('aria-current', 'page');
      });
    });

  });
</script>
@endpush