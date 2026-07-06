# Hero dial: color and motion reference

Three frames of the same dial (Deep Trance session) captured at different arc positions. The point of this set is the **color of the ring and how the glowing head travels it**, so the design agent can rebuild the dial as an animation or video for the hero. The countdown value differs per frame and is not what matters here; the arc position and its color are.

## Frames (in order of progression)

| File | Arc / head position | Colors visible |
|---|---|---|
| `dial-arc-01-early-violet-head.png` | Glowing head near the top-left, arc just underway | Head is bright violet with a soft bloom; the trailing ring already shows the full gradient, cool violet up top fading to warm terracotta along the bottom |
| `dial-arc-02-mid-right.png` | Head on the lower-right, arc further along | Bright violet head, strongest top glow of the three; ring holds violet (top) to warm copper (bottom) |
| `dial-arc-03-bottom-warm-head.png` | Head at the bottom, arc nearly full | Head has traveled into the **warm terracotta/orange** part of the gradient and glows warm; top of the ring sits in cool violet/periwinkle |

## The key insight for animation

The ring is a **gradient that runs cool to warm around the circle**: violet and periwinkle across the top, shifting through lavender down the sides, into terracotta/coral at the bottom. A **glowing leading head** travels clockwise along this gradient, so its color changes as it moves: it starts cool violet and warms toward coral as it reaches the bottom. There is a soft outer bloom around the head that picks up whatever color the head currently sits in.

This cool-to-warm sweep is the emotional arc of a session made visible: cool and alert at the top, warm and settled at the bottom. Reuse it as the hero's signature motion.

## Approximate colors (eyeball from frames; sample the PNGs for exact values)

- **Cool head / top of ring:** vivid violet, roughly `#7B6EF0` to `#9B8CFF`
- **Mid ring:** muted lavender / periwinkle
- **Warm head / bottom of ring:** terracotta to coral, roughly `#C77B5A` to `#E08A5F`
- **Bloom:** low-opacity version of the head's current color, wide and soft
- **Background:** the same near-black indigo as the rest of the app (see `../screenshots/README.md`)

> **For the design agent:** treat the dial as a stroked circle with an angular (conic) gradient plus a bright animated head and glow. The hero can loop the head traveling the ring, or play it once on load as the "single deliberate motion" the structure doc calls for. Sample exact hex values straight from these PNGs rather than trusting the estimates above.
