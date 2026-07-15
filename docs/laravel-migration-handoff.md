# Laravel migration handoff: Humm marketing site

Handoff for an agent session that has Laravel Boost's MCP tools connected. The previous session designed and approved the full static site (three pages) but stopped before migrating it into the fresh Laravel app, because Boost's MCP server was not connected. Do not lose the context below.

## Before you start (hard gate)

Confirm Boost's MCP is connected. You should have `mcp__laravel-boost__*` tools available (search-docs, database-schema, application-info, get-absolute-url, browser-logs, and so on). If they are absent, stop and tell the user to run `/mcp` and connect `laravel-boost`, or restart so `.mcp.json` loads. The previous session was explicitly asked to wait for this, so honor the same gate.

Follow the Boost guidelines in `CLAUDE.md`: use `search-docs` before code changes, `get-absolute-url` before sharing URLs, `browser-logs` to read runtime errors, and prefer Boost tools over shell equivalents.

## Two standing user preferences (keep these everywhere)

- **Prose: never use em dashes.** Use commas, colons, semicolons, or periods. En dashes only in numeric ranges (10-20 minutes). Trim redundancy, no rambling, plain human voice. For any text destined to be copied and pasted, do not hard-wrap paragraphs; keep each paragraph on one line.
- **Code comments: Taylor Otwell descending-line pyramid.** Full sentences, aim for three tapered lines where each line is a few characters shorter than the one above (about -3). Do not amputate real context to hit the count. This applies to PHP, Blade, and JS comments.

## What the site is

Humm is a mobile app (iOS + Android) that plays research-grounded binaural programs inside a generative soundscape. A Trailhead Labs product (trailheadlabs.co). The marketing site is three pages, all built and approved as static HTML in `html-design/`:

- `html-design/index.html` — the landing page.
- `html-design/programs.html` — the full 17-program catalogue.
- `html-design/science.html` — the long-form research page with a tabbed secondary nav.

Live locally at http://humm-site.test (Herd). Confirm the real URL with `get-absolute-url` before quoting it.

## The task

Move the design from `html-design/` into the Laravel app as Blade, with no CDN. Specifically:

1. Tailwind v4 via the Vite plugin (already installed), not the CDN. Fonts Outfit + Inter via the `laravel-vite-plugin` bunny fonts helper.
2. Split the markup into a layout plus reusable components where it makes sense.
3. Routes for `/`, `/programs`, `/science` (named routes).
4. Port the JavaScript (scroll reveal, science tabs), then decide whether to pull in Alpine to simplify it. Adding Alpine is pre-approved to evaluate, since the user asked for it; make the call after the straight port works.
5. Preserve the reference docs (see the last section). Do not delete them.
6. Finish with `vendor/bin/pint --dirty --format agent`, then run the Boost `/laravel-code-simplifier` (the Boost command, not the built-in `/simplify`).

Verification: test HTTP responses first (curl the three routes, assert status and key copy). Use the Chrome extension for screenshots sparingly, because images are expensive. A Pest browser smoke test across the three pages is the cheaper way to catch JS errors.

## Stack (from CLAUDE.md)

PHP 8.4, laravel/framework v13, Tailwind v4 (`@tailwindcss/vite`, theme configured in CSS via `@theme`, no JS config), Vite v8, `laravel-vite-plugin` v3 with the bunny fonts helper, Pest v4, Pint v1. Boost skills present: `laravel-best-practices`, `pest-testing`, `tailwindcss-development`. Activate the relevant skill when you work in that domain.

Current scaffolding: `resources/css/app.css` (has the default `@theme` with Instrument Sans), `resources/js/app.js` (empty), one view `resources/views/welcome.blade.php`, `routes/web.php` returns `welcome`. `public/build` exists.

## Design system (ready to use)

### Tailwind v4 theme

Translate the old JS `tailwind.config` palette into CSS. This `resources/css/app.css` is ready to paste; it was drafted and validated against the markup last session:

