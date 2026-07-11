@extends('layouts.admin')

@section('title', 'Edit Publikasi - Admin')

@section('content')

{{-- Breadcrumb --}}
<nav class="pub-breadcrumb mb-2">
    <a href="{{ route('admin.publikasi.index') }}">Publikasi</a>
    <i class="bi bi-chevron-right"></i>
    <span>Edit Publikasi</span>
</nav>

{{-- Heading + Action Buttons --}}
<div class="d-flex align-items-start justify-content-between mb-4">
    <div>
        <h1 class="fw-bold fs-3 text-dark mb-1">Edit Publikasi</h1>
        <p class="text-muted small mb-0">Perbarui data publikasi baru</p>
    </div>
    <div class="d-flex gap-2 mt-1">
        <a href="{{ route('admin.publikasi.index') }}" class="btn-batal">Batal</a>
        <button type="submit" form="formEditPublikasi" class="btn-simpan">
            Simpan Perubahan
        </button>
    </div>
</div>

{{-- Dummy Data --}}
@php
$pub = [
    'judul'    => 'Analisis Ekosistem Biota Laut di Pantai Baron terhadap Kemungki...',
    'penulis'  => 'Dr. Aris Pratama',
    'abstrak'  => 'Penelitian ini mengevaluasi kondisi kesehatan terumbu karang di kawasan Taman Nasional Kepulauan Seribu dengan fokus pada keanekaragaman hayati dan tingkat pemutihan karang (bleaching). Melalui pengamatan lapangan intensif selama dua belas bulan, kami mengidentifikasi korelasi antara fluktuasi suhu permukaan laut dan resistensi spesies Acropora tertentu. Hasil penelitian menunjukkan adanya zona pemulihan aktif namun tetap rentan terhadap aktivitas antropogenik di pesisir utara.',
    'jurnal'   => 'BIOLOGI INTERNATIONAL B...',
    'doi'      => '10.4213/mbe.2023.01',
    'akreditasi' => 'sinta1',
    'file_name'  => 'Analisis_Ekosistem_Biota.pdf',
    'file_size'  => '4.2 MB',
    'file_time'  => 'Diunggah Kemarin',
];

$riwayat = [
    ['aksi' => 'Mengedit abstrak',    'waktu' => '2 jam lalu'],
    ['aksi' => 'Menambahkan DOI',     'waktu' => '3 jam lalu'],
    ['aksi' => 'Mengedit Judul',      'waktu' => '4 jam lalu'],
    ['aksi' => 'Upload File Baru',    'waktu' => 'Kemarin 14:20'],
];
@endphp

