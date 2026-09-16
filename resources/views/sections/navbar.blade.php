{{-- ── Navbar ── --}}
<nav id="navbar" class="navbar transition-shadow duration-300" x-data>

    {{-- Logo --}}
    <a href="#home" class="nav-logo text-sm font-bold text-slate-900 dark:text-slate-100 tracking-tight z-50 flex-shrink-0 no-underline hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
        <span class="text-gradient">Alfath</span> <span class="text-slate-900 dark:text-slate-100">NH</span>
    </a>

    {{-- Desktop Nav Links --}}
    <ul class="hidden md:flex items-center gap-8 list-none m-0 p-0">
        @foreach (['home' => 'Home', 'about' => 'About', 'skills' => 'Skills', 'projects' => 'Projects', 'timeline' => 'Journey', 'contact' => 'Contact'] as $anchor => $label)
            <li>
                <a href="#{{ $anchor }}"
                   class="text-slate-500 dark:text-slate-400 text-sm font-medium no-underline relative
                          hover:text-primary-600 dark:hover:text-primary-400 transition-colors duration-200
                          after:absolute after:bottom-[-4px] after:left-0 after:right-0 after:h-[1.5px]
                          after:bg-primary-600 after:rounded after:scale-x-0 after:transition-transform after:duration-250
                          hover:after:scale-x-100">
                    {{ $label }}
                </a>
            </li>
        @endforeach
        <li>
            <a href="#contact"
               class="bg-primary-600 text-white text-sm font-semibold px-4 py-2 rounded-lg
                      transition-all duration-200 shadow-[0_2px_8px_rgba(37,99,235,0.25)] no-underline
                      hover:bg-primary-700 hover:-translate-y-0.5 hover:shadow-[0_4px_14px_rgba(37,99,235,0.35)]">
                Get In Touch
            </a>
        </li>
    </ul>

    <div class="flex items-center gap-3 z-50">
        {{-- Dark Mode Toggle --}}
        <button @click="$store.theme.toggle()"
                :title="$store.theme.dark ? 'Switch to Light Mode' : 'Switch to Dark Mode'"
                class="flex items-center justify-center w-9 h-9 rounded-lg border border-light-border dark:border-dark-border
                       text-slate-500 dark:text-slate-400 bg-transparent transition-all duration-200
                       hover:bg-primary-50 dark:hover:bg-primary-900/10 hover:border-primary-400 hover:text-primary-600 dark:hover:text-primary-400
                       hover:rotate-12 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-1">
            <template x-if="!$store.theme.dark">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
            </template>
            <template x-if="$store.theme.dark">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </template>
        </button>

        {{-- Hamburger (Mobile) --}}
        <button @click="$store.menu.toggle()"
                :aria-expanded="$store.menu.open"
                class="md:hidden flex flex-col justify-center items-center gap-[5px] w-10 h-10 bg-none border-none cursor-pointer p-1"
                aria-label="Toggle navigation">
            <span class="block w-[22px] h-0.5 bg-slate-800 dark:bg-slate-200 rounded transition-all duration-300"
                  :class="$store.menu.open ? 'translate-y-[7px] rotate-45' : ''"></span>
            <span class="block w-[22px] h-0.5 bg-slate-800 dark:bg-slate-200 rounded transition-all duration-300"
                  :class="$store.menu.open ? 'opacity-0' : ''"></span>
            <span class="block w-[22px] h-0.5 bg-slate-800 dark:bg-slate-200 rounded transition-all duration-300"
                  :class="$store.menu.open ? '-translate-y-[7px] -rotate-45' : ''"></span>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <ul x-show="$store.menu.open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-y-full opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="-translate-y-full opacity-0"
        class="fixed top-0 left-0 right-0 bg-white/98 dark:bg-dark-bg/98 backdrop-blur-xl
               border-b border-light-border dark:border-dark-border shadow-lg z-40
               flex flex-col pt-20 pb-6 px-8 list-none m-0"
        @click.outside="$store.menu.close()">
        @foreach (['home' => 'Home', 'about' => 'About', 'skills' => 'Skills', 'projects' => 'Projects', 'timeline' => 'Journey', 'contact' => 'Contact'] as $anchor => $label)
            <li>
                <a href="#{{ $anchor }}" @click="$store.menu.close()"
                   class="block py-4 text-base font-medium text-slate-800 dark:text-slate-200 no-underline
                          border-b border-light-border dark:border-dark-border hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                    {{ $label }}
                </a>
            </li>
        @endforeach
        <li class="mt-4">
            <a href="#contact" @click="$store.menu.close()"
               class="inline-block bg-primary-600 text-white font-semibold text-sm px-6 py-3 rounded-lg no-underline
                      hover:bg-primary-700 transition-colors w-full text-center">
                Get In Touch
            </a>
        </li>
    </ul>

</nav>
