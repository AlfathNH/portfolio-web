{{-- ── Skills Section ── --}}
<section id="skills" class="relative z-10 bg-light-surface dark:bg-dark-surface">
    <div class="section-inner">

        {{-- Header --}}
        <div class="text-center mb-12 fade-up">
            <span class="section-label">Expertise</span>
            <h2 class="section-title">Skills & Technologies</h2>
            <div class="divider-glow mx-auto"></div>
            <p class="section-desc mx-auto">Technologies and tools I work with regularly — from frontend design to backend systems and automation.</p>
        </div>

        @php
            $categoryIcons = [
                'frontend' => '🎨',
                'backend'  => '⚙️',
                'database' => '🗄️',
                'design'   => '✏️',
                'tools'    => '🔧',
            ];
            $categoryLabels = [
                'frontend' => 'Frontend',
                'backend'  => 'Backend',
                'database' => 'Database',
                'design'   => 'Design',
                'tools'    => 'Tools & Workflow',
            ];
        @endphp

        {{-- Skills Grid by Category --}}
        <div class="flex flex-col gap-10">
            @foreach($skills as $categoryKey => $categoryData)
            <div class="fade-up">
                {{-- Category Header --}}
                <div class="flex items-center gap-2 mb-5">
                    <span class="text-xl">{{ $categoryIcons[$categoryKey] ?? '💡' }}</span>
                    <h3 class="text-sm font-bold text-slate-700 dark:text-slate-300 uppercase tracking-widest">
                        {{ $categoryLabels[$categoryKey] ?? ucfirst($categoryKey) }}
                    </h3>
                    <div class="flex-1 h-px bg-light-border dark:bg-dark-border ml-2"></div>
                </div>

                {{-- Skills Grid --}}
                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-3">
                    @foreach($categoryData['items'] as $skill)
                    <div class="skill-badge group" title="{{ $skill->level_label }}">
                        {{-- Icon --}}
                        <div class="w-10 h-10 flex items-center justify-center flex-shrink-0">
                            @if($skill->icon_class)
                                <i class="{{ $skill->icon_class }}" style="font-size: 2.2rem;"></i>
                            @elseif($skill->icon_url)
                                <img src="{{ $skill->icon_url }}" alt="{{ $skill->name }}" class="w-9 h-9 object-contain">
                            @elseif($skill->color)
                                <div class="w-9 h-9 rounded-lg flex items-center justify-center text-white text-xs font-bold"
                                     style="background: {{ $skill->color }};">
                                    {{ strtoupper(substr($skill->name, 0, 2)) }}
                                </div>
                            @else
                                <div class="w-9 h-9 rounded-lg bg-primary-100 dark:bg-primary-900/20 flex items-center justify-center text-primary-600 dark:text-primary-400 text-xs font-bold">
                                    {{ strtoupper(substr($skill->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>

                        {{-- Name --}}
                        <span class="text-[0.65rem] font-semibold text-slate-500 dark:text-slate-400 text-center leading-tight tracking-tight">
                            {{ $skill->name }}
                        </span>

                        {{-- Level Progress Bar --}}
                        <div class="skill-bar w-full">
                            <div class="skill-fill" data-width="{{ $skill->level_percent }}%" style="width: 0%;"></div>
                        </div>

                        {{-- Level label (visible on hover) --}}
                        <span class="text-[0.6rem] text-slate-400 dark:text-slate-500 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            {{ $skill->level_label }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        {{-- Bottom note --}}
        <p class="text-center text-xs text-slate-400 dark:text-slate-500 mt-12 fade-up">
            Always learning. Always building. Currently exploring: <span class="text-primary-600 dark:text-primary-400 font-medium">FastAPI · Docker · CI/CD</span>
        </p>

    </div>
</section>
