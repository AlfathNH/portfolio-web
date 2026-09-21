{{-- ── Project Details Modal Component (Teleported Fullscreen Modal) ── --}}
<div x-show="activeModal === '{{ $project->slug }}'"
     x-transition:enter="transition ease-out duration-250"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[999] flex items-center justify-center p-3 sm:p-5 lg:p-8 bg-black/85 backdrop-blur-md"
     @click.self="closeModal()"
     style="display: none;">

    <div x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         class="bg-white dark:bg-dark-card rounded-2xl shadow-2xl border border-light-border dark:border-dark-border max-w-5xl lg:max-w-6xl w-full overflow-hidden flex flex-col max-h-[92vh]"
         @click.stop>

        {{-- Large Visual Banner with Real Screenshots & Switchers --}}
        <div class="relative h-64 sm:h-80 md:h-[420px] lg:h-[460px] bg-slate-950 overflow-hidden flex-shrink-0 border-b border-light-border dark:border-dark-border group flex items-center justify-center">

            {{-- Close Button --}}
            <button @click="closeModal()"
                    class="absolute top-3.5 right-3.5 z-30 text-white/90 hover:text-white bg-black/60 hover:bg-black/90 rounded-xl p-2 sm:p-2.5 transition-colors cursor-pointer border border-white/15 backdrop-blur-md"
                    aria-label="Close modal">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            @if($project->slug === 'memecam-virtual-camera')
                {{-- Mode 1: Real Camera Capture --}}
                <div x-show="viewMode === 'real'" class="w-full h-full relative flex items-center justify-center bg-slate-950">
                    <img src="{{ asset('images/projects/project-memecam-real.png') }}"
                         alt="Real Webcam Capture - Meme Reaction Virtual Camera"
                         class="w-full h-full object-cover object-top"
                         loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-black/20 pointer-events-none"></div>
                    <div class="absolute bottom-3.5 left-4 bg-black/85 backdrop-blur-md text-emerald-300 border border-emerald-500/30 text-[11px] sm:text-xs font-mono font-bold px-3 py-1.5 rounded-lg flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>LIVE GESTURE: Thumbs Up &rarr; Cat Thumbs-Up Meme Overlay</span>
                    </div>
                </div>

                {{-- Mode 2: System Telemetry Architecture --}}
                <div x-show="viewMode === 'telemetry'" class="w-full h-full relative flex items-center justify-center bg-slate-950" style="display: none;">
                    <img src="{{ asset('images/meme-cam-mockup.png') }}"
                         alt="AI Meme Reaction Virtual Camera Telemetry Architecture"
                         class="w-full h-full object-cover object-center"
                         loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-black/20 pointer-events-none"></div>
                    <div class="absolute bottom-3.5 left-4 bg-black/85 backdrop-blur-md text-cyan-300 border border-cyan-500/30 text-[11px] sm:text-xs font-mono font-bold px-3 py-1.5 rounded-lg flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                        <span>ARCHITECTURE: OpenCV Pipeline &amp; OBS Virtual Camera Nodes</span>
                    </div>
                </div>

                {{-- Top Switcher Controls for Meme Cam --}}
                <div class="absolute top-3.5 left-4 flex flex-wrap gap-2 z-20">
                    <button @click.stop="viewMode = 'real'"
                            :class="viewMode === 'real' ? 'bg-primary-600 text-white shadow-md' : 'bg-black/70 text-slate-300 hover:text-white'"
                            class="backdrop-blur-md text-xs font-mono font-bold px-3.5 py-1.5 rounded-lg border border-white/20 transition-all cursor-pointer">
                        📸 Real Camera
                    </button>
                    <button @click.stop="viewMode = 'telemetry'"
                            :class="viewMode === 'telemetry' ? 'bg-primary-600 text-white shadow-md' : 'bg-black/70 text-slate-300 hover:text-white'"
                            class="backdrop-blur-md text-xs font-mono font-bold px-3.5 py-1.5 rounded-lg border border-white/20 transition-all cursor-pointer">
                        🖥️ Architecture
                    </button>
                </div>

            @elseif($project->slug === 'vertex-logistics-concept')
                {{-- Mode 1: Real Dashboard UI --}}
                <div x-show="viewMode === 'real'" class="w-full h-full relative flex items-center justify-center bg-slate-950">
                    <img src="{{ asset('images/projects/project-vertex-real.png') }}"
                         alt="Vertex Logistics Dashboard UI"
                         class="w-full h-full object-contain sm:object-cover object-top"
                         loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-black/20 pointer-events-none"></div>
                    <div class="absolute bottom-3.5 left-4 bg-black/85 backdrop-blur-md text-emerald-300 border border-emerald-500/30 text-[11px] sm:text-xs font-mono font-bold px-3 py-1.5 rounded-lg flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>REAL UI: GatePass &amp; Live Tracking Dashboard</span>
                    </div>
                </div>

                {{-- Mode 2: Figma Workspace Canvas --}}
                <div x-show="viewMode === 'figma'" class="w-full h-full relative flex items-center justify-center bg-slate-950" style="display: none;">
                    <img src="{{ asset('images/projects/project-vertex-figma.png') }}"
                         alt="Vertex Logistics Figma Design System"
                         class="w-full h-full object-contain sm:object-cover object-top"
                         loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-black/20 pointer-events-none"></div>
                    <div class="absolute bottom-3.5 left-4 bg-black/85 backdrop-blur-md text-purple-300 border border-purple-500/30 text-[11px] sm:text-xs font-mono font-bold px-3 py-1.5 rounded-lg flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-400"></span>
                        <span>DESIGN SYSTEM: Figma Workspace &amp; Prototyping</span>
                    </div>
                </div>

                {{-- Top Switcher Controls for Vertex --}}
                <div class="absolute top-3.5 left-4 flex flex-wrap gap-2 z-20">
                    <button @click.stop="viewMode = 'real'"
                            :class="viewMode === 'real' ? 'bg-primary-600 text-white shadow-md' : 'bg-black/70 text-slate-300 hover:text-white'"
                            class="backdrop-blur-md text-xs font-mono font-bold px-3.5 py-1.5 rounded-lg border border-white/20 transition-all cursor-pointer">
                        📊 Dashboard UI
                    </button>
                    <button @click.stop="viewMode = 'figma'"
                            :class="viewMode === 'figma' ? 'bg-primary-600 text-white shadow-md' : 'bg-black/70 text-slate-300 hover:text-white'"
                            class="backdrop-blur-md text-xs font-mono font-bold px-3.5 py-1.5 rounded-lg border border-white/20 transition-all cursor-pointer">
                        🎨 Figma Canvas
                    </button>
                </div>

            @else
                {{-- Single Real Screenshot for Other Projects --}}
                @if($project->image_url)
                    <div class="w-full h-full relative flex items-center justify-center bg-slate-950">
                        <img src="{{ asset($project->image_url) }}"
                             alt="{{ $project->title }}"
                             class="w-full h-full object-contain sm:object-cover object-top"
                             loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-black/20 pointer-events-none"></div>
                        <div class="absolute bottom-3.5 left-4 bg-black/85 backdrop-blur-md text-emerald-300 border border-emerald-500/30 text-[11px] sm:text-xs font-mono font-bold px-3 py-1.5 rounded-lg flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>Real Project UI &amp; Production Preview</span>
                        </div>
                    </div>
                @else
                    <div class="w-full h-full bg-gradient-to-br {{ $project->thumb_gradient }} flex items-center justify-center text-7xl">
                        <span class="drop-shadow-lg">{{ $project->thumb_icon }}</span>
                    </div>
                @endif
            @endif

        </div>

        {{-- Modal Body --}}
        <div class="p-6 sm:p-8 md:p-10 overflow-y-auto scrollbar-thin flex-1">
            {{-- Category & Status Header --}}
            <div class="flex items-start justify-between gap-4 mb-4">
                <div>
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="text-2xl">{{ $project->thumb_icon }}</span>
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
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ $project->title }}
                    </h3>
                </div>
                <span class="tag tag-blue flex-shrink-0 text-xs uppercase font-bold px-3.5 py-1.5">{{ $project->status }}</span>
            </div>

            {{-- Deskripsi Lengkap / Singkat --}}
            <p class="text-slate-600 dark:text-slate-300 text-sm sm:text-base leading-relaxed mb-6">
                {{ $project->description }}
            </p>

            {{-- Key Engineering Highlights --}}
            @if($project->highlights)
            <div class="mb-6 bg-slate-50 dark:bg-dark-surface/60 p-5 rounded-xl border border-light-border dark:border-dark-border">
                <div class="text-xs font-bold text-slate-700 dark:text-slate-200 uppercase tracking-wider mb-3 flex items-center gap-1.5">
                    <span>⚡</span>
                    <span>Fitur Utama &amp; Engineering Highlights</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach($project->highlights as $highlight)
                    <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700 dark:text-slate-200">
                        <span class="text-primary-600 dark:text-cyan-400 font-bold mt-0.5 flex-shrink-0">✦</span>
                        <span>{{ $highlight }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Tech Stack Badges --}}
            <div class="mb-6">
                <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 mb-2.5">Technologies Used:</div>
                <div class="flex flex-wrap gap-2">
                    @foreach($project->tech_stack as $tech)
                    <span class="tag tag-blue font-mono text-xs px-3 py-1">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-5 border-t border-light-border dark:border-dark-border">
                @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" rel="noopener"
                   class="btn-primary flex-1 justify-center text-sm !min-h-[46px]">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    <span>View Repository on GitHub</span>
                </a>
                @endif
                <button @click="closeModal()" class="btn-secondary justify-center text-sm !min-h-[46px] px-8 cursor-pointer">
                    Tutup (Close)
                </button>
            </div>
        </div>

    </div>
</div>

