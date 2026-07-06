@props(['title', 'description' => null])

<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $title }}</title>
    @if ($description)
        <meta name="description" content="{{ $description }}" />
    @endif

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-field font-body text-cream/90 antialiased">
    {{ $slot }}
</body>
</html>
