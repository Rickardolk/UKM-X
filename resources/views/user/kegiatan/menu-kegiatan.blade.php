<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kegiatan – UKM X</title>

  <!-- Bootstrap 5 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <!-- Bootstrap Icons -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    rel="stylesheet"
  />
  <!-- Google Fonts: Inter -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
  />

  <style>
    /* ─── TOKENS ──────────────────────────────────────────────── */
    :root {
      --navy:       #1A3A6B;
      --navy-dark:  #122852;
      --blue:       #2563EB;
      --blue-light: #EEF4FF;
      --blue-mid:   #DBEAFE;
      --text:       #111827;
      --muted:      #6B7280;
      --border:     #E5E7EB;
      --white:      #FFFFFF;
      --radius:     12px;
      --shadow:     0 2px 12px rgba(0,0,0,.08);
      --shadow-hover: 0 8px 28px rgba(37,99,235,.18);
    }

    /* ─── GLOBALS ─────────────────────────────────────────────── */
    *, *::before, *::after { box-sizing: border-box; }
    html { scroll-behavior: smooth; }

    body {
      font-family: 'Inter', sans-serif;
      color: var(--text);
      background: var(--white);
      margin: 0;
    }

    a { text-decoration: none; color: inherit; }

    /* ─── NAVBAR ──────────────────────────────────────────────── */
    .navbar {
      background: var(--white);
      border-bottom: 1px solid var(--border);
      padding: 0 0;
      min-height: 64px;
    }

    .navbar-brand {
      font-weight: 800;
      font-size: 1.2rem;
      color: var(--text);
      letter-spacing: -.3px;
    }

    .navbar-nav .nav-link {
      font-size: .9rem;
      font-weight: 500;
      color: var(--muted);
      padding: .5rem .85rem;
      transition: color .2s;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      color: var(--blue);
    }

    .navbar-nav .nav-link.active {
      text-decoration: underline;
      text-underline-offset: 4px;
    }

    .btn-masuk {
      background: var(--blue);
      color: var(--white);
      font-weight: 600;
      font-size: .875rem;
      border-radius: 8px;
      padding: .45rem 1.1rem;
      border: none;
      transition: background .2s, transform .15s;
    }
    .btn-masuk:hover {
      background: #1d4ed8;
      color: var(--white);
      transform: translateY(-1px);
    }

    /* ─── HERO HEADER ─────────────────────────────────────────── */
    .page-header {
      padding: 3rem 0 2.5rem;
      border-bottom: 1px solid var(--border);
    }

    .page-header h1 {
      font-size: clamp(1.75rem, 3vw, 2.25rem);
      font-weight: 800;
      letter-spacing: -.5px;
      margin-bottom: .4rem;
    }

    .page-header p {
      color: var(--muted);
      font-size: .95rem;
      margin: 0;
    }

    /* ─── SECTION: SEDANG BERJALAN ────────────────────────────── */
    .section-ongoing {
      background: var(--blue-light);
      padding: 2.5rem 0 3rem;
    }

    .section-title {
      font-size: 1.3rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      letter-spacing: -.2px;
    }

    /* ─── CARDS ───────────────────────────────────────────────── */
    .card-kegiatan {
      background: var(--white);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: transform .25s, box-shadow .25s;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .card-kegiatan:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-hover);
    }

    .card-kegiatan .card-img-wrap {
      width: 100%;
      aspect-ratio: 16 / 9;
      overflow: hidden;
    }

    .card-kegiatan .card-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform .4s ease;
    }

    .card-kegiatan:hover .card-img-wrap img {
      transform: scale(1.05);
    }

    .card-kegiatan .card-body {
      padding: 1rem 1rem .85rem;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .card-date {
      font-size: .75rem;
      color: var(--muted);
      margin-bottom: .35rem;
      font-weight: 500;
    }

    .card-title-text {
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: .35rem;
      line-height: 1.35;
      color: var(--text);
    }

    .card-desc {
      font-size: .82rem;
      color: var(--muted);
      line-height: 1.5;
      flex: 1;
      margin-bottom: .75rem;
    }

    .card-link {
      font-size: .82rem;
      font-weight: 600;
      color: var(--blue);
      display: inline-flex;
      align-items: center;
      gap: .3rem;
      transition: gap .2s, color .2s;
      margin-top: auto;
    }

    .card-link:hover {
      color: #1d4ed8;
      gap: .55rem;
    }

    /* ─── FILTER BAR ──────────────────────────────────────────── */
    .filter-bar {
      padding: 1.4rem 0;
      border-bottom: 1px solid var(--border);
    }

    .filter-btn {
      font-size: .82rem;
      font-weight: 600;
      border-radius: 999px;
      padding: .4rem 1rem;
      border: 1.5px solid var(--border);
      background: var(--white);
      color: var(--text);
      cursor: pointer;
      transition: all .2s;
    }

    .filter-btn:hover {
      border-color: var(--blue);
      color: var(--blue);
    }

    .filter-btn.active {
      background: var(--blue);
      color: var(--white);
      border-color: var(--blue);
    }

    .search-wrap {
      position: relative;
      max-width: 320px;
      width: 100%;
    }

    .search-wrap .bi-search {
      position: absolute;
      left: .85rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      font-size: .9rem;
      pointer-events: none;
    }

    .search-input {
      width: 100%;
      border: 1.5px solid var(--border);
      border-radius: 999px;
      padding: .4rem 1rem .4rem 2.2rem;
      font-size: .85rem;
      font-family: 'Inter', sans-serif;
      outline: none;
      transition: border-color .2s;
      color: var(--text);
    }

    .search-input:focus {
      border-color: var(--blue);
    }

    .search-input::placeholder { color: var(--muted); }

    /* ─── SECTION: DAFTAR KEGIATAN ────────────────────────────── */
    .section-daftar {
      padding: 2.5rem 0 3rem;
    }

    /* ─── PAGINATION ──────────────────────────────────────────── */
    .pagination-wrap {
      padding: 1.5rem 0 2.5rem;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: .4rem;
    }

    .page-btn {
      width: 36px;
      height: 36px;
      border-radius: 8px;
      border: 1.5px solid var(--border);
      background: var(--white);
      font-size: .85rem;
      font-weight: 600;
      color: var(--text);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all .2s;
    }

    .page-btn:hover {
      border-color: var(--blue);
      color: var(--blue);
    }

    .page-btn.active {
      background: var(--blue);
      color: var(--white);
      border-color: var(--blue);
    }

    .page-btn.arrow {
      font-size: .8rem;
      color: var(--muted);
    }

    .page-btn.arrow:hover { color: var(--blue); }

    /* ─── FOOTER ──────────────────────────────────────────────── */
    .footer {
      background: var(--navy);
      color: var(--white);
      padding: 3rem 0 0;
    }

    .footer-brand {
      font-size: 1.15rem;
      font-weight: 800;
      letter-spacing: -.2px;
      margin-bottom: .75rem;
    }

    .footer-desc {
      font-size: .82rem;
      color: rgba(255,255,255,.65);
      line-height: 1.6;
      max-width: 280px;
    }

    .footer-col-title {
      font-size: .8rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: .6px;
      color: rgba(255,255,255,.5);
      margin-bottom: .85rem;
    }

    .footer-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-links li { margin-bottom: .5rem; }

    .footer-links a {
      font-size: .85rem;
      color: rgba(255,255,255,.75);
      transition: color .2s;
    }

    .footer-links a:hover { color: var(--white); }

    .footer-bottom {
      margin-top: 2.5rem;
      border-top: 1px solid rgba(255,255,255,.12);
      padding: 1rem 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: .5rem;
    }

    .footer-bottom p {
      font-size: .75rem;
      color: rgba(255,255,255,.45);
      margin: 0;
    }

    .footer-icons {
      display: flex;
      gap: .85rem;
    }

    .footer-icons a {
      color: rgba(255,255,255,.55);
      font-size: 1.1rem;
      transition: color .2s;
    }

    .footer-icons a:hover { color: var(--white); }

    /* ─── PLACEHOLDER IMAGES ──────────────────────────────────── */
    .img-placeholder {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* ─── RESPONSIVE OVERRIDES ────────────────────────────────── */

    /* xs (<576px) — stack single column */
    @media (max-width: 575.98px) {
      .page-header h1 { font-size: 1.5rem; }
      .filter-bar .d-flex { flex-direction: column; align-items: flex-start; gap: .75rem !important; }
      .search-wrap { max-width: 100%; }
      .filter-btns { flex-wrap: wrap; }
    }

    /* sm (576–767px) — 2 columns */
    @media (min-width: 576px) and (max-width: 767.98px) {
      .search-wrap { max-width: 240px; }
    }

    /* md (768–991px) — 2 columns forced for ongoing, 3 for list */
    @media (min-width: 768px) and (max-width: 991.98px) {
      .search-wrap { max-width: 260px; }
    }

    /* lg (992–1199px) — 4 column full layout */
    @media (min-width: 992px) {
      .search-wrap { max-width: 300px; }
    }

    /* No-motion */
    @media (prefers-reduced-motion: reduce) {
      .card-kegiatan,
      .card-kegiatan .card-img-wrap img,
      .btn-masuk,
      .card-link { transition: none; }
    }
  </style>
</head>

<body>
  <!-- ══════════════════════════════════════
       NAVBAR
  ══════════════════════════════════════ -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">UKM X</a>

      <button
        class="navbar-toggler border-0"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navMain"
        aria-controls="navMain"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Kegiatan</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Arsip</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Pendaftaran</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>
        </ul>
        <a href="#" class="btn btn-masuk ms-lg-2 mt-2 mt-lg-0">Masuk</a>
      </div>
    </div>
  </nav>

  <!-- ══════════════════════════════════════
       PAGE HEADER
  ══════════════════════════════════════ -->
  <section class="page-header">
    <div class="container">
      <h1>Informasi Kegiatan</h1>
      <p>Informasi kegiatan dalam UKM X dalam mewujudkan visi misi organisasi</p>
    </div>
  </section>

  <!-- ══════════════════════════════════════
       KEGIATAN SEDANG BERJALAN
  ══════════════════════════════════════ -->
  <section class="section-ongoing">
    <div class="container">
      <h2 class="section-title">Kegiatan Sedang Berjalan</h2>

      <div class="row g-3 row-cols-1 row-cols-sm-2 row-cols-lg-4">

        <!-- Card 1 -->
        <div class="col">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img
                src="https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=600&q=80"
                alt="Restorasi Terumbu"
                class="img-placeholder"
                loading="lazy"
              />
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Restorasi Terumbu</h3>
              <p class="card-desc">Program penanaman kembali karang di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img
                src="https://images.unsplash.com/photo-1591025207163-942350e47db2?w=600&q=80"
                alt="Penyelamatan Penyu"
                class="img-placeholder"
                loading="lazy"
              />
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Penyelamatan Penyu</h3>
              <p class="card-desc">Program penyelamatan kembali penyu di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img
                src="https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=600&q=80"
                alt="Eksplorasi Biota Laut"
                class="img-placeholder"
                loading="lazy"
              />
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Eksplorasi biota laut</h3>
              <p class="card-desc">Program eksplorasi biota laut di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img
                src="https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=600&q=80"
                alt="Studi Bintang Laut"
                class="img-placeholder"
                loading="lazy"
              />
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Studi Bintang laut</h3>
              <p class="card-desc">Program studi bintang laut di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

      </div><!-- /row -->
    </div>
  </section>

  <!-- ══════════════════════════════════════
       FILTER BAR
  ══════════════════════════════════════ -->
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
            aria-label="Cari kegiatan"
          />
        </div>
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════
       DAFTAR KEGIATAN
  ══════════════════════════════════════ -->
  <section class="section-daftar">
    <div class="container">
      <h2 class="section-title">Daftar Kegiatan</h2>

      <div class="row g-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4" id="kegiatanGrid">

        <!-- Row 1 -->
        <div class="col kegiatan-item" data-title="penyelamatan penyu">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1591025207163-942350e47db2?w=600&q=80" alt="Penyelamatan Penyu" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Penyelamatan Penyu</h3>
              <p class="card-desc">Program penyelamatan kembali penyu di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col kegiatan-item" data-title="restorasi terumbu">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=600&q=80" alt="Restorasi Terumbu" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Restorasi Terumbu</h3>
              <p class="card-desc">Program penanaman kembali karang di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col kegiatan-item" data-title="studi bintang laut">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=600&q=80" alt="Studi Bintang Laut" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Studi Bintang laut</h3>
              <p class="card-desc">Program studi bintang laut di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col kegiatan-item" data-title="eksplorasi biota laut">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=600&q=80" alt="Eksplorasi Biota Laut" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Eksplorasi biota laut</h3>
              <p class="card-desc">Program eksplorasi biota laut di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Row 2 -->
        <div class="col kegiatan-item" data-title="eksplorasi biota laut">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1618671257827-5b55b0cd8b40?w=600&q=80" alt="Eksplorasi Biota Laut" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Eksplorasi biota laut</h3>
              <p class="card-desc">Program eksplorasi biota laut di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col kegiatan-item" data-title="penyelamatan penyu">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1560275619-4cc5fa59d3ae?w=600&q=80" alt="Penyelamatan Penyu" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Penyelamatan Penyu</h3>
              <p class="card-desc">Program penyelamatan kembali penyu di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col kegiatan-item" data-title="restorasi terumbu">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1546026423-cc4642628d2b?w=600&q=80" alt="Restorasi Terumbu" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Restorasi Terumbu</h3>
              <p class="card-desc">Program penanaman kembali karang di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col kegiatan-item" data-title="studi bintang laut">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=600&q=80" alt="Studi Bintang Laut" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Studi Bintang laut</h3>
              <p class="card-desc">Program studi bintang laut di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Row 3 -->
        <div class="col kegiatan-item" data-title="penyelamatan penyu">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1591025207163-942350e47db2?w=600&q=80" alt="Penyelamatan Penyu" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Penyelamatan Penyu</h3>
              <p class="card-desc">Program penyelamatan kembali penyu di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col kegiatan-item" data-title="studi bintang laut">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=600&q=80" alt="Studi Bintang Laut" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Studi Bintang laut</h3>
              <p class="card-desc">Program studi bintang laut di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col kegiatan-item" data-title="eksplorasi biota laut">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=600&q=80" alt="Eksplorasi Biota Laut" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Eksplorasi biota laut</h3>
              <p class="card-desc">Program eksplorasi biota laut di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col kegiatan-item" data-title="restorasi terumbu">
          <div class="card-kegiatan">
            <div class="card-img-wrap">
              <img src="https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=600&q=80" alt="Restorasi Terumbu" class="img-placeholder" loading="lazy"/>
            </div>
            <div class="card-body">
              <p class="card-date">12 Okt 2026 – 14 Okt 2026</p>
              <h3 class="card-title-text">Restorasi Terumbu</h3>
              <p class="card-desc">Program penanaman kembali karang di area...</p>
              <a href="#" class="card-link">Lihat detail <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

      </div><!-- /row -->

      <!-- Empty State (hidden by default) -->
      <div id="emptyState" class="text-center py-5 d-none">
        <i class="bi bi-search" style="font-size:2.5rem; color:var(--muted);"></i>
        <p class="mt-3" style="color:var(--muted);">Tidak ada kegiatan yang ditemukan.</p>
      </div>

    </div>
  </section>

  <!-- ══════════════════════════════════════
       PAGINATION
  ══════════════════════════════════════ -->
  <div class="pagination-wrap">
    <button class="page-btn arrow" aria-label="Sebelumnya"><i class="bi bi-chevron-left"></i></button>
    <button class="page-btn active" aria-current="page">1</button>
    <button class="page-btn">2</button>
    <button class="page-btn">3</button>
    <button class="page-btn">4</button>
    <button class="page-btn arrow" aria-label="Berikutnya"><i class="bi bi-chevron-right"></i></button>
  </div>

  <!-- ══════════════════════════════════════
       FOOTER
  ══════════════════════════════════════ -->
  <footer class="footer">
    <div class="container">
      <div class="row g-4">

        <!-- Brand col -->
        <div class="col-12 col-md-5 col-lg-4">
          <div class="footer-brand">UKM X</div>
          <p class="footer-desc">
            Menjelajahi dan meneliti kehidupan di zona intertidal melalui kegiatan
            eksplorasi, observasi, dan edukasi lingkungan kelautan.
          </p>
        </div>

        <!-- Spacer on md+ -->
        <div class="col-12 col-md-2 d-none d-md-block"></div>

        <!-- Navigasi col -->
        <div class="col-6 col-md-2">
          <p class="footer-col-title">Navigasi</p>
          <ul class="footer-links">
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Kegiatan</a></li>
            <li><a href="#">Riset</a></li>
          </ul>
        </div>

        <!-- Legal col -->
        <div class="col-6 col-md-3">
          <p class="footer-col-title">Legal</p>
          <ul class="footer-links">
            <li><a href="#">Kebijakan Privasi</a></li>
            <li><a href="#">Syarat & Ketentuan</a></li>
          </ul>
        </div>

      </div><!-- /row -->

      <div class="footer-bottom">
        <p>© 2024 UKM X Marine Exploration. Inspired by the Ocean, Driven by Science.</p>
        <div class="footer-icons">
          <a href="#" aria-label="Website"><i class="bi bi-globe2"></i></a>
          <a href="#" aria-label="Email"><i class="bi bi-envelope"></i></a>
        </div>
      </div>

    </div>
  </footer>

  <!-- ══════════════════════════════════════
       SCRIPTS
  ══════════════════════════════════════ -->
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    /* ── Filter buttons ── */
    const filterBtns = document.querySelectorAll('.filter-btn');
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
      });
    });

    /* ── Live search ── */
    const searchInput  = document.getElementById('searchInput');
    const items        = document.querySelectorAll('.kegiatan-item');
    const emptyState   = document.getElementById('emptyState');

    searchInput.addEventListener('input', () => {
      const q = searchInput.value.toLowerCase().trim();
      let visible = 0;

      items.forEach(item => {
        const title = item.dataset.title || '';
        const match = title.includes(q);
        item.style.display = match ? '' : 'none';
        if (match) visible++;
      });

      emptyState.classList.toggle('d-none', visible > 0);
    });

    /* ── Pagination active state ── */
    const pageBtns = document.querySelectorAll('.page-btn:not(.arrow)');
    pageBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        pageBtns.forEach(b => {
          b.classList.remove('active');
          b.removeAttribute('aria-current');
        });
        btn.classList.add('active');
        btn.setAttribute('aria-current', 'page');
      });
    });
  </script>
</body>
</html>