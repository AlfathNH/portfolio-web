{{-- ── Skills & Technologies (Golden Ratio & Responsive Cards) ── --}}
<section id="skills" class="relative z-10 bg-slate-50/50 dark:bg-[#090f1d]/60 border-y border-light-border dark:border-dark-border">
    <div class="section-inner">

        {{-- Section Header --}}
        <div class="text-center mb-12 fade-up">
            <div class="inline-flex items-center gap-2 mb-2">
                <span class="section-label mb-0">Tech Stack</span>
                <div class="h-px w-8 bg-primary-500/40"></div>
            </div>
            <h2 class="section-title">Skills &amp; Technologies</h2>
            <div class="divider-glow mx-auto"></div>
            <p class="section-desc mx-auto">
                Tools and languages I utilize across modern web development, backend engineering, data modeling, and user experience design.
            </p>
        </div>

        @php
            $categoryMeta = [
                'frontend' => ['icon' => '🎨', 'label' => 'Frontend Development', 'desc' => 'Responsive web interfaces, styling, and interactions'],
                'backend'  => ['icon' => '⚙️', 'label' => 'Backend Engineering', 'desc' => 'API architectures, server logic, and business workflows'],
                'database' => ['icon' => '🗄️', 'label' => 'Database & Storage', 'desc' => 'Relational schemas, query optimization, and data modeling'],
                'design'   => ['icon' => '✏️', 'label' => 'UI/UX & Creative', 'desc' => 'Wireframing, design systems, and rapid prototyping'],
                'tools'    => ['icon' => '🔧', 'label' => 'Workflow & Automation', 'desc' => 'Version control, development tools, and scripting'],
            ];
        @endphp

        {{-- Skills Category Stack --}}
        <div class="flex flex-col gap-10">
            @foreach($skills as $categoryKey => $categoryData)
            @php
                $meta = $categoryMeta[$categoryKey] ?? ['icon' => '💡', 'label' => ucfirst($categoryKey), 'desc' => 'Core competencies'];
            @endphp
            <div class="fade-up card p-5 sm:p-7">

                {{-- Category Header --}}
                <div class="flex items-center justify-between mb-6 pb-3 border-b border-light-border dark:border-dark-border">
                    <div class="flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-primary-50 dark:bg-primary-950/40 border border-primary-100 dark:border-primary-800/40 flex items-center justify-center text-lg flex-shrink-0">
                            {{ $meta['icon'] }}
                        </span>
                        <div>
                            <h3 class="text-sm sm:text-base font-bold text-slate-900 dark:text-white uppercase tracking-wider">
                                {{ $meta['label'] }}
                            </h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400 hidden sm:block">
                                {{ $meta['desc'] }}
                            </p>
                        </div>
                    </div>

                    <span class="text-xs font-mono font-bold text-primary-600 dark:text-cyan-400 bg-primary-50 dark:bg-primary-950/40 px-2.5 py-1 rounded-md">
                        {{ count($categoryData['items']) }} SKILLS
                    </span>
                </div>

                {{-- Responsive Skills Grid (2-cols mobile, 3-cols tablet, 4 to 6-cols desktop) --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                    @foreach($categoryData['items'] as $skill)
                    <div class="skill-badge group" title="{{ $skill->level_label }}">

                        {{-- Skill Icon --}}
                        <div class="w-10 h-10 flex items-center justify-center flex-shrink-0 text-slate-800 dark:text-slate-100 group-hover:scale-110 transition-transform duration-200">
                            @if($skill->icon_class)
                                <i class="{{ $skill->icon_class }}" style="font-size: 2.1rem;"></i>
                            @elseif($skill->icon_url)
                                <img src="{{ $skill->icon_url }}" alt="{{ $skill->name }}" class="w-8 h-8 object-contain">
                            @else
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary-600 to-cyan-500 flex items-center justify-center text-white text-xs font-bold shadow-xs">
                                    {{ strtoupper(substr($skill->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>

                        {{-- Skill Name --}}
                        <span class="text-xs font-bold text-slate-700 dark:text-slate-200 text-center leading-tight tracking-tight">
                            {{ $skill->name }}
                        </span>

                        {{-- Progress Bar --}}
                        <div class="skill-bar w-full">
                            <div class="skill-fill" data-width="{{ $skill->level_percent }}%" style="width: 0%;"></div>
                        </div>

                        {{-- Level Label --}}
                        <span class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">
                            {{ $skill->level_label }}
                        </span>

                    </div>
                    @endforeach
                </div>

            </div>
            @endforeach
        </div>

        {{-- Always Building Banner --}}
        <div class="mt-10 p-4 rounded-xl glass-pill max-w-xl mx-auto text-center fade-up">
            <span class="text-xs text-slate-500 dark:text-slate-400">
                ⚡ Active Continuous Learning: <strong class="text-primary-600 dark:text-cyan-400 font-mono">FastAPI · OpenCV Pipelines · Docker Containerization</strong>
            </span>
        </div>

    </div>
</section>
