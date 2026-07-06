<?php

namespace App\Support;

/**
 * The single source of truth for Humm's seventeen programs, shared by the
 * programs catalogue and the science page. Frequencies, grades, and tiers were
 * verified against the app source; the grounding prose is lifted verbatim from
 * the approved science page.
 */
class ProgramCatalog
{
    /**
     * Group metadata. The experiential flag drives the coral styling and the
     * exploration note; the science intro is the one-line lede shown above each
     * group on the science page.
     *
     * @return array<string, array{experiential: bool, science_intro: string}>
     */
    public static function groups(): array
    {
        return [
            'Focus & Energy' => [
                'experiential' => false,
                'science_intro' => 'Made for the working hours. The support here is more mixed, and the debate about entrainment-to-outcome bites hardest in exactly these arousal and cognition states, so we are more cautious.',
            ],
            'Calm & Meditation' => [
                'experiential' => false,
                'science_intro' => 'This group carries the strongest evidence in Humm, which fits the research: the clearest binaural-beat effects are on relaxation and calm.',
            ],
            'Sleep & Wake' => [
                'experiential' => false,
                'science_intro' => "Delta and sleep are binaural audio's strongest research area; waking is the weakest. We grade them accordingly.",
            ],
            'Experiential' => [
                'experiential' => true,
                'science_intro' => 'Traditional practices, offered for exploration. These are real, well-documented experiences people have; what has no controlled science behind it is the claim that a binaural beat produces or deepens them. How much the beat contributes is subjective and, honestly, probably slight. So these programs are grounded in what each tradition actually uses and in decades of subjective report, and the app says so in plain words. We do not oversell them.',
            ],
        ];
    }

