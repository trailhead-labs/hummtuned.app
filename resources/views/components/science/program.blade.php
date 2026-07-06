@props(['name', 'freq', 'tier', 'grade', 'experiential' => false])

@php
    // The card register follows the group (coral for experiential); the grade
    // chip follows the program's own tier, so a coral-graded program can still
    // sit inside a core group.
    $card = $experiential
        ? 'border-coral/15 bg-coral/[0.03]'
        : 'border-white/8 bg-white/[0.02]';

    $chip = match ($tier) {
        'strong' => 'border-violet/40 text-violet-soft',
        'experiential' => 'border-coral/30 text-coral/90',
        default => 'border-white/15 text-muted',
    };
@endphp

<article class="rounded-2xl border {{ $card }} p-5">
    <div class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
        <h4 class="font-display text-lg text-cream">{{ $name }}</h4>
        <span class="text-sm text-muted">{{ $freq }}</span>
        <span class="ml-auto rounded-full border {{ $chip }} px-2.5 py-0.5 text-xs">{{ $grade }}</span>
    </div>
    <p class="mt-3 text-[15px] leading-relaxed text-muted">{{ $slot }}</p>
</article>
