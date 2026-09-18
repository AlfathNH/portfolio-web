{{-- ── About Section ── --}}
<section id="about" class="relative z-10">
    <div class="section-inner grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-20 items-center">

        {{-- Left: Bio & Stats --}}
        <div class="about-info fade-up">
            <span class="section-label">About Me</span>
            <h2 class="section-title">Turning ideas into<br><span class="text-gradient">digital reality</span></h2>
            <div class="divider-glow"></div>

            <p class="text-slate-500 dark:text-slate-400 leading-[1.85] text-sm mb-4">
                I'm a 2nd-year Information Systems student at <strong class="text-slate-700 dark:text-slate-300">Politeknik Negeri Subang (POLSUB)</strong>. I enjoy crafting intuitive user interfaces, building web applications, and solving real-world problems through technology.
            </p>
            <p class="text-slate-500 dark:text-slate-400 leading-[1.85] text-sm mb-8">
                I am deeply passionate about creating impactful digital experiences and continuously expanding my skill set to build innovative solutions. My focus is on leveraging technical and creative abilities to deliver high-quality, user-centric products.
            </p>

            {{-- Availability Banner --}}
            @php
                $availabilityKey = config('portfolio.availability');
                $isAvailable = in_array($availabilityKey, ['open_to_work', 'open_to_freelance']);
                $availLabel = config("portfolio.availability_labels.{$availabilityKey}", 'Open to Work');
            @endphp
            @if($isAvailable)
            <div class="inline-flex items-center gap-2 bg-emerald-50 dark:bg-emerald-900/15 border border-emerald-200 dark:border-emerald-700/30 text-emerald-700 dark:text-emerald-300 text-xs font-semibold py-2 px-3.5 rounded-lg mb-6">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                {{ $availLabel }} — Available for projects & collaboration
            </div>
            @endif

            {{-- Quick Info --}}
            <div class="flex flex-col gap-2 text-sm mb-8">
                <div class="flex items-center gap-3 text-slate-500 dark:text-slate-400">
                    <svg class="w-4 h-4 text-primary-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    {{ config('portfolio.location') }}
                </div>
                <div class="flex items-center gap-3 text-slate-500 dark:text-slate-400">
                    <svg class="w-4 h-4 text-primary-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                    D4 Sistem Informasi · Politeknik Negeri Subang
                </div>
                <div class="flex items-center gap-3 text-slate-500 dark:text-slate-400">
                    <svg class="w-4 h-4 text-primary-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    {{ config('portfolio.email') }}
                </div>
            </div>

            {{-- Stat Cards --}}
            <div class="grid grid-cols-3 gap-3">
                @php
                    $stats = config('portfolio.stats');
                @endphp
                <div class="stat-card fade-up">
                    <div class="text-3xl font-black text-primary-600 dark:text-primary-400">{{ $stats['projects_built'] }}+</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-medium leading-tight">Projects<br>Built</div>
                </div>
                <div class="stat-card fade-up">
                    <div class="text-3xl font-black text-primary-600 dark:text-primary-400">{{ $stats['years_study'] }}</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-medium leading-tight">Years of<br>Study</div>
                </div>
                <div class="stat-card fade-up">
                    <div class="text-3xl font-black text-primary-600 dark:text-primary-400">{{ $stats['curiosity'] }}</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-medium leading-tight">Intellectual<br>Curiosity</div>
                </div>
            </div>
        </div>

        {{-- Right: Interactive Photo Gallery Panel --}}
        <div class="relative fade-up flex flex-col gap-4" style="animation-delay: 0.1s;"
             x-data="{
                activePhoto: 'almamater',
                photos: {
                    almamater: {
                        src: '{{ asset('images/profile-almamater.jpg') }}',
                        title: 'Menteri Pubdok BEM',
                        caption: 'Badan Eksekutif Mahasiswa POLSUB',
                        badge: '🏛️ Leadership & Campus',
                        badgeClass: 'bg-primary-600 text-white'
                    },
                    project_day: {
                        src: '{{ asset('images/activity-project-day.jpg') }}',
                        title: 'Panitia Project Day POLSUB',
                        caption: 'Dokumentasi & Pameran Inovasi',
                        badge: '🎯 Event & Community',
                        badgeClass: 'bg-indigo-600 text-white'
                    },
                    casual: {
                        src: '{{ asset('images/casual-pose.jpg') }}',
                        title: 'Behind the Scenes',
                        caption: 'Authentic & Creative Energy',
                        badge: '⚡ Beyond the Code',
                        badgeClass: 'bg-amber-600 text-white'
                    }
                }
             }">

            {{-- Main Interactive Frame --}}
            <div class="relative rounded-2xl overflow-hidden bg-gradient-to-br from-primary-600 to-indigo-700 p-1 shadow-glow-md">
                <div class="rounded-xl overflow-hidden bg-white dark:bg-dark-card aspect-square relative group">
                    <img :src="photos[activePhoto].src"
                         alt="{{ config('portfolio.name') }}"
                         class="w-full h-full object-cover object-top transition-all duration-500 transform group-hover:scale-105"
                         loading="lazy">

                    {{-- Activity Badge on top right --}}
                    <div class="absolute top-3 right-3 backdrop-blur-md rounded-full px-3 py-1 text-xs font-semibold shadow-md"
                         :class="photos[activePhoto].badgeClass"
                         x-text="photos[activePhoto].badge">
                    </div>

                    {{-- Floating tag on bottom --}}
                    <div class="absolute bottom-3 left-3 right-3 bg-white/95 dark:bg-dark-card/95 backdrop-blur-md rounded-xl p-3.5 shadow-lg border border-white/20 transition-all">
                        <div class="text-sm font-bold text-slate-900 dark:text-slate-100" x-text="photos[activePhoto].title"></div>
                        <div class="text-xs text-slate-500 dark:text-slate-400 mt-0.5 flex items-center justify-between">
                            <span x-text="photos[activePhoto].caption"></span>
                            <span class="text-[10px] text-primary-600 dark:text-primary-400 font-semibold uppercase tracking-wider">Alfath N. H.</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Photo Switcher Buttons --}}
            <div class="grid grid-cols-3 gap-2">
                <button @click="activePhoto = 'almamater'"
                        :class="activePhoto === 'almamater' ? 'bg-primary-600 text-white shadow-md ring-2 ring-primary-400' : 'bg-white dark:bg-dark-card text-slate-600 dark:text-slate-300 border border-light-border dark:border-dark-border hover:bg-primary-50 dark:hover:bg-slate-800'"
                        class="px-2.5 py-2 rounded-xl text-xs font-semibold transition-all text-center flex flex-col items-center gap-0.5">
                    <span>🏛️ Almamater</span>
                    <span class="text-[10px] opacity-75">BEM Pubdok</span>
                </button>
                <button @click="activePhoto = 'project_day'"
                        :class="activePhoto === 'project_day' ? 'bg-primary-600 text-white shadow-md ring-2 ring-primary-400' : 'bg-white dark:bg-dark-card text-slate-600 dark:text-slate-300 border border-light-border dark:border-dark-border hover:bg-primary-50 dark:hover:bg-slate-800'"
                        class="px-2.5 py-2 rounded-xl text-xs font-semibold transition-all text-center flex flex-col items-center gap-0.5">
                    <span>🎯 Project Day</span>
                    <span class="text-[10px] opacity-75">Panitia PDH</span>
                </button>
                <button @click="activePhoto = 'casual'"
                        :class="activePhoto === 'casual' ? 'bg-primary-600 text-white shadow-md ring-2 ring-primary-400' : 'bg-white dark:bg-dark-card text-slate-600 dark:text-slate-300 border border-light-border dark:border-dark-border hover:bg-primary-50 dark:hover:bg-slate-800'"
                        class="px-2.5 py-2 rounded-xl text-xs font-semibold transition-all text-center flex flex-col items-center gap-0.5">
                    <span>⚡ Casual</span>
                    <span class="text-[10px] opacity-75">Real Life</span>
                </button>
            </div>

            {{-- Tech stack mini tags --}}
            <div class="flex flex-wrap gap-2 pt-1">
                @foreach(['Laravel', 'Python', 'Figma', 'MySQL', 'Tailwind CSS', 'Alpine.js'] as $tech)
                <span class="tag tag-blue">{{ $tech }}</span>
                @endforeach
            </div>
        </div>

    </div>
</section>
