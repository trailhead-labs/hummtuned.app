<x-layout
    title="Terms · Humm"
    description="The terms for buying and using Humm: a personal, per-device license, honest about payment, the sound library, safe use, and the usual disclaimers."
>
    <x-header back />

    <article class="mx-auto max-w-3xl px-6 pb-24 pt-6 lg:pt-10">
        <p class="mb-4 text-sm uppercase tracking-[0.2em] text-violet-soft/70">The agreement</p>
        <h1 class="font-display text-5xl font-extralight leading-[1.05] text-cream sm:text-[3.25rem]">Terms.</h1>

        <div class="prose mt-7 max-w-2xl text-[17px] leading-relaxed text-muted">
            <p>These are the terms for buying and using Humm. We have kept them short and readable. By downloading, installing, or using the app, you agree to them.</p>
        </div>

        {{-- The short version --}}
        <div class="mt-14">
            <div class="grid gap-x-10 sm:grid-cols-2">
                <div class="flex items-start gap-3 border-b border-white/5 py-3 text-cream/90"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> Buy it once, per device, and it is yours to keep.</div>
                <div class="flex items-start gap-3 border-b border-white/5 py-3 text-cream/90"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> A personal license, for your own use, not for resale.</div>
                <div class="flex items-start gap-3 border-b border-white/5 py-3 text-cream/90"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> The App Store and Google Play handle payment and refunds.</div>
                <div class="flex items-start gap-3 border-b border-white/5 py-3 text-cream/90"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-coral"></span> Humm is not a medical device, and nothing here is medical advice.</div>
            </div>
        </div>

        {{-- Parties --}}
        <section class="mt-16">
            <h2 class="font-display text-2xl font-extralight text-cream">Who this is between</h2>
            <div class="prose mt-5 max-w-2xl text-[17px] leading-relaxed text-muted">
                <p>Humm is made by Trailhead Labs ("we", "us"). These terms are between you and us. If you do not agree with them, please do not use the app.</p>
            </div>
        </section>

        {{-- License --}}
        <section class="mt-14">
            <h2 class="font-display text-2xl font-extralight text-cream">Your license to use Humm</h2>
            <div class="prose mt-5 max-w-2xl text-[17px] leading-relaxed text-muted">
                <p>When you buy Humm, we grant you a personal, non-exclusive, non-transferable license to use the app on your own device, for as long as the device and its operating system support it. The license is per device, plainly, as stated at purchase.</p>
                <p>You may not resell, rent, or redistribute the app, and you may not copy, reverse-engineer, or extract the sound library for use outside Humm. The app and its design remain ours; the recordings remain under their own licenses, described below.</p>
            </div>
        </section>

        {{-- Payment --}}
        <section class="mt-14">
            <h2 class="font-display text-2xl font-extralight text-cream">Trial, payment, and refunds</h2>
            <div class="prose mt-5 max-w-2xl text-[17px] leading-relaxed text-muted">
                <p>Humm is free to try for a week, with full access. After that it is a single purchase, once, per device, with no subscription. All future programs are included.</p>
                <p>Your trial and your purchase are handled by the App Store or Google Play under their own terms. We do not process payments and never see your card details. Refunds are handled by the store you bought from, under that store's policy, so a refund request goes to Apple or Google rather than to us.</p>
            </div>
        </section>

        {{-- The sounds --}}
        <section class="mt-14">
            <h2 class="font-display text-2xl font-extralight text-cream">The sounds</h2>
            <div class="prose mt-5 max-w-2xl text-[17px] leading-relaxed text-muted">
                <p>Humm's soundscapes are built from recordings licensed under Creative Commons, credited on the <a href="{{ route('credits') }}" class="text-violet-soft transition hover:text-violet-bright">sound credits</a> page. Your license to use Humm lets you listen inside the app; it does not grant you rights to extract, redistribute, or reuse those recordings on their own.</p>
            </div>
        </section>

        {{-- Health --}}
        <section class="mt-14">
            <h2 class="font-display text-2xl font-extralight text-cream">Health and safe use</h2>
            <div class="prose mt-5 max-w-2xl text-[17px] leading-relaxed text-muted">
                <p>Humm supports focus, rest, and relaxation. It is not a medical device, it does not diagnose or treat any condition, and nothing in the app or on this site is medical advice.</p>
                <p>Please listen responsibly. Keep the volume at a comfortable, moderate level to protect your hearing, and never run a relaxation or sleep program while driving or operating machinery. If you have epilepsy or a seizure disorder, a heart condition, or are pregnant, talk to a doctor before using brainwave entrainment. If anything feels uncomfortable, stop and take the headphones off.</p>
            </div>
        </section>

        {{-- Disclaimer --}}
        <section class="mt-14">
            <h2 class="font-display text-2xl font-extralight text-cream">What we can and can't promise</h2>
            <div class="prose mt-5 max-w-2xl text-[17px] leading-relaxed text-muted">
                <p>We build Humm with care and stand behind it, but people and circumstances differ, so we cannot promise any specific result. The app is provided as it is. To the extent the law allows, we are not liable for indirect or incidental loss arising from its use, and nothing here limits rights you have under the consumer law that applies to you.</p>
            </div>
        </section>

        {{-- Changes --}}
        <section class="mt-14 border-t border-white/8 pt-8">
            <div class="prose max-w-2xl text-[15px] leading-relaxed text-muted/80">
                <p>We may update the app and, from time to time, these terms. For anything material we will say so plainly and update the date below. These terms are governed by the laws of the Netherlands.</p>
                <p>Questions? Write to us at <a href="mailto:willem@leuver.ink" class="text-violet-soft transition hover:text-violet-bright">willem@leuver.ink</a>. Humm is made by <a href="https://trailheadlabs.co" class="text-violet-soft transition hover:text-violet-bright">Trailhead Labs</a>.</p>
                <p class="text-muted/60">Last updated July 2026.</p>
            </div>
        </section>
    </article>

    <x-footer minimal />
</x-layout>
