@extends('layouts.user')

@section('title', 'Alur SOP Peminjaman Alat')

@section('content')
<section class="py-5">
    <div class="container py-4">

        <!-- header -->
        <div class="mb-5">
            <h1 class="fw-bold fs-2 text-dark mb-1">Alur SOP Peminjaman Alat</h1>
            <p class="text-muted">Alur prosedur untuk melakukan peminjaman peralatan riset</p>
        </div>

        <!-- list card -->
        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-12 col-md-4">
                <div class="card h-100 border border-primary rounded-4 text-center px-3 py-4 shadow-sm">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-5 mb-4"
                            style="width: 48px; height: 48px;">
                            1
                        </div>
                        <h5 class="fw-bold mb-3">Cek Ketersediaan</h5>
                        <p class="text-muted small mb-4">
                            Hubungi kontak dibawah ini untuk memastikan status alat pada tanggal ekspedisi Anda.
                        </p>
                        <a href="#" class="mt-auto text-primary fw-semibold text-decoration-none d-flex align-items-center gap-2">
                            Hubungi sekarang
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- card 2 -->
            <div class="col-12 col-md-4">
                <div class="card h-100 border border-primary rounded-4 text-center px-3 py-4 shadow-sm">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-5 mb-4"
                            style="width: 48px; height: 48px;">
                            2
                        </div>
                        <h5 class="fw-bold mb-3">Pengisian Formulir</h5>
                        <p class="text-muted small mb-0">
                            Lengkapi dokumen rencana ekspedisi dan rincian alat yang dibutuhkan secara detail.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-12 col-md-4">
                <div class="card h-100 border border-primary rounded-4 text-center px-3 py-4 shadow-sm">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-5 mb-4"
                            style="width: 48px; height: 48px;">
                            3
                        </div>
                        <h5 class="fw-bold mb-3">Verifikasi & Ambil</h5>
                        <p class="text-muted small mb-0">
                            Verifikasi kelayakan alat bersama staf kami sebelum serah terima dilakukan.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection