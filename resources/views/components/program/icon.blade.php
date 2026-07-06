@props(['name', 'tone' => 'violet'])

@php
    // One isometric family. Every icon rests on ONE shared ground tile of the same
    // size and position, so the whole set reads as a single system seen from the
    // same angle. Faces are opaque so nothing shows through. A single focal element
    // per icon carries the glow and the dial's violet-to-warm gradient. Core
    // programs read violet, the experiential ones coral. Lit from the upper left.
    $isCoral = $tone === 'coral';
    $line = $isCoral ? '#E29070' : '#B7ABF2';
    $accent = $isCoral ? '#F2AC88' : '#A99BFF';
    $g0 = $isCoral ? '#F2AC88' : '#A99BFF';
    $g1 = $isCoral ? '#E0895E' : '#E5906A';

    // Opaque surface tints, a hair above the card so faces read yet occlude what
    // sits behind them. A lit top face and a dimmer side wall carry the light.
    $faceLit = $isCoral ? '#1d1626' : '#191338';
    $faceDim = $isCoral ? '#140f1a' : '#120e26';

    // Unique id per program so each card's gradient and glow resolve to its own defs.
    $uid = 'ico-'.substr(md5($name), 0, 6);

    // An isometric diamond (2:1) about a centre, returned as a path string.
    $diamond = function (float $cx, float $cy, float $w): string {
        $h = $w / 2;

        return "M{$cx} ".($cy - $h).' L'.($cx + $w)." {$cy} L{$cx} ".($cy + $h).' L'.($cx - $w)." {$cy} Z";
    };

    // The two visible side walls of an iso box whose top diamond centres on cx,cy.
    $walls = function (float $cx, float $cy, float $w, float $hgt) use ($faceDim): string {
        $h = $w / 2;
        $left = 'M'.($cx - $w)." {$cy} L{$cx} ".($cy + $h)." L{$cx} ".($cy + $h + $hgt).' L'.($cx - $w).' '.($cy + $hgt).' Z';
        $right = 'M'.($cx + $w)." {$cy} L{$cx} ".($cy + $h)." L{$cx} ".($cy + $h + $hgt).' L'.($cx + $w).' '.($cy + $hgt).' Z';

        return '<path d="'.$left.'" fill="'.$faceDim.'"/><path d="'.$right.'" fill="'.$faceDim.'"/>';
    };

    // A shallow iso box: two dim side walls under a lit top diamond.
    $slab = function (float $cx, float $cy, float $w, float $hgt) use ($walls, $diamond, $faceLit): string {
        return $walls($cx, $cy, $w, $hgt).'<path d="'.$diamond($cx, $cy, $w).'" fill="'.$faceLit.'"/>';
    };

    // The one shared ground tile. Top face centres at (70,146), spanning x30..110,
    // its lowest point at y172, so it clears the card edge with room to spare.
    $ground = $slab(70, 146, 40, 6);

    // Trapezoidal teeth around an isometric gear ellipse, evenly spaced.
    $gearTeeth = function (float $cx, float $cy, float $rx, float $ry, int $n, float $len) use ($faceLit): string {
        $out = '';
        $bw = M_PI / $n * 0.55;
        $tw = $bw * 0.6;
        $pt = function (float $a, float $ex, float $ey) use ($cx, $cy): string {
            return round($cx + $ex * cos($a), 1).' '.round($cy + $ey * sin($a), 1);
        };
        for ($i = 0; $i < $n; $i++) {
            $a = 2 * M_PI * $i / $n;
            $ox = $rx + $len;
            $oy = $ry + $len * 0.5;
            $out .= '<path d="M'.$pt($a - $bw, $rx, $ry).' L'.$pt($a - $tw, $ox, $oy).
                ' L'.$pt($a + $tw, $ox, $oy).' L'.$pt($a + $bw, $rx, $ry).' Z" fill="'.$faceLit.'"/>';
        }

        return $out;
    };

    // A crescent moon shared by the dream and sleep programs so they match.
    $crescent = function (float $cx, float $cy, float $r): string {
        $R = round($r * 1.06, 1);
        $top = $cy - $r;
        $bot = $cy + $r;

        return "M{$cx} {$top} A{$R} {$R} 0 1 0 {$cx} {$bot} A{$R} {$R} 0 0 1 {$cx} {$top} Z";
    };

    // A spiral funnelling inward and down into a lit well: the descent into depth.
    $vortex = '';
    $vN = 96;
    for ($i = 0; $i <= $vN; $i++) {
        $t = $i / $vN;
        $ang = $t * 2 * M_PI * 3.0;
        $rad = 17 * (1 - 0.9 * $t);
        $x = round(70 + $rad * cos($ang), 1);
        $y = round(143 + $rad * 0.5 * sin($ang) + $t * 5, 1);
        $vortex .= ($i === 0 ? 'M' : 'L')."{$x} {$y} ";
    }
