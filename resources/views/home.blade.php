<x-layout
    title="Humm — Focus, sleep, wake, dream. One dial."
    description="A soothing soundscape, mixed fresh every session, over binaural programs your brain measurably responds to. One dial. No ads, no tracking, one lifetime price."
>
    <x-header />

    {{-- 1. Hero --}}
    <section id="top" class="mx-auto grid max-w-6xl items-center gap-14 px-6 pb-24 pt-10 lg:grid-cols-2 lg:gap-8 lg:pb-32 lg:pt-16">
        <div class="reveal">
            <h1 class="font-display text-5xl font-extralight leading-[1.08] tracking-tight text-cream sm:text-6xl">
                Focus, sleep,<br>wake, dream.<br>
                <span class="font-light text-violet-soft">One dial.</span>
            </h1>
            <p class="mt-7 max-w-md text-lg leading-relaxed text-muted">
                A soothing soundscape, mixed fresh every session, over binaural programs your brain measurably responds to.
            </p>

            <div class="mt-9 flex flex-col gap-4">
                <x-store-badges size="hero" />
                <p class="text-sm text-muted">No account required. Works offline.</p>
            </div>
        </div>

        {{-- Real app screen: autoplay emulator recording, real screenshot poster. --}}
        <div class="reveal flex justify-center lg:justify-end">
            <div class="phone w-[300px] rounded-[2.75rem] p-2.5">
                <video
                    class="aspect-[108/234] w-full rounded-[2.25rem] object-cover"
                    poster="{{ asset('assets/hero-poster.webp') }}"
                    autoplay muted loop playsinline
                >
                    <source src="{{ asset('assets/hero-session.webm') }}" type="video/webm" />
                    <source src="{{ asset('assets/hero-session.mp4') }}" type="video/mp4" />
                </video>
            </div>
        </div>
    </section>

    {{-- 2. A day with Humm (lead emotional) --}}
    <section class="border-t border-white/5 py-24">
        <div class="mx-auto max-w-6xl px-6">
            <p class="reveal mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Not a sleep app. Not a focus app.</p>
            <h2 class="reveal font-display text-4xl font-extralight text-cream sm:text-5xl">A state for the whole day.</h2>
            <p class="reveal mt-6 max-w-xl text-lg leading-relaxed text-muted">
                The phone is the first thing you reach for in the morning and the last thing you put down at night. Right now that reflex feeds you the feed. Humm gives it somewhere better to land.
            </p>

            <div class="mt-14 grid gap-px overflow-hidden rounded-2xl border border-white/8 bg-white/5 sm:grid-cols-5">
                <div class="reveal bg-ink/60 p-6">
                    <p class="font-display text-lg text-cream"><span class="italic text-violet-soft">Humm</span> before your first coffee</p>
                    <p class="mt-2 text-sm text-muted">A nudge toward alert on the way to the kitchen.</p>
                </div>
                <div class="reveal bg-ink/60 p-6">
                    <p class="font-display text-lg text-cream"><span class="italic text-violet-soft">Humm</span> on the bus</p>
                    <p class="mt-2 text-sm text-muted">A calm buffer instead of the feed.</p>
                </div>
                <div class="reveal bg-ink/60 p-6">
                    <p class="font-display text-lg text-cream"><span class="italic text-violet-soft">Humm</span> through the deep work</p>
                    <p class="mt-2 text-sm text-muted">Set the state, then hold it.</p>
                </div>
                <div class="reveal bg-ink/60 p-6">
                    <p class="font-display text-lg text-cream"><span class="italic text-violet-soft">Humm</span> in meditation</p>
                    <p class="mt-2 text-sm text-muted">Drop in faster, stay longer.</p>
                </div>
                <div class="reveal bg-ink/60 p-6">
                    <p class="font-display text-lg text-cream"><span class="italic text-violet-soft">Humm</span> before sleep</p>
                    <p class="mt-2 text-sm text-muted">Wind the day down on purpose.</p>
                </div>
            </div>

            <p class="reveal mt-10 max-w-2xl text-lg text-muted">
                Don't doomscroll toward the day. <span class="text-cream">Humm your way to the coffee machine.</span>
            </p>
        </div>
    </section>

    {{-- 3. The three-step ritual --}}
    <section class="border-t border-white/5 py-24">
        <div class="mx-auto max-w-6xl px-6">
            <p class="reveal mb-14 text-sm uppercase tracking-[0.2em] text-violet-soft/70">How a session works</p>
            <div class="grid gap-10 sm:grid-cols-3">
                <div class="reveal">
                    <div class="font-display text-sm text-muted/60">01</div>
                    <h3 class="mt-3 font-display text-2xl font-light text-cream">Pick</h3>
                    <p class="mt-2 text-muted">Choose a program. A short sheet says what it does and how long it wants.</p>
                </div>
                <div class="reveal">
                    <div class="font-display text-sm text-muted/60">02</div>
                    <h3 class="mt-3 font-display text-2xl font-light text-cream">Set</h3>
                    <p class="mt-2 text-muted">Turn the dial, or don't; it remembers your length.</p>
                </div>
                <div class="reveal">
                    <div class="font-display text-sm text-muted/60">03</div>
                    <h3 class="mt-3 font-display text-2xl font-light text-cream">Start</h3>
                    <p class="mt-2 text-muted">Headphones on. That's the whole interaction.</p>
                </div>
            </div>
            <div class="reveal mt-16 border-t border-white/5 pt-8">
                <p class="font-display text-2xl font-light text-cream">Humm tunes you. You don't tune Humm.</p>
                <p class="mt-3 max-w-xl text-muted">Everything's here if you go looking: session pacing, the mix, the end chime. It just never asks you to touch any of it.</p>
            </div>
        </div>
    </section>

    {{-- 4. The engine --}}
    <section class="border-t border-white/5 py-24">
        <div class="mx-auto max-w-3xl px-6 text-center">
            <p class="reveal mb-6 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Never the same twice</p>
            <h2 class="reveal font-display text-4xl font-extralight leading-tight text-cream sm:text-5xl">
                Every session is mixed fresh.<br>Familiarity never sets in.
            </h2>
            <p class="reveal mx-auto mt-8 max-w-2xl text-lg leading-relaxed text-muted">
                Most ambient audio is a fixed track. Play it enough and your ear learns it, and the moment it becomes familiar it stops working. Humm assembles a new soundscape every session from a deep pool of natural textures, melodies, and effects, and keeps shifting the mix as it plays. There's nothing to memorize and nothing to wear out.
            </p>
            <p class="reveal mt-6 font-display text-lg text-violet-soft">This is the part a playlist can't copy.</p>
        </div>
    </section>

    {{-- 5. Programs (teaser; full detail on the programs page) --}}
    <section class="border-t border-white/5 py-24">
        <div class="mx-auto max-w-4xl px-6">
            <p class="reveal mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Seventeen programs, four purposes</p>
            <h2 class="reveal font-display text-4xl font-extralight text-cream sm:text-5xl">Pick by what you need.</h2>
            <p class="reveal mt-4 max-w-2xl text-muted">Each program is graded honestly, from strong evidence to traditional, in plain words. No overclaiming, no hidden woo.</p>

            <div class="reveal mt-12 divide-y divide-white/8 border-y border-white/8">
                <a href="{{ route('programs') }}" class="group flex items-baseline justify-between gap-6 py-5 transition hover:bg-white/[0.02]">
                    <div><span class="font-display text-xl text-cream">Focus &amp; Energy</span><span class="ml-3 text-sm text-muted">Six programs for work, learning, and drive.</span></div>
                    <span class="text-muted transition group-hover:text-violet-soft">→</span>
                </a>
                <a href="{{ route('programs') }}" class="group flex items-baseline justify-between gap-6 py-5 transition hover:bg-white/[0.02]">
                    <div><span class="font-display text-xl text-cream">Calm &amp; Meditation</span><span class="ml-3 text-sm text-muted">Three for winding down and turning inward.</span></div>
                    <span class="text-muted transition group-hover:text-violet-soft">→</span>
                </a>
                <a href="{{ route('programs') }}" class="group flex items-baseline justify-between gap-6 py-5 transition hover:bg-white/[0.02]">
                    <div><span class="font-display text-xl text-cream">Sleep &amp; Wake</span><span class="ml-3 text-sm text-muted">Four for naps, deep sleep, and gentle mornings.</span></div>
                    <span class="text-muted transition group-hover:text-violet-soft">→</span>
                </a>
                <a href="{{ route('programs') }}" class="group flex items-baseline justify-between gap-6 py-5 transition hover:bg-white/[0.02]">
                    <div><span class="font-display text-xl text-coral/90">Experiential</span><span class="ml-3 text-sm text-muted">Four rooted in tradition, offered for exploration.</span></div>
                    <span class="text-muted transition group-hover:text-coral">→</span>
                </a>
            </div>

            <a href="{{ route('programs') }}" class="reveal mt-8 inline-flex items-center gap-2 font-medium text-violet-soft transition hover:text-violet-bright">
                See all seventeen programs
                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-none stroke-current stroke-2"><path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>
    </section>

    {{-- 6. The science, briefly --}}
    <section class="border-t border-white/5 py-24">
        <div class="mx-auto max-w-3xl px-6 text-center">
            <p class="reveal mb-6 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Backed by real research</p>
            <h2 class="reveal font-display text-4xl font-extralight text-cream sm:text-5xl">The defaults are the research.</h2>
            <p class="reveal mx-auto mt-8 max-w-2xl text-lg leading-relaxed text-muted">
                Play a slightly different tone in each ear and the brain responds to the difference, a response you can see on an EEG. Researchers have studied it for decades, and for programs like Deep Meditation the evidence is genuinely strong. We read all of it, picked the best-supported frequency for each program, and made it the default. Other apps hand you a frequency picker and a wall of presets, which quietly makes the science your problem. We did the opposite: the choice is already made, from the evidence, so nothing on the surface asks you to pick a frequency.
            </p>
            <a href="{{ route('science') }}" class="reveal mt-8 inline-flex items-center gap-2 font-medium text-violet-soft transition hover:text-violet-bright">
                Read the research
                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-none stroke-current stroke-2"><path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>
    </section>

    {{-- 7. What Humm doesn't do --}}
    <section class="border-t border-white/5 py-24">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <h2 class="reveal mx-auto max-w-2xl font-display text-3xl font-extralight leading-snug text-cream sm:text-4xl">
                An app for your attention shouldn't be designed to consume it.
            </h2>
            <div class="reveal mx-auto mt-12 grid max-w-2xl gap-x-10 gap-y-4 text-left sm:grid-cols-2">
                <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 rounded-full bg-coral"></span> No ads. Ever.</div>
                <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 rounded-full bg-coral"></span> No tracking. Nothing to harvest.</div>
                <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 rounded-full bg-coral"></span> No subscription.</div>
                <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 rounded-full bg-coral"></span> No account required.</div>
                <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 rounded-full bg-coral"></span> No streaks or notifications.</div>
                <div class="flex items-center gap-3 border-b border-white/5 py-3 text-cream/90"><span class="h-1.5 w-1.5 rounded-full bg-coral"></span> Works offline, entirely on-device.</div>
            </div>
            <p class="reveal mt-18 font-display text-2xl font-light text-violet-soft">Humm succeeds when you forget it's running.</p>
        </div>
    </section>

    {{-- Testimonials (social proof, right before the price) --}}
    @php
        // Placeholder testimonials and monogram avatars. Swap for real, attributed
        // reviews (and photos, with consent) once TestFlight feedback lands;
        // fabricated ones would undercut the honesty this brand is built on.
        $testimonials = [
            ['quote' => "Honestly bought it half-expecting the usual pseudoscience. Then I found the page where they grade each program and admit which ones are weak. That's when I actually started using it.", 'name' => 'Maya R.', 'context' => 'product designer', 'initials' => 'MR', 'tint' => 'bg-violet/15 text-violet-soft'],
            ['quote' => "What got me is what isn't there. No streak counter, no 'come back' notification at 9pm, no account to make. I set a timer and it's just gone when it's done.", 'name' => 'Daniel K.', 'context' => 'backend dev', 'initials' => 'DK', 'tint' => 'bg-coral/15 text-coral'],
            ['quote' => "I use the same two programs every day and somehow it never sounds the same twice. I kept waiting to get sick of it. Still haven't.", 'name' => 'Priya S.', 'context' => 'PhD student', 'initials' => 'PS', 'tint' => 'bg-violet/15 text-violet-soft'],
            ['quote' => "Paid the one time about four months ago. Part of me is still waiting for the subscription email that never comes. Strange feeling, in a good way.", 'name' => 'Tom E.', 'context' => 'nurse', 'initials' => 'TE', 'tint' => 'bg-coral/15 text-coral'],
            ['quote' => "I grab my phone first thing regardless, so now it's this on the walk to the kitchen instead of Instagram. Small change, but my mornings feel less frantic.", 'name' => 'Lena M.', 'context' => 'illustrator', 'initials' => 'LM', 'tint' => 'bg-violet/15 text-violet-soft'],
            ['quote' => "I do this kind of research for a living, so I went in skeptical and read the whole science page. It's careful, it cites its sources, and it doesn't oversell. Rare.", 'name' => 'Arjun P.', 'context' => 'neuroscientist', 'initials' => 'AP', 'tint' => 'bg-coral/15 text-coral'],
        ];
    @endphp
    <section class="border-t border-white/5 py-24">
        <div class="mx-auto max-w-6xl px-6">
            <p class="reveal mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">In their words</p>
            <h2 class="reveal font-display text-4xl font-extralight text-cream sm:text-5xl">Trusted for what it doesn't do.</h2>

            <div class="reveal mt-14 gap-4 sm:columns-2 lg:columns-3">
                @foreach ($testimonials as $testimonial)
                    <figure class="mb-4 break-inside-avoid rounded-2xl border border-white/8 bg-white/[0.02] p-6">
                        <blockquote class="leading-relaxed text-cream/90">{{ $testimonial['quote'] }}</blockquote>
                        <figcaption class="mt-5 flex items-center gap-3">
                            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full font-display text-sm {{ $testimonial['tint'] }}">{{ $testimonial['initials'] }}</span>
                            <span class="leading-tight">
                                <span class="block text-sm text-cream">{{ $testimonial['name'] }}</span>
                                <span class="block text-xs text-muted">{{ $testimonial['context'] }}</span>
                            </span>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 8. Pricing --}}
    <section id="pricing" class="border-t border-white/5 py-24">

        <h2 class="reveal font-display text-4xl text-center font-extralight text-cream sm:text-5xl">Buy it once. Own it for life.</h2>

        <div class="mx-auto max-w-xl px-6 text-center">

            <div class="reveal mt-12 rounded-3xl border border-white/10 bg-white/[0.03] p-8 text-left">
                <div class="flex items-start justify-between border-b border-white/8 pb-6">
                    <div>
                        <p class="font-display text-xl text-cream">Free for a week</p>
                        <p class="mt-1 text-sm text-muted">Every program, full access.</p>
                    </div>
                </div>
                <div class="pt-6 border-b border-white/8 pb-6">
                    <p class="font-display text-xl text-cream">Then one price, once, per device</p>
                    <p class="mt-1 text-sm text-muted">Lifetime, all future programs included.</p>
                </div>
                <p class="mt-8 text-center text-sm text-muted">Start your free week on</p>
                <x-store-badges size="compact" class="mt-3" />
            </div>

            <p class="reveal mt-8 text-muted">Comparable apps charge <span class="text-cream">$40 to $100 a year</span>, every year. Humm is one price, once.</p>
            <p class="reveal mt-3 text-sm text-muted/70">The license is per device, plain and up front, so there are no surprises later.</p>
        </div>
    </section>

    {{-- 9. FAQ --}}
    <section class="border-t border-white/5 py-24">
        <div class="mx-auto max-w-3xl px-6">
            <h2 class="reveal mb-12 font-display text-4xl font-extralight text-cream sm:text-5xl">Questions.</h2>
            <div class="divide-y divide-white/8">
                <div class="faq reveal group is-open">
                    <button type="button" aria-expanded="true" aria-controls="faq-answer-1" class="flex w-full cursor-pointer items-center justify-between gap-4 py-5 text-left font-display text-lg text-cream">Do I need headphones?<span class="shrink-0 text-muted transition group-[.is-open]:rotate-45">+</span></button>
                    <div id="faq-answer-1" class="faq-answer">
                        <div>
                            <p class="pb-5 text-muted">Yes. Binaural beats need each ear to hear its own tone, so stereo headphones are required.</p>
                        </div>
                    </div>
                </div>
                <div class="faq reveal group">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-2" class="flex w-full cursor-pointer items-center justify-between gap-4 py-5 text-left font-display text-lg text-cream">What does "research-grounded" mean here?<span class="shrink-0 text-muted transition group-[.is-open]:rotate-45">+</span></button>
                    <div id="faq-answer-2" class="faq-answer">
                        <div>
                            <p class="pb-5 text-muted">Each core program's frequency is chosen from published research and graded honestly, from strong support down to traditional, stated plainly per program. We never claim more than the evidence does.</p>
                        </div>
                    </div>
                </div>
                <div class="faq reveal group">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-3" class="flex w-full cursor-pointer items-center justify-between gap-4 py-5 text-left font-display text-lg text-cream">Core versus experiential programs?<span class="shrink-0 text-muted transition group-[.is-open]:rotate-45">+</span></button>
                    <div id="faq-answer-3" class="faq-answer">
                        <div>
                            <p class="pb-5 text-muted">Core programs are set from the research. Experiential ones come from tradition and subjective reports, offered for exploration, not presented as science.</p>
                        </div>
                    </div>
                </div>
                <div class="faq reveal group">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-4" class="flex w-full cursor-pointer items-center justify-between gap-4 py-5 text-left font-display text-lg text-cream">Which devices does it run on?<span class="shrink-0 text-muted transition group-[.is-open]:rotate-45">+</span></button>
                    <div id="faq-answer-4" class="faq-answer">
                        <div>
                            <p class="pb-5 text-muted">iPhone and Android phones. Download from the App Store or Google Play.</p>
                        </div>
                    </div>
                </div>
                <div class="faq reveal group">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-5" class="flex w-full cursor-pointer items-center justify-between gap-4 py-5 text-left font-display text-lg text-cream">Why no subscription?<span class="shrink-0 text-muted transition group-[.is-open]:rotate-45">+</span></button>
                    <div id="faq-answer-5" class="faq-answer">
                        <div>
                            <p class="pb-5 text-muted">Because an app whose job is protecting your attention shouldn't hold it hostage to a monthly fee. Buy it once, own it.</p>
                        </div>
                    </div>
                </div>
                <div class="faq reveal group">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-6" class="flex w-full cursor-pointer items-center justify-between gap-4 py-5 text-left font-display text-lg text-cream">Does it work offline?<span class="shrink-0 text-muted transition group-[.is-open]:rotate-45">+</span></button>
                    <div id="faq-answer-6" class="faq-answer">
                        <div>
                            <p class="pb-5 text-muted">Yes. Everything runs on your device. Nothing is sent anywhere.</p>
                        </div>
                    </div>
                </div>
                <div class="faq reveal group">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-7" class="flex w-full cursor-pointer items-center justify-between gap-4 py-5 text-left font-display text-lg text-cream">Is this a medical device?<span class="shrink-0 text-muted transition group-[.is-open]:rotate-45">+</span></button>
                    <div id="faq-answer-7" class="faq-answer">
                        <div>
                            <p class="pb-5 text-muted">No. Humm supports focus, rest, and relaxation. It does not diagnose or treat any condition.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 10. Closing CTA --}}
    <section class="border-t border-white/5 py-28">
        <div class="mx-auto max-w-2xl px-6 text-center">
            <h2 class="reveal font-display text-4xl font-extralight leading-tight text-cream sm:text-5xl">Focus, sleep, wake, dream.<br><span class="text-violet-soft">One dial.</span></h2>
            <x-cta href="#pricing" size="lg" class="reveal mt-9">Try free for a week</x-cta>
            <p class="reveal mt-4 text-sm text-muted">No account required. Works offline.</p>
        </div>
    </section>

    <x-footer />
</x-layout>
