@extends('layouts.admin')

@section('title', 'Edit Dokumentasi - Admin')

@push('styles')
<link href="{{ asset('css/admin-dokumentasi.css') }}" rel="stylesheet" />
@endpush

@section('content')

{{--
    Data dummy — ganti dengan data dari controller.
    Contoh di controller:
        $dokumentasi = Dokumentasi::findOrFail($id);
        return view('admin.dokumentasi.edit', compact('dokumentasi'));
--}}
@php
$dokumentasi = [
'judul' => 'Dokumentasi Outbound',
'kategori' => 'eksplorasi',
'tanggal' => '2023-10-12',
'deskripsi' => 'Penelitian ini mengevaluasi kondisi kesehatan terumbu karang di kawasan Taman Nasional Kepulauan Seribu dengan fokus pada keanekaragaman hayati dan tingkat pemutihan karang (bleaching). Melalui pengamatan lapangan intensif selama dua belas bulan, kami mengidentifikasi korelasi antara fluktuasi suhu permukaan laut dan resistensi spesies Acropora tertentu. Hasil penelitian menunjukkan adanya zona pemulihan aktif namun tetap rentan terhadap aktivitas antropogenik di pesisir utara.',
'gambar_utama' => 'https://images.unsplash.com/photo-1596021688656-35fdc9ed0274?q=80&w=1043',
'gambar_lain' => [
'https://plus.unsplash.com/premium_photo-1726826648062-39a7cc55f41f?q=80&w=870',
'https://plus.unsplash.com/premium_photo-1723618893833-f3545105d6ec?q=80&w=869',
'https://plus.unsplash.com/premium_photo-1661891887710-0528c1d76b92?q=80&w=871',
],
'gambar_lain_sisa' => 1,
];
@endphp

{{-- Breadcrumb --}}
<nav class="pub-breadcrumb mb-2">
    <a href="{{ route('admin.dokumentasi.index') }}">Dokumentasi</a>
    <i class="bi bi-chevron-right"></i>
    <span>Edit Dokumentasi</span>
</nav>

{{-- Heading + Buttons --}}
<div class="d-flex align-items-start justify-content-between mb-4">
    <div>
        <h1 class="fw-bold fs-3 text-dark mb-1">Edit Dokumentasi</h1>
        <p class="text-muted small mb-0">Perbarui informasi detail mengenai kegiatan atau arsip terkait.</p>
    </div>
    <div class="d-flex gap-2 mt-1">
        <a href="{{ route('admin.dokumentasi.index') }}" class="btn-batal">Batal</a>
        <button type="submit" form="formEditDokumentasi" class="btn-simpan">
            Simpan Konten
        </button>
    </div>
</div>

