{{-- ── Featured Projects (Golden Ratio Grid & Real Screenshots) ── --}}
<section id="projects" class="relative z-10"
         x-data="{
            activeModal: null,
            viewMode: 'real',
            openModal(slug) {
                this.activeModal = slug;
                this.viewMode = 'real';
                document.body.style.overflow = 'hidden';
            },
            closeModal() {
                this.activeModal = null;
                document.body.style.overflow = '';
            }
         }"
         @keydown.escape.window="closeModal()">
    <div class="section-inner">

        {{-- Section Header --}}
        <div class="text-center mb-10 fade-up">
            <div class="inline-flex items-center gap-2 mb-2">
                <span class="section-label mb-0">Showcase</span>
                <div class="h-px w-8 bg-primary-500/40"></div>
            </div>
            <h2 class="section-title">Featured Projects</h2>
            <div class="divider-glow mx-auto"></div>
            <p class="section-desc mx-auto">
                Real-world software systems, computer vision AI pipelines, and interactive digital products built with practical impact.
            </p>
        </div>

        {{-- Filter Tabs (Alpine.js Store) --}}
        <div class="flex flex-wrap justify-center gap-2 mb-10 fade-up" x-data>
            @php
                $filterLabels = [
                    'all'        => '✨ All Projects',
                    'ai-python'  => '🤖 AI & Vision',
                    'web'        => '🌐 Web Apps',
                    'uiux'       => '🎨 UI/UX Design',
                    'automation' => '⚡ Automation',
                ];
            @endphp
            @foreach($filterLabels as $key => $label)
            <button @click="$store.projects.setFilter('{{ $key }}')"
                    :class="$store.projects.activeFilter === '{{ $key }}'
                        ? 'bg-primary-600 text-white border-primary-600 shadow-md shadow-primary-600/30'
                        : 'bg-white dark:bg-dark-card text-slate-600 dark:text-slate-300 border-light-border dark:border-dark-border hover:border-primary-400 dark:hover:border-cyan-500'"
                    class="min-h-[40px] px-3.5 sm:px-4 py-1.5 text-xs sm:text-sm font-semibold rounded-xl border transition-all duration-200 cursor-pointer focus:outline-none">
                {{ $label }}
            </button>
            @endforeach
        </div>

        {{-- Uniform Projects Grid (Balanced 2x2 Layout - Selaras & Harmonis) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

            @foreach($projects as $project)
            {{-- ── Uniform Project Card (Selaras & Interactive) ── --}}
            <div class="card card-hover overflow-hidden flex flex-col justify-between h-full border border-light-border dark:border-dark-border group cursor-pointer transition-all duration-300 hover:shadow-2xl hover:border-primary-500/50 dark:hover:border-cyan-500/50 relative"
                 x-show="$store.projects.isVisible('{{ $project->category }}')"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 @click="openModal('{{ $project->slug }}')">

                {{-- Real Image Banner with Hover Indicator --}}
                <div>
                    <div class="relative h-52 sm:h-60 overflow-hidden bg-slate-950">
                        @if($project->image_url)
                            <img src="{{ asset($project->image_url) }}"
                                 alt="{{ $project->title }}"
                                 class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                                 loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-black/10"></div>
                        @else
                            <div class="w-full h-full flex items-center justify-center text-5xl bg-gradient-to-br {{ $project->thumb_gradient }}">
                                <span class="drop-shadow-md">{{ $project->thumb_icon }}</span>
                            </div>
                        @endif

                        {{-- Real Project UI Badge --}}
                        <div class="absolute bottom-3 left-3 z-10">
                            <span class="bg-black/80 backdrop-blur-md text-white text-[10px] sm:text-xs font-semibold px-2.5 py-1 rounded-md border border-white/15 flex items-center gap-1.5 shadow-sm">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>Real Project UI</span>
                            </span>
                        </div>

                        {{-- Category Badge --}}
                        <div class="absolute top-3 right-3 z-10 bg-black/75 backdrop-blur-md text-white text-[10px] sm:text-xs font-mono font-bold px-2.5 py-1 rounded-md uppercase tracking-wider border border-white/15 shadow-sm">
                            @if($project->category === 'ai-python')
                                🤖 AI &amp; Vision
                            @elseif($project->category === 'web')
                                🌐 Web App
                            @elseif($project->category === 'uiux')
                                🎨 UI/UX Design
                            @elseif($project->category === 'automation')
                                ⚡ Automation
                            @else
                                {{ $project->category }}
                            @endif
                        </div>

                        {{-- Hover Expand Hint Overlay --}}
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none bg-primary-950/40 backdrop-blur-[1px] z-10">
                            <span class="bg-primary-600/90 text-white text-xs font-semibold px-4 py-2 rounded-full shadow-xl flex items-center gap-2 border border-white/20">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span>Klik untuk Memperbesar</span>
                            </span>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="p-5 sm:p-6">
                        {{-- Category Sub-heading --}}
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-base sm:text-lg">{{ $project->thumb_icon }}</span>
                            <span class="text-xs font-mono font-bold uppercase tracking-wider text-primary-600 dark:text-cyan-400">
                                @if($project->category === 'ai-python')
                                    Python &amp; Computer Vision
                                @elseif($project->category === 'web')
                                    Full-Stack Web App (Laravel)
                                @elseif($project->category === 'uiux')
                                    UI/UX Design System (Figma)
                                @elseif($project->category === 'automation')
                                    Desktop Automation (Excel VBA)
                                @else
                                    {{ $project->category }}
                                @endif
                            </span>
                        </div>

                        {{-- Title --}}
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white mb-2 tracking-tight group-hover:text-primary-600 dark:group-hover:text-cyan-400 transition-colors">
                            {{ $project->title }}
                        </h3>

                        {{-- Concise Description --}}
                        <p class="text-slate-600 dark:text-slate-300 text-xs sm:text-sm leading-relaxed mb-4 line-clamp-3">
                            {{ $project->description }}
                        </p>

                        {{-- Key Highlights Preview --}}
                        @if($project->highlights)
                        <div class="flex flex-col gap-1.5 mb-4 text-xs text-slate-500 dark:text-slate-400">
                            @foreach(array_slice($project->highlights, 0, 2) as $hl)
                            <div class="flex items-start gap-1.5">
                                <span class="text-primary-500 dark:text-cyan-400 font-bold flex-shrink-0">✦</span>
                                <span class="line-clamp-1">{{ $hl }}</span>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        {{-- Tech Stack Badges --}}
                        <div class="flex flex-wrap gap-1.5 mb-2">
                            @php
                                $tagMap = ['web' => 'tag-blue', 'uiux' => 'tag-pink', 'automation' => 'tag-green', 'ai-python' => 'tag-purple'];
                                $badgeClass = $tagMap[$project->category] ?? 'tag-blue';
                            @endphp
                            @foreach(array_slice($project->tech_stack, 0, 4) as $tech)
                            <span class="tag {{ $badgeClass }} text-[11px] font-mono">{{ $tech }}</span>
                            @endforeach
                            @if(count($project->tech_stack) > 4)
                            <span class="tag tag-blue text-[11px] font-mono">+{{ count($project->tech_stack) - 4 }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Card Footer --}}
                <div class="p-5 sm:p-6 pt-3 border-t border-light-border dark:border-dark-border flex items-center justify-between bg-slate-50/50 dark:bg-dark-surface/40">
                    <button @click.stop="openModal('{{ $project->slug }}')"
                            class="text-xs font-bold text-primary-600 dark:text-cyan-400 hover:underline flex items-center gap-1.5 cursor-pointer py-1">
                        <span>Lihat Detail &amp; Preview</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>

                    @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener"
                       @click.stop
                       class="text-xs text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white flex items-center gap-1 font-medium transition-colors py-1"
                       id="link-{{ $project->slug }}">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        <span>GitHub</span>
                    </a>
                    @else
                    <span class="text-[11px] text-slate-400">Internal System</span>
                    @endif
                </div>

            </div>
            @endforeach

        </div>

        {{-- GitHub Profile Direct CTA --}}
        <div class="text-center mt-12 fade-up">
            <a href="https://github.com/{{ config('portfolio.github') }}" target="_blank" rel="noopener"
               class="btn-secondary inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                <span>View All Repositories on GitHub ({{ '@' . config('portfolio.github') }})</span>
            </a>
        </div>

    </div>

    {{-- ── Modals Teleported to <body> (Immune to card overflow & transforms) ── --}}
    <template x-teleport="body">
        <div>
            @foreach($projects as $project)
                @include('sections.project-modal', ['project' => $project])
            @endforeach
        </div>
    </template>
</section>

