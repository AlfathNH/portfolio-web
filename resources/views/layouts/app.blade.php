<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0f172a">

    {{-- SEO Meta Tags --}}
    <title>{{ config('portfolio.name') }} | Portfolio</title>
    <meta name="description" content="Portfolio of {{ config('portfolio.name') }} — {{ config('portfolio.tagline') }}.">
    <meta name="keywords" content="Alfath Noorislami, portfolio, web developer, UI UX designer, Laravel developer, Subang, POLSUB">
    <meta name="author" content="{{ config('portfolio.name') }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ config('portfolio.name') }} | Portfolio">
    <meta property="og:description" content="{{ config('portfolio.tagline') }}">
    <meta property="og:image" content="{{ config('portfolio.avatar_url') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ config('portfolio.name') }} | Portfolio">
    <meta name="twitter:description" content="{{ config('portfolio.tagline') }}">
    <meta name="twitter:image" content="{{ config('portfolio.avatar_url') }}">

    {{-- Devicon CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">

    {{-- Vite (Tailwind CSS + Alpine.js) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Pass PHP data to JS --}}
    <script>
        window.__portfolioRoles = @json(config('portfolio.roles'));
        window.__portfolioConfig = {
            chatbotEnabled: {{ config('portfolio.chatbot_enabled') ? 'true' : 'false' }},
            github: '{{ config('portfolio.github') }}',
        };
    </script>
</head>

<body x-data>

    {{-- ── Navbar ── --}}
    @include('sections.navbar')

    {{-- ── Page Content ── --}}
    <main>
        @yield('content')
    </main>

    {{-- ── Footer ── --}}
    @include('sections.footer')

    {{-- ── AI Chatbot Widget ── --}}
    @include('sections.chatbot')

</body>
</html>
