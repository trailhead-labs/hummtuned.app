@props(['back' => false, 'width' => 'max-w-6xl'])

<header class="mx-auto flex {{ $width }} items-center justify-between px-6 pb-6 pt-[calc(1.5rem+env(safe-area-inset-top))]">
    <a href="{{ route('home') }}" class="flex items-center gap-2.5">
        <x-mark />
        <span class="font-display text-xl font-medium tracking-tight text-cream">Humm</span>
    </a>

    @if ($back)
        <a href="{{ route('home') }}" class="text-sm text-muted transition hover:text-cream">← Back</a>
    @else
        <nav class="flex items-center gap-6">
            <a href="{{ route('programs') }}" class="hidden text-sm text-muted transition hover:text-cream sm:block">Programs</a>
            <a href="{{ route('science') }}" class="hidden text-sm text-muted transition hover:text-cream sm:block">Science</a>
            {{-- TODO: Restore at launch
            <x-cta variant="outline" href="#pricing">Try free for a week</x-cta>
            --}}
            <x-cta variant="outline" href="#pricing">Coming soon!</x-cta>
        </nav>
    @endif
</header>
