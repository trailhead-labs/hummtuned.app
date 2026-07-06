# Humm marketing site

The marketing site for **Humm**, a mobile app that plays research-grounded binaural programs inside a soundscape that is mixed fresh every session. A [Trailhead Labs](https://trailheadlabs.co) product.

The app ships on the App Store and Google Play; this repo is just the site that markets it.

## Pages

Three pages, all server-rendered Blade, one dark design system.

- **`/` (home)** the landing page: hero, "a day with Humm", the three-step ritual, the generative engine, a programs teaser, the science in brief, the values, pricing, FAQ, and the closing call to action.
- **`/programs`** the full catalogue of the seventeen programs across four purposes, each with an honest evidence tag.
- **`/science`** the long-form research page, a tabbed reference covering what binaural beats are, what is measurable versus debated, the constant carrier and its variants, how each program is grounded, the session shape, and the full citations. Two custom SVG illustrations live here: an animated binaural-beat diagram and a session-shape line.

## Design system

Dark and nocturnal by design (the product is a nighttime app, so there is no light mode). Near-black indigo ground, a violet accent, warm coral for the experiential and the beat, and thin cream display type. The recurring motif is the app's timer dial: it is the logo mark, the favicon and app icon, and the color language (violet to coral) that runs through the SVG illustrations.

## Reference docs

Everything in `docs/` records the reasoning behind the copy, the research, and the design. Keep it; do not delete.

- `docs/brand-and-marketing.md` brand, values, positioning, and the marketing plan.
- `docs/frequency-research-synthesis.md` the graded per-program research and the source bibliography.
- `docs/landing-page-structure.md` the reconciled structure and final copy for all three pages.
- `docs/science-page-content.md` the source content for the science page.

The science content is grounded in the app's own source; every frequency, carrier, and grade was verified against it, and every scientific claim traces to a cited source.

## Testing and formatting

```bash
php artisan test --compact
vendor/bin/pint --dirty --format agent
```
