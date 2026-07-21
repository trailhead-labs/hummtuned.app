{{--
    The "Mixed fresh" demo: a minimal player for a short recording of each real
    generative scene. iOS-style chips pick a scene; the 44-bar SVG is a live meter
    driven by the Web Audio analyser, so it reacts to the actual sample.

    All scenes are the same length and share one transport: a single tap plays every
    scene at once, and only the selected one is audible (its gain is up, the rest
    muted). Switching is a pure crossfade between gains on a shared timeline, so
    progress is unified and returning to a scene lands where the others are.

    Markup is here; the controller lives in resources/js/app.js and the styles in
    resources/css/app.css. Audio is public/assets/scenes/{scene}.{ogg,m4a}, all the
    same length; swap those files and nothing else changes.
--}}
@php
    // Labels and blurbs mirror the app's mix presets (config/ambiance.php).
    $scenes = [
        'sanctuary' => ['label' => 'Sanctuary', 'blurb' => 'A temple garden at dawn. Birds, water and wind beneath chanting monks, flutes and singing bowls. Warm, grounded, alive.'],
        'drift' => ['label' => 'Drift', 'blurb' => 'Warm synth pads and low drones, close and unhurried, with slow tunes drifting through a soft lo-fi haze.'],
        'nebula' => ['label' => 'Nebula', 'blurb' => 'A vast, slow-moving wash of deep space, with handpan, guitar and plucked strings surfacing from the dark.'],
        'pure' => ['label' => 'Pure', 'blurb' => 'Just the binaural tone. One steady anchor for the mind to keep returning to.'],
        'custom' => ['label' => 'Custom', 'blurb' => 'Your own mix. Any sample, any layer, kept between sessions.'],
    ];

    // The resting waveform: a fixed, gently randomised envelope tapering to almost
    // nothing at both ends. The live meter animates around this; when paused the
    // bars settle back to it. data-env carries each bar's envelope so the meter
    // keeps the tapered ends while it reacts.
    mt_srand(20260715);
    $n = 44;
    $bars = '';
    for ($i = 0; $i < $n; $i++) {
        $t = $i / ($n - 1);
        $x = round(16 + 208 * $t, 1);
        $env = round(sin(M_PI * $t) ** 1.4, 3);
        $r = 0.2 + 0.8 * (mt_rand() / mt_getrandmax());
        $h = round(1.5 + 6 * $r * $env, 1);
        $bars .= '<line class="wave-bar viz-bar" data-env="'.$env.'" style="animation-delay:'.round($i * 0.014, 3).'s"'
            .' x1="'.$x.'" y1="'.round(70 - $h, 1).'" x2="'.$x.'" y2="'.round(70 + $h, 1).'"/>';
    }
@endphp

<div data-scene-player class="anim-when-visible scene-player mx-auto flex w-full max-w-sm flex-col items-center gap-5 rounded-[1.75rem] border border-white/8 bg-white/[0.03] p-5 sm:p-6">
    {{-- Scene chips: a single centred row, scrolling only if a narrow screen forces it. --}}
    <div role="group" aria-label="Choose a scene" class="no-scrollbar flex w-full gap-1.5 overflow-x-auto" style="justify-content: safe center;">
        @foreach ($scenes as $key => $scene)
            <button type="button" data-scene-chip="{{ $key }}" data-scene-blurb="{{ $scene['blurb'] }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                    class="scene-chip {{ $loop->first ? 'is-active' : '' }} shrink-0 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-muted transition hover:text-cream">{{ $scene['label'] }}</button>
        @endforeach
    </div>

    {{-- Player row: play control on the left, the live meter filling the rest. --}}
    <div class="flex w-full items-center gap-4">
        <button type="button" data-play aria-label="Play"
                class="scene-play grid shrink-0 place-items-center rounded-full border border-violet-soft/40 bg-white/5 text-cream transition hover:border-violet-soft hover:bg-white/10">
            <svg class="scene-icon-play -ml-0.5 h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5.14v13.72a1 1 0 0 0 1.53.85l10.29-6.86a1 1 0 0 0 0-1.7L9.53 4.29A1 1 0 0 0 8 5.14Z"/></svg>
            <svg class="scene-icon-pause h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 4.5h3.5v15H7zM13.5 4.5H17v15h-3.5z"/></svg>
        </button>

        {{-- Live meter: same visual language as the science-page graphs, cropped to the bars. --}}
        <div class="relative grid aspect-[240/96] flex-1 place-items-center">
            <div class="absolute -inset-3" style="background: radial-gradient(58% 62% at 50% 50%, rgba(139,124,240,0.12) 0%, rgba(139,124,240,0.05) 42%, rgba(139,124,240,0.018) 64%, transparent 82%);"></div>
            <svg viewBox="0 22 240 96" class="relative w-full" fill="none" aria-hidden="true">
                <defs>
                    <linearGradient id="scene-line" x1="0" y1="0" x2="240" y2="0" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#A99BFF" />
                        <stop offset="0.55" stop-color="#B7ABF2" />
                        <stop offset="1" stop-color="#E5906A" />
                    </linearGradient>
                    <filter id="scene-glow" x="-10%" y="-40%" width="120%" height="180%">
                        <feGaussianBlur stdDeviation="2.4" result="b" />
                        <feMerge><feMergeNode in="b" /><feMergeNode in="SourceGraphic" /></feMerge>
                    </filter>
                </defs>
                <line class="shape-fade" x1="16" y1="70" x2="224" y2="70" stroke="#fff" stroke-opacity="0.06" style="animation-delay: 0s" />
                <g stroke="url(#scene-line)" stroke-width="2.6" stroke-linecap="round" filter="url(#scene-glow)">
                    {!! $bars !!}
                </g>
            </svg>
        </div>
    </div>

    {{-- The selected scene's blurb, swapped in by the controller on change. --}}
    <p data-blurb-display class="text-xs min-h-14 leading-relaxed text-muted transition-opacity duration-300">{{ collect($scenes)->first()['blurb'] }}</p>

    @foreach ($scenes as $key => $scene)
        <audio data-scene="{{ $key }}" preload="none" loop>
            <source src="{{ asset("assets/scenes/{$key}.ogg") }}?v={{ filemtime(public_path("assets/scenes/{$key}.ogg")) }}" type="audio/ogg; codecs=opus" />
            <source src="{{ asset("assets/scenes/{$key}.m4a") }}?v={{ filemtime(public_path("assets/scenes/{$key}.m4a")) }}" type="audio/mp4; codecs=mp4a.40.2" />
        </audio>
    @endforeach
</div>

{{-- Stereo separation matters for these mixes, so a quiet nudge toward headphones. --}}
<p class="mx-auto mt-3 flex w-full max-w-sm items-center justify-center gap-1.5 text-xs text-muted/50">
    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M4 13v-1a8 8 0 0 1 16 0v1" />
        <rect x="3.5" y="12.5" width="3.5" height="7" rx="1.5" />
        <rect x="17" y="12.5" width="3.5" height="7" rx="1.5" />
    </svg>
    Best with headphones
</p>
