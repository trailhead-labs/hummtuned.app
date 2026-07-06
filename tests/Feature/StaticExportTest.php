<?php

use Illuminate\Support\Facades\Route;

it('includes every page route in the static export paths', function () {
    $pageUris = collect(Route::getRoutes()->get('GET'))
        ->keys()
        ->reject(fn (string $uri) => str_starts_with($uri, '_'))
        ->reject(fn (string $uri) => str_contains($uri, '{') || $uri === 'up')
        ->map(fn (string $uri) => trim($uri, '/') ?: '/')
        ->values();

    $exportPaths = collect(config('export.paths'))
        ->map(fn (string $path) => trim($path, '/') ?: '/');

    expect($exportPaths->all())->toEqualCanonicalizing($pageUris->all());
});
