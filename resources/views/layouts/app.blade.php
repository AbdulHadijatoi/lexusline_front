<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Dynamic Title with Default Fallback -->
    <title>@yield('title', 'Lexusline')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    
    @yield('styles') <!-- Section for additional page-specific styles -->
</head>
{{-- <body class="font-sans antialiased dark:bg-black dark:text-white/50"> --}}
<body class="font-sans antialiased">
    <div class="nav">
        @include('components.navbar')
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <footer class="bg-white">
        @include('components.footer')
    </footer>

    <script src="{{ asset('assets/script.js') }}"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    @yield('scripts') <!-- Section for additional page-specific scripts -->
</body>
</html>