@endphp

<svg viewBox="0 0 140 176" fill="none" {{ $attributes }}>
    <defs>
        <linearGradient id="{{ $uid }}-focal" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0" stop-color="{{ $g0 }}" />
            <stop offset="1" stop-color="{{ $g1 }}" />
        </linearGradient>
        <filter id="{{ $uid }}-glow" x="-40%" y="-40%" width="180%" height="180%">
            <feGaussianBlur stdDeviation="2.2" result="b" />
            <feMerge><feMergeNode in="b" /><feMergeNode in="SourceGraphic" /></feMerge>
        </filter>
    </defs>

    <g stroke="{{ $line }}" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" fill="none">
        @switch($name)
            @case('Focus & Concentration')
                {{-- a focused beam falling onto a target on the ground tile --}}
                <path d="M67 44 L73 44 L86 144 L54 144 Z" fill="url(#{{ $uid }}-focal)" opacity="0.1" stroke="none" />
                {!! $ground !!}
                <ellipse cx="70" cy="144" rx="28" ry="14" fill="none" opacity="0.55" />
                <ellipse cx="70" cy="144" rx="18" ry="9" fill="none" opacity="0.7" />
                <path d="M42 144 L98 144 M70 130 L70 158" opacity="0.45" />
                <ellipse cx="70" cy="144" rx="7" ry="3.5" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                @break

            @case('Increased Attention')
                {{-- a scanning beacon for sustained vigilance --}}
                <path d="M74 86 L128 70 L128 88 L74 92 Z" fill="url(#{{ $uid }}-focal)" opacity="0.13" stroke="none" />
                {!! $ground !!}
                <path d="M63 144 L66 92 L74 92 L77 144 Z" fill="{{ $faceLit }}" />
                <path d="M62 128 L78 128" opacity="0.55" />
                <path d="M63 112 L77 112" opacity="0.55" />
                <path d="M62 92 L78 92 L76 84 L64 84 Z" fill="{{ $faceLit }}" />
                <path d="M64 84 L76 84 L70 75 Z" fill="{{ $faceLit }}" />
                <circle cx="70" cy="88" r="4" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                @break

            @case('Learn & Memorize')
                {{-- a clean stack of study books with one marked volume on top --}}
                {!! $ground !!}
                {!! $slab(70, 138, 29, 6) !!}
                {!! $slab(70, 126, 25, 6) !!}
                {!! $slab(70, 115, 21, 5) !!}
                <path d="M55 122 L70 129 L85 122 M57 134 L70 140 L83 134" opacity="0.4" />
                <path d="M84 108 L84 116 L78 113" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                <path d="M56 115 L66 119 M74 112 L85 116" opacity="0.55" />
                @break

            @case('Creativity')
                {{-- a clear idea bulb with a small socket and rays --}}
                {!! $ground !!}
                <path d="M70 82 L70 73 M55 91 L50 84 M85 91 L90 84 M51 106 L43 106 M89 106 L97 106" opacity="0.5" />
                <circle cx="70" cy="106" r="18" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                <path d="M64 112 Q70 103 76 112" stroke="{{ $accent }}" opacity="0.75" />
                <path d="M61 124 L79 124 L76 137 L64 137 Z" fill="{{ $faceLit }}" />
                <path d="M62 129 L78 129 M63 133 L77 133" opacity="0.6" />
                @break

            @case('Conscious Thinking')
                {{-- two gears lying flat on the ground, near gear focal --}}
                {!! $ground !!}
                {!! $gearTeeth(85, 136, 11, 5.5, 9, 4) !!}
                <ellipse cx="85" cy="136" rx="11" ry="5.5" fill="{{ $faceLit }}" />
                <ellipse cx="85" cy="136" rx="4.5" ry="2.3" fill="none" />
                {!! $gearTeeth(58, 145, 14, 7, 11, 4.5) !!}
                <ellipse cx="58" cy="145" rx="14" ry="7" fill="{{ $faceLit }}" />
                <ellipse cx="58" cy="145" rx="14" ry="7" fill="none" stroke="{{ $accent }}" stroke-width="1.8" filter="url(#{{ $uid }}-glow)" />
                <ellipse cx="58" cy="145" rx="5" ry="2.5" fill="none" stroke="{{ $accent }}" />
                @break

            @case('Energize')
                {{-- an upright iso battery, bolt on one side face --}}
                {!! $ground !!}
                {!! $walls(70, 98, 22, 46) !!}
                <path d="{{ $diamond(70, 98, 22) }}" fill="{{ $faceLit }}" />
                {!! $walls(70, 89, 8, 5) !!}
                <path d="{{ $diamond(70, 89, 8) }}" fill="{{ $faceLit }}" />
                <path d="M86 111 L76 128 L82 128 L78 143 L92 121 L85 122 Z" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                @break

            @case('Relaxation')
                {{-- concentric ripples on the still pool of the ground tile --}}
                {!! $ground !!}
                <ellipse cx="70" cy="146" rx="30" ry="15" fill="none" opacity="0.5" />
                <ellipse cx="70" cy="146" rx="20" ry="10" fill="none" opacity="0.65" />
                <ellipse cx="70" cy="146" rx="10" ry="5" fill="none" stroke="{{ $accent }}" />
                <circle cx="70" cy="146" r="2.5" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                @break

            @case('Deep Meditation')
                {{-- a balanced stone cairn on the ground tile --}}
                {!! $ground !!}
                <ellipse cx="70" cy="140" rx="21" ry="9" fill="{{ $faceLit }}" />
                <ellipse cx="70" cy="126" rx="16" ry="7.5" fill="{{ $faceLit }}" />
                <ellipse cx="70" cy="114" rx="12" ry="6" fill="{{ $faceLit }}" />
                <ellipse cx="70" cy="103" rx="8.5" ry="5" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                @break

            @case('Intuition')
                {{-- an inward eye on the ground tile --}}
                {!! $ground !!}
                <path d="M38 146 Q70 123 102 146 Q70 169 38 146 Z" fill="{{ $faceDim }}" opacity="0.85" />
                <path d="M48 146 Q70 132 92 146 Q70 160 48 146 Z" fill="none" opacity="0.65" />
                <ellipse cx="70" cy="146" rx="8" ry="4" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                <circle cx="70" cy="146" r="2" fill="{{ $faceLit }}" stroke="none" />
                @break

            @case('Lucid Dreaming')
                {{-- a lucid moon and star, stripped down for card scale --}}
                {!! $ground !!}
                <path d="{{ $crescent(72, 104, 17) }}" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                <path d="M49 124 L49 132 M45 128 L53 128 M91 86 L91 94 M87 90 L95 90" opacity="0.55" />
                <path d="M58 144 Q70 138 82 144" opacity="0.45" />
                @break

            @case('Power Nap')
                {{-- a simple short-timer clock on the ground tile --}}
                {!! $ground !!}
                <ellipse cx="70" cy="126" rx="18" ry="16" fill="{{ $faceLit }}" />
                <ellipse cx="70" cy="126" rx="12" ry="10" fill="none" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                <path d="M70 126 L70 117 M70 126 L77 130" stroke="{{ $accent }}" />
                <path d="M60 126 L58 126 M82 126 L80 126 M70 116 L70 118 M70 134 L70 136" opacity="0.55" />
                @break

            @case('Restorative Sleep')
                {{-- a low bed with pillow and blanket, moon anchored above --}}
                {!! $ground !!}
                {!! $walls(70, 134, 34, 10) !!}
                <path d="{{ $diamond(70, 134, 34) }}" fill="{{ $faceLit }}" />
                <path d="{{ $diamond(52, 130, 9) }}" fill="{{ $faceDim }}" />
                <path d="M63 131 L82 140 M78 126 L96 134" opacity="0.45" />
                <path d="{{ $crescent(99, 94, 11) }}" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                @break

            @case('Wake Up')
                {{-- a sun cresting the ground tile with a few rays --}}
                {!! $ground !!}
                <path d="M48 145 A22 22 0 0 1 92 145 Z" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                <path d="M70 116 L70 108 M49 123 L43 117 M91 123 L97 117 M41 134 L33 131 M99 134 L107 131" stroke="{{ $accent }}" opacity="0.85" />
                @break

            @case('Astral Projection')
                {{-- a star-body lifting out of a resting body --}}
                {!! $ground !!}
                <ellipse cx="58" cy="143" rx="7" ry="3.5" fill="{{ $faceLit }}" />
                <path d="M63 140 Q75 134 88 139" opacity="0.55" />
                <path d="M70 136 C62 118 76 104 70 90" stroke="{{ $accent }}" opacity="0.6" filter="url(#{{ $uid }}-glow)" />
                <path d="M70 70 L75 83 L89 83 L78 92 L82 106 L70 98 L58 106 L62 92 L51 83 L65 83 Z" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                @break

            @case('Out-of-Body Experience')
                {{-- a luminous double separating from the body on the ground tile --}}
                {!! $ground !!}
                <ellipse cx="62" cy="143" rx="6" ry="3" fill="none" stroke="{{ $line }}" opacity="0.6" />
                <path d="M68 141 Q80 135 91 141" stroke="{{ $line }}" opacity="0.45" />
                <circle cx="84" cy="94" r="8" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                <path d="M84 102 C72 110 72 128 84 136 C96 128 96 110 84 102 Z" fill="url(#{{ $uid }}-focal)" opacity="0.62" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                @break

            @case('Deep Trance')
                {{-- a spiral funnelling down into a lit well in the ground tile --}}
                {!! $ground !!}
                <ellipse cx="70" cy="145" rx="21" ry="10.5" fill="{{ $faceDim }}" stroke="none" />
                <path d="{{ $vortex }}" fill="none" stroke="{{ $line }}" stroke-width="1.7" opacity="0.82" />
                <ellipse cx="70" cy="149" rx="6" ry="3" fill="url(#{{ $uid }}-focal)" opacity="0.95" stroke="none" filter="url(#{{ $uid }}-glow)" />
                @break

            @case('Schumann Resonance')
                {{-- an earthy planet above the tile, resonance waves behind and in front --}}
                {!! $ground !!}
                <path d="M40 126 A30 12 0 0 1 100 126" fill="none" opacity="0.4" />
                <path d="M48 126 A22 9 0 0 1 92 126" fill="none" opacity="0.55" />
                <circle cx="70" cy="126" r="14" fill="url(#{{ $uid }}-focal)" stroke="{{ $accent }}" filter="url(#{{ $uid }}-glow)" />
                <path d="M60 120 Q66 123 64 128 Q69 131 66 135" stroke="{{ $accent }}" opacity="0.55" />
                <path d="M77 123 Q81 126 79 130" stroke="{{ $accent }}" opacity="0.55" />
                <path d="M48 126 A22 9 0 0 0 92 126" fill="none" opacity="0.7" />
                <path d="M40 126 A30 12 0 0 0 100 126" fill="none" opacity="0.5" />
                @break
        @endswitch
    </g>
</svg>