```css
@import 'tailwindcss';

@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
@source '../../storage/framework/views/*.php';

@theme {
    --font-sans: 'Inter', ui-sans-serif, system-ui, sans-serif;
    --font-body: 'Inter', ui-sans-serif, system-ui, sans-serif;
    --font-display: 'Outfit', ui-sans-serif, system-ui, sans-serif;

    --color-ink: #0B0918;
    --color-panel: #141032;
    --color-violet: #8B7CF0;
    --color-violet-bright: #A99BFF;
    --color-violet-soft: #B7ABF2;
    --color-coral: #E08A5F;
    --color-cream: #EFE7D8;
    --color-muted: #8B84B0;
}
```

Notes on the palette: the markup uses `bg-violet`, `text-violet-soft`, `hover:bg-violet-bright`, `border-violet/40`, `bg-violet/[0.04]`, `text-coral/90`, `bg-coral/[0.03]`, `from-coral/30`, `bg-ink/60`, `text-cream/90`, `text-muted/70`, and the like. Tailwind v4 has no bare `violet` by default, so `--color-violet` is required for `bg-violet` to resolve. The numbered default palettes are untouched and unused.

After the `@theme` block, port the custom CSS from the old `<style>` blocks: `:root { color-scheme: dark }`, `body { background-color: #0B0918 }`, and the classes `.bg-field`, `.phone`, `.reveal` (+ `.reveal.in`), `.prose p` / `.prose strong`, and the science tab classes `.sci-tab` (+ `:hover`, `.is-active`, `.idx`), `.sci-panel[hidden]`, `.sci-top`, plus the `@media (min-width: 768px) { .sci-tab { width: 100% } }`, `::selection`, and the `prefers-reduced-motion` block. All of this exists verbatim in the three `html-design/*.html` files; lift it as-is. Use the richer `.bg-field` from `index.html` (it has the coral bottom glow) on every page for one cohesive background.

### Fonts

Replace the Instrument Sans font in `vite.config.js` with Outfit and Inter (both mirrored on Bunny Fonts):

```js
fonts: [
    bunny('Outfit', { weights: [200, 300, 400, 500, 600] }),
    bunny('Inter', { weights: [400, 500, 600] }),
],
```

