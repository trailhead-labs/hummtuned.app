<x-layout
    title="Sound credits · Humm"
    description="The recordings behind Humm's soundscapes, their licenses and attributions, and the technical detail of how the library is built."
>
    <x-header back />

    @php
        // Read straight from the sound manifest, the library's single source of
        // truth, so the page can never drift and there is no markdown to parse.
        $path = base_path('docs/sound-manifest.json');
        $manifest = is_file($path) ? json_decode(file_get_contents($path), true) : [];

        // Map a license deed URL to its display label (mirrors scripts/credits.py).
        $license = fn (string $url) => match (true) {
            str_contains(strtolower($url), 'zero/1.0'),
            str_contains(strtolower($url), 'publicdomain') => 'CC0',
            str_contains(strtolower($url), 'by/4.0') => 'CC BY 4.0',
            str_contains(strtolower($url), 'by/3.0') => 'CC BY 3.0',
            str_contains(strtolower($url), 'sampling+') => 'Sampling Plus 1.0',
            default => $url,
        };

        // Attribution entries, each group alphabetised by author.
        $byAuthor = fn ($group) => collect($manifest)
            ->where('license', $group)
            ->sortBy(fn ($e) => mb_strtolower($e['author']))
            ->map(fn ($e) => [
                'title' => $e['name'],
                'author' => $e['author'],
                'license' => $license($e['license_url'] ?? ''),
                'url' => $e['source'] ?? '#',
            ])
            ->values();

        $attributedList = $byAuthor('CC-BY')->concat($byAuthor('Sampling+'))->values();

        $ccby = collect($manifest)->where('license', 'CC-BY')->count();
        $splus = collect($manifest)->where('license', 'Sampling+')->count();
        $cc0 = collect($manifest)->where('license', 'CC0')->count();
        $attributed = $attributedList->count();
        $total = count($manifest);
    @endphp

    <article class="mx-auto max-w-3xl px-6 pb-24 pt-6 lg:pt-10">
        <p class="mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Attribution &amp; credits</p>
        <h1 class="font-display text-5xl font-extralight leading-[1.05] text-cream sm:text-[3.25rem]">The sound library.</h1>

        <div class="prose mt-7 max-w-2xl text-[17px] leading-relaxed text-muted">
            <p>Humm's soundscapes are built from {{ $total }} recordings, sourced from <a href="https://freesound.org" class="text-violet-soft transition hover:text-violet-bright">Freesound.org</a> and the <a href="https://freemusicarchive.org" class="text-violet-soft transition hover:text-violet-bright">Free Music Archive</a> under Creative Commons licenses and cleared for commercial use. The {{ $cc0 }} released under CC0 are public domain and need no credit. The {{ $attributed }} that carry a simple attribution requirement are credited below, each per its license.</p>
        </div>

        {{-- Attributions: collapsed behind an FAQ-style panel, 2-column grid inside.
             Reuses the global .faq accordion (CSS + the shared toggle in app.js). --}}
        <section class="mt-12">
            <div class="faq group border-y border-white/8">
                <button type="button" aria-expanded="false" aria-controls="attributions-panel" class="flex w-full cursor-pointer items-center justify-between gap-4 py-6 text-left">
                    <span class="flex items-baseline gap-3 font-display text-2xl font-extralight text-cream">Attributions <span class="text-base text-muted/70">{{ $attributed }}</span></span>
                    <span class="shrink-0 text-2xl font-light text-muted transition group-[.is-open]:rotate-45">+</span>
                </button>
                <div id="attributions-panel" class="faq-answer">
                    <div>
                        <ul class="grid grid-cols-1 gap-x-12 gap-y-3.5 pb-8 sm:grid-cols-2">
                            @foreach ($attributedList as $e)
                                <li class="break-inside-avoid text-sm">
                                    <a href="{{ $e['url'] }}" target="_blank" rel="noopener noreferrer" class="break-words text-cream/90 transition hover:text-violet-soft">{{ $e['title'] }}</a>
                                    <span class="block text-xs text-muted">{{ $e['author'] }} · {{ $e['license'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <p class="mt-6 text-sm text-muted">The other {{ $cc0 }} recordings are released under CC0 1.0 (public domain) and ask for no attribution. We thank the contributors nonetheless.</p>
        </section>

        {{-- Technical footnote: the spec detail, jargon kept off the marketing pages. --}}
        <section class="mt-16 border-t border-white/8 pt-8">
            <h2 class="text-sm uppercase tracking-[0.2em] text-muted/70">Technical notes</h2>
            <div class="prose mt-4 max-w-2xl text-sm leading-relaxed text-muted/70">
                <p>{{ $total }} samples across four layers (continuous ambient beds, enriching textures, foreground melodies, and short accents), roughly 460 MB, bundled entirely in the app: nothing streamed, fully offline.</p>
                <p>Shipped as Opus in an Ogg container at 48 kHz, with bitrate tiered by material: ambient nature beds at 80 kbps, and tonal material (melodic beds, textures, melodies and accents) at 96 kbps. Channels are preserved per source, mostly stereo with some mono point-sources. Decoded natively by the OS on iOS 17+ and Android 5.0+.</p>
                <p>Most are sourced from lossless masters (WAV, FLAC, or AIFF, up to 24-bit / 96 kHz); a small number were only ever published lossy and are the best available. The set compresses from about 5.7 GB of originals down to roughly 460 MB, with no audible loss on this material.</p>
                <p>Every sample is silence-trimmed and loudness-normalized asymmetrically. -16 LUFS (EBU R128) acts as a ceiling: louder sources are brought down to it, while naturally quiet recordings keep their softness instead of being amplified into noise. Sounds of the same concept are matched within a few dB of each other, so rotating between variants never jumps in level. Short accents are true-peak normalized, and everything is true-peak limited to between -1 and -1.5 dBTP, so nothing clips and the generative mix stays balanced.</p>
                <p>Licensing is Creative Commons throughout: {{ $cc0 }} samples are CC0 (public domain, no attribution), {{ $ccby }} CC BY, and {{ $splus }} Sampling Plus, with attribution tracked per file. All royalty-free and cleared for commercial use.</p>
            </div>
        </section>
    </article>

    <x-footer minimal />
</x-layout>
