@props(['size' => 'md'])

@php
    // The dial mark, exported to public/mark.svg (background stripped, cropped to
    // the ring) and shown as a cached image so its arc paths never inline into a
    // page. It still turns slowly, so the warm leading point travels like the
    // dial's head. Header size and a smaller footer size.
    $dim = $size === 'sm' ? 'h-6 w-6' : 'h-7 w-7';
@endphp

<img
    src="{{ asset('mark.svg') }}?v={{ filemtime(public_path('mark.svg')) }}"
    alt=""
    aria-hidden="true"
    width="28"
    height="28"
    {{ $attributes->merge(['class' => "{$dim} shrink-0 animate-[drift_18s_linear_infinite] motion-reduce:animate-none"]) }}
/>
