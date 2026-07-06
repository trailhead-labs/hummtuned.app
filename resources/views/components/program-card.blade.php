@props(['name', 'teaser', 'tag', 'tone' => 'violet'])

@php
    // Experiential cards carry a warmer coral register; core cards stay violet.
    $card = $tone === 'coral'
        ? 'border-coral/15 bg-coral/[0.03]'
        : 'border-white/8 bg-white/[0.02]';
@endphp

<article class="rounded-2xl border {{ $card }} p-5">
    <h3 class="font-display text-lg text-cream">{{ $name }}</h3>
    <p class="mt-1 text-sm text-muted">{{ $teaser }}</p>
    <x-band-tag :label="$tag" :tone="$tone" />
</article>
