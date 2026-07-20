@extends('layouts.admin')

@section('title', 'Edit Konten - Admin')

@push('styles')
<link href="{{ asset('css/admin-konten.css') }}" rel="stylesheet" />
<link href="{{ asset('css/admin-dokumentasi.css') }}" rel="stylesheet" />
<link href="{{ asset('css/admin-dokumentasi-edit.css') }}" rel="stylesheet" />
@endpush

@section('content')

{{--
    Data dummy — ganti dengan data dari controller.
    Contoh di controller:
        $konten = Konten::findOrFail($id);
        return view('admin.konten.edit', compact('konten'));
--}}
@php
$konten = [
'judul' => 'Eksplorasi biota laut',
'kategori' => 'kegiatan_eksplorasi',
'tanggal' => '2026-10-12',
'tujuan_kegiatan' => 'Kegiatan eksplorasi ini bertujuan untuk melakukan eksplorasi biota laut di pantai baron untuk memetakan sebaran biota, jumlah dan mengetahui kondisi lingkungan.',
'penanggung_jawab' => 'Ketuan UKM, Koordinator 5 Keilmuan, PH bidang Medinfo',
'deskripsi_lengkap' => 'Terumbu karang bukan sekadar pemandangan indah; mereka adalah pondasi kehidupan laut yang menyokong 25% biodiversitas samudra. Namun, pemanasan global dan aktivitas destruktif telah merusak ribuan hektar karang di nusantara. Program Restorasi UKM X hadir untuk membalikkan keadaan dengan menanam harapan di dasar laut.',
'gambar_sampul' => 'https://images.unsplash.com/photo-1471922694854-ff1b63b20054?w=1600&q=80',
'gambar_deskripsi' => 'https://images.unsplash.com/photo-1582623838120-455da222cdc7?q=80&w=1074',
];
@endphp

{{-- Breadcrumb --}}
<nav class="pub-breadcrumb mb-2">
    <a href="{{ route('admin.konten.index') }}">Konten</a>
    <i class="bi bi-chevron-right"></i>
    <span>Edit Konten</span>
</nav>

{{-- Heading + Buttons --}}
<div class="d-flex align-items-start justify-content-between mb-4">
    <div>
        <h1 class="fw-bold fs-3 text-dark mb-1">Edit Konten</h1>
        <p class="text-muted small mb-0">Buat dan publikasikan informasi terbaru.</p>
    </div>
    <div class="d-flex gap-2 mt-1">
        <a href="{{ route('admin.konten.index') }}" class="btn-batal">Batal</a>
        <button type="submit" form="formEditKonten" class="btn-simpan">
            Simpan Konten
        </button>
    </div>
</div>