<form id="formEditPublikasi" method="POST" action="#" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4 align-items-start">

        {{-- ===== KOLOM KIRI ===== --}}
        <div class="col-12 col-lg-7">

            {{-- Card: Detail Publikasi --}}
            <div class="edit-card mb-4">
                <h5 class="edit-card-title">Detail Publikasi</h5>
                <hr class="edit-divider">

                {{-- Judul --}}
                <div class="mb-4">
                    <label class="form-label-pub">Judul Publikasi</label>
                    <input
                        type="text"
                        name="judul"
                        class="input-pub"
                        value="{{ $pub['judul'] }}"
                        required
                    />
                </div>

                {{-- Nama Penulis --}}
                <div class="mb-4">
                    <label class="form-label-pub">Nama Penulis</label>
                    <input
                        type="text"
                        name="penulis"
                        class="input-pub"
                        value="{{ $pub['penulis'] }}"
                        required
                    />
                </div>

                {{-- Abstrak --}}
                <div class="mb-2">
                    <label class="form-label-pub">Abstrak</label>
                    <textarea
                        name="abstrak"
                        class="input-pub textarea-pub"
                        rows="8"
                    >{{ $pub['abstrak'] }}</textarea>
                </div>
            </div>

            {{-- Card: Info Publikasi --}}
            <div class="edit-card">
                <h5 class="edit-card-title">
                    <i class="bi bi-info-circle me-2 text-dark"></i>Info Publikasi
                </h5>
                <hr class="edit-divider">

                <div class="row g-3">
                    {{-- Jurnal --}}
                    <div class="col-12 col-md-6">
                        <label class="form-label-pub">Jurnal</label>
                        <input
                            type="text"
                            name="jurnal"
                            class="input-pub"
                            value="{{ $pub['jurnal'] }}"
                        />
                    </div>

                    {{-- DOI --}}
                    <div class="col-12 col-md-6">
                        <label class="form-label-pub">DOI (Digital Object Identifier)</label>
                        <input
                            type="text"
                            name="doi"
                            class="input-pub"
                            value="{{ $pub['doi'] }}"
                        />
                    </div>

                    {{-- Akreditasi --}}
                    <div class="col-12">
                        <label class="form-label-pub">Akreditasi</label>
                        <select name="akreditasi" class="input-pub select-pub">
                            <option value="sinta1" {{ $pub['akreditasi'] === 'sinta1' ? 'selected' : '' }}>SINTA 1</option>
                            <option value="sinta2" {{ $pub['akreditasi'] === 'sinta2' ? 'selected' : '' }}>SINTA 2</option>
                            <option value="sinta3" {{ $pub['akreditasi'] === 'sinta3' ? 'selected' : '' }}>SINTA 3</option>
                            <option value="sinta4" {{ $pub['akreditasi'] === 'sinta4' ? 'selected' : '' }}>SINTA 4</option>
                            <option value="sinta5" {{ $pub['akreditasi'] === 'sinta5' ? 'selected' : '' }}>SINTA 5</option>
                            <option value="sinta6" {{ $pub['akreditasi'] === 'sinta6' ? 'selected' : '' }}>SINTA 6</option>
                            <option value="scopus" {{ $pub['akreditasi'] === 'scopus'  ? 'selected' : '' }}>Scopus</option>
                            <option value="wos"    {{ $pub['akreditasi'] === 'wos'     ? 'selected' : '' }}>Web of Science</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>

        {{-- ===== KOLOM KANAN ===== --}}
        <div class="col-12 col-lg-5">

            {{-- Card: Dokumen --}}
            <div class="edit-card mb-4">
                <h5 class="edit-card-title">Dokumen</h5>
                <hr class="edit-divider">

                {{-- Upload Area --}}
                <div class="upload-area-sm mb-3" id="uploadArea">
                    <input type="file" name="dokumen" id="fileInput" accept=".pdf" class="upload-input" />
                    <div id="uploadContent">
                        <div class="upload-icon-wrap-sm">
                            <i class="bi bi-cloud-arrow-up-fill upload-icon"></i>
                        </div>
                        <p class="upload-title-sm">Drop file PDF</p>
                        <p class="upload-sub">atau klik untuk memilih file</p>
                        <p class="upload-limit">MAKSIMAL 20MB</p>
                    </div>
                </div>

                {{-- File Terpasang --}}
                <div class="file-attached" id="fileAttached">
                    <div class="d-flex align-items-center gap-3 flex-grow-1">
                        <i class="bi bi-file-earmark-pdf-fill text-danger fs-3"></i>
                        <div>
                            <div class="file-name">{{ $pub['file_name'] }}</div>
                            <div class="file-meta">{{ $pub['file_size'] }} • {{ $pub['file_time'] }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-remove-file" id="removeFile" title="Hapus file">
                        <i class="bi bi-trash3"></i>
                    </button>
                </div>
            </div>

            {{-- Card: Riwayat Edit --}}
            <div class="edit-card">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i class="bi bi-clock-history text-primary"></i>
                    <h5 class="edit-card-title mb-0">Riwayat Edit</h5>
                </div>
                <hr class="edit-divider">

                <div class="riwayat-list">
                    @foreach($riwayat as $item)
                    <div class="riwayat-item">
                        <div class="riwayat-avatar">A</div>
                        <div>
                            <div class="riwayat-name">Admin</div>
                            <div class="riwayat-aksi">{{ $item['aksi'] }} • {{ $item['waktu'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</form>

@endsection

@push('scripts')
<script>
    const uploadArea    = document.getElementById('uploadArea');
    const fileInput     = document.getElementById('fileInput');
    const uploadContent = document.getElementById('uploadContent');
    const fileAttached  = document.getElementById('fileAttached');
    const removeFile    = document.getElementById('removeFile');

    uploadArea.addEventListener('click', (e) => {
        if (!e.target.closest('#removeFile')) fileInput.click();
    });

    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        const file = e.dataTransfer.files[0];
        if (file) handleFile(file);
    });

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
        fileAttached.querySelector('.file-name').textContent = file.name;
        fileAttached.querySelector('.file-meta').textContent =
            (file.size / (1024 * 1024)).toFixed(1) + ' MB • Baru diunggah';
        uploadContent.style.display = 'none';
    }

    removeFile.addEventListener('click', (e) => {
        e.stopPropagation();
        fileInput.value = '';
        fileAttached.querySelector('.file-name').textContent = '';
        fileAttached.querySelector('.file-meta').textContent = '';
        uploadContent.style.display = 'block';
    });
</script>
@endpush