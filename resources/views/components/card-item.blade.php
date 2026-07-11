{{--
    Component: <x-card-item>
    Dipakai di: menu-kegiatan, menu-publikasi, menu-dokumentasi
    (struktur sama: gambar + meta + judul + deskripsi opsional + link,
    hanya beda nama class CSS per halaman — makanya ada prop $variant)

    Props:
    - variant   : 'kegiatan' | 'arsip'   (default: 'arsip')
    - img       : url gambar
    - alt       : alt text gambar
    - meta      : teks kecil di atas judul (tanggal / penulis • tanggal). null = disembunyikan
    - title     : judul card
    - desc      : deskripsi/kutipan di bawah judul. null = disembunyikan
    - url       : link tujuan card
    - linkText  : teks link (default "Lihat detail")

    Contoh pakai (kegiatan):
    <x-card-item variant="kegiatan" :img="$item['img']" :alt="$item['alt']"
        :meta="$item['tgl']" :title="$item['judul']" :desc="$item['desc']"
        :url="$item['url']" link-text="Lihat detail" />

    Contoh pakai (publikasi):
    <x-card-item :img="$pub['img']" :alt="$pub['judul']"
        :meta="$pub['penulis'] . ' • ' . $pub['tanggal']" :title="$pub['judul']"
        :desc="$pub['kutipan']" :url="$pub['url']" link-text="Baca publikasi" />

    Contoh pakai (dokumentasi, tanpa desc):
    <x-card-item :img="$dok['img']" :alt="$dok['judul']"
        :meta="$dok['tanggal']" :title="$dok['judul']"
        :url="$dok['url']" link-text="Lihat Dokumentasi" />
--}}

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