<form id="formEditDokumentasi" method="POST" action="#" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- ===== CARD 1: Informasi Dokumentasi ===== --}}
    <div class="dok-form-card mb-4">
        <h5 class="dok-form-title">Informasi Dokumentasi</h5>
        <hr class="dok-form-divider">

        {{-- Judul --}}
        <div class="mb-4">
            <label class="form-label-pub">
                Judul Dokumentasi <span class="text-danger">*</span>
            </label>
            <input
                type="text"
                name="judul"
                class="input-pub"
                value="{{ $dokumentasi['judul'] }}"
                required />
        </div>

        <div class="row g-3">
            {{-- Kategori --}}
            <div class="col-12 col-md-6">
                <label class="form-label-pub">
                    Kategori <span class="text-danger">*</span>
                </label>
                <select name="kategori" class="input-pub select-pub" required>
                    <option value="eksplorasi" {{ $dokumentasi['kategori'] === 'eksplorasi' ? 'selected' : '' }}>Eksplorasi</option>
                    <option value="studi" {{ $dokumentasi['kategori'] === 'studi' ? 'selected' : '' }}>Studi</option>
                    <option value="edukasi" {{ $dokumentasi['kategori'] === 'edukasi' ? 'selected' : '' }}>Edukasi</option>
                </select>
            </div>

            {{-- Tanggal Kegiatan --}}
            <div class="col-12 col-md-6">
                <label class="form-label-pub">
                    Tanggal Kegiatan <span class="text-danger">*</span>
                </label>
                <input
                    type="date"
                    name="tanggal"
                    class="input-pub"
                    value="{{ $dokumentasi['tanggal'] }}"
                    required />
            </div>
        </div>
    </div>

    {{-- ===== CARD 2: Deskripsi Dokumentasi ===== --}}
    <div class="dok-form-card mb-4">
        <h5 class="dok-form-title">Deskripsi Dokumentasi</h5>
        <hr class="dok-form-divider">

        {{-- Toolbar --}}
        <div class="dok-editor-wrap">
            <div class="dok-toolbar">
                <div class="dok-toolbar-group">
                    <button type="button" class="dok-tool-btn" data-cmd="bold" title="Bold">
                        <strong>B</strong>
                    </button>
                    <button type="button" class="dok-tool-btn italic-btn" data-cmd="italic" title="Italic">
                        <em>I</em>
                    </button>
                    <button type="button" class="dok-tool-btn" data-cmd="underline" title="Underline">
                        <u>U</u>
                    </button>
                </div>
                <div class="dok-toolbar-sep"></div>
                <div class="dok-toolbar-group">
                    <button type="button" class="dok-tool-btn" data-cmd="insertUnorderedList" title="Bullet List">
                        <i class="bi bi-list-ul"></i>
                    </button>
                    <button type="button" class="dok-tool-btn" data-cmd="insertOrderedList" title="Numbered List">
                        <i class="bi bi-list-ol"></i>
                    </button>
                </div>
                <div class="dok-toolbar-sep"></div>
                <div class="dok-toolbar-group">
                    <button type="button" class="dok-tool-btn" id="btnLink" title="Insert Link">
                        <i class="bi bi-link-45deg"></i>
                    </button>
                    <button type="button" class="dok-tool-btn" id="btnImage" title="Insert Image">
                        <i class="bi bi-image"></i>
                    </button>
                </div>
            </div>

            {{-- Editable area — sudah terisi konten lama --}}
            <div
                class="dok-editor"
                id="deskripsiEditor"
                contenteditable="true"
                data-placeholder="Tuliskan konteks, peserta, dan hasil utama dari kegiatan yang didokumentasikan ini...">{{ $dokumentasi['deskripsi'] }}</div>
        </div>

        {{-- Hidden input untuk kirim nilai --}}
        <input type="hidden" name="deskripsi" id="deskripsiValue" value="{{ $dokumentasi['deskripsi'] }}" />
    </div>

    {{-- ===== CARD 3: Unggah Gambar ===== --}}
    <div class="dok-form-card">
        <h5 class="dok-form-title">Unggah Gambar</h5>
        <hr class="dok-form-divider">

        <label class="form-label-pub mb-2">Unggah Gambar</label>

        {{-- Gambar utama (besar) — sudah ada gambar, hover menampilkan tombol Ganti --}}
        <div class="dok-edit-main-wrap" id="mainImageWrap">
            <img src="{{ $dokumentasi['gambar_utama'] }}" alt="Gambar utama" class="dok-edit-main-img" id="mainImagePreview" />
            <button type="button" class="dok-edit-ganti-btn" id="btnGantiUtama">Ganti</button>
            <input type="file" name="gambar_utama" id="mainImageInput" accept="image/*" class="upload-input" />
        </div>

        {{-- Grid thumbnail gambar lain --}}
        <div class="dok-edit-thumb-grid mt-3" id="thumbGrid">
            @foreach ($dokumentasi['gambar_lain'] as $i => $src)
            <div class="dok-edit-thumb-slot" data-index="{{ $i }}">
                <img src="{{ $src }}" alt="Gambar {{ $i + 1 }}" class="dok-edit-thumb-img" />

                @if ($loop->last && $dokumentasi['gambar_lain_sisa'] > 0)
                <div class="dok-edit-thumb-overlay-count">+{{ $dokumentasi['gambar_lain_sisa'] }}</div>
                @else
                <button type="button" class="dok-edit-ganti-btn dok-edit-ganti-btn--sm">Ganti</button>
                @endif

                <input type="file" name="gambar_lain[]" class="upload-input dok-edit-thumb-input" accept="image/*" />
            </div>
            @endforeach

            {{-- Slot tambah gambar baru --}}
            <div class="dok-edit-thumb-slot dok-edit-thumb-slot--add" id="addThumbSlot">
                <i class="bi bi-image-alt dok-slot-icon"></i>
                <span class="dok-slot-label">Lebih Banyak Gambar</span>
                <input type="file" name="gambar_lain[]" class="upload-input" accept="image/*" multiple />
            </div>
        </div>

    </div>

</form>

@endsection

@push('scripts')
<script src="{{ asset('js/admin-dokumentasi.js') }}"></script>
@endpush