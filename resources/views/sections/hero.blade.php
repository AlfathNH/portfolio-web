{{-- ── Hero Section ── --}}
<section id="home" class="relative min-h-screen flex flex-col justify-center items-center text-center px-6 pt-24 pb-16 z-10">

    {{-- Animated background gradient orbs --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-600/10 dark:bg-primary-600/5 rounded-full blur-3xl animate-pulse-soft"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-indigo-600/8 dark:bg-indigo-600/4 rounded-full blur-3xl animate-pulse-soft" style="animation-delay: 1s;"></div>
    </div>

    {{-- Profile Avatar --}}
    <div class="relative mb-8 z-10 fade-up">
        <div class="absolute inset-[-3px] rounded-full bg-gradient-to-br from-primary-600 to-indigo-500 z-0"></div>
        <img src="{{ config('portfolio.avatar_url') }}"
             alt="{{ config('portfolio.name') }}"
             class="relative w-32 h-32 rounded-full border-[3px] border-white dark:border-dark-bg object-cover shadow-lg z-10"
             loading="eager">
        {{-- Online indicator --}}
        <div class="absolute bottom-1 right-1 w-5 h-5 bg-emerald-500 rounded-full border-2 border-white dark:border-dark-bg z-20 shadow-sm"></div>
    </div>

    {{-- Availability Badge --}}
    @php
        $availabilityKey = config('portfolio.availability');
        $availabilityLabel = config("portfolio.availability_labels.{$availabilityKey}", 'Open to Work');
    @endphp
    <div class="hero-badge fade-up z-10" style="animation-delay: 0.1s;">
        {{ $availabilityLabel }}
    </div>

    {{-- Name --}}
    <h1 class="text-5xl sm:text-6xl md:text-7xl font-black tracking-tight leading-[1.05] mb-4 z-10 fade-up" style="animation-delay: 0.15s;">
        Alfath <span class="text-gradient">Noorislami</span> H.
    </h1>

    {{-- Subtitle with typed animation --}}
    <p class="text-slate-500 dark:text-slate-400 text-base sm:text-lg font-normal max-w-lg leading-relaxed mb-10 z-10 fade-up" style="animation-delay: 0.2s;">
        Information Systems Student at <strong class="text-slate-700 dark:text-slate-200">Politeknik Negeri Subang</strong><br>
        <span id="typed-role" class="text-primary-600 dark:text-primary-400 font-medium"></span><span class="typed-cursor">|</span>
    </p>

    {{-- CTA Buttons --}}
    <div class="flex flex-wrap gap-4 justify-center z-10 fade-up" style="animation-delay: 0.25s;">
        <a href="#projects" class="btn-primary" id="hero-view-work">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0l-4-4m4 4l-4 4"/>
            </svg>
            View My Work
        </a>
        <a href="mailto:{{ config('portfolio.email') }}" class="btn-secondary" id="hero-contact">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Get In Touch
        </a>
    </div>

    {{-- Social quick links --}}
    <div class="flex items-center gap-5 mt-8 z-10 fade-up" style="animation-delay: 0.3s;">
        <a href="https://github.com/{{ config('portfolio.github') }}" target="_blank" rel="noopener"
           class="text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 transition-colors duration-200"
           title="GitHub">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
            </svg>
        </a>
        <div class="w-px h-4 bg-light-border dark:bg-dark-border"></div>
        <a href="https://instagram.com/{{ config('portfolio.instagram') }}" target="_blank" rel="noopener"
           class="text-slate-400 hover:text-pink-500 transition-colors duration-200"
           title="Instagram">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
        </a>
        <a href="https://youtube.com/@{{ config('portfolio.youtube') }}" target="_blank" rel="noopener"
           class="text-slate-400 hover:text-red-500 transition-colors duration-200"
           title="YouTube">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/>
            </svg>
        </a>
    </div>

    {{-- Scroll Indicator --}}
    <div class="scroll-indicator">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>

</section>
