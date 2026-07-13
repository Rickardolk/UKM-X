@props([
'variant' => 'arsip',
'totalPages' => 4,
'currentPage' => 1,
])

@php
$isKegiatan = $variant === 'kegiatan';
@endphp

@if ($isKegiatan)
<div {{ $attributes->merge(['class' => 'ukm-pagination-wrapper']) }}>
    <button class="ukm-page-nav" aria-label="Sebelumnya" @if($currentPage==1) disabled @endif>
        <i class="bi bi-chevron-left"></i>
    </button>

    @for ($i = 1; $i <= $totalPages; $i++)
        <button class="ukm-page-num {{ $i === $currentPage ? 'active' : '' }}" @if ($i===$currentPage) aria-current="page" @endif>
        {{ $i }}
        </button>
        @endfor

        <button class="ukm-page-nav" aria-label="Berikutnya" @if($currentPage==$totalPages) disabled @endif>
            <i class="bi bi-chevron-right"></i>
        </button>
</div>
@else
<nav {{ $attributes->merge(['class' => 'ukm-pagination-wrapper']) }}>
    <ul class="ukm-pagination-list">
        <li>
            <a href="#" class="ukm-page-nav {{ $currentPage == 1 ? 'disabled' : '' }}" aria-label="Sebelumnya">
                <i class="bi bi-chevron-left"></i>
            </a>
        </li>

        @for ($i = 1; $i <= $totalPages; $i++)
            <li>
            <a href="#" class="ukm-page-num {{ $i === $currentPage ? 'active' : '' }}" @if ($i===$currentPage) aria-current="page" @endif>
                {{ $i }}
            </a>
            </li>
            @endfor

            <li>
                <a href="#" class="ukm-page-nav {{ $currentPage == $totalPages ? 'disabled' : '' }}" aria-label="Berikutnya">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
    </ul>
</nav>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pageNumbers = document.querySelectorAll('.ukm-page-num');

        pageNumbers.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove class 'active' 
                pageNumbers.forEach(btn => btn.classList.remove('active'));

                // add class 'active' ke nomor yang sedang diklik
                this.classList.add('active');
            });
        });
    });
</script>