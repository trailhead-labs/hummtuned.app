# Humm: Site Structure & Copy (reconciled with the build)

*This document now reflects the site as built, not a pre-design draft. Copy here matches what ships in the pages. Design-intent notes sit in `> blockquotes`. A Trailhead Labs product (trailheadlabs.co).*

**Pages built:** `index.html` (landing), `programs.html` (full 17-program catalogue), `science.html` (the research, long version).
**Design system:** one dark, nocturnal theme, Tailwind (CDN for now), Outfit (display, thin weights) + Inter (body). Palette from the app: near-black indigo ground, violet accent, warm coral for the experiential and the dial's lower arc, thin cream numerals. Sole hero visual is the real app screen; no interleaved product shots elsewhere.

---

## Governing rules (apply to every section)

- **One CTA, one verb, everywhere:** **Try free for a week.** This is a mobile app, so the CTA resolves to the two app stores (App Store and Google Play), shown together or platform-aware on mobile. The stores are the mechanism, not competing CTAs; keep the verb consistent and never let "Download" or "Get it on…" become the headline promise.
- **Tone:** calm, precise, confident. Short sentences. No exclamation marks. No "unlock / journey / transform." Frame sections problem-first where it is natural (name the tension the reader feels, then Humm as the resolution), but in Humm's quiet voice, not a hype voice.
- **Humm is a verb.** Use it as one wherever a moment is named ("Humm before coffee").
- **Lead emotional.** The emotional, reflex-swap material ("A day with Humm") leads, directly under the hero. The mechanics (ritual, engine) and the credibility (science) follow.
- **Confident, honestly.** Give the research its due: the neural response is measurable and the best programs have genuinely strong support. Say so plainly on the landing. The debated-outcome nuance and the citations live on `science.html`, not the landing.
- **Honest here, backed elsewhere.** The landing is fully honest and carries some depth in plain words. The heavy backing (per-program grading detail, study citations, the full research argument) lives on `science.html`. The landing states the honest position and links out for the receipts.
- **Never use em dashes** (site owner's standing prose rule). En dashes only in numeric ranges.
- **Read in under three minutes.** If the product is simple, the page is too.

> **Design throughline:** the interface is minimal enough to *be* the artwork. The page feels like the product: quiet surface, depth underneath. Avoided the three AI-default looks (cream+serif+terracotta, near-black+acid accent, broadsheet hairlines). The signature is the product's own **timer dial** with its cool-to-warm gradient (violet at the top, coral at the bottom), carried in the hero.

---

## Section order (as built)

1. Hero
2. A day with Humm *(leads emotional)*
3. The three-step ritual
4. The engine
5. Programs *(teaser; full catalogue on `programs.html`)*
6. The science, briefly *(links to `science.html`)*
7. What Humm doesn't do
8. Pricing
9. FAQ
10. Closing CTA
11. Footer

---

## Section 1: Hero

**Headline:**
> Focus, sleep, wake, dream. One dial.

*Parked alternates (not chosen): "Tune your mind. One tap." and "Press play on the state you need."*

**Subline:**
> A soothing soundscape, mixed fresh every session, over binaural programs your brain measurably responds to.

**Copy note:** leads with the soothing soundscape (the emotional benefit you feel), then names the research-backed binaurals as the credible core. Two features, soundscape first for feel, binaurals second for trust. The confident "your brain measurably responds to" is deliberate; see the honesty note under Section 6.

**CTA:** Try free for a week · **Store badges:** App Store and Google Play · **Micro-reassurance:** No card required. Works offline.

> **Design intent (built):** the hero shows the real app screen, not a recreation. It is an autoplay `<video>` (muted, loop, playsinline) with the real screenshot `assets/hero-poster.png` as the poster, framed in a phone shell on the right. **TODO:** drop `assets/hero-session.mp4` in to bring the dial to life; until then the accurate still shows. Reduced-motion respected (reveals disabled). An earlier hand-built HTML/CSS dial recreation was scrapped for being off; the real screen is the source of truth.

---

## Section 2: A day with Humm *(leads emotional)*

**Eyebrow:** Not a sleep app. Not a focus app.
**Heading:** A state for the whole day.

**Problem-first lead:**
> The phone is the first thing you reach for in the morning and the last thing you put down at night. Right now that reflex feeds you the feed. Humm gives it somewhere better to land.

**The moments (name as the verb):**
- **Humm before your first coffee.** A nudge toward alert on the way to the kitchen.
- **Humm on the bus.** A calm buffer instead of the feed.
- **Humm through the deep work.** Set the state, then hold it.
- **Humm in meditation.** Drop in faster, stay longer.
- **Humm before sleep.** Wind the day down on purpose.

**The honest line (morning):** Don't doomscroll toward the day. Humm your way to the coffee machine.

> **Design intent (built):** repositions Humm from "sleep app" to all-day companion, and frames each moment as a habit swap. Rendered as a five-cell strip; the italic violet *Humm* verb is the copy signature. Leads the page because the emotional reflex-swap should land before the mechanics.

---

## Section 3: The three-step ritual

**Eyebrow:** How a session works

1. **Pick.** Choose a program. A short sheet says what it does and how long it wants.
2. **Set.** Turn the dial, or don't; it remembers your length.
3. **Start.** Headphones on. That's the whole interaction.

**Closing line:** Humm tunes you. You don't tune Humm.
**Depth line:** Everything's here if you go looking: session pacing, the mix, the end chime. It just never asks you to touch any of it.

> **Design intent (built):** proves the simplicity claim in a five-second scan; three numbered beats (the only numbering on the page, because it is a genuine sequence). The depth line signals *simple on top, deep when you go looking*, so the page reads as deliberately quiet, not shallow.

---

## Section 4: The engine

**Eyebrow:** Never the same twice
**Heading:** Every session is mixed fresh. Familiarity never sets in.

**Body:**
> Most ambient audio is a fixed track. Play it enough and your ear learns it, and the moment it becomes familiar it stops working. Humm assembles a new soundscape every session from a deep pool of natural textures, melodies, and effects, and keeps shifting the mix as it plays. There's nothing to memorize and nothing to wear out.

**Kicker:** This is the part a playlist can't copy.

> **Design intent (built):** the one claim no playlist-based competitor can make; centered, given room. Problem-first: names the ambient-audio-gets-old problem, then the generative fix.

---

## Section 5: Programs *(teaser; full catalogue on `programs.html`)*

**Eyebrow:** Seventeen programs, four purposes
**Heading:** Pick by what you need.
**Intro:** Each program is graded honestly, from strong evidence to traditional, in plain words. No overclaiming, no hidden woo.

**Four purpose rows (each links to `programs.html`):**
- **Focus & Energy.** Six programs for work, learning, and drive.
- **Calm & Meditation.** Three for winding down and turning inward.
- **Sleep & Wake.** Four for naps, deep sleep, and gentle mornings.
- **Experiential.** Four rooted in tradition, offered for exploration. *(coral register)*

**Link:** See all seventeen programs → `programs.html`

> **Design intent (built):** the full 17-program grid made the landing feel unfocused, so it moved to its own page (`programs.html`). The landing keeps this tight four-row teaser. On `programs.html`, each program is a card with the app's own `bandLabel()` tag (`Settles into Theta`, `Sinks to Delta`, `Steady · Alpha`, and so on), reused verbatim so the site and app speak the same language. The tag describes the *frequency journey* (which band, and whether the session eases, settles, sinks, builds, or holds steady), not the strength of evidence; evidence honesty lives in the copy and on `science.html`. Full tag mapping and derivation: `design/program-tags.md`.

---

## Section 6: The science, briefly

**Eyebrow:** Backed by real research
**Heading:** The defaults are the research.

**Body (de-hedged, confident):**
> Play a slightly different tone in each ear and the brain responds to the difference, a response you can see on an EEG. Researchers have studied it for decades, and for programs like Deep Meditation the evidence is genuinely strong. We read all of it, picked the best-supported frequency for each program, and made it the default. Other apps hand you a frequency picker and a wall of presets, which quietly makes the science your problem. We did the opposite: the choice is already made, from the evidence, so nothing on the surface asks you to pick a frequency.

**Link:** Read the research → `science.html`

> **Honesty calibration (decided):** the landing is confident. "A response you can see on an EEG" refers to the measurable neural response (the auditory steady-state response), which is real and not in dispute. `science.html` carries the full nuance: whether entrainment reliably drives the *outcome* is still debated (Ingendoh 2023), with the calm and sleep programs graded strongest. The landing can be bold because the deep page holds the complete, cited truth. If the EEG line ever needs softening, align it to the science page's phrasing.

> **Design intent (built):** doorway to `science.html`, not a replacement. Short and unshowy; credibility comes from restraint here and depth there.

---

## Section 7: What Humm doesn't do

**Framing line:** An app for your attention shouldn't be designed to consume it.

- No ads. Ever.
- No tracking. Nothing to harvest.
- No subscription.
- No account required.
- No streaks or notifications.
- Works offline, entirely on-device.

**Kicker:** Humm succeeds when you forget it's running.

> **Design intent (built):** carries the values and sets up the pricing rationale (no subscription, so one price). Refusals read as a stance, not a spec sheet. Rendered with small coral dots as bullets (not dashes). The kicker gets its own beat.

---

## Section 8: Pricing

**Heading:** Buy it once. Own it for life.

- **Free for a week.** Every program, full access, no card required.
- **Then one price, once, per device.** Lifetime, all future programs included.

**Anchor:** Most soundscape apps cost $60–70 per year, forever. Humm is one price, once.
**Transparency line:** The license is per device, plain and up front, so there are no surprises later.
**CTA:** Try free for a week (with App Store + Google Play badges).

> **Design intent (built):** one price, so one card, not a three-tier table. The anchor persuades; the reader does the math. **TODO (product):** a one-week free trial followed by a one-time (non-subscription) purchase needs validating against App Store and Google Play billing rules, since store-managed trials are usually tied to subscriptions.

---

## Section 9: FAQ

Headphones (first, as a credibility signal) · what "research-grounded" means · core vs experiential · which devices (iPhone and Android, from the App Store or Google Play) · why no subscription · does it work offline · is it a medical device (No; supports focus, rest, relaxation; does not diagnose or treat). Built as an accordion; answers kept to two sentences. The medical disclaimer is load-bearing and every other line stays consistent with it.

---

## Section 10: Closing CTA

**Echo line:** Focus, sleep, wake, dream. One dial.
**CTA:** Try free for a week. Nothing else in this section.

---

## Footer (built)

- **Wordmark:** Humm.
- **Links:** Programs · Science · Privacy · Support · App Store · Google Play. *(Programs and Science are live; Privacy, Support, and the store URLs are `#` placeholders.)*
- **Trailhead Labs credit:** the mountain mark plus "A Trailhead Labs product," linking to trailheadlabs.co. Recolored to `currentColor` (muted lavender, brightens on hover) because the brand blue `#30347f` is too dark on the near-black ground. Present on all three pages.
- **Measurement disclosure:** "This site measures nothing about you. No cookies, no analytics, no tracking."
- **Medical disclaimer (small):** Humm supports focus, rest, and relaxation; it does not diagnose or treat any condition.
- **TODO (optional):** the short founder note on why no ads / no tracking / no subscription is not yet on the page.

---

## `science.html` (the deep page, built)

Written by grounding in the app source code and the corroborated research (see `science-page-content.md` for the source content). Sections: what binaural beats are; what is measurable vs still debated (the ASSR/EEG response is real; entrainment-to-outcome is unsettled per Ingendoh 2023); the constant carrier and its variants; all 17 programs as graded cards across the four purposes; the session shape (only the dwell is evidenced); and grouped citations with working links.

**Carrier, from the native audio code (source of truth):** symmetric split `left = carrier − beat/2`, `right = carrier + beat/2`, so the channels average to the carrier and only the beat is scheduled. Carriers: **250 Hz** core; **340 Hz** gamma variant (Increased Attention only); **200 Hz** Monroe carrier for the experiential trance trio (tone, not beat); **136.1 Hz** OM carrier for Schumann (tone). Grades run three tiers: moderate-to-good support, weak/indirect, and experiential/traditional.

---

## Decisions (all resolved)

1. **Hero headline:** "Focus, sleep, wake, dream. One dial."
2. **"All future programs included":** committed. The lifetime price includes all future programs.
3. **Program tags and evidence depth:** the app's own `bandLabel()` tags on `programs.html`; evidence honesty in prose and on `science.html`, no competing tag.
4. **Program one-liners:** all 17 kept, but on their own `programs.html` page; the landing carries a four-purpose teaser (the full grid made the landing unfocused).
5. **Section order:** lead emotional. "A day with Humm" sits directly under the hero, before the mechanics.
6. **Hero visual:** the real app screen (video-ready with a real screenshot poster), not a hand-built recreation.
7. **Science voice:** confident on the landing, full cited nuance on `science.html`.

---

## Related files

- `index.html`, `programs.html`, `science.html` — the built pages.
- `science-page-content.md` — the grounded science content (source for `science.html`).
- `design/program-tags.md` — the 17 `bandLabel()` tags and how they derive.
- `design/screenshots/` — the five app screens and their tokens.
- `design/hero-dial-reference/` — the dial's cool-to-warm color and motion, for the hero video.
- `assets/` — `hero-poster.png` (real screen), `trailhead-labs.svg`. **Awaiting `hero-session.mp4`.**
- `brand-and-marketing.md`, `frequency-research-synthesis.md` — the source strategy and research docs.
