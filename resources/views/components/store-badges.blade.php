@props(['size' => 'hero'])

{{--
    Hand-built App Store and Google Play badges; swap for the official badge art
    before launch. The hero size carries the two-line store labels; the compact
    size sits under the pricing card as a plain pair of pills.
--}}
@if ($size === 'compact')
    <div {{ $attributes->merge(['class' => 'flex items-center justify-center gap-3']) }}>
        <a href="#" class="inline-flex items-center gap-2 rounded-lg border border-white/12 bg-white/[0.03] px-3 py-2 text-sm text-cream/80 transition hover:border-white/25">
            <svg viewBox="0 0 384 512" class="h-5 w-5 fill-cream/90"><path d="M318.7 268c-.3-37 16.4-65 50.1-85-18.8-27-47.2-42-84.7-45-35.5-3-74 21-88 21-14.7 0-49-20-76-20-56 1-115 44-115 132 0 26 5 53 15 81 13 37 60 128 109 126 25-1 43-18 76-18 32 0 48 18 76 18 49-1 92-83 105-120-67-32-63-93-63-96zM255 90c25-30 22-58 21-68-21 1-46 14-60 30-16 18-25 40-23 65 23 2 44-10 62-27z"/></svg>
            App Store
        </a>
        <a href="#" class="inline-flex items-center gap-2 rounded-lg border border-white/12 bg-white/[0.03] px-3 py-2 text-sm text-cream/80 transition hover:border-white/25">
            <svg viewBox="0 0 512 512" class="h-5 w-5"><path fill="#00d2ff" d="M48 59v394c0 8 4 14 10 17l229-214L58 42c-6 3-10 9-10 17z"/><path fill="#00e676" d="M58 42l229 214 63-59L86 28c-11-6-22-2-28 14z"/><path fill="#ffea00" d="M350 197l71 39c17 10 17 33 0 43l-71 39-66-80z"/><path fill="#ff3d00" d="M58 470l229-214 63 59L86 484c-11 6-22 2-28-14z"/></svg>
            Google Play
        </a>
    </div>
@else
    <div {{ $attributes->merge(['class' => 'flex flex-wrap items-center gap-3']) }}>
        <a href="#" class="inline-flex items-center gap-2.5 rounded-xl border border-white/12 bg-white/[0.03] px-4 py-2.5 transition hover:border-white/25">
            <svg viewBox="0 0 384 512" class="h-6 w-6 fill-cream/90"><path d="M318.7 268c-.3-37 16.4-65 50.1-85-18.8-27-47.2-42-84.7-45-35.5-3-74 21-88 21-14.7 0-49-20-76-20-56 1-115 44-115 132 0 26 5 53 15 81 13 37 60 128 109 126 25-1 43-18 76-18 32 0 48 18 76 18 49-1 92-83 105-120-67-32-63-93-63-96zM255 90c25-30 22-58 21-68-21 1-46 14-60 30-16 18-25 40-23 65 23 2 44-10 62-27z"/></svg>
            <span class="text-left leading-tight"><span class="block text-[10px] uppercase tracking-wide text-muted">Download on the</span><span class="block text-sm font-semibold text-cream">App Store</span></span>
        </a>
        <a href="#" class="inline-flex items-center gap-2.5 rounded-xl border border-white/12 bg-white/[0.03] px-4 py-2.5 transition hover:border-white/25">
            <svg viewBox="0 0 512 512" class="h-6 w-6"><path fill="#00d2ff" d="M48 59v394c0 8 4 14 10 17l229-214L58 42c-6 3-10 9-10 17z"/><path fill="#00e676" d="M58 42l229 214 63-59L86 28c-11-6-22-2-28 14z"/><path fill="#ffea00" d="M350 197l71 39c17 10 17 33 0 43l-71 39-66-80z"/><path fill="#ff3d00" d="M58 470l229-214 63 59L86 484c-11 6-22 2-28-14z"/></svg>
            <span class="text-left leading-tight"><span class="block text-[10px] uppercase tracking-wide text-muted">Get it on</span><span class="block text-sm font-semibold text-cream">Google Play</span></span>
        </a>
    </div>
@endif
