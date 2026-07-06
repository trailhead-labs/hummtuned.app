# App screenshots (source of truth for the site's visual language)

Real UI from the Humm app. The landing page should feel like these screens: quiet, dark, unhurried, with one glowing focal point. Pull the palette, type feel, and the dial motif straight from here rather than inventing a new look.

## The focal point: the dial

**The circular timer dial is the hero of the product and should be the hero of the page.** It is a thin-ring progress circle with a soft purple glow that travels the arc, a play triangle at center, and the countdown set large above it. Everything else in the UI is deliberately quiet so the dial carries the attention. Build the site's hero around it: it is the signature element, not a decorative accent.

## The screens

| File | Screen | What it shows the design agent |
|---|---|---|
| `01-session-dial-relaxation.png` | Active session | The dial (focal point), the large thin countdown numerals, program title in purple, one-line description, "builds up over ~2 min" pacing hint. Bottom corners: mix visualizer and volume, kept minimal. |
| `02-program-sheet-restorative-sleep.png` | Program info sheet | The "Pick" step. Short sheet with title, description, "How to use it," and "Recommended length." This is the plain-language guidance the ritual (§2) refers to. |
| `03-pacing-panel.png` | Pacing controls | The hidden depth (§2 depth line, §7 values). Start hold / Buildup / Ramp down / End hold sliders, End chime toggle, Reset to defaults. Proof that depth exists for those who go looking. |
| `04-sounds-panel.png` | Sound mix | More hidden depth. Per-layer levels (Binaural Beats, Nature Sounds, Melodies/Bells/Effects, End Sound), mix-shift frequency, and the "In the mix" track list. This is the generative engine (§3) made tangible. |
| `05-program-selector.png` | Program list | The four purpose groups as cards (Calm & Meditation, Sleep & Wake shown). Each card: title, one-line description, and an honest band tag ("Settles into Theta," "Sinks to Delta," "Steady · Alpha"). Directly informs §5 program list and the evidence-tag idea. |

## Observed design tokens (read from the screens, confirm before committing)

- **Background:** very dark desaturated indigo, near-black at the top fading to a slightly warmer deep purple. Not pure black.
- **Primary accent:** soft violet/purple (~#8B7FE8-ish), used for the dial glow, active program titles, sliders, toggles, and tags.
- **Timer numerals:** large, thin-weight, warm off-white/cream. This is the one place type gets big and characterful.
- **Body/labels:** muted lavender-grey for secondary text, near-white for primary.
- **Components:** fully-rounded pill sliders and toggles, rounded cards with a faint lighter fill, generous vertical spacing, no hard rules or borders.
- **Mood:** calm, spacious, nocturnal. Lots of negative space around the dial. Nothing shouts.

> **For the design agent:** the site's dark theme should derive from these values. The dial glow is the accent color's job; keep everything else restrained so the glow reads. Light mode, if built, should be a deliberate translation of this mood, not a default invert.
