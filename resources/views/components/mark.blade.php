@props(['size' => 'md'])

@php
    // The mark is the dial in miniature: a cool-to-warm ring, violet at the top
    // and coral at the bottom, turning slowly so the warm point travels like the
    // dial's leading head. It reads at a header size and a smaller footer size.
    $outer = $size === 'sm' ? 'h-6 w-6' : 'h-7 w-7';
    $inner = $size === 'sm' ? 'h-[18px] w-[18px]' : 'h-[21px] w-[21px]';
@endphp

<span
    class="grid {{ $outer }} place-items-center rounded-full animate-[spin_9s_linear_infinite] motion-reduce:animate-none"
    style="background: conic-gradient(from 0deg, #A99BFF 0deg, #B0A6F0 70deg, #D89C86 135deg, #E5906A 180deg, #D89C86 225deg, #B0A6F0 290deg, #A99BFF 360deg);"
>
    <span class="{{ $inner }} rounded-full bg-ink"></span>
</span>
