@props(['iconClass' => 'h-4 w-auto'])

{{--
    The Trailhead Labs credit. The mountain mark is recoloured to currentColor
    because the raw brand blue is too dark on the near-black footer; it brightens
    to cream on hover along with the wordmark.
--}}
<a href="https://trailheadlabs.co" target="_blank" rel="noopener" {{ $attributes->merge(['class' => 'inline-flex items-center gap-2.5 text-sm text-muted transition hover:text-cream']) }}>
    <svg viewBox="0 0 1633 963" class="{{ $iconClass }} fill-current" aria-hidden="true"><path d="M1453 831 939 158 710 454l-126-92-361 471h159l228-295 125 93 130-170-58-43 232-115-38 259-80-64-172 225-129-94-155 204Z"/></svg>
    A Trailhead Labs product
</a>
