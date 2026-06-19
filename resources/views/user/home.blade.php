@extends('layouts.user')

@section('title', 'Beranda - UKM Biologi Kelautan')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h1 class="hero-title mb-3">Menjelajahi <br> Kehidupan di Antara <br> Pasang dan Surut</h1>
                <p class="hero-desc mb-4">Melalui eksplorasi, observasi, dan edukasi, kami mengungkap keanekaragaman hayati serta pentingnya ekosistem zona intertidal bagi lingkungan pesisir.</p>
                <div class="buttons d-flex align-items-center flex-wrap gap-3">
                    <a href="#" class="btn-primary-custom text-decoration-none">
                        Gabung Sekarang
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_411_296)">
                                <path d="M3.42984 0.563284C3.22502 0.680662 3.05938 0.855844 2.95364 1.0669C2.8479 1.27796 2.80675 1.51552 2.83536 1.74984L4.6488 21.2107C4.76472 22.1556 5.88216 22.596 6.61128 21.984L10.0229 19.1208L11.7389 22.0932C12.7258 23.8022 14.7077 23.982 16.4165 22.9951C18.126 22.0082 18.9612 20.2022 17.9743 18.4932L16.2643 15.5314L20.3837 14.0326C21.2782 13.7069 21.4555 12.5194 20.6952 11.9465L4.74816 0.645364C4.56054 0.504216 4.33564 0.421206 4.10131 0.406617C3.86698 0.392027 3.63352 0.446498 3.42984 0.563284ZM5.56056 4.2612L17.485 12.5333L12.7538 14.2548L12.7759 14.2891L15.8959 19.6932C16.2386 20.2867 15.8105 20.574 15.2167 20.9167C14.623 21.2594 14.1602 21.4867 13.8175 20.8932L10.6975 15.4891L10.6728 15.4416L6.76224 18.7241L5.56056 4.2612Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_411_296">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <a href="#" class="btn-ghost-custom">Jelajahi Kegiatan</a>
                </div>
            </div>

            <div class="col-lg-6 d-flex justify-content-center">
                <div class="hero-mosaic">
                    <img class="img-1" src="https://images.unsplash.com/photo-1510021115607-c94b84bceb1d?q=80&w=1161" alt="Blue coral" />
                    <img class="img-2" src="https://plus.unsplash.com/premium_photo-1722775045882-98916a9cfb0b?q=80&w=1170" alt="Colorful crab" />
                    <img class="img-3" src="https://images.unsplash.com/photo-1596024463892-f5677f28e6d3?q=80&w=1171" alt="Seagrass underwater" />
                    <img class="img-4" src="https://images.unsplash.com/photo-1659968653831-a0e941036d16?q=80&w=1170" alt="Coral reef fish" />
                    <img class="img-5" src="https://images.unsplash.com/photo-1712297474881-bca3aed1c62d?q=80&w=687" alt="Nautilus shell" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="fokus-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img class="fokus-img" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=700&q=80" alt="Pantai eksplorasi" />
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">Fokus Keilmuan</h2>
                <p class="text-secondary mb-3" style="font-size:.92rem;line-height:1.7;">
                    UKM X merupakan organisasi yang bergerak di bidang penelitian dan pengembangan pengetahuan kelautan, khususnya pada ekosistem zona intertidal. Kami aktif melakukan kegiatan eksplorasi, observasi lapangan, serta edukasi untuk memahami keanekaragaman hayati pesisir.
                </p>
                <a href="#" class="link-more">Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="kegiatan-section">
    <div class="container">
        <h2 class="section-title mb-4">Kegiatan</h2>
        <div class="row g-4">
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 shadow-sm activity-card">
                    <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400&q=75" class="card-img-top" alt="Restorasi Terumbu" />
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-1" style="font-size:1rem;">Restorasi Terumbu</h5>
                        <p class="card-text text-secondary mb-3" style="font-size:.82rem;">Program penanaman kembali karang di area pesisir yang membutuhkan rehabilitasi ekosistem.</p>
                        <a href="#" class="card-link-blue mt-auto">Lihat detail <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 shadow-sm activity-card">
                    <img src="https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?w=400&q=75" class="card-img-top" alt="Penyelamatan Penyu" />
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-1" style="font-size:1rem;">Penyelamatan Penyu</h5>
                        <p class="card-text text-secondary mb-3" style="font-size:.82rem;">Program penyelamatan kembali penyu di area pesisir yang rawan perburuan liar.</p>
                        <a href="#" class="card-link-blue mt-auto">Lihat detail <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 shadow-sm activity-card">
                    <img src="https://images.unsplash.com/photo-1583212292454-1fe6229603b7?w=400&q=75" class="card-img-top" alt="Eksplorasi biota laut" />
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-1" style="font-size:1rem;">Eksplorasi biota laut</h5>
                        <p class="card-text text-secondary mb-3" style="font-size:.82rem;">Program eksplorasi biota laut di area zona intertidal untuk inventarisasi spesies.</p>
                        <a href="#" class="card-link-blue mt-auto">Lihat detail <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 shadow-sm activity-card">
                    <img src="https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?w=400&q=75" class="card-img-top" alt="Studi Bintang laut" />
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-1" style="font-size:1rem;">Studi Bintang laut</h5>
                        <p class="card-text text-secondary mb-3" style="font-size:.82rem;">Program studi bintang laut di area zona intertidal untuk penelitian perilaku dan habitat.</p>
                        <a href="#" class="card-link-blue mt-auto">Lihat detail <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="quote-banner text-white text-center">
    <div class="container">
        <blockquote class="quote-text mb-0">"Inspired by the Ocean, Driven by Science"</blockquote>
    </div>
</div>

<section class="visi-misi-section">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="vm-icon visi"><i class="bi bi-bullseye text-primary"></i></span>
                    <span class="vm-title">Visi</span>
                </div>
                <p class="vm-text">Menjadikan UKM X sebagai wadah yang mendukung pertumbuhan serta ruang transformasi dalam mencetak anggota yang berintegritas, unggul, kolaboratif, dan berorientasi pada dampak sosial yang berkelanjutan.</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="vm-icon misi"><i class="bi bi-flag text-warning"></i></span>
                    <span class="vm-title">Misi</span>
                </div>
                <ol class="vm-list">
                    <li>Membangun UKM X sebagai ruang yang aman, inklusif, dan suportif melalui budaya organisasi yang menjunjung tinggi rasa kebersamaan.</li>
                    <li>Mendorong peningkatan kapasitas dan kualitas anggota melalui kegiatan pembelajaran, pelatihan, serta pendampingan yang berkesinambungan.</li>
                    <li>Mengembangkan sistem kaderisasi yang terstruktur dengan tetap menjunjung tinggi asas kekeluargaan.</li>
                    <li>Meningkatkan kolaborasi internal dan eksternal melalui kegiatan keilmuan yang berdampak nyata bagi masyarakat.</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="pet-section">
    <div class="container">
        <h2 class="text-center fw-bold mb-4" style="font-size:1.7rem;">Petualangan Kami</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <img class="pet-img" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&q=80" alt="pantai cliffs" />
            </div>
            <div class="col-md-4">
                <img class="pet-img" src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=600&q=80" alt="lake kayak" />
            </div>
            <div class="col-md-4">
                <img class="pet-img" src="https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?w=600&q=80" alt="estuary" />
            </div>
        </div>
    </div>
</section>
@endsection