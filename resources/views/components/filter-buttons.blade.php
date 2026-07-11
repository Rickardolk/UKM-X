{{--
    Component: <x-filter-buttons>
    Dipakai di: menu-kegiatan (variant="kegiatan"), menu-publikasi & menu-dokumentasi (default)

    Props:
    - variant : 'kegiatan' | 'arsip' (default 'arsip')
    - options : array of ['label' => string, 'filter' => string, 'active' => bool (opsional)]

    Contoh (kegiatan):
    <x-filter-buttons variant="kegiatan" :options="[
        ['label' => 'Semua', 'filter' => 'semua', 'active' => true],
        ['label' => 'Minggu ini', 'filter' => 'minggu'],
        ['label' => 'Bulan ini', 'filter' => 'bulan'],
        ['label' => 'Tahun ini', 'filter' => 'tahun'],
    ]" />

    Contoh (arsip):
    <x-filter-buttons :options="[
        ['label' => 'Semua', 'filter' => 'semua', 'active' => true],
        ['label' => '1 tahun terakhir', 'filter' => '1'],
    ]" />
--}}

@props([
'variant' => 'arsip',
'options' => [],
])

@php
$isKegiatan = $variant === 'kegiatan';
$wrapperClass = $isKegiatan ? 'filter-btns d-flex gap-2 flex-wrap' : 'arsip-filter__chips';
$btnClass = $isKegiatan ? 'filter-btn' : 'filter-chip';
@endphp

<div {{ $attributes->merge(['class' => $wrapperClass]) }}>
    @foreach ($options as $opt)
    <button
        type="button"
        class="{{ $btnClass }} {{ !empty($opt['active']) ? 'active' : '' }}"
        data-filter="{{ $opt['filter'] }}">
        {{ $opt['label'] }}
    </button>
    @endforeach
</div>