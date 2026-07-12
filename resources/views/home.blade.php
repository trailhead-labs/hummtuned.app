<x-layout
    title="Humm - Focus, sleep, wake, dream. One dial."
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
            <div class="mt-14 lg:mt-0 phone w-[300px] rounded-[2.75rem] p-2.5">
                <video
                    class="aspect-[108/234] w-full rounded-[2.25rem] object-cover"
                    poster="{{ asset('assets/hero-poster.webp') }}?v={{ filemtime(public_path('assets/hero-poster.webp')) }}"
                    autoplay muted loop playsinline
                >
                    <source src="{{ asset('assets/hero-session.webm') }}?v={{ filemtime(public_path('assets/hero-session.webm')) }}" type="video/webm" />
                    <source src="{{ asset('assets/hero-session.mp4') }}?v={{ filemtime(public_path('assets/hero-session.mp4')) }}" type="video/mp4" />
                </video>
            </div>
        </div>
    </section>

    {{-- 2. A day with Humm (lead emotional) --}}
    <section class="border-t border-white/5 py-16 sm:py-24">
        <div class="mx-auto max-w-6xl px-6">
            <p class="reveal mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Not a sleep app. Not a focus app.</p>
            <h2 class="reveal font-display text-4xl font-extralight text-cream sm:text-5xl">A state for the whole day.</h2>
            <p class="reveal mt-6 max-w-xl text-lg leading-relaxed text-muted">
                The phone is the first thing you reach for in the morning and the last thing you put down at night. Right now that reflex feeds you the feed. Humm gives it somewhere better to land.
            </p>

            {{-- Mobile: a single-line swipe slider. sm+: the connected hairline grid. --}}
            <div class="no-scrollbar mt-14 -mx-6 flex snap-x snap-mandatory gap-4 overflow-x-auto px-6 pb-4 sm:mx-0 xl:-mx-13 sm:grid sm:snap-none sm:grid-cols-5 sm:gap-px sm:overflow-hidden sm:rounded-2xl sm:border sm:border-white/8 sm:bg-white/5 sm:px-0 sm:pb-0">
                <div class="reveal w-[76%] shrink-0 snap-start rounded-2xl border border-white/8 bg-ink/60 p-6 sm:w-auto sm:shrink sm:rounded-none sm:border-0">
                    <p class="font-display text-lg text-cream h-auto lg:h-16"><span class="italic text-violet-soft">Humm</span> before breakfast</p>
                    <p class="mt-2 text-sm text-muted">A nudge toward alert on the way to the kitchen.</p>
                </div>

                <div class="reveal w-[76%] shrink-0 snap-start rounded-2xl border border-white/8 bg-ink/60 p-6 sm:w-auto sm:shrink sm:rounded-none sm:border-0">
                    <p class="font-display text-lg text-cream h-auto lg:h-16"><span class="italic text-violet-soft">Humm</span> on the bus</p>
                    <p class="mt-2 text-sm text-muted">A calm buffer instead of the feed.</p>
                </div>

                <div class="reveal w-[76%] shrink-0 snap-start rounded-2xl border border-white/8 bg-ink/60 p-6 sm:w-auto sm:shrink sm:rounded-none sm:border-0">
                    <p class="font-display text-lg text-cream h-auto lg:h-16"><span class="italic text-violet-soft">Humm</span> through the deep work</p>
                    <p class="mt-2 text-sm text-muted">Set the state, then hold it.</p>
                </div>

                <div class="reveal w-[76%] shrink-0 snap-start rounded-2xl border border-white/8 bg-ink/60 p-6 sm:w-auto sm:shrink sm:rounded-none sm:border-0">
                    <p class="font-display text-lg text-cream h-auto lg:h-16"><span class="italic text-violet-soft">Humm</span> in meditation</p>
                    <p class="mt-2 text-sm text-muted">Drop in faster, stay longer.</p>
                </div>

                <div class="reveal w-[76%] shrink-0 snap-start rounded-2xl border border-white/8 bg-ink/60 p-6 sm:w-auto sm:shrink sm:rounded-none sm:border-0">
                    <p class="font-display text-lg text-cream h-auto lg:h-16"><span class="italic text-violet-soft">Humm</span> before sleep</p>
                    <p class="mt-2 text-sm text-muted">Wind the day down on purpose.</p>
                </div>
            </div>

            <p class="reveal mt-10 max-w-2xl text-lg text-muted">
                Don't doomscroll toward the day. <span class="text-cream">Humm your way to the coffee machine.</span>
            </p>
        </div>
    </section>

    {{-- 3. The three-step ritual --}}
    {{--
    <section class="border-t border-white/5 py-16 sm:py-24">
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
        </div>
    </section>
    --}}

    {{-- 5. Programs (teaser; full detail on the programs page) --}}
    <section class="border-t border-white/5 py-16 sm:py-24">
        <div class="mx-auto max-w-6xl px-6">

            <div class="max-w-4xl">

                <p class="reveal mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Seventeen programs, four purposes</p>
                <h2 class="reveal font-display text-4xl font-extralight text-cream sm:text-5xl">Pick by what you need.</h2>
                <p class="reveal mt-4 max-w-2xl text-muted">Each program is graded honestly, from strong evidence to traditional, in plain words. No overclaiming, no hidden woo.</p>

                <div class="reveal mt-12 divide-y divide-white/8">
                    <a href="{{ route('programs') }}" class="group flex items-baseline justify-between gap-6 py-5 px-5 -mx-5 transition border-t border-white/8 hover:bg-white/[0.02]">
                        <div><span class="font-display text-xl text-cream">Focus &amp; Energy</span><span class="ml-3 text-sm text-muted">Six programs for work, learning, and drive.</span></div>
                        <span class="text-muted transition group-hover:text-violet-soft">→</span>
                    </a>
                    <a href="{{ route('programs') }}" class="group flex items-baseline justify-between gap-6 py-5 px-5 -mx-5 transition hover:bg-white/[0.02]">
                        <div><span class="font-display text-xl text-cream">Calm &amp; Meditation</span><span class="ml-3 text-sm text-muted">Three for winding down and turning inward.</span></div>
                        <span class="text-muted transition group-hover:text-violet-soft">→</span>
                    </a>
                    <a href="{{ route('programs') }}" class="group flex items-baseline justify-between gap-6 py-5 px-5 -mx-5 transition hover:bg-white/[0.02]">
                        <div><span class="font-display text-xl text-cream">Sleep &amp; Wake</span><span class="ml-3 text-sm text-muted">Four for naps, deep sleep, and gentle mornings.</span></div>
                        <span class="text-muted transition group-hover:text-violet-soft">→</span>
                    </a>
                    <a href="{{ route('programs') }}" class="group flex items-baseline justify-between gap-6 py-5 px-5 -mx-5 transition border-b border-white/8 hover:bg-white/[0.02]">
                        <div><span class="font-display text-xl text-coral/90">Experiential</span><span class="ml-3 text-sm text-muted">Four rooted in tradition, offered for exploration.</span></div>
                        <span class="text-muted transition group-hover:text-coral">→</span>
                    </a>
                </div>

            </div>

            <a href="{{ route('programs') }}" class="reveal mt-8 inline-flex items-center gap-2 font-medium text-violet-soft transition hover:text-violet-bright">
                See all seventeen programs
                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-none stroke-current stroke-2"><path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>
    </section>

    {{-- 6. Why Humm is different (tabbed: the engine, the science, no-config, what it doesn't do) --}}
    <x-why-different />

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
    <section class="border-t border-white/5 py-16 sm:py-24">
        <div class="mx-auto max-w-6xl px-6">
            <p class="reveal mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">In their words</p>
            <h2 class="reveal font-display text-4xl font-extralight text-cream sm:text-5xl">Trusted for what it doesn't do.</h2>
            <p class="-mx-2 reveal mt-4 text-sm tracking-[0.2em] text-violet-soft/70"><sup>*</sup> Placeholder reviews now. These will be real people after launch, promise.</p>
        </div>

        {{-- A slider a little wider than the page container: drag or swipe to move,
             its sides masked so cards ease off the edges. The max-width lives on the
             wrapper so the calc padding stays relative to it and never overshoots. --}}
        <div class="reveal mx-auto mt-14 max-w-7xl">
            <div data-slider
                 class="no-scrollbar flex cursor-grab select-none snap-x snap-mandatory gap-5 overflow-x-auto px-[max(1.5rem,calc((100%-72rem)/2))] pb-4"
                 style="-webkit-mask-image: linear-gradient(to right, transparent, #000 6%, #000 94%, transparent); mask-image: linear-gradient(to right, transparent, #000 6%, #000 94%, transparent);">
                @foreach ($testimonials as $testimonial)
                    <figure class="flex w-[78%] shrink-0 snap-start flex-col rounded-2xl border border-white/8 bg-white/[0.02] p-6 sm:w-[44%] md:w-[36%] lg:w-[29%] xl:w-[24%]">
                        <blockquote class="leading-relaxed text-cream/90">{{ $testimonial['quote'] }}</blockquote>
                        <figcaption class="mt-auto flex items-center gap-3 pt-5">
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
    <section id="pricing" class="border-t border-white/5 py-16 sm:py-24">

        <h2 class="reveal font-display text-4xl text-center font-extralight text-cream sm:text-5xl">Buy it once. Own it for life.</h2>

        <div class="mx-auto max-w-xl px-6 text-center">

            <div class="reveal mt-12 rounded-3xl border border-white/10 bg-white/[0.03] p-6 text-left sm:p-8">
                <div class="flex items-start justify-between border-b border-white/8 pb-6">
                    <div>
                        <p class="font-display text-xl text-cream">Free for a week</p>
                        <p class="mt-1 text-sm text-muted">Every program, full access.</p>
                    </div>
                </div>
                <div class="pt-6 border-b border-white/8 pb-6">
                    <p class="font-display text-xl text-cream">Then one price, once, per device</p>
                    <p class="mt-1 text-sm text-muted">Lifetime, all future programs included.</p>
                    <p class="mt-1 text-sm text-muted">The license is per device, plain and up front.</p>
                </div>
                <p class="mt-8 text-center text-sm text-muted">Start your free week on</p>
                <x-store-badges size="compact" class="mt-3" />
                <p class="mt-6 text-center text-xs leading-relaxed text-muted/70">By downloading, you agree to our <a href="{{ route('terms') }}" class="text-muted underline decoration-white/20 underline-offset-2 transition hover:text-cream">Terms</a> and <a href="{{ route('privacy') }}" class="text-muted underline decoration-white/20 underline-offset-2 transition hover:text-cream">Privacy Policy</a>.</p>
            </div>

        </div>
        <p class="reveal mt-8 text-muted text-center px-4">Comparable apps charge <span class="text-cream">$40 to $100 a year</span>, every year. You do the math.</p>
    </section>

    {{-- 9. FAQ --}}
    <section class="border-t border-white/5 py-16 sm:py-24">
        <div class="mx-auto max-w-3xl px-6">
            <h2 class="reveal mb-12 font-display text-4xl font-extralight text-cream sm:text-5xl">Questions.</h2>
            <div class="divide-y divide-white/8">
                <div class="faq reveal group is-open">
                    <button type="button" aria-expanded="true" aria-controls="faq-answer-1" class="flex w-full cursor-pointer items-center justify-between gap-4 py-5 text-left font-display text-lg text-cream">Do I need headphones?<span class="shrink-0 text-muted transition group-[.is-open]:rotate-45">+</span></button>
                    <div id="faq-answer-1" class="faq-answer">
                        <div>
                            <p class="pb-5 text-muted">Yes. Binaural beats need each ear to hear its own tone, so stereo headphones are required.</p>
                            <p class="pb-5 text-muted">But if you'd like to use Humm over the speaker you are free to do so, the binaurals wont have any effect. But the mix is a soothing base for group meditations too.</p>
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
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-sounds" class="flex w-full cursor-pointer items-center justify-between gap-4 py-5 text-left font-display text-lg text-cream">Where do the sounds come from?<span class="shrink-0 text-muted transition group-[.is-open]:rotate-45">+</span></button>
                    <div id="faq-answer-sounds" class="faq-answer">
                        <div>
                            <p class="text-muted">From a curated library of studio-quality recordings: rain, wind, fire, ocean, bells, bowls, flutes, chants, and more. They start as high-resolution masters and are transparently compressed with a modern codec, so they stay high fidelity at a fraction of the size, and each one is leveled so the generative mix always sits right. The whole library is bundled in the app, so nothing is ever streamed and everything works offline. The recordings are license-free and cleared for a paid app: just over half are public domain, and the rest ask only for a credit. No royalties ride on your session.</p>
                            <a href="{{ route('credits') }}" class="mb-5 mt-4 inline-flex items-center gap-2 font-medium text-violet-soft transition hover:text-violet-bright">
                                See the sound credits
                                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-none stroke-current stroke-2"><path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
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
                <div class="faq reveal group">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-safety" class="flex w-full cursor-pointer items-center justify-between gap-4 py-5 text-left font-display text-lg text-cream">Is it safe to use?<span class="shrink-0 text-muted transition group-[.is-open]:rotate-45">+</span></button>
                    <div id="faq-answer-safety" class="faq-answer">
                        <div>
                            <p class="pb-5 text-muted">Humm supports focus, rest, and relaxation. It is not a medical device, and nothing here is medical advice. A few sensible cautions: keep the volume at a comfortable, moderate level to protect your hearing, and never run a relaxation or sleep program while driving or operating machinery. If you have epilepsy or a seizure disorder, a heart condition, or are pregnant, talk to a doctor before using brainwave entrainment. If anything feels uncomfortable, stop and take the headphones off.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 10. Closing CTA --}}
    <section class="border-t border-white/5 py-20 sm:py-28">
        <div class="mx-auto max-w-2xl px-6 text-center">
            <h2 class="reveal font-display text-4xl font-extralight leading-tight text-cream sm:text-5xl">Focus, sleep, wake, dream.<br><span class="text-violet-soft">One dial.</span></h2>
            <x-cta href="#pricing" size="lg" class="reveal mt-9">Coming soon!</x-cta>
            {{-- TODO: Restore at launch
            <x-cta href="#pricing" size="lg" class="reveal mt-9">Try free for a week</x-cta>
            <p class="reveal mt-4 text-sm text-muted">No account required. Works offline.</p>
            --}}
        </div>
    </section>

    <x-footer />
</x-layout>
