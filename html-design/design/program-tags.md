# Program tags (source of truth)

The small tag under each program on the site is the app's own selector label. It is **not** an evidence grade; it describes the session's frequency journey: which brainwave band the program targets, and how it gets there (eases, settles, sinks, builds, or holds steady). Reuse these verbatim so the site and the app match.

## How the tag is derived

From `app/Programs/Program.php` (`bandLabel()`), based on each program's dwell frequency and session shape:

**Band** comes from the dwell frequency:

| Dwell Hz | Band |
|---|---|
| < 4.0 | Delta |
| < 8.0 | Theta |
| < 13.0 | Alpha |
| < 30.0 | Beta |
| ≥ 30.0 | Gamma |

**Verb** comes from the shape. If the session has no buildup (entry and exit both equal the dwell), the tag is `Steady · <Band>`. Otherwise a journey verb is chosen by the target band:

| Target band | Verb |
|---|---|
| Alpha | Eases into |
| Theta | Settles into |
| Delta | Sinks to |
| Beta / Gamma | Builds to |

## The 17 tags

| Program | Group | Dwell Hz | Tag |
|---|---|---|---|
| Focus & Concentration | Focus & Energy | 15 | `Steady · Beta` |
| Increased Attention | Focus & Energy | 40 | `Steady · Gamma` |
| Learn & Memorize | Focus & Energy | 15 | `Steady · Beta` |
| Creativity | Focus & Energy | 10 | `Steady · Alpha` |
| Conscious Thinking | Focus & Energy | 12 | `Steady · Alpha` |
| Energize | Focus & Energy | 15 | `Steady · Beta` |
| Relaxation | Calm & Meditation | 5 (enters 8) | `Settles into Theta` |
| Deep Meditation | Calm & Meditation | 6 (enters 8) | `Settles into Theta` |
| Intuition | Calm & Meditation | 8 | `Steady · Alpha` |
| Lucid Dreaming | Sleep & Wake | 5 (enters 8) | `Settles into Theta` |
| Power Nap | Sleep & Wake | 6 (enters 8) | `Settles into Theta` |
| Restorative Sleep | Sleep & Wake | 3 (enters 7) | `Sinks to Delta` |
| Wake Up | Sleep & Wake | 11 (enters 4) | `Eases into Alpha` |
| Astral Projection | Experiential | 6 (enters 8) | `Settles into Theta` |
| Out-of-Body Experience | Experiential | 4 (enters 8) | `Settles into Theta` |
| Deep Trance | Experiential | 4 (enters 8) | `Settles into Theta` |
| Schumann Resonance | Experiential | 7.83 | `Steady · Theta` |

## Notes

- Six tags are confirmed against app screenshots (Relaxation, Deep Meditation, Intuition, Lucid Dreaming, Power Nap, Restorative Sleep). The rest are computed from the same `bandLabel()` logic on the ratified frequencies, so they match what the app renders.
- In the app selector, the tag sits beside a small half-filled circle icon (see `design/screenshots/05-program-selector.png`). Match that treatment on the site or adapt it, but keep the wording exact.
- If a program's frequency or shape changes in the app, its tag changes too. This file follows the app; the app is the source of truth.
