@php
$faqList = [
[
'q' => 'Berapa lama durasi maksimal peminjaman alat?',
'a' => 'Durasi standar adalah 7 hari kalender. Untuk ekspedisi jangka panjang, diperlukan surat rekomendasi dari pembimbing riset.',
],
[
'q' => 'Bagaimana cara menjadi anggota UKM X?',
'a' => 'Anda bisa mengakses informasi pendaftaran di halaman pendaftaran dan mengikuti semua alur yang diinformasikan.',
],
[
'q' => 'Apa saja keuntungan menjadi anggota UKM X?',
'a' => 'Anggota UKM X mendapat kesempatan mengikuti eksplorasi, pelatihan riset, dan jaringan sesama pegiat biologi kelautan.',
],
[
'q' => 'Apa saja kegiatan yang dilakukan UKM X?',
'a' => 'UKM X aktif melakukan eksplorasi zona intertidal, restorasi terumbu karang, penyelamatan penyu, serta publikasi riset.',
],
[
'q' => 'Apakah peminjaman alat ada biaya sewa?',
'a' => 'Peminjaman alat untuk anggota aktif tidak dikenakan biaya sewa, namun kerusakan/kehilangan menjadi tanggung jawab peminjam.',
],
];
@endphp

@extends('layouts.user')

@section('title', 'Pertanyaan Umum (FAQ) - UKM X')

@push('styles')
<link href="{{ asset('css/layanan.css') }}" rel="stylesheet" />
@endpush

@section('content')

<section class="layanan-hero">
    <div class="container">
        <h1 class="layanan-hero__title">Pertanyaan Umum (FAQ)</h1>
        <p class="layanan-hero__desc">Segala hal yang perlu Anda ketahui tentang layanan kami.</p>
    </div>
</section>

<section class="layanan-faq-section">
    <div class="container">
        <div class="faq-list" id="faqList">
            @foreach ($faqList as $i => $faq)
            <div class="faq-item {{ $loop->first ? 'active' : '' }}">
                <button type="button" class="faq-item__header" data-faq-toggle>
                    <span class="faq-item__question">{{ $faq['q'] }}</span>
                    <i class="bi bi-chevron-down faq-item__icon"></i>
                </button>
                <div class="faq-item__answer">
                    <div class="faq-item__answer-inner">
                        {{ $faq['a'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <p class="layanan-faq-cta">
            Punya pertanyaan lain? <a href="{{ route('layanan.peminjaman') }}">Hubungi kami</a>
        </p>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('#faqList .faq-item');

        items.forEach(function(item) {
            const header = item.querySelector('[data-faq-toggle]');
            header.addEventListener('click', function() {
                const isActive = item.classList.contains('active');

                items.forEach(function(el) {
                    el.classList.remove('active');
                });

                if (!isActive) {
                    item.classList.add('active');
                }
            });
        });
    });
</script>
@endpush