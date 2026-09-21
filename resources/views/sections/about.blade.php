{{-- ── About Section (Golden Ratio & 3-Photo Executive Showcase) ── --}}
<section id="about" class="relative z-10">
    <div class="section-inner grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

        {{-- Left: Narrative & Metrics (7 cols on desktop = 58.3%) --}}
        <div class="lg:col-span-7 flex flex-col fade-up">
            <div class="flex items-center gap-2 mb-2">
                <span class="section-label mb-0">About Me</span>
                <div class="h-px w-8 bg-primary-500/40"></div>
            </div>

            <h2 class="section-title">
                Turning Ideas into <br class="hidden sm:inline">
                <span class="text-gradient">Impactful Reality</span>
            </h2>
            <div class="divider-glow"></div>

            <p class="text-slate-600 dark:text-slate-300 text-sm sm:text-base leading-relaxed mb-4">
                I am a 2nd-year Information Systems student at <strong class="text-slate-900 dark:text-white">Politeknik Negeri Subang (POLSUB)</strong>. My focus centers on web engineering (Laravel &amp; PHP), database systems, human-centered UI/UX design, and workflow automation (n8n).
            </p>
            <p class="text-slate-500 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                Active both as a software creator and student leader, I serve as <span class="font-semibold text-slate-800 dark:text-slate-200">Menteri Publikasi &amp; Dokumentasi BEM POLSUB</span> (initiator of <em>"Dwibulanan Pradipa"</em>) and have earned multiple championships in international AI short film, national UI/UX, and videography.
            </p>

            {{-- Quick Metadata Details --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-8 text-sm">
                <div class="flex items-center gap-2.5 text-slate-600 dark:text-slate-300">
                    <span class="w-8 h-8 rounded-lg bg-primary-50 dark:bg-primary-950/40 border border-primary-100 dark:border-primary-800/40 flex items-center justify-center text-primary-600 dark:text-cyan-400 flex-shrink-0">
                        📍
                    </span>
                    <span>{{ config('portfolio.location') }}</span>
                </div>
                <div class="flex items-center gap-2.5 text-slate-600 dark:text-slate-300">
                    <span class="w-8 h-8 rounded-lg bg-primary-50 dark:bg-primary-950/40 border border-primary-100 dark:border-primary-800/40 flex items-center justify-center text-primary-600 dark:text-cyan-400 flex-shrink-0">
                        🎓
                    </span>
                    <span>D3 Sistem Informasi · POLSUB</span>
                </div>
                <div class="flex items-center gap-2.5 text-slate-600 dark:text-slate-300">
                    <span class="w-8 h-8 rounded-lg bg-amber-50 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-800/40 flex items-center justify-center text-amber-600 dark:text-amber-400 flex-shrink-0">
                        🏆
                    </span>
                    <a href="#awards-spotlight" class="hover:text-amber-600 dark:hover:text-amber-400 font-semibold transition-colors">
                        4 Kejuaraan &amp; Prestasi Resmi
                    </a>
                </div>
                <div class="flex items-center gap-2.5 text-slate-600 dark:text-slate-300">
                    <span class="w-8 h-8 rounded-lg bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800/40 flex items-center justify-center text-emerald-600 dark:text-emerald-400 flex-shrink-0">
                        💬
                    </span>
                    <a href="{{ config('portfolio.whatsapp_url') }}" target="_blank" rel="noopener" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors truncate">
                        WA: {{ config('portfolio.phone') }}
                    </a>
                </div>
            </div>

            {{-- 4 Stat Cards: 2x2 on Mobile, 4x1 on Desktop (No cramped overflowing) --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3.5">
                @php
                    $stats = config('portfolio.stats');
                @endphp
                <div class="stat-card">
                    <div class="text-2xl sm:text-3xl font-black text-primary-600 dark:text-cyan-400">{{ $stats['projects_built'] }}+</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-semibold leading-tight">Featured<br>Projects</div>
                </div>
                <div class="stat-card border-amber-300/40 dark:border-amber-500/30 bg-gradient-to-b from-amber-50/50 to-transparent dark:from-amber-950/20">
                    <div class="text-2xl sm:text-3xl font-black text-amber-500 dark:text-amber-400">{{ $stats['awards_won'] ?? 4 }}</div>
                    <div class="text-xs text-slate-600 dark:text-slate-300 mt-1 font-semibold leading-tight">Awards &amp;<br>Honors</div>
                </div>
                <div class="stat-card">
                    <div class="text-2xl sm:text-3xl font-black text-primary-600 dark:text-cyan-400">{{ $stats['total_skills'] }}+</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-semibold leading-tight">Skills &amp;<br>Tools</div>
                </div>
                <div class="stat-card">
                    <div class="text-2xl sm:text-3xl font-black text-primary-600 dark:text-cyan-400">{{ $stats['years_study'] }}</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-semibold leading-tight">Years<br>at POLSUB</div>
                </div>
            </div>

        </div>

        {{-- Right: Interactive Real Photo Switcher (5 cols on desktop = 41.7%) --}}
        <div class="lg:col-span-5 flex flex-col gap-4 fade-up"
             x-data="{
                activePhoto: 'almamater',
                photos: {
                    almamater: {
                        src: '{{ asset('images/profile-almamater.jpg') }}',
                        title: 'Menteri Pubdok BEM POLSUB',
                        caption: 'Badan Eksekutif Mahasiswa · Departemen Kominfo',
                        badge: '🏛️ Campus Leadership',
                        badgeClass: 'bg-primary-600 text-white',
                        position: 'center 20%'
                    },
                    project_day: {
                        src: '{{ asset('images/activity-project-day.jpg') }}',
                        title: 'Panitia Subang Project Day',
                        caption: 'Dokumentasi & Pameran Karya Inovasi Teknologi',
                        badge: '🎯 Innovation & Community',
                        badgeClass: 'bg-indigo-600 text-white',
                        position: 'center 95%'
                    },
                    casual: {
                        src: '{{ asset('images/casual-pose.jpg') }}',
                        title: 'Creative Energy',
                        caption: 'Beyond the Code · Authentic Perspective',
                        badge: '⚡ Real Life Focus',
                        badgeClass: 'bg-cyan-600 text-white',
                        position: 'center 20%'
                    }
                }
             }">

            {{-- Main Photo Frame with Specular Border --}}
            <div class="relative rounded-2xl overflow-hidden p-1 bg-gradient-to-br from-primary-600 via-cyan-400 to-indigo-600 shadow-xl shadow-primary-600/15">
                <div class="rounded-xl overflow-hidden bg-white dark:bg-dark-card aspect-[4/5] relative group">
                    <img :src="photos[activePhoto].src"
                         alt="{{ config('portfolio.name') }}"
                         :style="'object-position: ' + photos[activePhoto].position"
                         class="w-full h-full object-cover transition-all duration-500 transform group-hover:scale-102"
                         loading="lazy">

                    {{-- Dynamic Activity Badge --}}
                    <div class="absolute top-3 right-3 backdrop-blur-md rounded-full px-3 py-1 text-xs font-bold shadow-md z-10 transition-all"
                         :class="photos[activePhoto].badgeClass"
                         x-text="photos[activePhoto].badge">
                    </div>

                    {{-- Captioned Glass Footer on Photo --}}
                    <div class="absolute bottom-3 left-3 right-3 bg-slate-950/80 backdrop-blur-md rounded-xl p-3 border border-white/15 text-white transition-all z-10 shadow-lg">
                        <div class="flex items-center justify-between gap-2">
                            <div>
                                <div class="text-xs sm:text-sm font-bold text-white tracking-wide" x-text="photos[activePhoto].title"></div>
                                <div class="text-[11px] text-slate-300 mt-0.5" x-text="photos[activePhoto].caption"></div>
                            </div>
                            <span class="text-[10px] text-cyan-300 font-bold uppercase tracking-wider flex-shrink-0">Alfath N. H.</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Photo Switcher Buttons (Touch-friendly >= 44px) --}}
            <div class="grid grid-cols-3 gap-2">
                <button @click="activePhoto = 'almamater'"
                        :class="activePhoto === 'almamater'
                            ? 'bg-primary-600 text-white shadow-md shadow-primary-600/30 ring-2 ring-primary-400'
                            : 'bg-white dark:bg-dark-card text-slate-700 dark:text-slate-300 border border-light-border dark:border-dark-border hover:border-primary-400'"
                        class="min-h-[44px] px-2 py-2 rounded-xl text-xs font-semibold transition-all text-center flex flex-col items-center justify-center gap-0.5 cursor-pointer">
                    <span class="font-bold">🏛️ BEM Pubdok</span>
                    <span class="text-[10px] opacity-80">Almamater</span>
                </button>
                <button @click="activePhoto = 'project_day'"
                        :class="activePhoto === 'project_day'
                            ? 'bg-primary-600 text-white shadow-md shadow-primary-600/30 ring-2 ring-primary-400'
                            : 'bg-white dark:bg-dark-card text-slate-700 dark:text-slate-300 border border-light-border dark:border-dark-border hover:border-primary-400'"
                        class="min-h-[44px] px-2 py-2 rounded-xl text-xs font-semibold transition-all text-center flex flex-col items-center justify-center gap-0.5 cursor-pointer">
                    <span class="font-bold">🎯 Project Day</span>
                    <span class="text-[10px] opacity-80">Panitia</span>
                </button>
                <button @click="activePhoto = 'casual'"
                        :class="activePhoto === 'casual'
                            ? 'bg-primary-600 text-white shadow-md shadow-primary-600/30 ring-2 ring-primary-400'
                            : 'bg-white dark:bg-dark-card text-slate-700 dark:text-slate-300 border border-light-border dark:border-dark-border hover:border-primary-400'"
                        class="min-h-[44px] px-2 py-2 rounded-xl text-xs font-semibold transition-all text-center flex flex-col items-center justify-center gap-0.5 cursor-pointer">
                    <span class="font-bold">⚡ Casual</span>
                    <span class="text-[10px] opacity-80">Real Life</span>
                </button>
            </div>

        </div>

    </div>
</section>
