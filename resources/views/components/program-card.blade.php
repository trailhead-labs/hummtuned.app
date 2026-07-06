@props(['name', 'teaser', 'tag', 'tone' => 'violet'])

@php
    // Experiential cards carry a warmer coral register; core cards stay violet.
    $card = $tone === 'coral'
        ? 'border-coral/15 bg-coral/[0.03]'
        : 'border-white/8 bg-white/[0.02]';
@endphp

<article class="relative flex min-h-40 overflow-hidden rounded-2xl border {{ $card }} p-5">
    {{-- The program's isometric mark, anchored bottom-right at a stable size. --}}
    <x-program.icon
        :name="$name"
        :tone="$tone"
        class="pointer-events-none absolute bottom-4 right-2 h-28 w-auto opacity-[0.58] sm:h-[7.5rem] lg:h-32"
        aria-hidden="true"
    />

    <div class="relative z-10 flex max-w-[66%] flex-col">
        <h3 class="font-display text-lg text-cream">{{ $name }}</h3>
        <p class="mt-1 text-sm text-muted">{{ $teaser }}</p>
        <x-band-tag :label="$tag" :tone="$tone" class="mt-auto pt-4" />
    </div>
</article>