<form id="formEditKonten" method="POST" action="#" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4 mb-4">

        {{-- ===== KOLOM KIRI: Informasi Utama ===== --}}
        <div class="col-12 col-lg-8">
            <div class="kon-form-card h-100">
                <h5 class="kon-form-title">Informasi Utama</h5>
                <hr class="kon-form-divider">

                {{-- Judul Konten --}}
                <div class="mb-4">
                    <label class="form-label-pub">
                        Judul Konten <span class="text-danger">*</span>
                    </label>
                    <input
                        type="text"
                        name="judul"
                        class="input-pub"
                        value="{{ $konten['judul'] }}"
                        required />
                </div>

                <div class="row g-3 mb-4">
                    {{-- Kategori --}}
                    <div class="col-12 col-md-6">
                        <label class="form-label-pub">
                            Kategori <span class="text-danger">*</span>
                        </label>
                        <select name="kategori" class="input-pub select-pub" required>
                            <option value="berita" {{ $konten['kategori'] === 'berita' ? 'selected' : '' }}>Berita</option>
                            <option value="kegiatan_eksplorasi" {{ $konten['kategori'] === 'kegiatan_eksplorasi' ? 'selected' : '' }}>Kegiatan Eksplorasi</option>
                            <option value="kegiatan" {{ $konten['kategori'] === 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        </select>
                    </div>

                    {{-- Tanggal --}}
                    <div class="col-12 col-md-6">
                        <label class="form-label-pub">
                            Tanggal <span class="text-danger">*</span>
                        </label>
                        <input
                            type="date"
                            name="tanggal"
                            class="input-pub"
                            value="{{ $konten['tanggal'] }}"
                            required />
                    </div>
                </div>

                {{-- Tujuan Kegiatan --}}
                <div class="mb-4">
                    <label class="form-label-pub">Tujuan Kegiatan</label>
                    <textarea
                        name="tujuan_kegiatan"
                        class="input-pub textarea-pub"
                        rows="4">{{ $konten['tujuan_kegiatan'] }}</textarea>
                </div>

                {{-- Penanggung Jawab --}}
                <div>
                    <label class="form-label-pub">
                        Penanggung Jawab <span class="text-danger">*</span>
                    </label>
                    <input
                        type="text"
                        name="penanggung_jawab"
                        class="input-pub"
                        value="{{ $konten['penanggung_jawab'] }}"
                        required />
                </div>

            </div>
        </div>

        {{-- ===== KOLOM KANAN: Media Pendukung ===== --}}
        <div class="col-12 col-lg-4">
            <div class="kon-form-card h-100">
                <h5 class="kon-form-title">Media Pendukung</h5>
                <hr class="kon-form-divider">

                {{-- Gambar Sampul (Thumbnail) — sudah ada gambar, overlay tombol Ganti --}}
                <div class="mb-4">
                    <label class="form-label-pub mb-1">
                        Gambar Sampul (Thumbnail) <span class="text-danger">*</span>
                    </label>
                    <p class="kon-upload-hint">Rekomendasi ukuran: 1200×630px. Format: JPG, PNG (Max 2MB).</p>

                    <div class="dok-edit-main-wrap kon-edit-thumb-wrap" id="thumbnailWrap">
                        <img src="{{ $konten['gambar_sampul'] }}" alt="Gambar sampul" class="dok-edit-main-img" id="thumbnailPreview" />
                        <button type="button" class="dok-edit-ganti-btn" id="btnGantiThumbnail">Ganti</button>
                        <input type="file" name="gambar_sampul" id="thumbnailInput" accept="image/jpeg,image/png" class="upload-input" />
                    </div>
                </div>

                {{-- Gambar Deskripsi — sudah ada gambar, overlay tombol Ganti --}}
                <div>
                    <label class="form-label-pub mb-2">
                        Gambar Deskripsi <span class="text-danger">*</span>
                    </label>

                    <div class="dok-edit-main-wrap kon-edit-thumb-wrap kon-edit-thumb-wrap--sm" id="deskripsiImgWrap">
                        <img src="{{ $konten['gambar_deskripsi'] }}" alt="Gambar deskripsi" class="dok-edit-main-img" id="deskripsiImgPreview" />
                        <button type="button" class="dok-edit-ganti-btn" id="btnGantiDeskripsiImg">Ganti</button>
                        <input type="file" name="gambar_deskripsi" id="deskripsiImgInput" accept="image/jpeg,image/png" class="upload-input" />
                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- ===== DESKRIPSI LENGKAP (full width) ===== --}}
    <div class="kon-form-card">
        <h5 class="kon-form-title">Deskripsi Lengkap</h5>
        <hr class="kon-form-divider">

        <div class="dok-editor-wrap">
            <div class="dok-toolbar">
                <div class="dok-toolbar-group">
                    <button type="button" class="dok-tool-btn" data-cmd="bold" title="Bold">
                        <strong>B</strong>
                    </button>
                    <button type="button" class="dok-tool-btn" data-cmd="italic" title="Italic">
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
                    <button type="button" class="dok-tool-btn" id="btnLinkKonten" title="Insert Link">
                        <i class="bi bi-link-45deg"></i>
                    </button>
                    <button type="button" class="dok-tool-btn" id="btnImageKonten" title="Insert Image">
                        <i class="bi bi-image"></i>
                    </button>
                </div>
            </div>

            <div
                class="dok-editor kon-editor-tall"
                id="deskripsiLengkapEditor"
                contenteditable="true"
                data-placeholder="Tuliskan deskripsi lengkap disini....">{{ $konten['deskripsi_lengkap'] }}</div>
        </div>

        <input type="hidden" name="deskripsi_lengkap" id="deskripsiLengkapValue" value="{{ $konten['deskripsi_lengkap'] }}" />
    </div>

</form>

@endsection

@push('scripts')
<script src="{{ asset('js/admin-konten-edit.js') }}"></script>
@endpush