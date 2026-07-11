@extends('layouts.admin')

@section('title', 'Tambah Dokumentasi - Admin')

@push('styles')
    <link href="{{ asset('css/admin-dokumentasi.css') }}" rel="stylesheet" />
@endpush

@section('content')

{{-- Breadcrumb --}}
<nav class="pub-breadcrumb mb-2">
    <a href="{{ route('admin.dokumentasi.index') }}">Dokumentasi</a>
    <i class="bi bi-chevron-right"></i>
    <span>Tambah Dokumentasi</span>
</nav>

{{-- Heading + Buttons --}}
<div class="d-flex align-items-start justify-content-between mb-4">
    <div>
        <h1 class="fw-bold fs-3 text-dark mb-1">Tambah Dokumentasi</h1>
        <p class="text-muted small mb-0">Masukkan informasi detail mengenai kegiatan atau arsip terbaru.</p>
    </div>
    <div class="d-flex gap-2 mt-1">
        <a href="{{ route('admin.dokumentasi.index') }}" class="btn-batal">Batal</a>
        <button type="submit" form="formDokumentasi" class="btn-simpan">
            Simpan Konten
        </button>
    </div>
</div>

<form id="formDokumentasi" method="POST" action="#" enctype="multipart/form-data">
    @csrf

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
                placeholder="Pilih Tinggat Akreditasi"
                required
            />
        </div>

        <div class="row g-3">
            {{-- Kategori --}}
            <div class="col-12 col-md-6">
                <label class="form-label-pub">
                    Kategori <span class="text-danger">*</span>
                </label>
                <select name="kategori" class="input-pub select-pub" required>
                    <option value="" disabled selected>Pilih Kategori...</option>
                    <option value="eksplorasi">Eksplorasi</option>
                    <option value="studi">Studi</option>
                    <option value="edukasi">Edukasi</option>
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
                    placeholder="mm/dd/yyyy"
                    required
                />
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

            {{-- Editable area --}}
            <div
                class="dok-editor"
                id="deskripsiEditor"
                contenteditable="true"
                data-placeholder="Tuliskan konteks, peserta, dan hasil utama dari kegiatan yang didokumentasikan ini..."
            ></div>
        </div>

        {{-- Hidden input untuk kirim nilai --}}
        <input type="hidden" name="deskripsi" id="deskripsiValue" />
    </div>

    {{-- ===== CARD 3: Unggah Gambar ===== --}}
    <div class="dok-form-card">
        <h5 class="dok-form-title">Unggah Gambar</h5>
        <hr class="dok-form-divider">

        <label class="form-label-pub mb-2">Unggah Gambar</label>

        {{-- Drop Zone Utama --}}
        <div class="dok-upload-main" id="mainUploadArea">
            <input
                type="file"
                name="gambar[]"
                id="mainFileInput"
                accept="image/*"
                multiple
                class="upload-input"
            />
            <div class="upload-icon-wrap">
                <i class="bi bi-cloud-arrow-up-fill upload-icon"></i>
            </div>
            <p class="upload-title">Tarik dan Letakan Gambar disini</p>
            <p class="upload-sub">atau klik untuk memilih gambar dari komputer anda</p>
            <p class="upload-limit">MAKSIMAL 20MB</p>
        </div>

        {{-- Preview Slot Grid --}}
        <div class="dok-preview-grid mt-3" id="previewGrid">
            {{-- Slot 1 & 2 diisi otomatis dari upload utama --}}
            <div class="dok-preview-slot" id="slot1">
                <i class="bi bi-image-fill dok-slot-icon"></i>
                <span class="dok-slot-label">Tambah Gambar 1</span>
            </div>
            <div class="dok-preview-slot" id="slot2">
                <i class="bi bi-image-fill dok-slot-icon"></i>
                <span class="dok-slot-label">Tambah Gambar 2</span>
            </div>
            <div class="dok-preview-slot" id="slot3">
                <i class="bi bi-image-fill dok-slot-icon"></i>
                <span class="dok-slot-label">Tambah Gambar 3</span>
            </div>
            <div class="dok-preview-slot" id="slot4">
                <i class="bi bi-image-fill dok-slot-icon"></i>
                <span class="dok-slot-label">Tambah Gambar 4</span>
            </div>
            <div class="dok-preview-slot" id="slot5">
                <i class="bi bi-image-fill dok-slot-icon"></i>
                <span class="dok-slot-label">Tambah Gambar 5</span>
            </div>
            <div class="dok-preview-slot dok-slot-more" id="slotMore">
                <i class="bi bi-image-fill dok-slot-icon"></i>
                <span class="dok-slot-label">Lebih Banyak Gambar</span>
            </div>
        </div>

    </div>

</form>

@endsection

@push('scripts')
<script>
    // ===== RICH TEXT EDITOR =====
    const editor = document.getElementById('deskripsiEditor');
    const hiddenInput = document.getElementById('deskripsiValue');

    // Toolbar commands
    document.querySelectorAll('.dok-tool-btn[data-cmd]').forEach(btn => {
        btn.addEventListener('click', () => {
            document.execCommand(btn.dataset.cmd, false, null);
            editor.focus();
        });
    });

    // Link insert
    document.getElementById('btnLink').addEventListener('click', () => {
        const url = prompt('Masukan URL:');
        if (url) document.execCommand('createLink', false, url);
        editor.focus();
    });

    // Sync ke hidden input sebelum submit
    document.getElementById('formDokumentasi').addEventListener('submit', () => {
        hiddenInput.value = editor.innerHTML;
    });

    // ===== UPLOAD GAMBAR =====
    const mainUploadArea  = document.getElementById('mainUploadArea');
    const mainFileInput   = document.getElementById('mainFileInput');
    const slots = [
        document.getElementById('slot1'),
        document.getElementById('slot2'),
        document.getElementById('slot3'),
        document.getElementById('slot4'),
        document.getElementById('slot5'),
    ];

    mainUploadArea.addEventListener('click', () => mainFileInput.click());

    mainUploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        mainUploadArea.classList.add('dragover');
    });

    mainUploadArea.addEventListener('dragleave', () => {
        mainUploadArea.classList.remove('dragover');
    });

    mainUploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        mainUploadArea.classList.remove('dragover');
        handleFiles(e.dataTransfer.files);
    });

    mainFileInput.addEventListener('change', () => {
        handleFiles(mainFileInput.files);
    });

    function handleFiles(files) {
        Array.from(files).slice(0, 5).forEach((file, i) => {
            if (!file.type.startsWith('image/')) return;
            const reader = new FileReader();
            reader.onload = (e) => {
                if (slots[i]) {
                    slots[i].innerHTML = `
                        <img src="${e.target.result}" class="dok-slot-img" />
                        <button type="button" class="dok-slot-remove" onclick="removeSlot(this)">
                            <i class="bi bi-x"></i>
                        </button>
                    `;
                    slots[i].classList.add('has-image');
                }
            };
            reader.readAsDataURL(file);
        });
    }

    function removeSlot(btn) {
        const slot = btn.closest('.dok-preview-slot');
        const index = slots.indexOf(slot);
        slot.innerHTML = `
            <i class="bi bi-image-fill dok-slot-icon"></i>
            <span class="dok-slot-label">Tambah Gambar ${index + 1}</span>
        `;
        slot.classList.remove('has-image');
    }
</script>
@endpush