    /**
     * Every program keyed by name. The tier (strong, weak, experiential) drives
     * the grade-chip colour on the science page.
     *
     * @return array<string, array{teaser: string, tag: string, freq: string, grade: string, tier: string, grounding: string}>
     */
    public static function programs(): array
    {
        return [
            'Focus & Concentration' => [
                'teaser' => 'Settle into steady, undistracted work.',
                'tag' => 'Steady · Beta',
                'freq' => '15 Hz beta',
                'grade' => 'Contested',
                'tier' => 'weak',
                'grounding' => 'Low-beta 15 Hz has a specific working-memory-accuracy signal, but the strongest 2022 trial (Rakhshan) found it was 10 Hz alpha, not beta, that improved visuospatial working memory. So 15 Hz is a defensible border pick, only weakly supported. We hold it steady and grade it honestly.',
            ],
            'Increased Attention' => [
                'teaser' => 'Sharpen for tasks that need vigilance.',
                'tag' => 'Steady · Gamma',
                'freq' => '40 Hz gamma',
                'grade' => 'Contested',
                'tier' => 'weak',
                'grounding' => 'Gamma is the best-supported attention band in a weak field. A 2025 parametric study found 40 Hz gamma outperformed beta on general attention, and a 2021 study found 16 Hz beta gave "rather strong evidence against" the idea that beta beats augment sustained attention, which is why we do not use beta here. Even gamma does not fix the slow drop in vigilance over a long task. This is the one program on the 340 Hz gamma carrier. We frame it as alertness support, not attention enhancement.',
            ],
            'Learn & Memorize' => [
                'teaser' => 'A state tuned for taking things in.',
                'tag' => 'Steady · Beta',
                'freq' => '15 Hz beta',
                'grade' => 'Moderate',
                'tier' => 'strong',
                'grounding' => 'The one program with a direct on-target study: Garcia-Argibay (2019) found a beta beat improved recall and recognition during learning, while a slow theta beat impaired both. The richer "theta helps memory" story comes from the brain\'s own oscillations, not from a theta beat played during study, which has actually hurt memory in testing. Alpha helps visuospatial memory but impairs verbal memory, wrong for a study aid. So 15 Hz beta it is; play it while you take information in, and switch it off when you test yourself.',
            ],
            'Creativity' => [
                'teaser' => 'Loosen up for divergent, idea-first thinking.',
                'tag' => 'Steady · Alpha',
                'freq' => '10 Hz alpha',
                'grade' => 'Preliminary',
                'tier' => 'experiential',
                'grounding' => 'Reedijk (2013) remains the single anchor: a 10 Hz alpha beat affected divergent (idea-generating) thinking, an effect moderated by dopamine. Humm matches that tested protocol exactly and holds 10 Hz. One moderated study without strong replication; graded accordingly.',
            ],
            'Conscious Thinking' => [
                'teaser' => 'Relaxed alertness for turning something over.',
                'tag' => 'Steady · Alpha',
                'freq' => '12 Hz alpha',
                'grade' => 'Traditional',
                'tier' => 'experiential',
                'grounding' => 'Brainstorming is divergent thinking, and the only binaural study on it used alpha, near 10 Hz. Beta is for tight analytical work, and 16 Hz beta shows evidence against boosting attention, so climbing into beta would be the wrong direction. Humm holds a high-alpha 12 Hz, the "relaxed alertness" border, steady, no ramp.',
            ],
            'Energize' => [
                'teaser' => 'Alertness support when focus is flagging.',
                'tag' => 'Steady · Beta',
                'freq' => '15 Hz beta',
                'grade' => 'Indirect → moderate',
                'tier' => 'weak',
                'grounding' => 'Beta is the only band with direct anti-fatigue beat evidence. Gao (2022) pitted 15 Hz against 40 Hz under mental fatigue and found 15 Hz beta kept accuracy stable while 40 Hz behaved like relaxing music; Lane (1998) found beta improved vigilance and reduced fatigue while slower bands worsened them. Honest limit: no beat reliably shifts how tired you feel compared with a control. So Energize is framed as focus and alertness support, a nudge, not a caffeine substitute.',
            ],
            'Relaxation' => [
                'teaser' => "Let the body's stress response ease off.",
                'tag' => 'Settles into Theta',
                'freq' => '5 Hz theta dwell',
                'grade' => 'Moderate',
                'tier' => 'strong',
                'grounding' => "The evidence favors theta over static alpha for the body's relaxation response: McConnell (2014) found a theta beat increased parasympathetic (calming) activity in heart-rate variability, and a 2024/25 band comparison found theta produced the broadest cardiovascular relaxation. So Relaxation settles down into a 5 Hz theta dwell rather than holding at alpha, then returns to about 10 Hz alpha at the end to re-orient you before you re-engage. The descent into theta is evidenced; the alpha return at the end is a sensible design choice, not a tested one.",
            ],
            'Deep Meditation' => [
                'teaser' => 'Sink into a settled, quiet state.',
                'tag' => 'Settles into Theta',
                'freq' => '6 Hz theta',
                'grade' => 'Moderate · best grounded ★',
                'tier' => 'strong',
                'grounding' => 'Jirakittayakorn and Wongsawat (2017) showed a 6 Hz beat induces cortex-wide theta within 5 to 15 minutes. A large 2026 study (200+ participants) found that only 6 Hz theta reliably raised both calmness and focus, with a substantial effect size, beating 9 and 12 Hz beats and noise or silence controls, and reported one-month tolerability data. Humm plays exactly 6 Hz. The session eases in through an 8 Hz alpha doorway, holds at 6 Hz, and lifts gently back toward alpha at the end.',
            ],
            'Intuition' => [
                'teaser' => 'A contemplative, inward-facing state.',
                'tag' => 'Steady · Alpha',
                'freq' => '8 Hz, alpha-theta border',
                'grade' => 'Traditional',
                'tier' => 'experiential',
                'grounding' => 'Eight Hz sits right on the border where alpha meets theta, the value the introspection literature keeps landing on: the Peniston alpha-theta neurofeedback protocol targets exactly the crossover point, and meditation EEG (Aftanas 2001) ties inward-turned attention to co-occurring frontal-midline theta and lower alpha. That makes 8 Hz a principled anchor, but "intuition" is inherently soft and the support is indirect. We label it experiential in spirit and grade it honestly.',
            ],
            'Lucid Dreaming' => [
                'teaser' => 'Set the stage for dream awareness.',
                'tag' => 'Settles into Theta',
                'freq' => '5 Hz theta',
                'grade' => 'Traditional',
                'tier' => 'experiential',
                'grounding' => 'Be clear about what is proven here and what is not. Lucid dreaming itself is established science: LaBerge (1981) verified it by having dreamers signal with pre-agreed eye movements during confirmed REM sleep, and Konkoly (2021) held real-time two-way conversations with people mid-dream. It is also a trainable skill, reached through practice such as reality checks and wake-back-to-bed. What no controlled trial shows is that a binaural beat induces it, at any frequency. Theta is the traditional and indirect anchor because it is REM\'s dominant rhythm, so Humm holds a light 5 Hz theta and plays through the night, when dreams run longest, with no end chime to wake you. The one causal hint came from frontal 40 Hz gamma electrical stimulation (Voss 2014), but that is electrical, not audio, and it failed replication (2020). So the honest limit is the beat, not the phenomenon: treat it as a gentle accompaniment to your own practice, not a trigger.',
            ],
            'Power Nap' => [
                'teaser' => 'Stay light, wake clean. Best at 10–20 minutes.',
                'tag' => 'Settles into Theta',
                'freq' => '6 Hz light theta',
                'grade' => 'Moderate',
                'tier' => 'strong',
                'grounding' => 'A power nap works by staying in light sleep. The classic finding is that a 10–20 minute nap stays in light stages and leaves you clear, while a longer nap drops into deep slow-wave sleep and causes the grogginess (sleep inertia) that can dull you for up to about 95 minutes after waking (Sleep Foundation; WHOOP). So Power Nap deliberately holds at light theta, 6 Hz, not down in delta, and has no end-rise: because you stay near the surface, the timer wakes you cleanly. The nap-length science is well established; binaural beats do not force sleep stages on their own, so the frequency here expresses the intent rather than guaranteeing the state.',
            ],
            'Restorative Sleep' => [
                'teaser' => 'Drift down toward deep, restful sleep.',
                'tag' => 'Sinks to Delta',
                'freq' => '3 Hz delta',
                'grade' => 'Moderate',
                'tier' => 'strong',
                'grounding' => 'Delta is where the sleep evidence lives. Dabiri (2022) found a 3 Hz beat over one week improved sleep quality and duration; 3 Hz induces delta and extends deep NREM sleep; a 2024 RCT improved sleep scores in older adults, and a descending 8-to-1 Hz protocol helped chronic insomnia. Humm plays 3 Hz, the directly-tested value, and descends into it from about 7 Hz. It never rises to wake you and fades out in silence.',
            ],
            'Wake Up' => [
                'teaser' => 'Climb gently from asleep toward alert.',
                'tag' => 'Eases into Alpha',
                'freq' => '11 Hz mid-alpha',
                'grade' => 'Moderate, directional',
                'tier' => 'strong',
                'grounding' => 'Waking is the honest weak spot, and we corrected our own earlier design here. Fast beta beats are the least defensible target of all: no beta entrainment has been demonstrated, beta beats do not reliably lift alertness, and the just-woken brain recovers beta slowest of any band (Marzano 2011), so a short session physically cannot climb there. Instead Wake Up meets you near sleep at about 4 Hz and climbs to a mid-alpha 11 Hz dwell, the genuine relaxed-awake edge, mirroring the natural waking arc. It stops at the alpha ceiling and does not push into beta. Honest limit: no binaural study shows reduced sleep inertia; light and melody are the real levers, so treat the beat as a gentle adjunct.',
            ],
            'Astral Projection' => [
                'teaser' => "The tradition's canonical state.",
                'tag' => 'Settles into Theta',
                'freq' => '6 Hz theta',
                'grade' => 'Traditional',
                'tier' => 'experiential',
                'grounding' => 'Astral projection overlaps experientially with the out-of-body state, which is a real, lab-documented experience (Blanke 2002), though the literal \'projection\' reading is tradition rather than science and reaching it is a practised skill. The modern astral community converges tightly on roughly 6 Hz as its canonical number, and Humm matches it, on the 200 Hz Monroe carrier, played from deep relaxation while you stay awake.',
            ],
            'Out-of-Body Experience' => [
                'teaser' => 'The deeper threshold below it.',
                'tag' => 'Settles into Theta',
                'freq' => '4 Hz, theta-delta border',
                'grade' => 'Contested',
                'tier' => 'experiential',
                'grounding' => 'The out-of-body experience is real and has a neural basis: Blanke (2002) induced one by electrically stimulating the temporoparietal junction, and it can be evoked with multisensory manipulation in the lab. What is contested is the interpretation, a literal projection versus the brain misbinding body and balance signals, and whether a beat can trigger it at all. The Monroe and Campbell tradition puts the trigger lower than the astral value, around 4 Hz; their first such recording was reportedly near 3.78 Hz. Humm sits at 4 Hz, below the 6 Hz astral program, which matches the tradition and cleanly separates the two. Even insiders are skeptical that beats reliably trigger the experience, and we pass that skepticism along.',
            ],
            'Deep Trance' => [
                'teaser' => 'The edge of deep subconscious work.',
                'tag' => 'Settles into Theta',
                'freq' => '4 Hz, theta-delta border',
                'grade' => 'Traditional',
                'tier' => 'experiential',
                'grounding' => 'Hypnosis lore maps theta to medium trance and delta to the deepest states. Four Hz sits on the theta-delta border, the threshold of deep trance, and is the most-published theta beat for subconscious work. We hold 4 Hz and make no claim that it reaches the deepest states.',
            ],
            'Schumann Resonance' => [
                'teaser' => "Earth's own low-frequency hum.",
                'tag' => 'Steady · Theta',
                'freq' => '7.83 Hz theta',
                'grade' => 'Real physics, experiential effect',
                'tier' => 'experiential',
                'grounding' => 'The 7.83 Hz value is genuinely real: it is the fundamental resonance of the cavity between the Earth\'s surface and the ionosphere. What is experiential is any claim that hearing it tunes you to the planet. Humm offers it as a steady grounding tone, used awake like a meditation, on the 136.1 Hz "OM" carrier traditionally paired with it.',
            ],
        ];
    }

