@props(['size' => 'md'])

@php
    // The conic dot reads at two sizes: the larger header mark and the smaller
    // footer mark. Both keep the same violet-to-coral sweep around an ink core.
    $outer = $size === 'sm' ? 'h-6 w-6' : 'h-7 w-7';
    $inner = $size === 'sm' ? 'h-4 w-4' : 'h-5 w-5';
@endphp

<span class="grid {{ $outer }} place-items-center rounded-full animate-[spin_3s_ease-in-out_infinite]" style="background:conic-gradient(from 180deg,#9B8CFF,#8B7CF0,#E08A5F,#9B8CFF);">
    <span class="{{ $inner }} rounded-full bg-ink"></span>
</span>
