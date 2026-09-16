{{-- ── Timeline Section ── --}}
<section id="timeline" class="relative z-10 bg-light-surface dark:bg-dark-surface">
    <div class="section-inner">

        {{-- Header --}}
        <div class="text-center mb-14 fade-up">
            <span class="section-label">Journey</span>
            <h2 class="section-title">Career & Education<br><span class="text-gradient">Roadmap</span></h2>
            <div class="divider-glow mx-auto"></div>
            <p class="section-desc mx-auto">My educational journey, achievements, and experience — the milestones that shaped who I am today.</p>
        </div>

        {{-- Filter Tabs --}}
        @php
            $typeLabels = [
                'all'          => '🗺️ All',
                'education'    => '🎓 Education',
                'achievement'  => '🏆 Achievements',
                'organization' => '🏢 Organization',
                'internship'   => '💼 Experience',
            ];
        @endphp
        <div class="flex flex-wrap justify-center gap-2 mb-10 fade-up" x-data="{ activeType: 'all' }">
            @foreach($typeLabels as $key => $label)
            <button @click="activeType = '{{ $key }}'"
                    :class="activeType === '{{ $key }}'
                        ? 'bg-primary-600 text-white border-primary-600 shadow-[0_2px_8px_rgba(37,99,235,0.3)]'
                        : 'bg-white dark:bg-dark-card text-slate-600 dark:text-slate-300 border-light-border dark:border-dark-border hover:border-primary-400'"
                    class="px-4 py-2 text-sm font-medium rounded-lg border transition-all duration-200 cursor-pointer focus:outline-none">
                {{ $label }}
            </button>
            @endforeach

            {{-- Timeline Content --}}
            <div class="w-full mt-10">
                <div class="relative pl-0">
                    {{-- Vertical Line --}}
                    <div class="absolute left-8 top-4 bottom-4 w-px bg-light-border dark:bg-dark-border"></div>

                    {{-- Entries --}}
                    @php
                        $badgeColors = [
                            'blue'   => 'bg-primary-600 ring-primary-200 dark:ring-primary-800/50',
                            'purple' => 'bg-purple-600 ring-purple-200 dark:ring-purple-800/50',
                            'green'  => 'bg-emerald-600 ring-emerald-200 dark:ring-emerald-800/50',
                            'orange' => 'bg-orange-500 ring-orange-200 dark:ring-orange-800/50',
                        ];
                    @endphp
                    @foreach($timeline as $entry)
                    <div class="relative pl-20 pb-8 fade-up"
                         x-show="activeType === 'all' || activeType === '{{ $entry->type }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-x-4"
                         x-transition:enter-end="opacity-100 translate-x-0">

                        {{-- Dot --}}
                        <div class="absolute left-8 w-5 h-5 -translate-x-1/2 mt-4 z-10">
                            <div class="w-5 h-5 rounded-full ring-4 ring-white dark:ring-dark-bg {{ $badgeColors[$entry->badge_color] ?? $badgeColors['blue'] }} flex items-center justify-center text-[8px]">
                            </div>
                        </div>

                        {{-- Card --}}
                        <div class="bg-white dark:bg-dark-card border border-light-border dark:border-dark-border rounded-xl p-5 shadow-sm hover:border-primary-300 dark:hover:border-primary-700 hover:shadow-md transition-all duration-300">
                            {{-- Top row --}}
                            <div class="flex items-start justify-between gap-3 mb-2">
                                <div class="flex items-center gap-2.5">
                                    <span class="text-xl flex-shrink-0">{{ $entry->icon_emoji }}</span>
                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900 dark:text-slate-100 leading-tight">
                                            {{ $entry->title }}
                                        </h3>
                                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $entry->institution }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end gap-1.5 flex-shrink-0">
                                    <span class="text-xs font-semibold text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20 px-2.5 py-1 rounded-lg">
                                        {{ $entry->period }}
                                    </span>
                                    @if($entry->is_current)
                                    <span class="flex items-center gap-1 text-[10px] font-semibold text-emerald-600 dark:text-emerald-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Current
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if($entry->description)
                            <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed pl-9">
                                {{ $entry->description }}
                            </p>
                            @endif
                        </div>
                    </div>
                    @endforeach

                    {{-- Future dot --}}
                    <div class="relative pl-20 fade-up">
                        <div class="absolute left-8 w-5 h-5 -translate-x-1/2 mt-1 z-10">
                            <div class="w-5 h-5 rounded-full border-2 border-dashed border-primary-400 dark:border-primary-600 bg-white dark:bg-dark-bg flex items-center justify-center animate-pulse">
                            </div>
                        </div>
                        <div class="bg-primary-50/50 dark:bg-primary-900/5 border border-dashed border-primary-200 dark:border-primary-800/30 rounded-xl p-4 text-center">
                            <p class="text-xs text-primary-600 dark:text-primary-400 font-medium">🚀 Next chapter — still writing...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
