@props(['minimal' => false, 'width' => 'max-w-6xl'])

@if ($minimal)
    <footer class="border-t border-white/5 py-10">
        <div class="mx-auto flex {{ $width }} items-center justify-between px-6">
            <a href="{{ route('home') }}" class="font-display text-lg text-cream">Humm</a>
            <x-trailhead />
        </div>
    </footer>
@else
    <footer class="border-t border-white/5 py-14">
        <div class="mx-auto {{ $width }} px-6">
            <div class="flex flex-col gap-8 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-2.5">
                    <x-mark size="sm" />
                    <span class="font-display text-lg text-cream">Humm</span>
                </div>
                <nav class="flex flex-wrap gap-x-8 gap-y-2 text-sm text-muted">
                    <a href="{{ route('programs') }}" class="transition hover:text-cream">Programs</a>
                    <a href="{{ route('science') }}" class="transition hover:text-cream">Science</a>
                    <a href="{{ route('privacy') }}" class="transition hover:text-cream">Privacy</a>
                    <a href="{{ route('terms') }}" class="transition hover:text-cream">Terms</a>
                    {{--
                    <a href="#" class="transition hover:text-cream">Support</a>
                    --}}
                    <a href="#" class="transition hover:text-cream">App Store</a>
                    <a href="#" class="transition hover:text-cream">Google Play</a>
                </nav>
            </div>
            <x-trailhead icon-class="w-8 h-auto" class="-ml-1 mt-8" />
            <div class="mt-8 space-y-2 text-xs leading-relaxed text-muted/60">
                <p>Humm supports focus, rest, and relaxation. It does not diagnose or treat any condition.</p>
                <p>This site uses privacy-respecting, cookieless analytics: aggregate visits only, no cookies, no cross-site tracking.</p>
            </div>
        </div>
    </footer>
@endif
