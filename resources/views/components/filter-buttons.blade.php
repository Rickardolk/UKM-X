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