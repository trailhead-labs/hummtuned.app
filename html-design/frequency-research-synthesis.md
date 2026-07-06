# Frequency & Session-Shape Research Synthesis

Grounding for the program frequencies and the buildup/ramp protocol, from parallel deep-research passes covering all 17 programs (2026-07). Ananda's values were treated as **hypotheses to test**, not authority.

> **STATUS: RATIFIED & APPLIED.** The dwell-target recommendations below are live in `app/Programs/` and the spec's Programs table (changes: Energize 40→15, Increased Attention 16→40 + carrier swap, Wake Up 14→11, Relaxation 10→5, Out-of-Body 7→4, Restorative Sleep 2→3; 11 keeps). The **shape** recommendations (glide/dwell/end-rise, per-program contours) are input for step 4's schedule engine, not yet built.

---

## The overriding caveat (read first)

The mechanism the whole feature rests on — that a binaural beat "entrains" the brain to its own frequency — is **not established**. The best current synthesis, **Ingendoh, Posny & Heine 2023 (PLOS ONE, 14 EEG studies)**, found 5 supporting entrainment, 8 contradicting, 1 mixed, and concluded it "cannot be settled." Notably **no study demonstrated beta-band entrainment**, and every study embedding the beat in pink noise found none. The one meta-analysis with a real aggregate effect (**Garcia-Argibay 2019**, g ≈ 0.45) is driven mostly by **anxiety/relaxation** (theta/delta), not by arousal or cognition.

