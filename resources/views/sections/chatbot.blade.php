{{-- ── AI Chatbot Widget ── --}}
@if(config('portfolio.chatbot_enabled'))
<div x-data class="fixed bottom-6 right-6 z-[100]">

    {{-- Chat Window --}}
    <div x-show="$store.chatbot.open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-end="opacity-0 scale-90 translate-y-4"
         class="absolute bottom-16 right-0 w-80 sm:w-96 bg-white dark:bg-dark-card rounded-2xl shadow-2xl border border-light-border dark:border-dark-border overflow-hidden flex flex-col"
         style="max-height: 480px; min-height: 360px;">

        {{-- Chat Header --}}
        <div class="bg-gradient-to-r from-primary-600 to-indigo-600 p-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-white/20 flex items-center justify-center text-lg">🤖</div>
                <div>
                    <div class="text-sm font-bold text-white">Alfath's AI Assistant</div>
                    <div class="text-xs text-white/70">Ask me anything about Alfath!</div>
                </div>
            </div>
            <button @click="$store.chatbot.close()"
                    class="text-white/80 hover:text-white transition-colors p-1">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Messages Area --}}
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 flex flex-col gap-3 scrollbar-thin" style="min-height: 200px;">

            {{-- Welcome message --}}
            <div x-show="$store.chatbot.messages.length === 0" class="chat-bubble-ai">
                👋 Hi! I'm Alfath's AI assistant. You can ask me about his projects, skills, or availability. How can I help?
            </div>

            {{-- Message Loop --}}
            <template x-for="(msg, i) in $store.chatbot.messages" :key="i">
                <div :class="msg.role === 'user' ? 'chat-bubble-user' : 'chat-bubble-ai'" x-text="msg.text"></div>
            </template>

            {{-- Loading indicator --}}
            <div x-show="$store.chatbot.loading" class="chat-bubble-ai flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-slate-400 animate-bounce" style="animation-delay: 0ms"></span>
                <span class="w-1.5 h-1.5 rounded-full bg-slate-400 animate-bounce" style="animation-delay: 150ms"></span>
                <span class="w-1.5 h-1.5 rounded-full bg-slate-400 animate-bounce" style="animation-delay: 300ms"></span>
            </div>

            {{-- Rate limit warning --}}
            <div x-show="$store.chatbot.rateLimited" class="text-center text-xs text-slate-400 dark:text-slate-500 mt-2 px-2">
                You've reached the message limit. Please <a href="mailto:{{ config('portfolio.email') }}" class="text-primary-600 dark:text-primary-400 underline">email directly</a> for more.
            </div>
        </div>

        {{-- Suggested Questions --}}
        <div x-show="$store.chatbot.messages.length === 0" class="px-4 pb-3">
            <div class="text-xs text-slate-400 dark:text-slate-500 mb-2">Suggested questions:</div>
            <div class="flex flex-col gap-1.5">
                @foreach(['Apa proyek terbaikmu?', 'Apakah kamu open to freelance?', 'Tech stack apa yang kamu kuasai?'] as $q)
                <button @click="$store.chatbot.userInput = '{{ $q }}'; $store.chatbot.send()"
                        class="text-left text-xs text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/15 hover:bg-primary-100 dark:hover:bg-primary-900/25 px-3 py-2 rounded-lg transition-colors border border-primary-100 dark:border-primary-800/30">
                    {{ $q }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- Input Area --}}
        <div class="p-3 border-t border-light-border dark:border-dark-border">
            <div class="flex gap-2 items-end">
                <textarea x-model="$store.chatbot.userInput"
                          @keydown="$store.chatbot.handleKeydown($event)"
                          :disabled="$store.chatbot.rateLimited || $store.chatbot.loading"
                          placeholder="Ask me about Alfath..."
                          rows="1"
                          class="flex-1 px-3 py-2.5 text-sm rounded-xl border border-light-border dark:border-dark-border bg-light-surface dark:bg-dark-surface text-slate-900 dark:text-slate-100 placeholder-slate-400 resize-none focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all disabled:opacity-50"></textarea>
                <button @click="$store.chatbot.send()"
                        :disabled="!$store.chatbot.canSend"
                        class="flex-shrink-0 w-10 h-10 rounded-xl bg-primary-600 hover:bg-primary-700 disabled:opacity-40 disabled:cursor-not-allowed text-white flex items-center justify-center transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                </button>
            </div>
            <div class="flex justify-between mt-1.5">
                <span class="text-[10px] text-slate-400">Enter to send · Shift+Enter for new line</span>
                <span class="text-[10px] text-slate-400" x-text="`${$store.chatbot.messageCount}/${$store.chatbot.maxMessages} msgs`"></span>
            </div>
        </div>

    </div>

    {{-- Floating Toggle Button --}}
    <button @click="$store.chatbot.toggle()"
            class="w-14 h-14 rounded-full bg-gradient-to-br from-primary-600 to-indigo-600 text-white shadow-lg shadow-primary-600/40
                   flex items-center justify-center transition-all duration-300
                   hover:scale-110 hover:shadow-xl hover:shadow-primary-600/50
                   focus:outline-none focus:ring-4 focus:ring-primary-500/30"
            :title="$store.chatbot.open ? 'Close chat' : 'Ask AI about Alfath'">

        {{-- Pulse ring when closed --}}
        <div x-show="!$store.chatbot.open" class="absolute w-14 h-14 rounded-full bg-primary-600/30 animate-ping"></div>

        <template x-if="!$store.chatbot.open">
            <span class="text-2xl relative z-10">🤖</span>
        </template>
        <template x-if="$store.chatbot.open">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
        </template>
    </button>

</div>
@endif
