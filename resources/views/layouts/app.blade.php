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

    {{-- Google Fonts: Inter, JetBrains Mono, and Persona 5 Fonts (Anton, Space Grotesk, Chivo) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Chivo:ital,wght@0,400;0,700;0,900;1,900&family=Inter:ital,opsz,wght@0,14..32,400..900;1,14..32,400..900&family=JetBrains+Mono:wght@400;600;700&family=Space+Grotesk:wght@500;700;900&display=swap" rel="stylesheet">

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

        // Theme & Easter Egg Reset: Enforce Night/Cerah on refresh & clear P5
        (function() {
            try {
                localStorage.removeItem('p5_theme_active');
                localStorage.removeItem('p5_discovered');
                const saved = localStorage.getItem('portfolio_theme');
                // Default to dark (Night mode) if unset; if 'light', use light (Cerah mode)
                const isDark = saved ? (saved === 'dark') : true;
                if (isDark) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {}
        })();
    </script>
</head>

<body x-data>

    {{-- ★ PERSONA 5 TOP WARNING TAPE (Only visible when p5-theme active) ★ --}}
    <div id="p5-marquee-banner" aria-hidden="true">
        <div class="p5-marquee-content">
            <span>★ TAKE YOUR HEART ★</span>
            <span>PHANTOM THIEVES OF TECH</span>
            <span>/// SYSTEM ONLINE: STATUS LEVEL 99 ///</span>
            <span>ALFATH NOORISLAMI HERAWANSYAH</span>
            <span>★ ALL-OUT ATTACK ACTIVATED ★</span>
            <span>DEVELOPER &amp; UI/UX SPECIALIST</span>
            <span>★ TAKE YOUR HEART ★</span>
            <span>POLSUB INFORMATION SYSTEMS</span>
            <span>★ TAKE YOUR HEART ★</span>
            <span>PHANTOM THIEVES OF TECH</span>
            <span>/// SYSTEM ONLINE: STATUS LEVEL 99 ///</span>
            <span>ALFATH NOORISLAMI HERAWANSYAH</span>
            <span>★ ALL-OUT ATTACK ACTIVATED ★</span>
            <span>DEVELOPER &amp; UI/UX SPECIALIST</span>
        </div>
    </div>

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

    {{-- ★ PERSONA 5 EASTER EGG ELEMENTS ★ --}}
    {{-- Splash overlay: red flash when theme activates --}}
    <div id="p5-splash" aria-hidden="true">
        <div id="p5-splash-text">PERSONA 5</div>
        <div id="p5-splash-sub">★ Take Your Heart ★</div>
    </div>
    {{-- Wipe-in mask --}}
    <div id="p5-splash-mask" aria-hidden="true"></div>
    {{-- Toggle button: appears after Easter Egg discovered in active session --}}
    <button id="p5-toggle-btn" aria-label="Toggle Persona 5 Theme" title="Toggle Persona 5 Theme">★</button>
    {{-- Notification Toast --}}
    <div id="p5-notification" aria-live="polite" aria-atomic="true"></div>

</body>

</html>
