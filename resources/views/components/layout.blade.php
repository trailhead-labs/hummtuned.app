@props(['title', 'description' => null])

<!doctype html>
<html lang="en" class="scroll-smooth bg-field">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="theme-color" content="#0c0a1e" />

    {{-- Flag JS synchronously, before first paint, so collapsibles start closed
         with no open-to-closed flash. Without JS the class never lands and the
         CSS keeps every panel expanded (accessible fallback). --}}
    <script>document.documentElement.classList.add('js')</script>

    <title>{{ $title }}</title>
    @if ($description)
        <meta name="description" content="{{ $description }}" />
    @endif

    <link rel="icon" href="{{ asset('favicon.ico') }}?v={{ filemtime(public_path('favicon.ico')) }}" sizes="any" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}?v={{ filemtime(public_path('favicon-32.png')) }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16.png') }}?v={{ filemtime(public_path('favicon-16.png')) }}" />
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}?v={{ filemtime(public_path('apple-touch-icon.png')) }}" />

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-body text-cream/90 antialiased">
    {{ $slot }}
</body>
</html>
