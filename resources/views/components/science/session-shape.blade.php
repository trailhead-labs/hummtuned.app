{{--
    The session shape as a line: the beat holds at the entry doorway, glides down
    to a long dwell at the target, then either rises back toward waking (the solid
    line) or, for sleep programs, sinks below the dwell and fades out in silence
    (the dashed branch). The stroke runs violet at the alert holds and warms to
    coral at the deep dwell, the same cool-to-warm language as the dial. The line
    draws itself when the panel is shown; under reduced motion it renders complete.
--}}
<figure class="anim-when-visible my-10 rounded-2xl border border-white/8 bg-white/[0.02] p-6">
    <svg viewBox="0 0 640 250" class="w-full" role="img" aria-labelledby="shape-title shape-desc">
        <title id="shape-title">The shape of a Humm session</title>
        <desc id="shape-desc">The beat holds briefly at the entry frequency, glides down to a long dwell at the target, then either rises back toward waking or, for sleep programs, sinks below the dwell and fades out. Only the dwell is grounded in research.</desc>

        <defs>
            <linearGradient id="shape-line" x1="0" y1="56" x2="0" y2="184" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#A99BFF" />
                <stop offset="1" stop-color="#E5906A" />
            </linearGradient>
            <linearGradient id="shape-sink" x1="416" y1="0" x2="600" y2="0" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#E5906A" stop-opacity="0.75" />
                <stop offset="1" stop-color="#E5906A" stop-opacity="0" />
            </linearGradient>
            <filter id="shape-glow" x="-15%" y="-15%" width="130%" height="130%">
                <feGaussianBlur stdDeviation="4" result="b" />
                <feMerge><feMergeNode in="b" /><feMergeNode in="SourceGraphic" /></feMerge>
            </filter>
        </defs>

        {{-- Level guides: the entry hold and the deep dwell. --}}
        <line x1="40" y1="64" x2="600" y2="64" stroke="#fff" stroke-opacity="0.06" stroke-dasharray="2 5" />
        <line x1="40" y1="176" x2="600" y2="176" stroke="#fff" stroke-opacity="0.06" stroke-dasharray="2 5" />

        {{-- Phase dividers. --}}
        @foreach ([96, 188, 416, 544] as $x)
            <line x1="{{ $x }}" y1="54" x2="{{ $x }}" y2="188" stroke="#fff" stroke-opacity="0.05" />
        @endforeach

        {{-- The dashed alternative end: sink below the dwell and fade out. Fades in
             after the main line draws, so the fork reads as a second outcome. --}}
        <path class="shape-fade" d="M416 176 C 456 176, 470 192, 512 192 H600"
              fill="none" stroke="url(#shape-sink)" stroke-width="2.5" stroke-dasharray="3 5" stroke-linecap="round" />

        {{-- The main shape: hold, glide down, dwell, rise, hold. pathLength
             normalises the draw so the dash animation ignores the real geometry. --}}
        <path class="shape-path" pathLength="1"
              d="M40 64 H96 C140 64 146 176 188 176 H416 C470 176 480 64 544 64 H600"
              fill="none" stroke="url(#shape-line)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" filter="url(#shape-glow)" />

        {{-- Nodes at each turn, cool up top and warm at the dwell; the dwell-end
             node doubles as the fork point. --}}
        <g class="shape-fade">
            <circle cx="96" cy="64" r="3.5" fill="#A99BFF" />
            <circle cx="188" cy="176" r="3.5" fill="#E5906A" />
            <circle cx="416" cy="176" r="3.5" fill="#E5906A" />
            <circle cx="544" cy="64" r="3.5" fill="#A99BFF" />
        </g>

        {{-- Labels; the dwell is lifted to cream as the one evidenced part, and the
             two end branches are named where they land. --}}
        <g class="shape-fade" font-family="Inter, sans-serif" text-anchor="middle">
            <text x="68" y="210" font-size="11" fill="#8B84B0">Enter</text>
            <text x="142" y="210" font-size="11" fill="#8B84B0">Glide</text>
            <text x="302" y="210" font-size="11" fill="#EFE7D8">Dwell</text>
            <text x="302" y="226" font-size="9" fill="#8B84B0">the evidenced part</text>
            <text x="572" y="50" font-size="10" fill="#8B84B0">End rise</text>
            <text x="548" y="212" font-size="10" fill="#E5906A">or sinks and stays</text>
        </g>
    </svg>
    <figcaption class="mt-2 text-center text-sm text-muted">
        A session glides down to its target and holds. Then it either rises back toward waking or, for sleep, sinks and stays. Only the dwell is grounded in research; the rest is careful design.
    </figcaption>
</figure>
