{{--
    WORKSHOP PROTOTYPE. Folds four separate "why Humm is different" sections
    (the engine, the science, the no-config philosophy, and what Humm doesn't do)
    into one tabbed module. Every word of copy is preserved; only the layout
    changes. Self-contained: styles and the tab controller live here so the
    prototype is one file to keep or throw away. If we ship it, the controller
    moves to app.js and the styles to app.css.
--}}
<section id="why" class="border-t border-white/5 py-16 sm:py-24">
    <div class="mx-auto max-w-6xl px-6">
        <p class="reveal mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Why Humm is different</p>
        <h2 class="reveal font-display text-4xl font-extralight text-cream sm:text-5xl">More than an audio player.</h2>

        <div data-why-tabs class="reveal mt-10">
            {{-- Tab bar: a horizontal underline nav that scrolls on small screens. --}}
            <div role="tablist" aria-label="What makes Humm different"
                 class="no-scrollbar flex gap-6 overflow-x-auto border-b border-white/8 sm:gap-8">
                <button type="button" role="tab" data-why="fresh" aria-selected="true"
                        class="why-tab is-active shrink-0 whitespace-nowrap border-b-2 border-transparent pb-3 font-display text-base text-muted transition hover:text-cream">Mixed fresh</button>
                <button type="button" role="tab" data-why="research" aria-selected="false"
                        class="why-tab shrink-0 whitespace-nowrap border-b-2 border-transparent pb-3 font-display text-base text-muted transition hover:text-cream">From the research</button>
                <button type="button" role="tab" data-why="config" aria-selected="false"
                        class="why-tab shrink-0 whitespace-nowrap border-b-2 border-transparent pb-3 font-display text-base text-muted transition hover:text-cream">Nothing to set</button>
                <button type="button" role="tab" data-why="privacy" aria-selected="false"
                        class="why-tab shrink-0 whitespace-nowrap border-b-2 border-transparent pb-3 font-display text-base text-muted transition hover:text-cream">Privacy first</button>
            </div>

            <div class="mt-12">
                {{-- 1. The engine --}}
                <div class="why-panel" data-why-panel="fresh" role="tabpanel">
                    <div class="grid items-start gap-12 md:grid-cols-2">
                        <div>
                            <p class="mb-3 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Never the same twice</p>
                            <h3 class="font-display text-3xl font-extralight leading-tight text-cream">Every session is mixed fresh.</h3>
                            <p class="mt-6 text-lg leading-relaxed text-muted">
                                Most ambient audio is a fixed track. Play it enough and your ear learns it, and the moment it becomes familiar it stops working.
                            </p>
                            <p class="mt-6 text-lg leading-relaxed text-muted">
                                Humm assembles a new soundscape every session from a deep pool of natural textures, melodies, and effects, and keeps shifting the mix as it plays. There's nothing to memorize and nothing to wear out.
                            </p>
                            <p class="mt-5 font-display text-lg text-violet-soft">This is the part a playlist can't copy.</p>
                        </div>
                        <div class="mx-auto w-full max-w-xs sm:max-w-sm md:mx-0 md:max-w-none"><x-scene-player /></div>
                    </div>
                </div>

                {{-- 2. The science --}}
                <div class="why-panel" data-why-panel="research" role="tabpanel" hidden>
                    <div class="grid items-start gap-12 md:grid-cols-2">
                        <div>
                            <p class="mb-3 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Backed by real research</p>
                            <h3 class="font-display text-3xl font-extralight leading-tight text-cream">The defaults are the research.</h3>
                            <p class="mt-6 text-lg leading-relaxed text-muted">
                                Play a slightly different tone in each ear and the brain responds to the difference, a response you can see on an EEG. Researchers have studied it for decades, and for programs like Deep Meditation the evidence is genuinely strong. We read all of it, picked the best-supported frequency for each program, and made it the default.
                            </p>
                            <p class="mt-6 text-lg leading-relaxed text-muted">
                                Other apps hand you a frequency picker and a wall of presets, which quietly makes the science your problem. We did the opposite: the choice is already made, from the evidence, so nothing on the surface asks you to pick a frequency.
                            </p>
                            <a href="{{ route('science') }}" class="mt-7 inline-flex items-center gap-2 font-medium text-violet-soft transition hover:text-violet-bright">
                                Read the research
                                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-none stroke-current stroke-2"><path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        </div>
                        <div class="mx-auto w-full max-w-xs sm:max-w-sm md:mx-0 md:max-w-none"><x-why-stage tone="research" /></div>
                    </div>
                </div>

                {{-- 3. Nothing to configure --}}
                <div class="why-panel" data-why-panel="config" role="tabpanel" hidden>
                    <div class="grid items-start gap-12 md:grid-cols-2">
                        <div>
                            <p class="mb-3 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Set by default</p>
                            <h3 class="font-display text-3xl font-extralight leading-tight text-cream">Humm tunes you. You don't tune Humm.</h3>
                            <p class="mt-6 text-lg leading-relaxed text-muted">
                                Everything's here if you go looking: session pacing, the mix, the end chime. It just never asks you to touch any of it.
                            </p>
                            <p class="mt-6 text-lg leading-relaxed text-muted">
                                Your last length and pacing carry over on their own, so the next session is already set the way you left it.
                            </p>
                        </div>
                        <div class="mx-auto w-full max-w-xs sm:max-w-sm md:mx-0 md:max-w-none"><x-why-stage tone="config" /></div>
                    </div>
                </div>

                {{-- 4. What Humm doesn't do --}}
                <div class="why-panel" data-why-panel="privacy" role="tabpanel" hidden>
                    <p class="mb-3 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Built to be forgotten</p>
                    <h3 class="max-w-2xl font-display text-3xl font-extralight leading-tight text-cream">An app for your attention shouldn't be designed to consume it.</h3>
                    <div class="mt-10 grid max-w-3xl gap-x-12 sm:grid-cols-2">
                        <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> No ads. Ever</div>
                        <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> No subscription</div>
                        <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> No account required</div>
                        <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> No dubious app permissions</div>
                        <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> No streaks or notifications</div>
                        <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> No tracking. Nothing to harvest</div>
                        <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> Works offline, entirely on-device</div>
                    </div>
                    <p class="mt-10 font-display text-lg text-violet-soft">Humm succeeds when you forget it's running.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .why-tab.is-active { color: #efe7d8; border-color: #8b7cf0; }
    .why-panel[hidden] { display: none; }
    .why-panel { animation: why-fade 0.35s ease; }
    @keyframes why-fade { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: none; } }
    @media (prefers-reduced-motion: reduce) { .why-panel { animation: none; } }
</style>

<script>
    // Prototype tab controller, scoped to this module so it never touches the
    // science-page tabs. Panels all render in the DOM; we toggle [hidden].
    document.querySelectorAll('[data-why-tabs]').forEach((root) => {
        const tabs = Array.from(root.querySelectorAll('.why-tab'));
        const panels = Array.from(root.querySelectorAll('.why-panel'));

        // Replay a panel's science-style draw-in each time its tab is shown.
        // Removing and re-adding .in-view after a reflow restarts the animation.
        const play = (panel) => {
            const stage = panel.querySelector('.anim-when-visible');
            if (!stage) return;
            stage.classList.remove('in-view');
            void stage.offsetWidth;
            stage.classList.add('in-view');
        };

        tabs.forEach((tab) => tab.addEventListener('click', () => {
            const name = tab.dataset.why;
            tabs.forEach((t) => {
                const on = t === tab;
                t.classList.toggle('is-active', on);
                t.setAttribute('aria-selected', on ? 'true' : 'false');
            });
            panels.forEach((panel) => {
                panel.hidden = panel.dataset.whyPanel !== name;
                if (!panel.hidden) play(panel);
            });
        }));
    });
</script>
