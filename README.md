# Humm marketing site

The marketing site for **Humm**, a mobile app that plays research-grounded binaural programs inside a soundscape that is mixed fresh every session. A [Trailhead Labs](https://trailheadlabs.co) product.

The app ships on the App Store and Google Play; this repo is just the site that markets it.

## Pages

Three pages, all server-rendered Blade, one dark design system.

- **`/` (home)** the landing page: hero, "a day with Humm", the three-step ritual, the generative engine, a programs teaser, the science in brief, the values, pricing, FAQ, and the closing call to action.
- **`/programs`** the full catalogue of the seventeen programs across four purposes, each with an honest evidence tag.
- **`/science`** the long-form research page, a tabbed reference covering what binaural beats are, what is measurable versus debated, the constant carrier and its variants, how each program is grounded, the session shape, and the full citations. Two custom SVG illustrations live here: an animated binaural-beat diagram and a session-shape line.

## Stack

- PHP 8.4, Laravel 13
- Tailwind CSS v4 (configured in CSS via `@theme`, no JS config), bundled with Vite
- Outfit + Inter fonts served locally through the `laravel-vite-plugin` Bunny helper (no CDN)
- Pest for tests, Pint for formatting
- [Laravel Boost](https://laravel.com/docs/ai) for AI-assisted development (`.mcp.json`)

## Local development

Served by [Laravel Herd](https://herd.laravel.com) at `http://humm-site.test`. Build the front-end assets before viewing:

```bash
composer install
npm install
npm run dev      # or: npm run build
```

If a page throws a Vite manifest error, the assets have not been built yet; run one of the commands above.

## How it is put together

- **Routes** (`routes/web.php`) map `/`, `/programs`, and `/science` to their views with `Route::view`, named `home`, `programs`, and `science`. Internal links use `route()`.
- **Program data** lives once in `app/Support/ProgramCatalog.php` and feeds both the programs page and the science page. The group order differs per page, so the class exposes `forProgramsPage()` and `forSciencePage()`.
- **Components** (`resources/views/components/`): `layout`, `header`, `footer`, `mark`, `cta`, `store-badges`, `band-tag`, `program-card`, `trailhead`, plus a `science/` set (`program`, `next`, `session-shape`, `binaural`).
- **Styles** in `resources/css/app.css`: the Tailwind theme (palette and fonts) plus the custom classes for the background field, the hero phone, scroll reveals, the science tabs, the FAQ accordion, and the SVG draw and beat animations.
- **Scripts** in `resources/js/app.js`: scroll reveal, the science-page tabs (deep-linkable by hash), the FAQ accordion (progressive enhancement, answers stay open without JS), and the in-view trigger that plays the SVG graphics only once they scroll into view. All motion respects `prefers-reduced-motion`.
- **Assets** in `public/`: the hero poster (`assets/hero-poster.png`, awaiting a `hero-session.mp4`), the app icon (`icon.png`, 1024x1024 per the NativePHP spec), and the favicon set, all generated from the dial mark.

## Design system

Dark and nocturnal by design (the product is a nighttime app, so there is no light mode). Near-black indigo ground, a violet accent, warm coral for the experiential and the beat, and thin cream display type. The recurring motif is the app's timer dial: it is the logo mark, the favicon and app icon, and the color language (violet to coral) that runs through the SVG illustrations.

## Reference docs

The reasoning behind the copy, the research, and the design is preserved and should not be deleted.

- `docs/laravel-migration-handoff.md` the handoff written when the static design moved into Laravel.
- `html-design/` the approved static build plus the source docs: `brand-and-marketing.md`, `frequency-research-synthesis.md`, `landing-page-structure.md` (the reconciled structure and copy), `science-page-content.md`, and `design/` (screenshots, the hero-dial reference, and the program-tag mapping).

The science content is grounded in the app's own source; every frequency, carrier, and grade was verified against it, and every scientific claim traces to a cited source.

## Testing and formatting

```bash
php artisan test --compact
vendor/bin/pint --dirty --format agent
```
