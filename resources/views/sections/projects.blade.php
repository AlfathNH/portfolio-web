{{-- ── Projects Section ── --}}
<section id="projects" class="relative z-10">
    <div class="section-inner">

        {{-- Header --}}
        <div class="text-center mb-12 fade-up">
            <span class="section-label">Portfolio</span>
            <h2 class="section-title">Featured Projects</h2>
            <div class="divider-glow mx-auto"></div>
            <p class="section-desc mx-auto">A selection of real projects I've built — from web systems to UI/UX designs, automation tools, and Python apps.</p>
        </div>

        {{-- Filter Tabs (Alpine.js) --}}
        <div class="flex flex-wrap justify-center gap-2 mb-8 fade-up" x-data>
            @php
                $filterLabels = [
                    'all'       => '✨ All',
                    'web'       => '🌐 Web',
                    'uiux'      => '🎨 UI/UX',
                    'automation'=> '⚡ Automation',
                    'ai-python' => '🤖 AI/Python',
                ];
            @endphp
            @foreach($filterLabels as $key => $label)
            <button @click="$store.projects.setFilter('{{ $key }}')"
                    :class="$store.projects.activeFilter === '{{ $key }}'
                        ? 'bg-primary-600 text-white border-primary-600 shadow-[0_2px_8px_rgba(37,99,235,0.3)]'
                        : 'bg-white dark:bg-dark-card text-slate-600 dark:text-slate-300 border-light-border dark:border-dark-border hover:border-primary-400 dark:hover:border-primary-600'"
                    class="px-4 py-2 text-sm font-medium rounded-lg border transition-all duration-200 cursor-pointer focus:outline-none">
                {{ $label }}
            </button>
            @endforeach
        </div>

        {{-- Projects Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5" x-data>

            @foreach($projects as $project)
            <div class="project-card card card-hover fade-up overflow-hidden"
                 x-show="$store.projects.isVisible('{{ $project->category }}')"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 x-data="{ modalOpen: false }">

                {{-- Thumb --}}
                <div class="project-thumb h-44 flex items-center justify-center text-5xl relative overflow-hidden bg-gradient-to-br {{ $project->thumb_gradient }}">
                    <span class="relative z-10 select-none drop-shadow-lg">{{ $project->thumb_icon }}</span>
                    {{-- Subtle pattern overlay --}}
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_70%,rgba(255,255,255,0.08),transparent_60%)]"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-black/20 to-transparent"></div>
                    {{-- Category badge --}}
                    <div class="absolute top-3 right-3 bg-black/25 backdrop-blur-sm text-white text-xs font-semibold px-2.5 py-1 rounded-md">
                        {{ strtoupper($project->category) }}
                    </div>
                </div>

                {{-- Body --}}
                <div class="p-6">
                    <h3 class="text-base font-bold text-slate-900 dark:text-slate-100 mb-2 tracking-tight">
                        {{ $project->title }}
                    </h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-4">
                        {{ $project->description }}
                    </p>

                    {{-- Tech Tags --}}
                    <div class="flex flex-wrap gap-1.5 mb-5">
                        @php
                            $tagColors = ['web' => 'tag-blue', 'uiux' => 'tag-pink', 'automation' => 'tag-green', 'ai-python' => 'tag-purple'];
                            $tagClass = $tagColors[$project->category] ?? 'tag-blue';
                        @endphp
                        @foreach($project->tech_stack as $tech)
                        <span class="tag {{ $tagClass }}">{{ $tech }}</span>
                        @endforeach
                    </div>

                    {{-- Action Row --}}
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" rel="noopener"
                               class="btn-outline-sm" id="link-{{ $project->slug }}">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                                Repository
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                            @endif
                        </div>

                        {{-- Details Button --}}
                        <button @click="modalOpen = true"
                                class="text-xs text-slate-400 dark:text-slate-500 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Details
                        </button>
                    </div>
                </div>

                {{-- Detail Modal --}}
                <div x-show="modalOpen"
                     x-transition:enter="transition ease-out duration-250"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 z-[200] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
                     @click.self="modalOpen = false"
                     @keydown.escape.window="modalOpen = false">

                    <div x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         class="bg-white dark:bg-dark-card rounded-2xl shadow-2xl border border-light-border dark:border-dark-border max-w-lg w-full overflow-hidden">

                        {{-- Modal Header Thumb --}}
                        <div class="h-32 bg-gradient-to-br {{ $project->thumb_gradient }} flex items-center justify-center text-4xl relative">
                            <span class="drop-shadow-lg">{{ $project->thumb_icon }}</span>
                            <button @click="modalOpen = false" class="absolute top-3 right-3 text-white/80 hover:text-white bg-black/20 hover:bg-black/40 rounded-lg p-1.5 transition-colors">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        {{-- Modal Body --}}
                        <div class="p-6">
                            <div class="flex items-start justify-between gap-4 mb-3">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100">{{ $project->title }}</h3>
                                <span class="tag tag-blue flex-shrink-0">{{ strtoupper($project->status) }}</span>
                            </div>
                            <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-4">
                                {{ $project->description }}
                            </p>

                            {{-- Highlights --}}
                            @if($project->highlights)
                            <div class="mb-4">
                                <div class="text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">Key Highlights</div>
                                <ul class="flex flex-col gap-1.5">
                                    @foreach($project->highlights as $highlight)
                                    <li class="flex items-start gap-2 text-sm text-slate-500 dark:text-slate-400">
                                        <span class="text-primary-600 dark:text-primary-400 mt-0.5 flex-shrink-0">▸</span>
                                        {{ $highlight }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- Tech Stack --}}
                            <div class="flex flex-wrap gap-1.5 mb-5">
                                @foreach($project->tech_stack as $tech)
                                <span class="tag {{ $tagClass }}">{{ $tech }}</span>
                                @endforeach
                            </div>

                            {{-- Actions --}}
                            <div class="flex gap-3">
                                @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="btn-primary flex-1 justify-center text-sm">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                    View Repository
                                </a>
                                @endif
                                <button @click="modalOpen = false" class="btn-secondary flex-shrink-0 text-sm">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>

        {{-- View All on GitHub --}}
        <div class="text-center mt-12 fade-up">
            <a href="https://github.com/{{ config('portfolio.github') }}" target="_blank" rel="noopener"
               class="btn-secondary inline-flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
                View All Projects on GitHub
            </a>
        </div>

    </div>
</section>
