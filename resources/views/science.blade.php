<x-layout
    title="The science behind Humm"
    description="What binaural beats are, what the research can show, what is still debated, and exactly how each Humm program is grounded, with every claim traced to a source."
>
    <x-header back width="max-w-5xl" />

    {{-- Header lede + tabbed area (one aligned grid) --}}
    <div id="sci-top" class="sci-top mx-auto max-w-5xl px-6 pb-24 pt-6 lg:pt-10">
        <div class="md:grid md:grid-cols-[230px_minmax(0,1fr)] md:gap-12 lg:gap-14">

            {{-- Intro lede: content column, top row --}}
            <div class="md:col-start-2 md:row-start-1">
                <p class="mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">The long version</p>
                <h1 class="font-display text-5xl font-extralight leading-[1.05] text-cream sm:text-[3.25rem]">The science behind Humm.</h1>
                <div class="prose mt-7 text-[17px] leading-relaxed text-muted">
                    <p>Humm plays binaural programs inside a soundscape that is mixed fresh every session. The programs are built on published research, and we grade that research honestly, program by program. This page is the long version: what binaural beats are, what science can actually show, what is still debated, and exactly how each program is grounded, with every claim traced to a source.</p>
                    <p>We keep two commitments here. Where the evidence is genuinely strong, we say so plainly. Where it is weak, indirect, or purely traditional, we say that too. Humm supports focus, rest, and relaxation. It does not diagnose or treat any condition, and nothing on this page should be read as a medical claim.</p>
                </div>
                <div class="mt-10 hidden border-t border-white/8 md:block"></div>
            </div>

            {{-- Sidebar / secondary nav: left gutter, spans both rows, sticky --}}
            <aside class="mt-8 md:mt-0 md:col-start-1 md:row-start-1 md:row-span-2 md:sticky md:top-8 md:self-start">
                <nav id="sci-nav" role="tablist" aria-label="Science page sections"
                     class="flex gap-1 overflow-x-auto border-b border-white/8 pb-3 md:flex-col md:overflow-visible md:border-b-0 md:pb-0">
                    <button class="sci-tab" role="tab" data-tab="beats"><span class="idx">01</span> Binaural beats</button>
                    <button class="sci-tab" role="tab" data-tab="evidence"><span class="idx">02</span> Measurable vs debated</button>
                    <button class="sci-tab" role="tab" data-tab="carrier"><span class="idx">03</span> The carrier</button>
                    <button class="sci-tab" role="tab" data-tab="programs"><span class="idx">04</span> Program grounding</button>
                    <button class="sci-tab" role="tab" data-tab="shape"><span class="idx">05</span> Session shape</button>
                    <button class="sci-tab" role="tab" data-tab="citations"><span class="idx">06</span> Citations</button>
                </nav>
            </aside>

            {{-- Panels: content column, second row --}}
            <div id="sci-panels" class="scroll-mt-6 pt-8 md:col-start-2 md:row-start-2 md:pt-6">

                {{-- 01 What binaural beats are --}}
                <div class="sci-panel" id="panel-beats" role="tabpanel">
                    <h2 class="font-display text-3xl font-extralight text-cream">What binaural beats actually are</h2>
                    <div class="prose max-w-2xl text-[17px] leading-relaxed text-muted">
                        <p>Play a steady tone at one frequency into your left ear and a slightly different one into your right, and your brain does not hear two tones. It hears a single tone that seems to pulse at the difference between them. Feed 247.5 Hz to one ear and 252.5 Hz to the other, and you perceive a 5 Hz throb that is not present in either signal. That throb is the binaural beat. It is created inside the auditory system, not in the air, which is why binaural beats need stereo headphones: each ear has to receive its own tone.</p>
                        <p>The two tones sit close together around a shared center called the carrier. In Humm the split is symmetric: the left channel plays the carrier minus half the beat, the right channel plays the carrier plus half the beat. The two average back to the carrier, so the pitch you perceive stays put while the beat rides underneath it.</p>
                        <p>The idea the whole category rests on is called entrainment: the notion that if you present a rhythmic beat, the brain's own electrical rhythm will fall into step with it and shift your state along with it. That is the promise. The honest picture of how well it holds up is next.</p>
                    </div>
                </div>

                {{-- 02 Measurable vs debated --}}
                <div class="sci-panel" id="panel-evidence" role="tabpanel" hidden>
                    <h2 class="font-display text-3xl font-extralight text-cream">What is measurable, and what is still debated</h2>
                    <div class="prose max-w-2xl text-[17px] leading-relaxed text-muted">
                        <p>Two things are worth separating, because they are often blurred together and only one of them is solid.</p>
                        <p><strong>The neural response is real and measurable.</strong> When you listen to a binaural beat, the brain produces a matching electrical response that can be recorded on EEG, the auditory steady-state response. The signal has been traced along the auditory pathway from the brainstem up to the cortex (eNeuro 2020). This is not in dispute. The brain registers the beat, and it does so specifically.</p>
                        <p><strong>Whether that response reliably drives the outcome is still debated.</strong> The measurable response is one thing; whether it reliably produces the subjective or cognitive result you were after (sharper focus, deeper calm, easier sleep) is another, and the literature has not settled it. The best current synthesis, Ingendoh, Posny and Heine (2023, PLOS ONE, 14 EEG studies), found 5 studies supporting entrainment, 8 contradicting it, 1 mixed, and concluded the question "cannot be settled." No study demonstrated entrainment in the fast beta band, and every study that embedded the beat in noise found none. Effects, where they appear, are modest and vary a lot between individuals.</p>
                        <p>So the picture is neither "this is proven" nor "this is nothing." It is specific. The one meta-analysis showing a real aggregate effect (Garcia-Argibay 2019, g ≈ 0.45) is driven mostly by anxiety and relaxation, the calmer theta and delta states, not by arousal or cognition. That is why the best-grounded programs in Humm are the calming and meditative ones, and why we are more cautious about the alertness and cognition programs. We picked, for each program, the least-unsupported band the research points to, and we tell you where on that spectrum each one sits.</p>
                        <p>This is also why Humm never asks you to choose a frequency. The defaults are the research. The number is not a dial for you to turn; it is a conclusion we reached from the sources, and the program name is the only interface you need.</p>
                    </div>
                </div>

                {{-- 03 The carrier --}}
                <div class="sci-panel" id="panel-carrier" role="tabpanel" hidden>
                    <h2 class="font-display text-3xl font-extralight text-cream">The constant carrier and its variants</h2>
                    <div class="prose max-w-2xl text-[17px] leading-relaxed text-muted">
                        <p>The carrier is the shared center pitch the two tones straddle. Humm holds it fixed for the whole session and schedules only the beat. Here is why, and what the carrier values are.</p>
                        <p><strong>Why the carrier stays fixed.</strong> Entrainment tracks the beat, which is the difference between the two channels, not the carrier pitch itself. A 2024 carrier comparison (40, 10 and 5 Hz beats delivered on 400 Hz versus 250 Hz carriers) found the outcomes followed the beat band, not the carrier. Where the carrier value does matter, it points lower and stationary: a lower carrier drives a larger steady-state response (Schwarz and Taylor 2005, roughly three times larger at 250 Hz than at 4000 Hz), so our carriers already sit near the effective floor with nowhere better to move. Sweeping the carrier during a session would add an audible pitch slide for no entrainment payoff, and for the fast gamma program it would push the beat past the point where a binaural beat can even be perceived (Perrott and Nelson 1969). The symmetric split is what makes the fixed carrier work: because left and right always average to the carrier, the beat can glide from one frequency to another while the pitch you hear never moves. Only the pulse changes. If we ever want a sense of motion, the evidenced lever is spatial panning of the sound, not a pitch sweep.</p>
                    </div>

                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-violet/20 bg-violet/[0.04] p-5">
                            <div class="font-display text-2xl font-light text-cream">250 Hz</div>
                            <div class="mt-1 text-sm font-medium text-violet-soft">Core carrier</div>
                            <p class="mt-2 text-sm text-muted">The default for every core program except the one gamma program. It sits at the measured strong-response low and blends comfortably under the mix at no cost to the beat.</p>
                        </div>
                        <div class="rounded-2xl border border-violet/20 bg-violet/[0.04] p-5">
                            <div class="font-display text-2xl font-light text-cream">340 Hz</div>
                            <div class="mt-1 text-sm font-medium text-violet-soft">Gamma variant</div>
                            <p class="mt-2 text-sm text-muted">A fast 40 Hz beat needs more headroom before the two tones stop fusing. Only Increased Attention uses it: high enough to keep the fast beat perceptible, still low enough for a strong response.</p>
                        </div>
                        <div class="rounded-2xl border border-coral/20 bg-coral/[0.04] p-5">
                            <div class="font-display text-2xl font-light text-cream">200 Hz</div>
                            <div class="mt-1 text-sm font-medium text-coral/90">Monroe variant (tone)</div>
                            <p class="mt-2 text-sm text-muted">The experiential trio (Astral Projection, Out-of-Body, Deep Trance) drops here for a deeper, warmer blend, a value associated with the Monroe binaural patent. Their beats are small and low, so a lower carrier is safe.</p>
                        </div>
                        <div class="rounded-2xl border border-coral/20 bg-coral/[0.04] p-5">
                            <div class="font-display text-2xl font-light text-cream">136.1 Hz</div>
                            <div class="mt-1 text-sm font-medium text-coral/90">OM variant (tone)</div>
                            <p class="mt-2 text-sm text-muted">Schumann Resonance uses the "OM" or Earth-year tone traditionally paired with 7.83 Hz. Like the Monroe carrier, this is about the character of the sound, not about changing what the beat does.</p>
                        </div>
                    </div>
                    <p class="mt-6 max-w-2xl text-[17px] text-muted">In every case the rule is the same: fix the carrier, schedule only the beat.</p>
                </div>

                {{-- 04 Program grounding --}}
                <div class="sci-panel" id="panel-programs" role="tabpanel" hidden>
                    <h2 class="font-display text-3xl font-extralight text-cream">How each program is grounded</h2>
                    <div class="prose max-w-2xl text-[17px] leading-relaxed text-muted">
                        <p>Seventeen programs, grouped by the app's four purposes. For each we give the band, the real dwell frequency the program holds (read straight from the app, which is the source of truth), and an honest grade. Three tiers run through the catalogue: programs with moderate-to-good support, programs on weak or indirect evidence, and experiential programs grounded in tradition and subjective report rather than science. Every frequency below is the value the app actually plays.</p>
                    </div>

                    @foreach ($groups as $group)
                        @if ($group['experiential'])
                            <div class="mt-10 mb-3 flex items-center gap-3">
                                <h3 class="font-display text-sm uppercase tracking-[0.15em] text-coral/80">{{ $group['name'] }}</h3>
                                <span class="h-px flex-1 bg-gradient-to-r from-coral/30 to-transparent"></span>
                            </div>
                        @else
                            <h3 class="mt-10 mb-3 font-display text-sm uppercase tracking-[0.15em] text-muted">{{ $group['name'] }}</h3>
                        @endif
                        <p class="mb-5 text-[15px] text-muted/80">{{ $group['science_intro'] }}</p>
                        <div class="space-y-4">
                            @foreach ($group['programs'] as $program)
                                <x-science.program
                                    :name="$program['name']"
                                    :freq="$program['freq']"
                                    :tier="$program['tier']"
                                    :grade="$program['grade']"
                                    :experiential="$group['experiential']"
                                >{{ $program['grounding'] }}</x-science.program>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                {{-- 05 The session shape --}}
                <div class="sci-panel" id="panel-shape" role="tabpanel" hidden>
                    <h2 class="font-display text-3xl font-extralight text-cream">The session shape</h2>
                    <div class="prose max-w-2xl text-[17px] leading-relaxed text-muted">
                        <p>Most programs do not just hold one frequency. They follow a shape: a short doorway, a glide, a long dwell at the target, and on the deeper programs a gentle rise before the end. It is worth being clear about which parts of that shape are evidenced and which are design convention, because only one part is grounded in research.</p>
                        <p><strong>Enter and glide.</strong> No study compares ramping in against starting fixed. Entrainment takes minutes to establish, but that is how long you have to hold the target, not evidence that gliding toward it helps. The entry doorway (often 8 Hz) is ritual and comfort, not mechanism. So Humm keeps the glide short and does not market it as "locking on."</p>
                        <p><strong>Dwell. This is the one empirically grounded part.</strong> Jirakittayakorn (2017) found 6 Hz theta established within 10 minutes, with frontal-midline theta peaking around 10 to 15 minutes, and several methods converge on a 7–10 minute plateau. So the real number in the whole shape is a dwell floor of about 10 minutes for theta and deeper targets, and roughly 5 minutes for lighter alpha. When you make a session longer, it is the dwell that absorbs the extra time; the glide and the rise stay short and near-constant.</p>
                        <p><strong>End rise.</strong> There is no binaural evidence for it. It is borrowed from sleep-inertia research, where easing gradually out of deep states reduces grogginess. So Humm keeps a short rise only on the deeper theta and delta programs and omits it on the light ones, where you are already near the surface.</p>
                        <p><strong>Carrier sweep: rejected.</strong> As above, the carrier stays fixed and only the beat is scheduled. Sweeping the carrier would add an audible pitch slide for no entrainment gain.</p>
                        <p>The short version: the dwell is the science, the rest is careful design, and we would rather tell you that than dress up the ritual as mechanism.</p>
                    </div>
                </div>

                {{-- 06 Citations --}}
                <div class="sci-panel" id="panel-citations" role="tabpanel" hidden>
                    <h2 class="font-display text-3xl font-extralight text-cream">Accreditations and citations</h2>
                    <p class="mt-4 max-w-2xl text-[15px] text-muted">Every scientific claim on this page traces to one of these sources. Grades are ours, applied honestly per program.</p>

                    <div class="mt-8 space-y-8 text-[15px] leading-relaxed">
                        <div>
                            <h3 class="mb-3 font-display text-sm uppercase tracking-[0.15em] text-violet-soft/70">Reviews and meta-analyses</h3>
                            <ul class="space-y-2 text-muted">
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pmc.ncbi.nlm.nih.gov/articles/PMC10198548/" target="_blank" rel="noopener">Ingendoh, Posny &amp; Heine (2023), entrainment systematic review, PLOS ONE</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pubmed.ncbi.nlm.nih.gov/30073406/" target="_blank" rel="noopener">Garcia-Argibay et al. (2019), meta-analysis, Psychological Research</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.eneuro.org/content/7/2/ENEURO.0232-19.2020" target="_blank" rel="noopener">Binaural beats through the auditory pathway, brainstem to cortex, eNeuro (2020)</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="mb-3 font-display text-sm uppercase tracking-[0.15em] text-violet-soft/70">Meditation, relaxation and the autonomic response</h3>
                            <ul class="space-y-2 text-muted">
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.frontiersin.org/journals/neuroscience/articles/10.3389/fnins.2017.00365/full" target="_blank" rel="noopener">Jirakittayakorn &amp; Wongsawat (2017), 6 Hz theta induction, Frontiers in Neuroscience</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pmc.ncbi.nlm.nih.gov/articles/PMC4231835/" target="_blank" rel="noopener">McConnell et al. (2014), theta beat and parasympathetic activation, Frontiers</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pmc.ncbi.nlm.nih.gov/articles/PMC12145584/" target="_blank" rel="noopener">Binaural beats and autonomic regulation, theta versus alpha (2024/25)</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pubmed.ncbi.nlm.nih.gov/11524157/" target="_blank" rel="noopener">Aftanas &amp; Golosheykin (2001), meditation theta and alpha</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="mb-3 font-display text-sm uppercase tracking-[0.15em] text-violet-soft/70">Attention, memory, fatigue and cognition</h3>
                            <ul class="space-y-2 text-muted">
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://link.springer.com/article/10.1007/s00426-017-0959-2" target="_blank" rel="noopener">Garcia-Argibay et al. (2019), binaural beats and long-term memory</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pmc.ncbi.nlm.nih.gov/articles/PMC9496831/" target="_blank" rel="noopener">Gao et al. (2022), 15 Hz versus 40 Hz under mental fatigue, Brain Sciences</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.sciencedirect.com/science/article/abs/pii/S0031938497004368" target="_blank" rel="noopener">Lane et al. (1998), binaural beats, vigilance and mood</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.nature.com/articles/s41598-025-88517-z" target="_blank" rel="noopener">Melnichuk et al. (2025), parametric binaural beats and sustained attention, Scientific Reports</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pubmed.ncbi.nlm.nih.gov/33978805/" target="_blank" rel="noopener">Sustained-attention study (2021), 16 Hz beta, "rather strong evidence against" augmenting attention</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pmc.ncbi.nlm.nih.gov/articles/PMC10157589/" target="_blank" rel="noopener">40 Hz gamma null on attention and anxiety (2023), Current Psychology</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.frontiersin.org/journals/human-neuroscience/articles/10.3389/fnhum.2013.00786/full" target="_blank" rel="noopener">Reedijk et al. (2013), binaural beats and creativity, Frontiers</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pmc.ncbi.nlm.nih.gov/articles/PMC9153928/" target="_blank" rel="noopener">Rakhshan et al. (2022), alpha/beta/gamma beats and working memory, within-subject RCT</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pmc.ncbi.nlm.nih.gov/articles/PMC5233742/" target="_blank" rel="noopener">Colzato et al. (2015), 40 Hz gamma and attentional focusing (the later 2017 gamma paper was retracted, one reason we treat the gamma case with caution)</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="mb-3 font-display text-sm uppercase tracking-[0.15em] text-violet-soft/70">Sleep, napping and waking</h3>
                            <ul class="space-y-2 text-muted">
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pubmed.ncbi.nlm.nih.gov/35615269/" target="_blank" rel="noopener">Dabiri et al. (2022), delta beat for sleep and post-sleep mood, Digital Health</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pubmed.ncbi.nlm.nih.gov/38319068/" target="_blank" rel="noopener">Lin et al. (2024), binaural music and sleep quality in older adults, RCT</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.nature.com/articles/s41598-024-76059-9" target="_blank" rel="noopener">Nap study (2024), latency to slow-wave sleep versus sham, Scientific Reports</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pubmed.ncbi.nlm.nih.gov/21167917/" target="_blank" rel="noopener">Marzano et al. (2011), EEG and sleep inertia</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pmc.ncbi.nlm.nih.gov/articles/PMC6710480/" target="_blank" rel="noopener">Sleep inertia review (PMC6710480)</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.sleepfoundation.org/sleep-hygiene/power-nap" target="_blank" rel="noopener">Sleep Foundation, Do Power Naps Work? (10–20 minutes stays in light sleep)</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.whoop.com/us/en/thelocker/how-long-should-you-nap/" target="_blank" rel="noopener">WHOOP, best nap length</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="mb-3 font-display text-sm uppercase tracking-[0.15em] text-violet-soft/70">Lucid dreaming</h3>
                            <ul class="space-y-2 text-muted">
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.nature.com/articles/nn.3719" target="_blank" rel="noopener">Voss et al. (2014), frontal gamma stimulation and lucid dreams, Nature Neuroscience</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.sciencedirect.com/science/article/abs/pii/S1053810019305070" target="_blank" rel="noopener">Failed replication of the above (2020)</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="mb-3 font-display text-sm uppercase tracking-[0.15em] text-violet-soft/70">Carrier, perception and spatial motion</h3>
                            <ul class="space-y-2 text-muted">
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pubmed.ncbi.nlm.nih.gov/14644459/" target="_blank" rel="noopener">Schwarz &amp; Taylor, 40 Hz steady-state frequency specificity (a lower carrier drives a larger response)</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://www.preprints.org/manuscript/202410.0976" target="_blank" rel="noopener">Carrier-frequency comparison, EEG band power (2024), outcomes track the beat, not the carrier</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://doi.org/10.1121/1.1911890" target="_blank" rel="noopener">Perrott &amp; Nelson (1969), limits for the detection of binaural beats, JASA</a></li>
                                <li><a class="text-cream/90 underline decoration-white/20 underline-offset-4 transition hover:decoration-violet" href="https://pmc.ncbi.nlm.nih.gov/articles/PMC11290623/" target="_blank" rel="noopener">Spatially moving sounds and mental state (spatial motion, not carrier sweep, aids relaxation)</a></li>
                            </ul>
                        </div>
                    </div>

                    <p class="mt-12 border-t border-white/8 pt-8 text-xs leading-relaxed text-muted/60">
                        Humm supports focus, rest, and relaxation. It is not a medical device and does not diagnose, treat, or cure any condition. Effects of binaural beats are modest and vary between individuals; the experiential programs are offered for exploration and are not scientifically established.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <x-footer minimal width="max-w-5xl" />
</x-layout>
