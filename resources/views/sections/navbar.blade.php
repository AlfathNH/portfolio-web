{{-- ── Floating Glass Navbar (Golden Scale & Mobile-First) ── --}}
<header class="sticky top-2 sm:top-3 z-50 px-3 sm:px-6 w-full max-w-6xl mx-auto transition-all duration-300" x-data>
    <nav id="navbar" class="glass-pill rounded-2xl px-4 sm:px-6 py-2.5 sm:py-3 flex items-center justify-between transition-all duration-300">

        {{-- Brand / Logo --}}
        <a href="#home" class="group flex items-center gap-2.5 text-sm sm:text-base font-bold tracking-tight text-slate-900 dark:text-slate-100 no-underline z-50 select-none">
            <span class="w-8 h-8 rounded-xl bg-gradient-to-br from-primary-600 via-primary-500 to-cyan-400 flex items-center justify-center text-white text-xs font-black shadow-md shadow-primary-600/30 group-hover:scale-105 transition-transform duration-200">
                A
            </span>
            <div class="flex items-center gap-1 font-extrabold">
                <span class="text-gradient">Alfath</span>
                <span class="text-slate-800 dark:text-slate-200">NH</span>
            </div>
        </a>

        {{-- Desktop Nav Links --}}
        <ul class="hidden md:flex items-center gap-1 lg:gap-2 list-none m-0 p-0">
            @foreach (['home' => 'Home', 'about' => 'About', 'skills' => 'Skills', 'projects' => 'Projects', 'timeline' => 'Journey', 'contact' => 'Contact'] as $anchor => $label)
                <li>
                    <a href="#{{ $anchor }}"
                       class="px-3 py-1.5 rounded-lg text-slate-600 dark:text-slate-300 text-sm font-medium no-underline transition-all duration-200 hover:text-primary-600 dark:hover:text-cyan-400 hover:bg-slate-100/70 dark:hover:bg-white/5">
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Right Controls (Theme Toggle + CTA + Hamburger) --}}
        <div class="flex items-center gap-2 sm:gap-3 z-50">
            {{-- Contact CTA button (Desktop) --}}
            <a href="#contact"
               class="hidden lg:inline-flex btn-primary !min-h-[38px] !py-1.5 !px-4 !text-xs !rounded-lg no-underline">
                Get In Touch
            </a>

            {{-- Dark Mode Toggle --}}
            <button @click="$store.theme.toggle()"
                    :title="$store.theme.dark ? 'Switch to Light Mode' : 'Switch to Dark Mode'"
                    class="flex items-center justify-center w-10 h-10 rounded-xl border border-light-border dark:border-dark-border
                           text-slate-600 dark:text-slate-300 bg-white/50 dark:bg-dark-surface/50 backdrop-blur-sm
                           hover:text-primary-600 dark:hover:text-cyan-400 hover:border-primary-400 dark:hover:border-cyan-500
                           transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
                    aria-label="Toggle theme">
                <template x-if="!$store.theme.dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </template>
                <template x-if="$store.theme.dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </template>
            </button>

            {{-- Hamburger Button (Mobile - min 44px touch target) --}}
            <button @click="$store.menu.toggle()"
                    :aria-expanded="$store.menu.open"
                    class="md:hidden flex flex-col justify-center items-center gap-[5px] w-11 h-11 rounded-xl border border-light-border dark:border-dark-border bg-white/50 dark:bg-dark-surface/50 cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary-500"
                    aria-label="Toggle navigation menu">
                <span class="block w-5 h-0.5 bg-slate-800 dark:bg-slate-200 rounded transition-all duration-300 origin-center"
                      :class="$store.menu.open ? 'translate-y-[7px] rotate-45' : ''"></span>
                <span class="block w-5 h-0.5 bg-slate-800 dark:bg-slate-200 rounded transition-all duration-300"
                      :class="$store.menu.open ? 'opacity-0' : ''"></span>
                <span class="block w-5 h-0.5 bg-slate-800 dark:bg-slate-200 rounded transition-all duration-300 origin-center"
                      :class="$store.menu.open ? '-translate-y-[7px] -rotate-45' : ''"></span>
            </button>
        </div>

    </nav>

    {{-- Mobile Drawer Menu (Mobile-First with >= 44px tap targets) --}}
    <div x-show="$store.menu.open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="-translate-y-4 opacity-0"
         x-transition:enter-end="translate-y-0 opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-y-0 opacity-100"
         x-transition:leave-end="-translate-y-4 opacity-0"
         class="md:hidden mt-2 p-4 rounded-2xl glass-pill shadow-2xl border border-slate-200/80 dark:border-white/10 flex flex-col gap-1"
         @click.outside="$store.menu.close()"
         style="display: none;">
        @foreach (['home' => 'Home', 'about' => 'About', 'skills' => 'Skills', 'projects' => 'Projects', 'timeline' => 'Journey', 'contact' => 'Contact'] as $anchor => $label)
            <a href="#{{ $anchor }}" @click="$store.menu.close()"
               class="flex items-center px-4 min-h-[44px] text-base font-semibold text-slate-800 dark:text-slate-200 rounded-xl hover:bg-primary-50 dark:hover:bg-primary-950/30 hover:text-primary-600 dark:hover:text-cyan-400 transition-colors no-underline">
                {{ $label }}
            </a>
        @endforeach
        <div class="pt-2 border-t border-light-border dark:border-dark-border mt-1">
            <a href="#contact" @click="$store.menu.close()"
               class="btn-primary w-full text-center justify-center !min-h-[44px]">
                Get In Touch
            </a>
        </div>
    </div>
</header>
