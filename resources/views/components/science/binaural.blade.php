@php
    // A steady line on each side (the two single tones, flat amplitude) that
    // blooms into a wave in the centre, where the beat appears. Amplitude is held
    // at zero on the sides by a smooth window and lifted only through the middle.
    $x0 = 40;
    $x1 = 600;
    $cy = 88;
    $carrier = 22;

    $smooth = function (float $e0, float $e1, float $t): float {
        $u = max(0.0, min(1.0, ($t - $e0) / ($e1 - $e0)));

        return $u * $u * (3 - 2 * $u);
    };

    $amp = function (float $t) use ($smooth): float {
        $window = $smooth(0.27, 0.37, $t) * (1 - $smooth(0.63, 0.73, $t));

        // A slight wobble on the sides, blooming into the beat through the middle.
        return 3.5 + $window * (10 + 13 * (0.5 - 0.5 * cos(2 * M_PI * 3 * $t)));
    };

    // Two halves that draw inward from each edge to the centre, so the flat tones
    // visibly converge into the beat.
    $point = function (float $t) use ($x0, $x1, $cy, $carrier, $amp): string {
        $x = $x0 + ($x1 - $x0) * $t;
        $y = $cy - $amp($t) * sin(2 * M_PI * $carrier * $t);

        return round($x, 1).','.round($y, 1);
    };

    // Each half runs a touch past the centre so the two overlap there, leaving no
    // seam when the wave breathes.
    $half = 210;
    $left = '';
    $right = '';
    for ($i = 0; $i <= $half; $i++) {
        $left .= ($i === 0 ? 'M' : ' ').$point(0.52 * $i / $half);
        $right .= ($i === 0 ? 'M' : ' ').$point(1 - 0.52 * $i / $half);
    }

    // Envelope outlines hugging the centre bloom, with breathing room from the peaks.
    $envPad = 7;
    $envTop = '';
    $envBot = '';
    for ($i = 0; $i <= 130; $i++) {
        $t = 0.3 + (0.7 - 0.3) * $i / 130;
        $x = $x0 + ($x1 - $x0) * $t;
        $envTop .= ($i === 0 ? 'M' : ' ').round($x, 1).','.round($cy - $amp($t) - $envPad, 1);
        $envBot .= ($i === 0 ? 'M' : ' ').round($x, 1).','.round($cy + $amp($t) + $envPad, 1);
    }
@endphp

{{--
    How a binaural beat is made: a steady tone to each ear, and the beat the brain
    hears where the two meet, blooming from the flat lines in the centre. The
    halves draw inward when the graphic scrolls into view and ping once as they
    meet; under reduced motion it renders complete and still.
--}}
<figure class="anim-when-visible my-10 rounded-2xl border border-white/8 bg-white/[0.02] p-6">
    <svg viewBox="0 0 640 210" class="w-full" role="img" aria-labelledby="bina-title bina-desc">
        <title id="bina-title">How a binaural beat is made</title>
        <desc id="bina-desc">A 247.5 Hz tone in the left ear and a 252.5 Hz tone in the right, steady on each side. Where they meet, the brain makes a 5 Hz beat at the shared pitch of 250 Hz, inside the auditory system rather than in the air.</desc>

        <defs>
            <linearGradient id="bina-line" x1="40" y1="0" x2="600" y2="0" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#9B8CF5" />
                <stop offset="0.30" stop-color="#9B8CF5" />
                <stop offset="0.35" stop-color="#E5906A" />
                <stop offset="0.65" stop-color="#E5906A" />
                <stop offset="0.70" stop-color="#9B8CF5" />
                <stop offset="1" stop-color="#9B8CF5" />
            </linearGradient>
            <filter id="bina-glow" x="-4%" y="-60%" width="108%" height="220%">
                <feGaussianBlur stdDeviation="2.4" result="b" />
                <feMerge><feMergeNode in="b" /><feMergeNode in="SourceGraphic" /></feMerge>
            </filter>
        </defs>

        {{-- Vertical dividers marking left channel, centre beat, right channel. --}}
        <g class="shape-fade">
            <line x1="213" y1="24" x2="213" y2="154" stroke="#fff" stroke-opacity="0.1" stroke-dasharray="2 5" />
            <line x1="427" y1="24" x2="427" y2="154" stroke="#fff" stroke-opacity="0.1" stroke-dasharray="2 5" />
        </g>

        {{-- Envelope outlines hugging the centre bloom. --}}
        <g class="shape-fade">
            <path d="{{ $envTop }}" fill="none" stroke="#E5906A" stroke-opacity="0.32" stroke-width="1" stroke-dasharray="2 4" />
            <path d="{{ $envBot }}" fill="none" stroke="#E5906A" stroke-opacity="0.32" stroke-width="1" stroke-dasharray="2 4" />
        </g>

        {{-- Two halves, a slight wobble on the outside blooming into the beat as they
             meet. The group breathes slowly to keep the beat alive. --}}
        <g class="beat-wave">
            <path class="shape-path" pathLength="1" d="{{ $left }}" fill="none" stroke="url(#bina-line)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" filter="url(#bina-glow)" />
            <path class="shape-path" pathLength="1" d="{{ $right }}" fill="none" stroke="url(#bina-line)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" filter="url(#bina-glow)" />
        </g>

        {{-- Labels under each zone. --}}
        <g class="shape-fade" font-family="Inter, sans-serif" text-anchor="middle">
            <text x="112" y="176" font-size="11" fill="#8B84B0">Left ear</text>
            <text x="112" y="192" font-size="11" fill="#B7ABF2">247.5 Hz</text>

            <text x="320" y="176" font-size="11" fill="#EFE7D8">The beat <tspan fill="#E5906A">· 5 Hz</tspan></text>
            <text x="320" y="192" font-size="9" fill="#8B84B0">carrier 250 Hz</text>

            <text x="528" y="176" font-size="11" fill="#8B84B0">Right ear</text>
            <text x="528" y="192" font-size="11" fill="#B7ABF2">252.5 Hz</text>
        </g>
    </svg>
    <figcaption class="mt-2 text-center text-sm text-muted">
        A steady tone in each ear, a few hertz apart. Where they meet, your brain makes the beat: 5 Hz, at the shared pitch of 250 Hz, and in your head, not the air.
    </figcaption>
</figure>
