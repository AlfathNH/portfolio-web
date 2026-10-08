{{-- ── Hero Section (Golden Ratio 61.8% : 38.2% & Mobile-First) ── --}}
<section id="home" class="relative min-h-[90vh] flex items-center justify-center px-4 sm:px-6 pt-12 pb-16 lg:py-24 z-10 overflow-hidden">

    {{-- Ambient Midnight Glow Orbs --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0 select-none">
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] sm:w-[680px] h-[350px] bg-gradient-to-tr from-primary-600/15 via-cyan-500/12 to-indigo-600/15 dark:from-primary-600/25 dark:via-cyan-400/18 dark:to-indigo-500/20 rounded-full blur-[100px] animate-pulse-soft"></div>
        <div class="absolute bottom-10 right-10 w-72 h-72 bg-cyan-500/10 dark:bg-cyan-500/15 rounded-full blur-3xl"></div>
    </div>

    {{-- Main Container (Golden Grid: 61.8% Story / 38.2% Visual) --}}
    <div class="max-w-6xl w-full mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center relative z-10">

        {{-- Left: Narrative & Credentials (7 cols = ~58-61.8%) --}}
        <div class="lg:col-span-7 flex flex-col items-center lg:items-start text-center lg:text-left order-2 lg:order-1">

            {{-- Availability Pill --}}
            @php
                $availabilityKey = config('portfolio.availability');
                $availabilityLabel = config("portfolio.availability_labels.{$availabilityKey}", 'Open to Work');
            @endphp
            <div class="hero-badge fade-up">
                <span class="text-xs font-semibold tracking-wide uppercase">{{ $availabilityLabel }} · Available for Collaboration</span>
            </div>

            {{-- Main Title with Golden Ratio Display Scale --}}
            <h1 class="text-display text-slate-900 dark:text-white mb-4 fade-up">
                Hi, I'm <br class="hidden sm:inline">
                <span class="text-gradient">Alfath Noorislami</span>
            </h1>

            {{-- Dynamic Subtitle & Typed Role --}}
            <div class="text-slate-600 dark:text-slate-300 text-base sm:text-lg lg:text-xl font-medium max-w-xl mb-6 leading-relaxed fade-up">
                Information Systems Student at <span class="font-bold text-slate-900 dark:text-slate-100">Politeknik Negeri Subang</span>
                <div class="mt-1 flex items-center justify-center lg:justify-start gap-1.5 text-primary-600 dark:text-cyan-400 font-semibold font-mono text-sm sm:text-base">
                    <span>&gt;</span>
                    <span id="typed-role"></span>
                    <span class="typed-cursor">_</span>
                </div>
            </div>

            {{-- Brief Value Proposition --}}
            <p class="text-slate-500 dark:text-slate-400 text-sm sm:text-base leading-relaxed max-w-lg mb-8 fade-up">
                Fusing high-performance backend architecture, modern web design, and computer vision AI to build practical digital solutions.
            </p>

            {{-- CTA Action Buttons (Mobile-first min-h-[44px]) --}}
            <div class="flex flex-col sm:flex-row items-center gap-3.5 w-full sm:w-auto mb-8 fade-up">
                <a href="#projects" class="btn-primary w-full sm:w-auto text-center" id="hero-view-work">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0l-4-4m4 4l-4 4"/>
                    </svg>
                    <span>Explore Projects</span>
                </a>
                <a href="#contact" class="btn-secondary w-full sm:w-auto text-center" id="hero-contact">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Get In Touch</span>
                </a>
            </div>

            {{-- Social Quick Links --}}
            <div class="flex items-center gap-3 text-slate-400 dark:text-slate-500 fade-up">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500 mr-1">Connect:</span>
                <a href="https://github.com/{{ config('portfolio.github') }}" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-xl border border-light-border dark:border-dark-border flex items-center justify-center text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:border-primary-500 transition-colors"
                   title="GitHub">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                </a>
                <a href="https://instagram.com/{{ config('portfolio.instagram') }}" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-xl border border-light-border dark:border-dark-border flex items-center justify-center text-slate-500 dark:text-slate-400 hover:text-pink-500 hover:border-pink-400 transition-colors"
                   title="Instagram">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                <a href="https://youtube.com/{{ '@' . config('portfolio.youtube') }}" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-xl border border-light-border dark:border-dark-border flex items-center justify-center text-slate-500 dark:text-slate-400 hover:text-red-500 hover:border-red-400 transition-colors"
                   title="YouTube">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg>
                </a>
                <a href="mailto:{{ config('portfolio.email') }}"
                   class="w-9 h-9 rounded-xl border border-light-border dark:border-dark-border flex items-center justify-center text-slate-500 dark:text-slate-400 hover:text-primary-600 dark:hover:text-cyan-400 hover:border-primary-500 transition-colors"
                   title="Email Direct">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </a>
            </div>

        </div>

        {{-- Right: Visual Avatar Showcase with Rotating Ambient Ring (5 cols = ~38.2%) --}}
        <div class="lg:col-span-5 flex justify-center order-1 lg:order-2">
            <div id="hero-avatar-container" class="relative w-64 sm:w-72 lg:w-80 aspect-square flex items-center justify-center">

                {{-- Persona 5 Slanted Cutout Backdrops (Only visible in P5 mode) --}}
                <div class="p5-avatar-backdrop-red absolute -inset-3 sm:-inset-5 bg-[#e60012] -rotate-6 border-4 border-black shadow-[10px_10px_0px_#000] z-0 hidden"></div>
                <div class="p5-avatar-backdrop-black absolute -inset-1.5 sm:-inset-2.5 bg-black rotate-2 border-2 border-white z-0 hidden"></div>

                {{-- Rotating Specular Glow Ring (Normal mode) --}}
                <div class="normal-glow-ring absolute inset-0 rounded-full bg-gradient-to-tr from-primary-600 via-cyan-400 to-indigo-600 p-[3px] shadow-glow-md animate-spin-slow opacity-90">
                    <div class="w-full h-full rounded-full bg-light-bg dark:bg-dark-bg"></div>
                </div>

                {{-- Inner Glow Halo (Normal mode) --}}
                <div class="normal-glow-halo absolute inset-4 rounded-full bg-gradient-to-br from-primary-500/30 to-cyan-500/20 blur-xl"></div>

                {{-- Real Avatar Photo (Almamater BEM) --}}
                <div id="hero-avatar-photo" class="relative w-[86%] h-[86%] rounded-full overflow-hidden border-4 border-white dark:border-[#0d1527] shadow-2xl z-10 transition-all duration-300">
                    <img src="{{ asset('images/profile-almamater.jpg') }}"
                         alt="{{ config('portfolio.name') }}"
                         class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-500"
                         loading="eager">

                    {{-- Persona 5 Vignette Overlays (Only visible in P5 mode) --}}
                    <div class="p5-photo-vignette absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80 pointer-events-none hidden"></div>
                    <div class="p5-photo-bottom-red absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-[#e60012]/60 to-transparent pointer-events-none hidden"></div>

                    {{-- Persona 5 Stamps inside Photo --}}
                    <div class="p5-stamp-lv absolute top-2.5 right-2.5 bg-[#fbe500] text-black font-extrabold text-xs px-2.5 py-0.5 rotate-12 border-2 border-black shadow-[3px_3px_0_#000] uppercase tracking-wider hidden">
                        LV. 99 MASTER
                    </div>
                    <div class="p5-stamp-arcana absolute bottom-2.5 left-2.5 bg-black text-white text-[10px] font-extrabold px-2.5 py-0.5 -rotate-2 border-2 border-[#e60012] uppercase tracking-wider hidden">
                        <span class="text-[#e60012]">ARCANA:</span> FOOL
                    </div>
                </div>

                {{-- Floating Micro-chip 1 (Top-Left) --}}
                <div class="avatar-chip-1 absolute -top-2 -left-2 sm:-left-4 glass-pill px-3 py-1.5 rounded-xl shadow-lg flex items-center gap-2 z-20 animate-float" style="animation-delay: 0.5s;">
                    <span class="chip-ping w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                    <span class="chip-text text-xs font-bold text-slate-800 dark:text-slate-100">Full-Stack &amp; AI</span>
                </div>

                {{-- Floating Micro-chip 2 (Bottom-Right) --}}
                <div class="avatar-chip-2 absolute -bottom-2 -right-2 sm:-right-4 glass-pill px-3.5 py-1.5 rounded-xl shadow-lg flex items-center gap-2 z-20 animate-float" style="animation-delay: 1.8s;">
                    <span class="chip-icon text-sm">🏛️</span>
                    <span class="chip-text text-xs font-bold text-slate-800 dark:text-slate-100">POLSUB IT</span>
                </div>

                {{-- Verified Active Dot (Normal mode) --}}
                <div class="avatar-active-dot absolute bottom-4 left-6 w-6 h-6 rounded-full bg-emerald-500 border-[3px] border-white dark:border-dark-bg shadow-md z-20 flex items-center justify-center" title="Active & Ready">
                    <div class="w-2 h-2 rounded-full bg-white animate-pulse"></div>
                </div>

            </div>
        </div>

    </div>

</section>
