@props(['variant' => 'solid', 'href' => '#', 'size' => 'default', 'block' => false])

@php
    // The single site-wide call to action. Solid is the primary button; outline
    // is the quieter header variant. The store badges are the mechanism beneath
    // it, never a competing headline.
    if ($variant === 'outline') {
        $classes = 'rounded-full border border-white/10 px-4 py-2 text-sm text-cream/80 transition hover:border-violet/50 hover:text-white';
    } else {
        $layout = $block ? 'flex w-full' : 'inline-flex w-fit';
        $padding = $size === 'lg' ? 'px-8 py-4' : 'px-7 py-3.5';
        $classes = "{$layout} items-center justify-center rounded-full bg-violet {$padding} font-medium text-white shadow-lg shadow-violet/30 transition hover:bg-violet-bright";
    }
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
