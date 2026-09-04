<?php

use App\Support\ProgramCatalog;

it('renders the landing page', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Focus, sleep,', false)
        ->assertSee('One dial.', false)
        ->assertSee('Buy it once. Own it for life.');
});

it('keeps the placeholder testimonials off the page until real reviews land', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertDontSee('In their words')
        ->assertDontSee("Trusted for what it doesn't do.", false)
        ->assertDontSee('Placeholder reviews');
});

it('renders the FAQ as accessible button disclosures', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    expect(substr_count($html, 'aria-controls="faq-answer-'))->toBe(9)
        ->and(substr_count($html, 'class="faq-answer"'))->toBe(9)
        ->and(substr_count($html, 'aria-expanded="true"'))->toBe(1);
});

it('renders the programs page with all seventeen programs', function () {
    $response = $this->get(route('programs'))
        ->assertOk()
        ->assertSee('The full catalogue.')
        ->assertSee('Seventeen programs, four purposes');

    foreach (array_keys(ProgramCatalog::programs()) as $name) {
        $response->assertSee($name);
    }
});

it('renders the science page with grounding and citations', function () {
    $this->get(route('science'))
        ->assertOk()
        ->assertSee('The science behind Humm.')
        ->assertSee('How each program is grounded')
        ->assertSee('Accreditations and citations')
        ->assertSee('Ingendoh, Posny &amp; Heine', false);
});

it('links pages by named route rather than a static file path', function () {
    $this->get(route('home'))
        ->assertSee(route('programs'), false)
        ->assertSee(route('science'), false)
        ->assertDontSee('programs.html')
        ->assertDontSee('science.html');
});

it('exposes the same seventeen programs to both pages in a different order', function () {
    $programsOrder = collect(ProgramCatalog::forProgramsPage())
        ->flatMap(fn (array $group) => collect($group['programs'])->pluck('name'));

    $scienceOrder = collect(ProgramCatalog::forSciencePage())
        ->flatMap(fn (array $group) => collect($group['programs'])->pluck('name'));

    expect($programsOrder)->toHaveCount(17)
        ->and($scienceOrder)->toHaveCount(17)
        ->and($programsOrder->sort()->values())->toEqual($scienceOrder->sort()->values())
        ->and($programsOrder->values())->not->toEqual($scienceOrder->values());
});

it('links the live App Store listing and marks Google Play as coming soon', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    expect($html)->toContain('href="'.config('store.app_store_url').'"')
        ->and($html)->toContain('app-id='.config('store.app_store_id'))
        ->and($html)->toContain('Download on the')
        ->and($html)->toContain('Coming soon to')
        ->and($html)->not->toContain('href="#"')
        ->and($html)->not->toContain('Coming soon!');
});
