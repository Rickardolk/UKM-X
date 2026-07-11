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