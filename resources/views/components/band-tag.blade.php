@props(['label', 'tone' => 'violet'])

@php
    // The half-filled circle names the frequency journey, not evidence strength.
    // Violet marks the core programs; coral marks the experiential ones.
    $color = $tone === 'coral' ? 'text-coral/80' : 'text-violet-soft/80';
@endphp

<div {{ $attributes->class(["flex items-center gap-1.5 text-[13px] {$color}"]) }}>
    <svg width="12" height="12" viewBox="0 0 12 12" class="fill-current"><circle cx="6" cy="6" r="5" fill="none" stroke="currentColor" stroke-width="1"/><path d="M6 1a5 5 0 010 10z"/></svg>
    {{ $label }}
</div>
