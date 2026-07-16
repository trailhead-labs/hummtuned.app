{{--
    WORKSHOP PROTOTYPE. The "Mixed fresh" demo: a minimal player for a short
    recording of each real generative scene. iOS-style chips pick a scene; the
    44-bar SVG is a live meter driven by the Web Audio analyser, so it reacts to
    the actual sample.

    All scenes are the same length and share one transport: a single tap plays
    every scene at once, and only the selected one is audible (its gain is up,
    the rest are muted). Switching is then a pure crossfade between gains on a
    shared timeline, so progress is unified and returning to a scene lands exactly
    where the others are. Self-contained (markup, styles, controller) so it's one
    file to keep or throw away. If we ship it, the controller moves to app.js and
    the styles to app.css.

    Stand-in audio for now: five distinct loops from the mastered library, each
    trimmed to 20s. Swap public/assets/scenes/* for the real recordings (all the
    same length) and nothing else changes.
--}}
@php
    $scenes = [
        'sanctuary' => 'Sanctuary',
        'drift' => 'Drift',
        'nebula' => 'Nebula',
        'pure' => 'Pure',
        'custom' => 'Custom',
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
        @foreach ($scenes as $key => $label)
            <button type="button" data-scene-chip="{{ $key }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                    class="scene-chip {{ $loop->first ? 'is-active' : '' }} shrink-0 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-muted transition hover:text-cream">{{ $label }}</button>
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

    @foreach ($scenes as $key => $label)
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

<style>
    .scene-chip.is-active {
        background: rgba(139, 124, 240, 0.92);
        border-color: transparent;
        color: #0c0a1e;
    }

    /* h-13 / w-13 aren't in the default scale; pin the play control to 52px. */
    .scene-play { height: 3.25rem; width: 3.25rem; }

    /* The play icon shows at rest, the pause icon while playing. */
    .scene-play .scene-icon-pause { display: none; }
    .scene-player.is-playing .scene-play .scene-icon-play { display: none; }
    .scene-player.is-playing .scene-play .scene-icon-pause { display: block; }
    .scene-player.is-playing .scene-play {
        border-color: #8b7cf0;
        box-shadow: 0 0 0 4px rgba(139, 124, 240, 0.12);
    }
</style>

<script>
    // Scoped controller for the scene player. Every scene is the same length and
    // shares one transport: each <audio> plays behind its own Web Audio gain node,
    // all gains feed a master, and the master feeds a shared analyser that drives
    // the SVG meter. One tap starts every scene together; only the selected gain
    // is up. Switching scenes just crossfades gains (and snaps the incoming onto
    // the shared position first, so the timelines never drift apart). Play/pause
    // fades the master and pauses every element together, keeping them aligned.
    // Audio is built lazily on the first tap so nothing downloads or unlocks the
    // AudioContext until the user asks for it.
    (function () {
        const root = document.querySelector('[data-scene-player]');
        if (!root) return;

        const bars = Array.from(root.querySelectorAll('.viz-bar'));
        const envs = bars.map((b) => { const v = parseFloat(b.dataset.env); return Number.isFinite(v) ? v : 0.5; });
        const chips = Array.from(root.querySelectorAll('[data-scene-chip]'));
        const audios = Array.from(root.querySelectorAll('audio[data-scene]'));
        const playBtn = root.querySelector('[data-play]');
        const panel = root.closest('[data-why-panel]');
        const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const FADE = 0.6;
        const heights = envs.map((e) => 2 + e * 4);
        let ctx, analyser, freq, master;
        const nodes = {};
        let current = chips[0] ? chips[0].dataset.sceneChip : audios[0].dataset.scene;
        let playing = false;
        let raf = null;
        // Log-spaced frequency band per bar (bin 1 ≈ 94 Hz up to ~7.5 kHz). The top is
        // capped where these soundscapes still have energy, so no bars are wasted on the
        // near-empty highs above it, and the low end (binaural carriers, beds) still gets
        // real coverage instead of being lumped into one bin.
        const BAND_EDGES = [];
        for (let i = 0; i <= bars.length; i++) {
            BAND_EDGES.push(Math.round(Math.pow(80, i / bars.length)));
        }

        function ensureAudio() {
            if (ctx) return;
            const AC = window.AudioContext || window.webkitAudioContext;
            ctx = new AC();
            analyser = ctx.createAnalyser();
            analyser.fftSize = 512;
            analyser.smoothingTimeConstant = 0.55;
            // dB window: content below minDecibels reads as silence (bars rest); content
            // at maxDecibels fills a bar. The gap lifts quiet sustained layers into view.
            analyser.minDecibels = -90;
            analyser.maxDecibels = -25;
            freq = new Uint8Array(analyser.frequencyBinCount);
            master = ctx.createGain();
            master.gain.value = 0;
            master.connect(analyser);
            analyser.connect(ctx.destination);
            audios.forEach((el) => {
                const src = ctx.createMediaElementSource(el);
                const gain = ctx.createGain();
                gain.gain.value = el.dataset.scene === current ? 1 : 0;
                src.connect(gain);
                gain.connect(master);
                nodes[el.dataset.scene] = { audio: el, gain };
            });
        }

        function ramp(param, target) {
            const now = ctx.currentTime;
            param.cancelScheduledValues(now);
            param.setValueAtTime(param.value, now);
            param.linearRampToValueAtTime(target, now + FADE);
        }

        function tick() {
            const live = playing && !reduce;
            if (live) analyser.getByteFrequencyData(freq);
            let moving = false;
            for (let i = 0; i < bars.length; i++) {
                let target;
                if (live) {
                    // Loudest bin in this bar's band. getByteFrequencyData is already
                    // dB-scaled, so quiet sustained layers (backgrounds, binaural carriers)
                    // register, not only the loud accents.
                    let v = 0;
                    for (let b = BAND_EDGES[i]; b <= BAND_EDGES[i + 1] && b < freq.length; b++) {
                        if (freq[b] > v) v = freq[b];
                    }
                    // Gentle high-frequency tilt so the naturally quieter highs on the
                    // right stay as visible as the bass-heavy left.
                    const tilt = 1 + 1.8 * (i / (bars.length - 1));
                    const frac = Math.min(1, (v / 255) * tilt);
                    target = 2 + frac * 30 * envs[i];
                } else {
                    target = 2 + envs[i] * 4;
                }
                const h = heights[i] + (target - heights[i]) * 0.55;
                heights[i] = h;
                if (Math.abs(target - h) > 0.15) moving = true;
                bars[i].setAttribute('y1', (70 - h).toFixed(1));
                bars[i].setAttribute('y2', (70 + h).toFixed(1));
            }
            raf = playing || moving ? requestAnimationFrame(tick) : null;
        }

        function loop() {
            if (!raf) raf = requestAnimationFrame(tick);
        }

        function setPlaying(on) {
            playing = on;
            root.classList.toggle('is-playing', on);
            playBtn.setAttribute('aria-label', on ? 'Pause' : 'Play');
        }

        function play() {
            ensureAudio();
            if (ctx.state === 'suspended') ctx.resume();
            audios.forEach((el) => el.play().catch(() => {}));
            ramp(master.gain, 1);
            setPlaying(true);
            loop();
        }

        function pause() {
            if (!playing) return;
            ramp(master.gain, 0);
            setTimeout(() => { if (!playing) audios.forEach((el) => el.pause()); }, FADE * 1000);
            setPlaying(false);
            loop();
        }

        function select(name) {
            if (name === current) return;
            const prev = current;
            current = name;
            chips.forEach((c) => {
                const on = c.dataset.sceneChip === name;
                c.classList.toggle('is-active', on);
                c.setAttribute('aria-pressed', on ? 'true' : 'false');
            });
            if (!ctx) return; // not started yet; ensureAudio() will set the gains
            nodes[name].audio.currentTime = nodes[prev].audio.currentTime;
            ramp(nodes[name].gain.gain, 1);
            ramp(nodes[prev].gain.gain, 0);
        }

        playBtn.addEventListener('click', () => (playing ? pause() : play()));
        chips.forEach((c) => c.addEventListener('click', () => select(c.dataset.sceneChip)));

        // Stop the audio if the tab is switched away from this panel.
        if (panel) {
            new MutationObserver(() => { if (panel.hidden && playing) pause(); })
                .observe(panel, { attributes: true, attributeFilter: ['hidden'] });
        }
    })();
</script>
