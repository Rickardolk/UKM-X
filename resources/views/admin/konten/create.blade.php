@extends('layouts.admin')

@section('title', 'Tambah Konten - Admin')

@push('styles')
<link href="{{ asset('css/admin-konten.css') }}" rel="stylesheet" />
<link href="{{ asset('css/admin-dokumentasi.css') }}" rel="stylesheet" />
@endpush

@section('content')

{{-- Breadcrumb --}}
<nav class="pub-breadcrumb mb-2">
    <a href="{{ route('admin.konten.index') }}">Konten</a>
    <i class="bi bi-chevron-right"></i>
    <span>Tambah Konten</span>
</nav>

{{-- Heading + Buttons --}}
<div class="d-flex align-items-start justify-content-between mb-4">
    <div>
        <h1 class="fw-bold fs-3 text-dark mb-1">Tambah Konten</h1>
        <p class="text-muted small mb-0">Buat dan publikasikan informasi terbaru.</p>
    </div>
    <div class="d-flex gap-2 mt-1">
        <a href="{{ route('admin.konten.index') }}" class="btn-batal">Batal</a>
        <button type="submit" form="formTambahKonten" class="btn-simpan">
            Simpan Konten
        </button>
    </div>
</div>

<form id="formTambahKonten" method="POST" action="{{ route('admin.konten.store') }}" enctype="multipart/form-data">
    @csrf

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
                        placeholder="Masukan judul konten"
                        required />
                </div>

                <div class="row g-3 mb-4">
                    {{-- Kategori --}}
                    <div class="col-12 col-md-6">
                        <label class="form-label-pub">
                            Kategori <span class="text-danger">*</span>
                        </label>
                        <select name="kategori" class="input-pub select-pub" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="berita">Berita</option>
                            <option value="kegiatan">Kegiatan</option>
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
                            required />
                    </div>
                </div>

                {{-- Tujuan Kegiatan --}}
                <div class="mb-4">
                    <label class="form-label-pub">Tujuan Kegiatan</label>
                    <textarea
                        name="tujuan_kegiatan"
                        class="input-pub textarea-pub"
                        rows="4"
                        placeholder="Tuliskan tujuan kegiatan"></textarea>
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
                        placeholder="Cth: Penanggung Jawab 1, Penanggung Jawab 2, dst..."
                        required />
                </div>

            </div>
        </div>

        {{-- ===== KOLOM KANAN: Media Pendukung ===== --}}
        <div class="col-12 col-lg-4">
            <div class="kon-form-card h-100">
                <h5 class="kon-form-title">Media Pendukung</h5>
                <hr class="kon-form-divider">

                {{-- Gambar Sampul (Thumbnail) --}}
                <div class="mb-4">
                    <label class="form-label-pub mb-1">
                        Gambar Sampul (Thumbnail) <span class="text-danger">*</span>
                    </label>
                    <p class="kon-upload-hint">Rekomendasi ukuran: 1200×630px. Format: JPG, PNG.</p>

                    <div class="kon-upload-area" id="thumbnailUploadArea">
                        <input
                            type="file"
                            name="gambar_sampul"
                            id="thumbnailInput"
                            accept="image/jpeg,image/png"
                            class="upload-input"
                            required />
                        <div class="kon-upload-icon-wrap">
                            <i class="bi bi-cloud-arrow-up-fill kon-upload-icon"></i>
                        </div>
                        <p class="kon-upload-title">Drop Gambar</p>
                        <p class="kon-upload-sub">atau klik untuk memilih gambar</p>
                    </div>
                </div>

                {{-- Gambar Deskripsi --}}
                <div>
                    <label class="form-label-pub mb-2">
                        Gambar Deskripsi <span class="text-danger">*</span>
                    </label>

                    <div class="kon-upload-area kon-upload-area--sm" id="deskripsiUploadArea">
                        <input
                            type="file"
                            name="gambar_deskripsi[]"
                            id="deskripsiInput"
                            accept="image/jpeg,image/png"
                            class="upload-input"
                            multiple />
                        <div class="kon-upload-icon-wrap kon-upload-icon-wrap--sm">
                            <i class="bi bi-cloud-arrow-up-fill kon-upload-icon"></i>
                        </div>
                        <p class="kon-upload-title kon-upload-title--sm mb-0">Tambah Gambar</p>
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
                data-placeholder="Tuliskan deskripsi lengkap disini...."></div>
        </div>

        <input type="hidden" name="deskripsi_lengkap" id="deskripsiLengkapValue" />
    </div>

</form>

@endsection

@push('scripts')
<script src="{{ asset('js/admin-konten-create.js') }}"></script>
@endpush