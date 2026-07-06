@props(['hash', 'label'])

{{-- Advances the tabbed reader to the next section. The hash change is picked up
     by the science-tabs script, which swaps the visible panel and scrolls the
     reader back to the top. --}}
<a href="#{{ $hash }}" class="group mt-12 flex items-center justify-between gap-4 rounded-2xl border border-white/10 bg-white/[0.02] px-6 py-5 transition hover:border-violet/40 hover:bg-violet/[0.04]">
    <span class="text-xs uppercase tracking-[0.18em] text-violet-soft/70">Read next</span>
    <span class="flex items-center gap-2 font-display text-lg text-cream">
        {{ $label }}
        <svg viewBox="0 0 24 24" class="h-4 w-4 shrink-0 fill-none stroke-current stroke-2 transition group-hover:translate-x-0.5"><path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </span>
</a>
