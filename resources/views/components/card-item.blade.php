@props([
'variant' => 'arsip',
'img',
'alt' => '',
'meta' => null,
'title',
'desc' => null,
'url',
'linkText' => 'Lihat detail',
])

@php
$isKegiatan = $variant === 'kegiatan';

$cardClass = $isKegiatan ? 'card-kegiatan' : 'pub-card';
$imgWrapClass = $isKegiatan ? 'card-img-wrap' : 'pub-card__img-wrap';
$imgClass = $isKegiatan ? '' : 'pub-card__img';
$bodyClass = $isKegiatan ? 'card-body' : 'pub-card__body';
$metaClass = $isKegiatan ? 'card-date' : 'pub-card__meta';
$titleClass = $isKegiatan ? 'card-title-text' : 'pub-card__title';
$descClass = $isKegiatan ? 'card-desc' : 'pub-card__kutipan';
$linkClass = $isKegiatan ? 'card-link' : 'pub-card__link';
@endphp

<div {{ $attributes->merge(['class' => $cardClass . ' h-100 position-relative']) }}>
    <div class="{{ $imgWrapClass }}">
        <img src="{{ $img }}" alt="{{ $alt ?: $title }}" class="{{ $imgClass }}" loading="lazy" />
    </div>
    <div class="{{ $bodyClass }}">
        @if ($meta)
        <p class="{{ $metaClass }}">{{ $meta }}</p>
        @endif

        <h3 class="{{ $titleClass }}">{{ $title }}</h3>

        @if ($desc)
        <p class="{{ $descClass }}">{{ $desc }}</p>
        @endif

        <a href="{{ $url }}" class="{{ $linkClass }} stretched-link">
            {{ $linkText }}
            @if ($isKegiatan)
            <i class="bi bi-arrow-right"></i>
            @else
            &rarr;
            @endif
        </a>
    </div>
</div>