{{--
    Component: <x-search-box>
    Dipakai di: menu-kegiatan (variant="kegiatan"), menu-publikasi & menu-dokumentasi (default)

    Props:
    - variant     : 'kegiatan' | 'arsip' (default 'arsip')
    - id          : id input (untuk aria-label / referensi JS spesifik jika perlu)
    - placeholder : placeholder text
    - jsHook      : class tambahan untuk dikait JS generik (arsip.js pakai '.js-arsip-search')

    Contoh (kegiatan):
    <x-search-box variant="kegiatan" id="searchInput" placeholder="Cari Kegiatan" />

    Contoh (arsip):
    <x-search-box id="searchPublikasi" placeholder="Cari Publikasi" js-hook="js-arsip-search" />
--}}

@props([
'variant' => 'arsip',
'id' => 'searchInput',
'placeholder' => 'Cari...',
'jsHook' => '',
])

@php
$isKegiatan = $variant === 'kegiatan';
@endphp

@if ($isKegiatan)
<div {{ $attributes->merge(['class' => 'search-wrap']) }}>
    <i class="bi bi-search"></i>
    <input
        type="text"
        class="search-input {{ $jsHook }}"
        placeholder="{{ $placeholder }}"
        id="{{ $id }}"
        aria-label="{{ $placeholder }}" />
</div>
@else
<div {{ $attributes->merge(['class' => 'arsip-filter__search']) }}>
    <div class="input-group">
        <span class="input-group-text">
            <i class="bi bi-search"></i>
        </span>
        <input
            type="text"
            id="{{ $id }}"
            class="form-control {{ $jsHook }}"
            placeholder="{{ $placeholder }}"
            autocomplete="off" />
    </div>
</div>
@endif