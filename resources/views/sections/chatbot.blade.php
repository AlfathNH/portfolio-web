{{-- ── AI Chatbot Widget (Mobile-First & Midnight Aesthetics) ── --}}
@if(config('portfolio.chatbot_enabled'))
<div x-data class="fixed bottom-4 sm:bottom-6 right-4 sm:right-6 z-[100]">

    {{-- Chat Window (Mobile-Friendly & Safe-Area Aware) --}}
    <div x-show="$store.chatbot.open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-end="opacity-0 scale-90 translate-y-4"
         class="absolute bottom-16 right-0 w-[calc(100vw-2rem)] sm:w-96 max-w-sm bg-white dark:bg-dark-card rounded-2xl shadow-2xl border border-light-border dark:border-dark-border overflow-hidden flex flex-col z-[110]"
         style="max-height: 80vh; min-height: 380px; display: none;">

        {{-- Chat Header --}}
        <div class="bg-gradient-to-r from-primary-600 via-primary-700 to-indigo-700 p-4 flex items-center justify-between text-white shadow-sm flex-shrink-0">
            <div class="flex items-center gap-3">
                <div class="relative w-10 h-10 rounded-full bg-white/20 p-0.5 shadow-sm flex-shrink-0">
                    <div class="w-full h-full rounded-full bg-white flex items-center justify-center p-1 overflow-hidden">
                        <img src="{{ asset('images/chatbot-avatar.png') }}" alt="AI Assistant" class="w-full h-full object-contain">
                    </div>
                    <span class="absolute bottom-0 right-0 w-2.5 h-2.5 rounded-full bg-emerald-400 ring-2 ring-white"></span>
                </div>
                <div>
                    <div class="text-sm font-bold leading-tight">Alfath's AI Assistant</div>
                    <div class="text-[11px] text-cyan-200 mt-0.5">Interactive Knowledge Agent</div>
                </div>
            </div>
            <button @click="$store.chatbot.close()"
                    class="text-white/80 hover:text-white bg-white/10 hover:bg-white/20 rounded-lg p-1.5 transition-colors cursor-pointer"
                    aria-label="Close chat">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Messages Scroll Area --}}
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 flex flex-col gap-3 scrollbar-thin" style="min-height: 200px;">

            {{-- Welcome bubble --}}
            <div x-show="$store.chatbot.messages.length === 0" class="chat-bubble-ai">
                👋 Halo! Saya asisten AI representasi portofolio Alfath. Anda bisa bertanya seputar pengalaman di BEM, proyek Virtual Camera, keahlian teknis, atau mendiskusikan peluang kolaborasi. Ada yang ingin Anda ketahui?
            </div>

            {{-- Dynamic Message Bubbles --}}
            <template x-for="(msg, i) in $store.chatbot.messages" :key="i">
                <div :class="msg.role === 'user' ? 'chat-bubble-user' : 'chat-bubble-ai'" x-text="msg.text"></div>
            </template>

            {{-- Typing loading indicator --}}
            <div x-show="$store.chatbot.loading" class="chat-bubble-ai flex items-center gap-1.5 w-fit">
                <span class="w-2 h-2 rounded-full bg-primary-500 animate-bounce" style="animation-delay: 0ms"></span>
                <span class="w-2 h-2 rounded-full bg-primary-500 animate-bounce" style="animation-delay: 150ms"></span>
                <span class="w-2 h-2 rounded-full bg-primary-500 animate-bounce" style="animation-delay: 300ms"></span>
            </div>

            {{-- Rate limit note --}}
            <div x-show="$store.chatbot.rateLimited" class="text-center text-xs text-slate-400 dark:text-slate-500 mt-2 px-2">
                Batas interaksi tercapai. Silakan hubungi langsung melalui <a href="mailto:{{ config('portfolio.email') }}" class="text-primary-600 dark:text-cyan-400 underline font-semibold">email</a>.
            </div>
        </div>

        {{-- Suggested Quick Question Chips --}}
        <div x-show="$store.chatbot.messages.length === 0" class="px-4 pb-3 flex-shrink-0">
            <div class="text-[11px] font-bold text-slate-400 dark:text-slate-500 mb-2 uppercase tracking-wider">Pertanyaan Cepat:</div>
            <div class="flex flex-col gap-1.5">
                @foreach(['Ceritakan proyek Meme Virtual Camera!', 'Apa keahlian utama Alfath?', 'Apakah open untuk kolaborasi project?'] as $q)
                <button @click="$store.chatbot.userInput = '{{ $q }}'; $store.chatbot.send()"
                        class="text-left text-xs text-primary-600 dark:text-cyan-400 bg-primary-50 dark:bg-primary-950/40 hover:bg-primary-100 dark:hover:bg-primary-900/40 px-3 py-2 rounded-xl transition-colors border border-primary-100 dark:border-primary-800/30 cursor-pointer">
                    {{ $q }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- Input Bar (Mobile font >= 16px to prevent zoom) --}}
        <div class="p-3 border-t border-light-border dark:border-dark-border bg-white dark:bg-dark-card flex-shrink-0">
            <div class="flex gap-2 items-end">
                <textarea x-model="$store.chatbot.userInput"
                          @keydown="$store.chatbot.handleKeydown($event)"
                          :disabled="$store.chatbot.rateLimited || $store.chatbot.loading"
                          placeholder="Tanyakan sesuatu..."
                          rows="1"
                          class="flex-1 px-3.5 py-2 text-base sm:text-sm rounded-xl border border-light-border dark:border-dark-border bg-slate-50 dark:bg-dark-surface text-slate-900 dark:text-slate-100 placeholder-slate-400 resize-none focus:outline-none focus:ring-2 focus:ring-primary-500 transition-all disabled:opacity-50"></textarea>
                <button @click="$store.chatbot.send()"
                        :disabled="!$store.chatbot.canSend"
                        class="flex-shrink-0 w-10 h-10 rounded-xl bg-primary-600 hover:bg-primary-700 disabled:opacity-40 disabled:cursor-not-allowed text-white flex items-center justify-center transition-all cursor-pointer shadow-md shadow-primary-600/30"
                        aria-label="Kirim pesan">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                </button>
            </div>
            <div class="flex justify-between items-center mt-1.5 px-0.5">
                <span class="text-[10px] text-slate-400">Tekan Enter untuk kirim</span>
                <span class="text-[10px] text-slate-400 font-mono" x-text="`${$store.chatbot.messageCount}/${$store.chatbot.maxMessages}`"></span>
            </div>
        </div>

    </div>

    {{-- Proactive AI Greeting Tooltip on Page Load --}}
    <div x-data="{
            showGreeting: false,
            dismissed: false,
            init() {
                if (sessionStorage.getItem('chatbot_greeting_dismissed')) return;
                setTimeout(() => {
                    if (!$store.chatbot.open && !this.dismissed) {
                        this.showGreeting = true;
                    }
                }, 2800);
            },
            dismiss() {
                this.showGreeting = false;
                this.dismissed = true;
                sessionStorage.setItem('chatbot_greeting_dismissed', 'true');
            },
            openChat() {
                this.dismiss();
                $store.chatbot.open = true;
            }
         }"
         x-show="showGreeting && !$store.chatbot.open"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 translate-y-3 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-end="opacity-0 translate-y-2 scale-95"
         class="absolute bottom-16 right-0 mb-2 w-72 sm:w-80 max-w-[calc(100vw-3rem)] glass-pill rounded-2xl shadow-2xl p-3.5 cursor-pointer group transition-all select-none z-[105]"
         @click="openChat()"
         style="display: none;">

        <div class="flex items-start gap-3">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary-600 to-cyan-500 p-0.5 shadow-md flex-shrink-0">
                <div class="w-full h-full rounded-full bg-white flex items-center justify-center p-1">
                    <img src="{{ asset('images/chatbot-avatar.png') }}" alt="AI Avatar" class="w-full h-full object-contain">
                </div>
            </div>
            <div class="flex-1 pr-3">
                <div class="flex items-center gap-1.5 mb-0.5">
                    <span class="text-xs font-bold text-slate-900 dark:text-white">AI Assistant</span>
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-snug m-0">
                    Halo! Ingin tahu lebih banyak tentang proyek atau skill Alfath? Tanya saya yuk!
                </p>
            </div>
            <button @click.stop="dismiss()"
                    class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 p-1"
                    title="Tutup">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Floating Toggle Trigger Button --}}
    <button @click="$store.chatbot.toggle()"
            class="w-14 h-14 rounded-full bg-gradient-to-br from-primary-600 via-primary-500 to-cyan-500 text-white shadow-xl shadow-primary-600/35
                   flex items-center justify-center transition-all duration-300
                   hover:scale-108 hover:shadow-2xl hover:shadow-primary-600/50
                   focus:outline-none focus:ring-4 focus:ring-primary-500/30 cursor-pointer"
            :title="$store.chatbot.open ? 'Close chat' : 'Ask AI about Alfath'">

        {{-- Subtle pulsating ring when closed --}}
        <div x-show="!$store.chatbot.open" class="absolute w-14 h-14 rounded-full bg-primary-500/30 animate-ping pointer-events-none"></div>

        <template x-if="!$store.chatbot.open">
            <div class="w-9 h-9 rounded-full bg-white flex items-center justify-center p-1 shadow-xs relative z-10">
                <img src="{{ asset('images/chatbot-avatar.png') }}" alt="AI Assistant" class="w-full h-full object-contain">
            </div>
        </template>
        <template x-if="$store.chatbot.open">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </template>
    </button>

</div>
@endif