The layout head uses the `@fonts` Blade directive (see `welcome.blade.php`) plus `@vite(['resources/css/app.css', 'resources/js/app.js'])`. Outfit is the display face (thin weights carry the headings and the app's timer numerals); Inter is the body.

### Palette meaning

Near-black indigo ground, violet accent, warm coral for the experiential material and the dial's lower arc, thin cream for large display type. Dark theme only, by design (the product is a nocturnal app). Do not add a light mode.

## Proposed structure

### Views and routes

Three page views: `home`, `programs`, `science`. A `PageController` with `home()`, `programs()`, `science()` returning them, wired to named routes `home`, `programs`, `science`. Use `route()` for internal links.

### Components (anonymous Blade, `resources/views/components/`)

- `layout` — the page shell: html, head (`@fonts`, `@vite`, title, meta description), `body.bg-field.font-body`, then a `{{ $slot }}`. Props: `title`, `description`. Header and footer can live inside the layout or be their own components pulled in by each page.
- `header` — top bar: brand mark + wordmark, a Programs link, and the CTA. Prop for the active page if you want a subtle active state.
- `footer` — full variant (link row + Trailhead credit + measurement and medical disclaimers) for the landing; a minimal variant (wordmark + Trailhead credit) for programs and science. One component with a `minimal` prop, or two components.
- `mark` — the conic-gradient logo dot (used in header and footer). Size prop.
- `cta` — the "Try free for a week" button. It is the single CTA across the whole site. Variants: solid (primary) and outline (header). Never let "Download" or "Get it on" become the headline; the store badges are the mechanism, not a competing CTA.
- `store-badges` — App Store + Google Play badges (hand-built inline SVG in the design; swap for official badge art before launch). Size prop for hero vs pricing.
- `band-tag` — the small program tag with a half-filled-circle icon, e.g. `Settles into Theta`, `Steady · Alpha`. Props: label, tone (violet for core, coral for experiential).
- `program-card` — a card for the programs page: name, teaser line, `band-tag`. Experiential cards use a coral register.
- `science.program` — a science-page program card: name, frequency, grade chip (tone by tier), and slotted grounding prose.
- `trailhead` — the "A Trailhead Labs product" credit: the mountain mark recolored to `currentColor` (muted, brightens on hover) linking to https://trailheadlabs.co. The raw brand blue `#30347f` is too dark on the near-black footer, so keep `currentColor`.

### Program data (single source for two pages)

The programs page and the science page both enumerate the same 17 programs, so store them once. A small class such as `App\Support\ProgramCatalog` (make it with `php artisan make:class`) returning an array keyed by group name is a good fit. Each program entry needs: `name`, `teaser` (short line for the programs page), `tag` (the bandLabel), `freq` (e.g. "6 Hz theta"), `grade` (e.g. "Moderate"), `tier` (`strong` | `weak` | `experiential`, which drives the grade-chip color), and `grounding` (the long science prose). Group meta needs: `experiential` (bool, drives coral styling and the shared exploration note) and `science_intro` (the one-line group lede on the science page).

Important: the group order differs per page. The programs page runs Focus & Energy, Calm & Meditation, Sleep & Wake, Experiential. The science page runs Calm & Meditation, Sleep & Wake, Focus & Energy, Experiential (strongest evidence first). Store keyed by group name and let each view declare its own order.

The authoritative content already exists: pull the 17 tags from `design/program-tags.md`, the short teasers from `html-design/programs.html`, and the frequencies, grades, tiers, and grounding prose from `science-page-content.md` (and its laid-out form in `html-design/science.html`). All frequencies and carriers were verified against the app source at `/Users/gwleuverink/Code/nativephp/hum-app/app/Programs/`; that repo is the source of truth if anything conflicts.

### The 17 tags (from design/program-tags.md)

Focus & Energy: Focus & Concentration `Steady · Beta`, Increased Attention `Steady · Gamma`, Learn & Memorize `Steady · Beta`, Creativity `Steady · Alpha`, Conscious Thinking `Steady · Alpha`, Energize `Steady · Beta`. Calm & Meditation: Relaxation `Settles into Theta`, Deep Meditation `Settles into Theta`, Intuition `Steady · Alpha`. Sleep & Wake: Lucid Dreaming `Settles into Theta`, Power Nap `Settles into Theta`, Restorative Sleep `Sinks to Delta`, Wake Up `Eases into Alpha`. Experiential: Astral Projection `Settles into Theta`, Out-of-Body Experience `Settles into Theta`, Deep Trance `Settles into Theta`, Schumann Resonance `Steady · Theta`.

## Page structure (per the reconciled spec)

The full, current structure and final copy live in `landing-page-structure.md`. Read it; it is the source of truth for section order and wording. Summary:

Landing (`home`), in order: hero (headline "Focus, sleep, wake, dream. One dial.", soundscape-led subline, CTA + store badges, the real app screen as a video-ready poster); A day with Humm (leads emotional, problem-first lead line); the three-step ritual (Pick, Set, Start, plus the "Humm tunes you" and depth lines); the engine (mixed fresh); programs teaser (four purpose rows linking to the programs page); the science briefly (confident, links to /science); what Humm doesn't do (values as refusals); pricing (one price, once, per device, lifetime, all future programs included); FAQ; closing CTA; footer.

Programs page: full 17-program catalogue in four groups, honest experiential framing, band tags, and a "Try free for a week" close.

Science page: the long version with a sticky sidebar secondary nav (tabs, one section shown at a time, deep-linkable by hash). Six sections: what binaural beats are; measurable vs debated; the constant carrier and its variants; how each program is grounded (the 17 graded cards); the session shape; accreditations and citations. The intro lede sits full width above the tabbed area; on desktop the intro and panels share one content column with the sidebar as a left gutter, breakpoint at `md` (768px), with a horizontal scrolling tab bar below the intro on mobile.

## Locked decisions (do not relitigate)

- Hero headline: "Focus, sleep, wake, dream. One dial."
- Subline leads the soothing soundscape, then names the research-backed binaurals.
- Lead emotional: A day with Humm sits directly under the hero, before the mechanics.
- Program detail lives on its own `/programs` page; the landing carries only a four-purpose teaser.
- Science voice is confident on the landing ("a response you can see on an EEG"); the full cited nuance (measurable response vs debated outcome) lives on `/science`.
- Pricing: free for a week, then one price once per device, lifetime, all future programs included.
- Mobile app: the CTA resolves to App Store + Google Play badges.
- Trailhead Labs product: footer credit links to trailheadlabs.co.
- Evidence honesty is carried in prose and on `/science`, not as a competing tag. The band tags describe the frequency journey, not evidence strength.

## Assets

In `html-design/assets/`: `hero-poster.png` (the real app session screen, used as the hero video poster) and `trailhead-labs.svg` (the mountain mark, inline it and recolor to `currentColor`). Copy the app-used images into `public/` (for example `public/assets/hero-poster.png`) and reference them from Blade; keep the originals in the docs archive too.

The hero is a `<video autoplay muted loop playsinline poster="/assets/hero-poster.png">` with a `/assets/hero-session.mp4` source. That mp4 does not exist yet; it is a known TODO. Until it lands the poster shows, which is the real device screen, so the hero is correct either way. The dial's cool-to-warm color and motion reference for producing that video is in `design/hero-dial-reference/`.

## JavaScript to port

Two behaviors, both currently vanilla:

- Scroll reveal (landing): an `IntersectionObserver` that adds `.in` to `.reveal` elements as they enter view, unobserving after. Disabled under reduced motion by the CSS.
- Science tabs: the `activate(name, scroll)` script that toggles `.is-active` on the tab buttons and `hidden` on the `.sci-panel`s, syncs `location.hash`, listens for `hashchange`, and scrolls `#sci-panels` into view on a user click (not on initial load). Lift it verbatim from `html-design/science.html`.

The hero video needs no JS (native attributes).

Alpine evaluation (do after the straight port works): the science tabs are the strongest Alpine candidate (an `x-data` with an `activeTab` string, `x-show` on panels, hash sync in an `init`). Reveal could use `@alpinejs/intersect`, though the vanilla observer is already tiny and respects reduced motion cleanly. Recommend Alpine only if it genuinely simplifies; report the tradeoff and let the user confirm the dependency, even though it is pre-approved to consider.

## Verify

- `npm run build` (or ask the user to run `npm run dev` / `composer run dev`) so Vite emits the manifest; otherwise Blade throws the Vite manifest error.
- Test responses first: curl `/`, `/programs`, `/science`, assert 200 and a signature line of copy each. A Pest feature test per route is better than ad hoc curl; a Pest browser smoke test across the three pages catches JS console errors cheaply.
- Use `browser-logs` for runtime errors, `get-absolute-url` for the real URL. Chrome screenshots only to confirm the visual once, since images are expensive.
- Run `vendor/bin/pint --dirty --format agent` after touching PHP.
- Then run the Boost `/laravel-code-simplifier`.

## Reference docs (keep, do not drop)

These carry the reasoning behind every decision. Preserve them intact; the user asked explicitly. They currently live in `html-design/` and this `docs/` folder. Consolidating them under `docs/` is fine; deleting any is not.

- `brand-and-marketing.md` — brand, values, positioning, naming, the marketing plan (Part 4 is the page blueprint).
- `frequency-research-synthesis.md` — the graded per-program research and the 28-source bibliography.
- `landing-page-structure.md` — the reconciled, current structure and final copy for all three pages. Read first.
- `science-page-content.md` — the Fable-written source content for the science page (what the built science.html renders).
- `design/program-tags.md` — the 17 bandLabel tags and how they derive from the app.
- `design/screenshots/` — the five real app screens and the observed design tokens.
- `design/hero-dial-reference/` — the dial's cool-to-warm color and motion, for the hero video.
- `html-design/index.html`, `programs.html`, `science.html` — the approved static build. Lift copy and the custom CSS from these verbatim.
