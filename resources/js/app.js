// Flag that JS is live so the stylesheet can hand the FAQ height animation over
// to the class the accordion toggles, while a no-JS visit still expands answers.
document.documentElement.classList.add('js');

// Scroll reveal: fade each .reveal element in as it crosses into view, then
// stop watching it. The CSS disables this entirely under reduced motion, so
// there is nothing to gate here.
const revealables = document.querySelectorAll('.reveal');

if (revealables.length) {
    const observer = new IntersectionObserver(
        (entries) => {
            for (const entry of entries) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                    observer.unobserve(entry.target);
                }
            }
        },
        { threshold: 0.12 },
    );

    revealables.forEach((el) => observer.observe(el));
}

// SVG graphics that draw and ping only once they scroll well into view, so the
// animation never plays off screen. Reduced motion skips the whole thing in CSS.
const animated = document.querySelectorAll('.anim-when-visible');

if (animated.length) {
    const io = new IntersectionObserver(
        (entries) => {
            for (const entry of entries) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    io.unobserve(entry.target);
                }
            }
        },
        { threshold: 0.6 },
    );

    animated.forEach((el) => io.observe(el));
}

// Science tabs: show one section at a time, keep the hash in sync so panels are
// deep-linkable, and scroll the panels into view only on a real user click. The
// whole block is skipped on pages that carry no tabs.
const sciTabs = Array.from(document.querySelectorAll('.sci-tab'));

if (sciTabs.length) {
    const names = ['beats', 'evidence', 'carrier', 'programs', 'shape', 'citations'];
    const panels = Array.from(document.querySelectorAll('.sci-panel'));
    const top = document.getElementById('sci-panels');
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function activate(name, scroll) {
        if (!names.includes(name)) {
            name = 'beats';
        }

        sciTabs.forEach((tab) => {
            const on = tab.dataset.tab === name;
            tab.classList.toggle('is-active', on);
            tab.setAttribute('aria-selected', on ? 'true' : 'false');
        });

        panels.forEach((panel) => {
            panel.hidden = panel.id !== 'panel-' + name;
        });

        if (history.replaceState) {
            history.replaceState(null, '', '#' + name);
        }

        if (scroll) {
            top.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
        }
    }

    sciTabs.forEach((tab) => tab.addEventListener('click', () => activate(tab.dataset.tab, true)));
    window.addEventListener('hashchange', () => activate(location.hash.replace('#', ''), true));
    activate(location.hash.replace('#', ''), false);
}

// FAQ accordion: toggle .is-open on the item, which slides the answer with the
// grid-rows trick, and mirror the state onto the button's aria-expanded. The CSS
// handles the animation, including collapsing it under reduced motion.
document.querySelectorAll('.faq').forEach((faq) => {
    const button = faq.querySelector('button[aria-expanded]');

    if (! button) {
        return;
    }

    button.addEventListener('click', () => {
        const open = faq.classList.toggle('is-open');
        button.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
});

// Horizontal card sliders: touch and trackpad scroll natively; on a mouse the
// whole strip is grab-and-drag. Snap is suspended mid-drag so the motion tracks
// the cursor, then restored so it settles onto a card. A drag never fires the
// click underneath it.
document.querySelectorAll('[data-slider]').forEach((slider) => {
    let dragging = false;
    let startX = 0;
    let startLeft = 0;
    let moved = 0;

    slider.addEventListener('pointerdown', (event) => {
        if (event.pointerType !== 'mouse') {
            return;
        }

        dragging = true;
        moved = 0;
        startX = event.clientX;
        startLeft = slider.scrollLeft;
        slider.style.scrollSnapType = 'none';
        slider.style.cursor = 'grabbing';
        slider.setPointerCapture(event.pointerId);
    });

    slider.addEventListener('pointermove', (event) => {
        if (! dragging) {
            return;
        }

        const dx = event.clientX - startX;
        moved = Math.max(moved, Math.abs(dx));
        slider.scrollLeft = startLeft - dx;
    });

    const release = () => {
        if (! dragging) {
            return;
        }

        dragging = false;
        slider.style.scrollSnapType = '';
        slider.style.cursor = '';
    };

    slider.addEventListener('pointerup', release);
    slider.addEventListener('pointercancel', release);

    slider.addEventListener('click', (event) => {
        if (moved > 6) {
            event.preventDefault();
            event.stopPropagation();
        }
    }, true);
});

// Scene player (the "Mixed fresh" demo). Every scene is the same length and shares
// one transport: each <audio> plays behind its own Web Audio gain node, all gains
// feed a master, and the master feeds a shared analyser that drives the SVG meter.
// One tap starts every scene together; only the selected gain is up. Switching
// crossfades gains (snapping the incoming onto the shared position first, so the
// timelines never drift). Play/pause fades the master and pauses every element
// together. Audio is built lazily on the first tap so nothing downloads or unlocks
// the AudioContext until asked. No-ops on pages without the player.
(function () {
    const root = document.querySelector('[data-scene-player]');
    if (!root) return;

    const bars = Array.from(root.querySelectorAll('.viz-bar'));
    const envs = bars.map((b) => { const v = parseFloat(b.dataset.env); return Number.isFinite(v) ? v : 0.5; });
    const chips = Array.from(root.querySelectorAll('[data-scene-chip]'));
    const audios = Array.from(root.querySelectorAll('audio[data-scene]'));
    const playBtn = root.querySelector('[data-play]');
    const blurbEl = root.querySelector('[data-blurb-display]');
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
        let blurb = '';
        chips.forEach((c) => {
            const on = c.dataset.sceneChip === name;
            if (on) blurb = c.dataset.sceneBlurb;
            c.classList.toggle('is-active', on);
            c.setAttribute('aria-pressed', on ? 'true' : 'false');
        });

        // Swap the blurb, with a quick crossfade unless reduced motion is preferred.
        if (blurbEl) {
            if (reduce) {
                blurbEl.textContent = blurb;
            } else {
                blurbEl.style.opacity = '0';
                setTimeout(() => { blurbEl.textContent = blurb; blurbEl.style.opacity = '1'; }, 150);
            }
        }

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