Consequences that shape every decision below:
- Pick the **least-unsupported band**, don't claim it "works."
- Prefer **round band-anchored values** over false precision (Ananda's 5.5 / 4.9 / 8.22 Hz carry no evidentiary weight over 5 / 8 / 10).
- Frame the whole product **experientially** (mood/state), never clinically. Effects are modest and individual-dependent (dopamine, expectancy).
- Ananda is right on shape/direction in ~2 of 7 cases and wrong or no-better on the rest.

---

## Master decision sheet (all 17 programs)

Dwell target = the frequency the program holds/aims for. "Shape" = whether the session should ramp (step 4), separate from the dwell value. ★ = best-grounded pick in the catalogue.

| # | Program | Current | Recommended dwell | Band | Grade | Verdict |
|---|---|---|---|---|---|---|
| 1 | Conscious Thinking | 12 | **12** static | Alpha | Weak-trad | Keep |
| 2 | Focus & Concentration | 15 | **15** static | Beta | Weak/Indirect | Keep |
| 3 | Increased Attention | 16 | **40** | Gamma | Weak (evidence vs beta) | **Change** — swap to gamma (see note) |
| 4 | Learn & Memorize | 15 | **15** | Beta | Moderate | Keep |
| 5 | Creativity | 10 | **10** static | Alpha | Weak-trad | Keep |
| 6 | Energize | 40 | **15** | Beta | Indirect→Moderate | **Change** — gamma failed replication |
| 7 | Deep Meditation | 6 | **6** static | Theta | Moderate ★ | Keep |
| 8 | Lucid Dreaming | 5 | **5** | Theta | Weak-trad | Keep (not delta) |
| 9 | Intuition | 8 | **8** (7.5 ok) | Alpha* | Weak-trad | Keep |
| 10 | Relaxation | 10 | **5** dwell, 10 return | Theta | Moderate | **Change shape** |
| 11 | Restorative Sleep | 2 | **3** (+ descent) | Delta | Moderate | Change (minor + shape) |
| 12 | Power Nap | 3 | **6** light theta, no rise | Theta | Moderate | **Change** — a power nap stays light (see note) |
| 13 | Wake Up | 14 | **11** dwell, ~4 entry | Alpha | Moderate (directional) | **Change** — ours worst-supported |
| 14 | Astral Projection | 6 | **6** | Theta | Weak-trad | Keep (matches tradition) |
| 15 | Out-of-Body | 7 | **4** | Theta | Weak/None | **Change** — Monroe canon is ~4 Hz |
| 16 | Deep Trance | 4 | **4** | Theta | Weak-trad | Keep |
| 17 | Schumann Resonance | 7.83 | **7.83** | Theta | (real physics) | Keep |

\* Intuition 8 Hz sits on the alpha-theta border; `band()` reads it as Alpha. Nudging to 7.5 would read Theta and lean slightly more contemplative — equally defensible, your call.

**Dwell-value changes (6):** Increased Attention 16→40, Energize 40→15, Relaxation 10→5, Wake Up 14→11, Out-of-Body 7→4, Power Nap 3→6 (delta→light theta, see note). Plus Restorative Sleep 2→3 (minor, better-tested).
**Shape upgrades for step 4 (not dwell changes):** Relaxation (theta dwell + alpha return), Restorative Sleep (theta→delta descent), Wake Up (delta→alpha ascent), and the general glide/dwell/end-rise protocol. (Power Nap's shape was corrected the *other* way — see its note.)
**Keeps (10):** Conscious Thinking, Focus, Learn & Memorize, Creativity, Deep Meditation, Lucid Dreaming, Intuition, Astral Projection, Deep Trance, Schumann.

**Carrier consequence:** #3↔#6 is effectively a **band swap** (Energize→beta, Increased Attention→gamma). If you take it, the 340 Hz gamma carrier simply moves from Energize to Increased Attention — `GAMMA_CARRIER_HZ` stays, one gamma program remains. If you instead keep Increased Attention at 16 beta (not recommended — it's the frequency shown *not* to help vigilance), then no gamma program remains and `GAMMA_CARRIER_HZ` retires with everything on 250 Hz.

---

## The seven conflicts (detail)

### Energize — change 40 Hz gamma → ~15 Hz beta
Both prior picks are wrong. Our 40 Hz gamma rationale (Colzato attention/arousal) failed recent replication: a 2023 ANT study (n=58) found 40 Hz gave **no** gain in attention, alertness, arousal, or mood. Ananda's alpha is **directionally backwards** — rising alpha is a textbook **fatigue biomarker** (the driver-fatigue index is literally (θ+α)/β). The only band with direct anti-fatigue BB evidence is **beta**: Gao 2022 (n=60) pitted 15 Hz vs 40 Hz under mental fatigue and **15 Hz beta kept accuracy stable while 40 Hz patterned like relaxing music**; Lane 1998 found beta improved vigilance and reduced fatigue/confusion while theta/delta worsened them. **Honest limit:** no beat moves *subjective* fatigue vs control (consistent null across Gao & Melnichuk). Frame Energize as "focus/alertness support," not a caffeine substitute.
*Carrier note:* Energize is currently the sole user of the 340 Hz gamma carrier. If it moves off gamma, it should drop to the 250 Hz core carrier, and `GAMMA_CARRIER_HZ` can likely be retired.

### Learn & Memorize — keep 15 Hz beta
The one conflict with a direct on-target study: **Garcia-Argibay 2019** ("BB affect long-term memory," n=32) — beta 20 Hz **improved** recall and recognition d′, while theta 5 Hz **impaired** both. Crucial nuance: the rich "theta = memory consolidation" literature comes from endogenous oscillations / theta-tACS, and delivering theta *as a beat during encoding* has hurt memory. Alpha (Ananda) helps visuospatial WM but **impairs verbal** memory — bad for a learning app. Keep 15 Hz; 18–20 Hz would align even tighter.

### Conscious Thinking — keep 12 Hz static, no ramp
"Brainstorming" = divergent thinking. The only BB divergent-thinking study (Reedijk 2013) used **alpha 10 Hz** (effect dopamine-moderated). Beta (Ananda's target) is for convergent/analytical cognition, and 16 Hz beta shows "strong evidence against" augmenting attention. A *climb into beta* is doubly unsupported (wrong direction for ideation + ramps untested). Keep 12 Hz (high-alpha/SMR border, "relaxed alertness"); 10 Hz matches Reedijk exactly. Do **not** adopt the ramp.

### Wake Up — change beta target → ~4 → ~11 Hz (delta/theta → mid-alpha)
Our beta target is **the least-defensible pick in the entire catalogue**, on three independent grounds: (1) no beta-band entrainment exists (Ingendoh 2023); (2) beta beats don't reliably improve alertness (2025 parametric study: "rather strong evidence against"); (3) beta is the **slowest-recovering band post-wake** (Marzano 2011 — the awakening brain has a *beta deficit* that reperfuses over 15–30 min), so a 5–10 min ramp physically can't reach it. Ananda's shape is right for the right reasons: delta/theta→alpha mirrors the natural waking arc (iso-principle: meet the sleeper's state, then lead it), and mid-alpha (~11 Hz, the alert edge) is the genuine "relaxed-awake" endpoint. **Stop at the alpha ceiling; do not enter beta.** *Honest limit:* no BB study shows reduced sleep inertia; the real levers are light + melodic audio. Treat the beat as ambience/adjunct.

### Intuition — keep 8 Hz
The alpha-theta **border (~7.5–8 Hz)** is the literature-anchored value for introspective/inner-guidance states: the Peniston alpha-theta **crossover** neurofeedback protocol targets exactly the point theta rises to meet alpha, and meditation EEG (Aftanas) ties internalized attention to co-occurring frontal-midline theta **and** lower alpha. Ananda's 5.5 Hz is arbitrary mid-theta precision with no special claim. Keep 8 Hz (7.5 equally defensible). Grade honestly Weak/Indirect — "intuition" is inherently soft. Label experiential.

### Relaxation — change shape: ~5 Hz theta dwell + ~10 Hz alpha return
The one place to **adopt Ananda's contour**. Recent evidence favors **theta over static alpha** for the autonomic relaxation response: McConnell 2014 (theta BB increased parasympathetic HRV activation); a 2024/25 band-comparison found **theta produced the broadest cardiovascular relaxation** while alpha's was narrower. So descending into a **~5 Hz theta dwell** leaves the stronger effect on the table if we stay static at 10. The **~10 Hz alpha return** at the end is physiologically sensible (re-orient before re-engaging) but is a **design choice, not evidence** — no RCT has tested descending-vs-static contours. Use round 5 Hz, not 4.9.

### Lucid Dreaming — keep 5 Hz theta, stay experiential
Be blunt in-product: **no controlled trial shows BB induce lucid dreams**, with any frequency. Theta is the traditional/indirect anchor (REM's dominant rhythm). Ananda's descent into **high delta (3–4 Hz) is actively backwards** — delta is deep NREM, the opposite of the REM/theta state where lucidity occurs. The one causal hint is frontal **40 Hz gamma tACS** (Voss 2014), but that's electrical not audio, and **failed replication** (2020). Keep theta ~5 Hz; optionally a subtle 40 Hz gamma motif flagged as unproven. Grade Weak-traditional.

---

## The six untouched core programs (verified this pass)

### Increased Attention — change 16 Hz beta → 40 Hz gamma
The one preset recent work directly contradicts. A 2021 ASU study delivered 16 Hz beta during a vigilance task and found "**rather strong evidence against** the hypothesis that beta beats augment sustained attention," with no help on the vigilance decrement. The 2025 parametric study found **gamma (40 Hz) outperformed beta** on general attention (though even gamma doesn't fix the decrement over time). So 16 Hz is specifically the value shown not to work; gamma is the best-supported attention band. This pairs with the Energize change into a clean **band swap** — Energize takes beta, Increased Attention takes gamma, and the 340 Hz gamma carrier moves here. Grade Weak (honest: frame as "alertness support," not attention enhancement).

### Focus & Concentration — keep 15 Hz beta
Split evidence: 15 Hz beta has a specific WM-accuracy signal, but the strongest 2022 RCT (Rakhshan) found **alpha 10 Hz** was the band that improved visuospatial WM, not beta. So 15 Hz is a defensible low-beta border pick but only weakly supported. Keep static 15; an optional 10→15 ascent would graft alpha's WM benefit onto beta's arousal, but that's a refinement, not a necessity. Grade Weak/Indirect.

### Creativity — keep 10 Hz alpha
Reedijk 2013 remains the anchor: 10 Hz alpha affected **divergent** (not convergent) thinking, dopamine-moderated. Ours matches the tested protocol exactly; Ananda's 11→8.22 descent has no direct support. Keep static 10. Grade Weak-traditional (single moderated study, no strong replication).

### Deep Meditation — keep 6 Hz theta ★ (best-grounded in the catalogue)
Jirakittayakorn 2017 (6 Hz induces cortex-wide theta in 5–15 min) is now reinforced by a strong **2026 PLOS ONE study (200+ participants): only 6 Hz theta reliably raised both calmness and focus (g > 0.84)**, beating 9/12 Hz and noise/silence controls, with one-month tolerability data. Ours matches exactly. Keep static 6. Grade Moderate — the one pick with genuinely solid support.

### Restorative Sleep — keep delta; prefer 3 Hz, add a descent
Delta/sleep is BB's strongest area. Dabiri 2022 (3 Hz, 1 week) improved sleep quality/duration; 3 Hz induces delta and extends NREM N3; a 2024 RCT improved PSQI in older adults; a descending **8→1 Hz** protocol helped chronic insomnia. Our 2 Hz is in-band and fine, but **3 Hz is the more directly-tested value**, and this intent genuinely **warrants a descent** (~7→2 Hz) over a static tone — the one place Ananda's shape matches a tested protocol. Grade Moderate.

### Power Nap — change to light theta (~6 Hz), no terminal rise (corrected 2026-07)
The classic power-nap finding is the **opposite** of a deep-sleep descent: a nap must stay in **light** sleep (N1/N2) to avoid the slow-wave sleep that causes wake-up grogginess (sleep inertia). The **10–20 min** light nap is the most effective and least groggy; a 30+ min nap drops into deep sleep and impairs alertness for up to ~95 min after waking (Sleep Foundation; WHOOP; 2024 reviews). So the earlier **3 Hz delta** pick was backwards for a *power* nap: it aimed at exactly the deep sleep to avoid, and the "terminal rise to lighten before waking" was a patch for grogginess the descent itself created. **Corrected:** dwell in **light theta (~6 Hz)**, a gentle 8→6 drift in, **no end rise** (you stay near the surface, so the timer wakes you cleanly), recommended **10–20 min**. Restorative Sleep keeps the 3 Hz delta descent — that is the deep-sleep program; Power Nap is the light one, and the two now differ by design (light vs deep) rather than only by length. Grade Moderate (nap-length science is well-established; BB don't reliably force sleep stages, so the value is framed as intent). **Supersedes** the earlier "keep 3 Hz + terminal rise."

## The three experiential programs (grounded in tradition)

No controlled science; grounded in what the tradition actually uses, flagged honestly. All stay experientially framed.

### Astral Projection — keep 6 Hz theta
The modern astral community converges tightly on **~6–6.3 Hz** as the canonical "astral" number. (Monroe himself works in composite *Focus levels*, not a single Hz — 6 Hz is the community value, not Monroe's.) Ours matches. Grade Weak-traditional.

### Out-of-Body — change 7 Hz → ~4 Hz
The one experiential value that runs *against* its tradition. The Monroe/Campbell canon puts the signature OBE trigger **lower** — "the famous 4 Hz," their first OBE tape reportedly ~3.78 Hz (theta-delta border). Our 7 Hz sits confusingly *above* the 6 Hz astral program, when the tradition points below it. **~4 Hz is better grounded and cleanly differentiates OBE from Astral.** Grade No-evidence/Weak. (Even Campbell, the Monroe insider, is skeptical beats reliably trigger OBEs.)

### Deep Trance — keep 4 Hz theta
Hypnosis lore maps theta (4–7 Hz) = medium trance, delta (<4 Hz) = deepest (somnambulism). 4 Hz sits on the theta-delta border, the threshold of deep trance, and is the most-published theta beat for subconscious work. Keep 4 Hz; just don't claim it reaches the deepest somnambulistic (delta) state. Grade Weak-traditional.

---

## Session shape — the ramp protocol is mostly UX, not science

The "enter → glide → dwell → rise" schedule is **almost entirely design convention**. Only the dwell is empirically grounded.

| Element | Grade | Finding | Design rule |
|---|---|---|---|
| **Entry doorway + glide** | No-evidence | No study compares ramp-vs-fixed; entrainment onset takes *minutes* but that's how long to *hold*, not evidence that *ramping in* helps. The 8 Hz doorway is ritual, not mechanism. | Keep glide **short (~1–3 min)** as comfort. Do **not** make it long or market it as "locking on." |
| **Dwell** | **Moderate** | Jirakittayakorn 2017 (verified): 6 Hz theta induced within 10 min, frontal-midline theta peaks 10–15 min. Converging ~7–10 min plateau across methods. | **Dwell-guard floor = 10 min** for theta/deep targets; ~5 min for alpha. This is the one real number. |
| **End rise** | Weak/Indirect | No BB evidence; borrowed from sleep-inertia research (gradual disengagement from deep/delta states reduces grogginess). | Keep the rise **only for deep (theta/delta) programs**, short (~1–3 min). Cosmetic for light alpha; can omit. |
| **Session-length scaling** | No-evidence | No dose-response for proportional scaling exists. | **Protect absolute floors; keep glide/rise near-constant; let the DWELL absorb extra length.** A 15- vs 45-min session should differ almost entirely in dwell. |
| **Carrier sweep** | No-evidence (rejected) | Entrainment tracks the beat, not the carrier (Ingendoh 2023; a 2024 carrier-comparison found outcomes followed the beat band, not the 250-vs-400 Hz carrier). Where carrier value matters it points lower and *stationary*: a lower carrier drives a larger ASSR (Schwarz & Taylor 2005; ~3× at 250 vs 4000 Hz), so carriers already sit at the effective floor. | **Hold the carrier fixed; schedule only the beat.** The symmetric split keeps the perceived pitch still as the beat glides. If motion is wanted, spatial panning is the evidenced lever, not a pitch sweep. |

**Direct implication for our code:** the original `Session::buildupMinutes()` scaled glide as **25% of session length** (× pace) — the *unsupported* proportional model, which per the research should never scale with length. **✅ Applied (superseded):** the pace multiplier is gone entirely; pacing is now **per-segment lengths set directly in minutes** (start hold / buildup / ramp down / end hold), fit to the session by a dwell-reserved-first budget that drops holds before ramps — so the glide is an absolute length the user sets, never a percentage, and the ~10-min dwell floor is guarded. The research reasoning (table above) stands; only the mechanism changed.

**On sweeping the carrier (considered 2026-07, rejected).** A natural extension of the step-4 beat schedule is to also glide the *carrier* during buildup/wind-down. The literature does not support it. Entrainment tracks the beat (the channel difference), not the carrier, which registers only as the subcortical response at the pure-tone pitches (Ingendoh 2023; eNeuro 2020); a 2024 carrier-comparison (40/10/5 Hz beats on 400 vs 250 Hz carriers) found outcomes followed the beat band, not the carrier. Where the carrier value *does* matter it points **lower and stationary**: a lower carrier drives a larger evoked response (Schwarz & Taylor 2005; ASSR ~3× larger at 250 than 4000 Hz), so the per-program carriers already sit at the effective floor with nowhere better to move. The symmetric split holds the perceived pitch still as the beat glides, so a carrier ramp would only add an audible glissando for no entrainment payoff, and for the 40 Hz gamma program it would push the beat past its narrow perceptibility window (~35 Hz max difference near 400 Hz; Perrott & Nelson 1969). The one place *movement* helped in the literature is **spatial** panning of the source, not carrier pitch (moving-sound relaxation study, 2024) — a post-POC ambiance lever, not a schedule change. **Decision: carrier stays fixed per program; only the beat is scheduled** (as built in step 4).

---

## Proposed Program.php changes (pending your ruling)

Dwell-target `beatFrequency()` values, from the verdicts:

- **Energize:** 40.0 → **15.0** (Gamma → Beta). Carrier 340 → 250.
- **Increased Attention:** 16.0 → **40.0** (Beta → Gamma). Carrier 250 → 340. (The band swap with Energize; keeps `GAMMA_CARRIER_HZ` alive here.)
- **Wake Up:** 14.0 → dwell **~11.0** (mid-alpha), schedule enters ~4 Hz. Direction flips from "climb to beta" to "climb to alpha."
- **Relaxation:** 10.0 → dwell **~5.0** (theta), schedule ends ~10 Hz alpha.
- **Out-of-Body:** 7.0 → **4.0** (theta-delta border; matches Monroe canon, differentiates from Astral's 6).
- **Restorative Sleep:** 2.0 → **3.0** (better-tested delta value).
- **Keep the other 11** at their current values.

If you *decline* the #3↔#6 swap and keep Increased Attention at 16, then Energize's move leaves no gamma program and `GAMMA_CARRIER_HZ` retires (all core on 250).

Display-band knock-on (selector/buildup labels resolve from `beatFrequency()`): Energize Gamma→Beta, Increased Attention Beta→Gamma, Relaxation Alpha→Theta, Wake Up Beta→Alpha. Copy stays Hz-free throughout.

Schedule/shape rules for step 4: short constant glide (~1–3 min, pace-nudged), 10-min theta dwell floor, end-rise on deep programs only, dwell absorbs length. Fixed-tone experiential programs (`hasBuildup() == false`) get no schedule.

---

## Sources
- Ingendoh, Posny & Heine 2023 — entrainment systematic review (PLOS ONE): https://pmc.ncbi.nlm.nih.gov/articles/PMC10198548/
- Garcia-Argibay et al. 2019 — meta-analysis (Psychological Research): https://pubmed.ncbi.nlm.nih.gov/30073406/
- Garcia-Argibay et al. 2019 — BB affect long-term memory: https://link.springer.com/article/10.1007/s00426-017-0959-2
- Gao et al. 2022 — 15 Hz vs 40 Hz under mental fatigue (Brain Sciences): https://pmc.ncbi.nlm.nih.gov/articles/PMC9496831/
- Lane et al. 1998 — BB, vigilance and mood: https://www.sciencedirect.com/science/article/abs/pii/S0031938497004368
- 2023 — 40 Hz gamma BB null on attention/anxiety (Current Psychology): https://pmc.ncbi.nlm.nih.gov/articles/PMC10157589/
- Reedijk et al. 2013 — BB and creativity (Frontiers): https://www.frontiersin.org/journals/human-neuroscience/articles/10.3389/fnhum.2013.00786/full
- Marzano et al. 2011 — EEG sleep inertia: https://pubmed.ncbi.nlm.nih.gov/21167917/
- Melnichuk et al. 2025 — parametric BB & sustained attention (Sci Reports): https://www.nature.com/articles/s41598-025-88517-z
- McConnell et al. 2014 — theta BB parasympathetic activation (Frontiers): https://pmc.ncbi.nlm.nih.gov/articles/PMC4231835/
- 2024/25 — BB autonomic regulation, theta vs alpha: https://pmc.ncbi.nlm.nih.gov/articles/PMC12145584/
- Jirakittayakorn & Wongsawat 2017 — 6 Hz theta induction (Frontiers): https://www.frontiersin.org/journals/neuroscience/articles/10.3389/fnins.2017.00365/full
- Aftanas & Golosheykin 2001 — meditation theta & alpha: https://pubmed.ncbi.nlm.nih.gov/11524157/
- Voss et al. 2014 — frontal gamma tACS & lucid dreams (Nature Neuroscience): https://www.nature.com/articles/nn.3719
- 2020 — failed replication of tACS lucid-dream induction: https://www.sciencedirect.com/science/article/abs/pii/S1053810019305070
- Sleep inertia review (PMC6710480): https://pmc.ncbi.nlm.nih.gov/articles/PMC6710480/
- Schwarz & Taylor / 40-Hz ASSR frequency specificity (lower carrier → larger response): https://pubmed.ncbi.nlm.nih.gov/14644459/
- Carrier-frequency comparison, BB EEG band power 2024 (outcomes track the beat, not the carrier): https://www.preprints.org/manuscript/202410.0976
- Binaural beats through the auditory pathway, brainstem→cortex (eNeuro 2020): https://www.eneuro.org/content/7/2/ENEURO.0232-19.2020
- Spatially moving sounds & mental state (spatial motion, not carrier sweep, aids relaxation): https://pmc.ncbi.nlm.nih.gov/articles/PMC11290623/

Previously cited inline; pulled into the bibliography:
- Rakhshan et al. 2022 — alpha/beta/gamma BB & working memory, within-subject RCT; only 10 Hz alpha helped, and only visuospatial (BioMed Research International): https://pmc.ncbi.nlm.nih.gov/articles/PMC9153928/
- Colzato et al. 2015 — 40 Hz gamma BB & attentional focusing, global-local task (Psychological Research): https://pmc.ncbi.nlm.nih.gov/articles/PMC5233742/ — NB the *later* Colzato 2017 gamma "feature-binding" paper was **retracted**, which is part of why the gamma-attention rationale is treated skeptically here.
- Sustained-attention BB study 2021 (ASU) — 16 Hz beta gave "rather strong evidence against" augmenting sustained attention (PubMed 33978805): https://pubmed.ncbi.nlm.nih.gov/33978805/
- Perrott & Nelson 1969 — Limits for the detection of binaural beats (JASA); max perceptible beat difference ~30–35 Hz near a ~400 Hz carrier: https://doi.org/10.1121/1.1911890
- Dabiri et al. 2022 — delta BB for sleep & post-sleep mood, pilot (Digital Health): https://pubmed.ncbi.nlm.nih.gov/35615269/
- Lin et al. 2024 — BB music & sleep quality / HRV / depression in older adults, RCT, PSQI improved (Geriatrics & Gerontology International): https://pubmed.ncbi.nlm.nih.gov/38319068/
- Nap BB 0.25 Hz 2024 — shortened latency to N2/N3 slow-wave sleep vs sham (Scientific Reports): https://www.nature.com/articles/s41598-024-76059-9
- Tang et al. 2015 — descending 8→1 Hz audio-visual protocol eased chronic-insomnia sleep onset (cited via secondary reviews; no stable open-access link located).
- Sleep Foundation — Do Power Naps Work? (10–20 min stays in light sleep, avoids the inertia of deep sleep): https://www.sleepfoundation.org/sleep-hygiene/power-nap
- WHOOP — best nap length (10–20 min light vs 90 min full cycle; 30–60 min is the groggy trap): https://www.whoop.com/us/en/thelocker/how-long-should-you-nap/
