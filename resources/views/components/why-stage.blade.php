@props(['tone' => 'fresh'])

@php
    // Tab stages in the science-page idiom: thin gradient strokes that draw
    // themselves in when the tab is shown, a soft glow on the focal line, the
    // violet-to-warm language of the dial, and faint guides and labels that fade
    // in behind the line. Each tab tells its point as a small graph.
    $uid = 'why-'.$tone;

    // The binaural wave: flat on the outsides, blooming into the beat where the
    // two ear tones meet. Sampled as two halves that each draw inward from an
    // edge, so they visibly come together in the middle.
    $px = fn (float $t): float => 14 + 212 * $t;
    $waveY = function (float $t): float {
        $window = exp(-(($t - 0.5) / 0.15) ** 2);
        $amp = 2.5 + 19 * $window;

        return 70 - $amp * sin(2 * M_PI * 9 * $t);
    };
    $half = function (float $from, float $to) use ($px, $waveY): string {
        $pts = '';
        for ($i = 0; $i <= 64; $i++) {
            $t = $from + ($to - $from) * $i / 64;
            $pts .= ($i === 0 ? 'M' : 'L').round($px($t), 1).' '.round($waveY($t), 1).' ';
        }

        return $pts;
    };
    $leftHalf = $half(0.0, 0.54);
    $rightHalf = $half(1.0, 0.46);

    // A real audio waveform: freshly randomised bar heights tapering to almost
    // nothing at both ends, so the mix eases in and out. A fixed seed keeps a
    // given render stable. Each bar carries a staggered grow delay.
    mt_srand(20260706);
    $bars = '';
    $n = 44;
    for ($i = 0; $i < $n; $i++) {
        $t = $i / ($n - 1);
        $x = round(16 + 208 * $t, 1);
        $env = sin(M_PI * $t) ** 1.6;
        $r = 0.18 + 0.82 * (mt_rand() / mt_getrandmax());
        $h = round(2 + 24 * $r * $env, 1);
        $delay = round($i * 0.014, 3);
        $bars .= '<line class="wave-bar" style="animation-delay:'.$delay.'s" x1="'.$x.'" y1="'.round(70 - $h, 1).'" x2="'.$x.'" y2="'.round(70 + $h, 1).'"/>';
    }
@endphp

<div class="anim-when-visible relative grid aspect-square w-full max-w-sm place-items-center justify-self-center">
    <div class="absolute -inset-8" style="background: radial-gradient(60% 58% at 50% 50%, rgba(139,124,240,0.11) 0%, rgba(139,124,240,0.05) 40%, rgba(139,124,240,0.018) 62%, transparent 82%);"></div>

    <svg viewBox="0 0 240 140" class="relative w-4/5" fill="none" aria-hidden="true">
        <defs>
            <linearGradient id="{{ $uid }}-line" x1="0" y1="0" x2="240" y2="0" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#A99BFF" />
                <stop offset="0.55" stop-color="#B7ABF2" />
                <stop offset="1" stop-color="#E5906A" />
            </linearGradient>
            {{-- Violet at the edges (the two tones), warm in the centre (the beat). --}}
            <linearGradient id="{{ $uid }}-bina" x1="0" y1="0" x2="240" y2="0" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#9B8CF5" />
                <stop offset="0.34" stop-color="#9B8CF5" />
                <stop offset="0.44" stop-color="#E5906A" />
                <stop offset="0.56" stop-color="#E5906A" />
                <stop offset="0.66" stop-color="#9B8CF5" />
                <stop offset="1" stop-color="#9B8CF5" />
            </linearGradient>
            <linearGradient id="{{ $uid }}-fall" x1="0" y1="34" x2="0" y2="104" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#A99BFF" />
                <stop offset="1" stop-color="#E5906A" />
            </linearGradient>
            <filter id="{{ $uid }}-glow" x="-10%" y="-40%" width="120%" height="180%">
                <feGaussianBlur stdDeviation="2.4" result="b" />
                <feMerge><feMergeNode in="b" /><feMergeNode in="SourceGraphic" /></feMerge>
            </filter>
        </defs>

        @switch($tone)
            @case('research')
                {{-- Two flat tones draw inward from each edge and meet in the middle,
                     where they bloom into the beat, framed by dashed borders. The
                     pair breathes once formed. --}}
                <line class="shape-fade" x1="92" y1="42" x2="92" y2="98" stroke="#fff" stroke-opacity="0.12" stroke-dasharray="2 5" />
                <line class="shape-fade" x1="148" y1="42" x2="148" y2="98" stroke="#fff" stroke-opacity="0.12" stroke-dasharray="2 5" />
                <g class="beat-wave">
                    <path class="shape-path" pathLength="1" d="{{ $leftHalf }}" stroke="url(#{{ $uid }}-bina)" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" filter="url(#{{ $uid }}-glow)" />
                    <path class="shape-path" pathLength="1" d="{{ $rightHalf }}" stroke="url(#{{ $uid }}-bina)" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" filter="url(#{{ $uid }}-glow)" />
                </g>
                @break

            @case('config')
                {{-- The session shape Humm sets for you: ease in, dwell, ease back. --}}
                <line class="shape-fade" x1="16" y1="40" x2="224" y2="40" stroke="#fff" stroke-opacity="0.06" stroke-dasharray="2 5" />
                <line class="shape-fade" x1="16" y1="100" x2="224" y2="100" stroke="#fff" stroke-opacity="0.06" stroke-dasharray="2 5" />
                <path class="shape-path" pathLength="1" d="M16 40 H60 C96 40 96 100 132 100 H176 C210 100 210 40 224 40"
                      stroke="url(#{{ $uid }}-fall)" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" filter="url(#{{ $uid }}-glow)" />
                <g class="shape-fade">
                    <circle cx="60" cy="40" r="3.2" fill="#A99BFF" />
                    <circle cx="132" cy="100" r="3.2" fill="#E5906A" />
                    <circle cx="176" cy="100" r="3.2" fill="#E5906A" />
                </g>
                @break

            @default
                {{-- Mixed fresh: a real audio waveform, its bars sweeping up in order. --}}
                <line class="shape-fade" x1="16" y1="70" x2="224" y2="70" stroke="#fff" stroke-opacity="0.06" style="animation-delay: 0s" />
                <g stroke="url(#{{ $uid }}-line)" stroke-width="2.6" stroke-linecap="round" filter="url(#{{ $uid }}-glow)">
                    {!! $bars !!}
                </g>
        @endswitch
    </svg>
</div>
