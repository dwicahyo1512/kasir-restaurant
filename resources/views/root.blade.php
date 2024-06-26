<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    @php
        $faviconPath = favicon();
    @endphp
    <link rel="icon" href="{{ asset($faviconPath) }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @spladeHead
</head>

<body class="font-sans antialiased">
    @splade
</body>

</html>
