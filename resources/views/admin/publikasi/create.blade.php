@extends('layouts.admin')

@section('title', 'Tambah Publikasi - Admin')

@section('content')

{{-- Breadcrumb --}}
<nav class="pub-breadcrumb mb-2">
    <a href="{{ route('admin.publikasi.index') }}">Publikasi</a>
    <i class="bi bi-chevron-right"></i>
    <span>Tambah Publikasi</span>
</nav>

{{-- Heading + Action Buttons --}}
<div class="d-flex align-items-start justify-content-between mb-4">
    <div>
        <h1 class="fw-bold fs-3 text-dark mb-1">Tambah Publikasi</h1>
        <p class="text-muted small mb-0">
            Lengkapi formulir di bawah ini untuk menambahkan catatan<br>
            publikasi ilmiah baru.
        </p>
    </div>
    <div class="d-flex gap-2 mt-1">
        <a href="{{ route('admin.publikasi.index') }}" class="btn-batal">Batal</a>
        <button type="submit" form="formPublikasi" class="btn-simpan">
            Simpan Publikasi
        </button>
    </div>
</div>

{{-- Form Card --}}
<div class="form-card">
    <form id="formPublikasi" method="POST" action="#" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">

            {{-- Judul Publikasi --}}
            <div class="col-12 col-md-6">
                <label class="form-label-pub">
                    Judul Publikasi <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    name="judul"
                    class="input-pub"
                    placeholder="Masukan judul pulikasi"
                    required
                />
            </div>

            {{-- Nama Penulis --}}
            <div class="col-12 col-md-6">
                <label class="form-label-pub">
                    Nama Penulis <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    name="penulis"
                    class="input-pub"
                    placeholder="Masukan Nama Penulis"
                    required
                />
            </div>

            {{-- Akreditasi --}}
            <div class="col-12 col-md-6">
                <label class="form-label-pub">Akreditasi</label>
                <select name="akreditasi" class="input-pub select-pub">
                    <option value="" disabled selected>Pilih Tinggat Akreditasi</option>
                    <option value="sinta1">Sinta 1</option>
                    <option value="sinta2">Sinta 2</option>
                    <option value="sinta3">Sinta 3</option>
                    <option value="sinta4">Sinta 4</option>
                    <option value="sinta5">Sinta 5</option>
                    <option value="sinta6">Sinta 6</option>
                    <option value="scopus">Scopus</option>
                    <option value="wos">Web of Science</option>
                </select>
            </div>

            {{-- Nama Jurnal --}}
            <div class="col-12 col-md-6">
                <label class="form-label-pub">
                    Nama Jurnal <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    name="jurnal"
                    class="input-pub"
                    placeholder="Nama jurnal tempat publikasi diterbitkan"
                    required
                />
            </div>

            {{-- DOI --}}
            <div class="col-12 col-md-6">
                <label class="form-label-pub">DOI (Digital Object Identifier)</label>
                <input
                    type="text"
                    name="doi"
                    class="input-pub"
                    placeholder="10.xxxx/xxxxx"
                />
            </div>

            {{-- Link Jurnal --}}
            <div class="col-12 col-md-6">
                <label class="form-label-pub">Link Jurnal</label>
                <input
                    type="url"
                    name="link_jurnal"
                    class="input-pub"
                    placeholder="Masukan link jurnal"
                />
            </div>

            {{-- Abstrak --}}
            <div class="col-12">
                <label class="form-label-pub">Abstrak</label>
                <textarea
                    name="abstrak"
                    class="input-pub textarea-pub"
                    placeholder="Salin dan tempel abstrak publikasi di sini..."
                    rows="6"
                ></textarea>
            </div>

            {{-- Upload PDF --}}
            <div class="col-12">
                <label class="form-label-pub">Dokumen Publikasi (PDF)</label>
                <div class="upload-area" id="uploadArea">
                    <input
                        type="file"
                        name="dokumen"
                        id="fileInput"
                        accept=".pdf"
                        class="upload-input"
                    />
                    <div class="upload-content" id="uploadContent">
                        <div class="upload-icon-wrap">
                            <i class="bi bi-cloud-arrow-up-fill upload-icon"></i>
                        </div>
                        <p class="upload-title">Tarik dan Letakan file PDF disini</p>
                        <p class="upload-sub">atau klik untuk memilih file dari komputer anda</p>
                        <p class="upload-limit">MAKSIMAL 20MB</p>
                    </div>
                    {{-- Preview file terpilih --}}
                    <div class="upload-preview d-none" id="uploadPreview">
                        <i class="bi bi-file-earmark-pdf text-danger fs-2"></i>
                        <span id="uploadFileName" class="ms-2 fw-semibold text-dark"></span>
                        <button type="button" class="btn-remove-file ms-3" id="removeFile">
                            <i class="bi bi-x-circle-fill"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
    const uploadArea    = document.getElementById('uploadArea');
    const fileInput     = document.getElementById('fileInput');
    const uploadContent = document.getElementById('uploadContent');
    const uploadPreview = document.getElementById('uploadPreview');
    const uploadFileName = document.getElementById('uploadFileName');
    const removeFile    = document.getElementById('removeFile');

    // Klik area → trigger file input
    uploadArea.addEventListener('click', (e) => {
        if (!e.target.closest('#removeFile')) fileInput.click();
    });

    // Drag over
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('dragover');
    });

    // Drop file
    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        const file = e.dataTransfer.files[0];
        if (file) handleFile(file);
    });

    // File input change
    fileInput.addEventListener('change', () => {
        if (fileInput.files[0]) handleFile(fileInput.files[0]);
    });

    function handleFile(file) {
        if (file.type !== 'application/pdf') {
            alert('Hanya file PDF yang diperbolehkan.');
            return;
        }
        if (file.size > 20 * 1024 * 1024) {
            alert('Ukuran file maksimal 20MB.');
            return;
        }
        uploadFileName.textContent = file.name;
        uploadContent.classList.add('d-none');
        uploadPreview.classList.remove('d-none');
    }

    // Hapus file
    removeFile.addEventListener('click', (e) => {
        e.stopPropagation();
        fileInput.value = '';
        uploadContent.classList.remove('d-none');
        uploadPreview.classList.add('d-none');
    });
</script>
@endpush