    /**
     * The catalogue in the programs-page order: Focus, Calm, Sleep, then the
     * experiential group last.
     *
     * @return list<array{name: string, experiential: bool, science_intro: string, programs: list<array{name: string, teaser: string, tag: string, freq: string, grade: string, tier: string, grounding: string}>}>
     */
    public static function forProgramsPage(): array
    {
        return static::resolve([
            'Focus & Energy' => ['Focus & Concentration', 'Increased Attention', 'Learn & Memorize', 'Creativity', 'Conscious Thinking', 'Energize'],
            'Calm & Meditation' => ['Relaxation', 'Deep Meditation', 'Intuition'],
            'Sleep & Wake' => ['Lucid Dreaming', 'Power Nap', 'Restorative Sleep', 'Wake Up'],
            'Experiential' => ['Astral Projection', 'Out-of-Body Experience', 'Deep Trance', 'Schumann Resonance'],
        ]);
    }

    /**
     * The catalogue in the science-page order, strongest evidence first: Calm,
     * Sleep, Focus, then the experiential group.
     *
     * @return list<array{name: string, experiential: bool, science_intro: string, programs: list<array{name: string, teaser: string, tag: string, freq: string, grade: string, tier: string, grounding: string}>}>
     */
    public static function forSciencePage(): array
    {
        return static::resolve([
            'Calm & Meditation' => ['Deep Meditation', 'Relaxation', 'Intuition'],
            'Sleep & Wake' => ['Restorative Sleep', 'Power Nap', 'Wake Up', 'Lucid Dreaming'],
            'Focus & Energy' => ['Learn & Memorize', 'Energize', 'Increased Attention', 'Focus & Concentration', 'Creativity', 'Conscious Thinking'],
            'Experiential' => ['Astral Projection', 'Out-of-Body Experience', 'Deep Trance', 'Schumann Resonance'],
        ]);
    }

    /**
     * Resolve a page layout (group name to an ordered list of program names)
     * into full group structures with their programs inlined in order.
     *
     * @param  array<string, list<string>>  $layout
     * @return list<array{name: string, experiential: bool, science_intro: string, programs: list<array{name: string, teaser: string, tag: string, freq: string, grade: string, tier: string, grounding: string}>}>
     */
    protected static function resolve(array $layout): array
    {
        $groups = static::groups();
        $programs = static::programs();

        $resolved = [];

        foreach ($layout as $group => $names) {
            $resolved[] = [
                'name' => $group,
                'experiential' => $groups[$group]['experiential'],
                'science_intro' => $groups[$group]['science_intro'],
                'programs' => array_map(
                    fn (string $name): array => ['name' => $name, ...$programs[$name]],
                    $names,
                ),
            ];
        }

        return $resolved;
    }
}
