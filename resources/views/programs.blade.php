<x-layout
    title="Programs — Humm"
    description="Seventeen programs across four purposes, each graded honestly for how strong the evidence is."
>
    <x-header back />

    {{-- Intro --}}
    <section class="mx-auto max-w-6xl px-6 pb-8 pt-10 lg:pt-16">
        <p class="mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">Seventeen programs, four purposes</p>
        <h1 class="font-display text-5xl font-extralight text-cream sm:text-6xl">The full catalogue.</h1>
        <p class="mt-6 max-w-2xl text-lg leading-relaxed text-muted">
            Pick by what you need. Each program is graded honestly for how strong the evidence is, and the tag on each names the state it settles into. The detail and the citations live on the science page.
        </p>
    </section>

    {{-- Programs --}}
    <section class="mx-auto max-w-6xl px-6 pb-24">
        <div class="mt-8 space-y-16">
            @foreach ($groups as $group)
                @php
                    // Four across for the shorter groups, three for the six-card
                    // Focus group so the rows stay balanced.
                    $columns = $group['name'] === 'Sleep & Wake' || $group['experiential']
                        ? 'lg:grid-cols-4'
                        : 'lg:grid-cols-3';
                    $tone = $group['experiential'] ? 'coral' : 'violet';
                @endphp

                <div>
                    @if ($group['experiential'])
                        <div class="mb-6 flex items-center gap-3">
                            <h2 class="font-display text-sm uppercase tracking-[0.15em] text-coral/80">{{ $group['name'] }}</h2>
                            <span class="h-px flex-1 bg-gradient-to-r from-coral/30 to-transparent"></span>
                        </div>
                        <p class="mb-6 max-w-2xl text-sm text-muted">Rooted in decades of subjective reports and contemplative tradition. Offered for exploration. These are real experiences; how much the beat contributes is subjective and not scientifically established, and we say so in the app.</p>
                    @else
                        <h2 class="mb-6 font-display text-sm uppercase tracking-[0.15em] text-muted">{{ $group['name'] }}</h2>
                    @endif

                    <div class="grid gap-4 sm:grid-cols-2 {{ $columns }}">
                        @foreach ($group['programs'] as $program)
                            <x-program-card
                                :name="$program['name']"
                                :teaser="$program['teaser']"
                                :tag="$program['tag']"
                                :tone="$tone"
                            />
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-16 border-t border-white/8 pt-24 text-center">
            <x-cta href="{{ route('home') }}#pricing">Try free for a week</x-cta>
            <p class="mt-4 text-sm text-muted">Every program, full access.</p>
        </div>
    </section>

    <x-footer minimal />
</x-layout>
