{{-- ── Contact Section ── --}}
<section id="contact" class="relative z-10">
    <div class="section-inner text-center">

        {{-- Header --}}
        <div class="fade-up mb-12">
            <span class="section-label">Contact</span>
            <h2 class="section-title">Let's work together</h2>
            <div class="divider-glow mx-auto"></div>
            <p class="section-desc mx-auto mb-0">
                I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision.
                Feel free to reach out through any channel below!
            </p>
        </div>

        {{-- Social Links Grid --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-12 fade-up">
            <a href="https://github.com/{{ config('portfolio.github') }}" target="_blank" rel="noopener"
               class="contact-card" id="contact-github">
                <div class="w-12 h-12 rounded-xl bg-slate-100 dark:bg-slate-700 flex items-center justify-center">
                    <svg class="w-6 h-6 text-slate-800 dark:text-slate-100" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                </div>
                <strong class="text-sm font-semibold text-slate-900 dark:text-slate-100">GitHub</strong>
                <span class="text-xs text-slate-500 dark:text-slate-400">{{ '@' . config('portfolio.github') }}</span>
            </a>

            <a href="https://instagram.com/{{ config('portfolio.instagram') }}" target="_blank" rel="noopener"
               class="contact-card" id="contact-instagram">
                <div class="w-12 h-12 rounded-xl bg-pink-50 dark:bg-pink-900/20 flex items-center justify-center">
                    <svg class="w-6 h-6 text-pink-600 dark:text-pink-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </div>
                <strong class="text-sm font-semibold text-slate-900 dark:text-slate-100">Instagram</strong>
                <span class="text-xs text-slate-500 dark:text-slate-400">{{ '@' . config('portfolio.instagram') }}</span>
            </a>

            <a href="https://youtube.com/{{ '@' . config('portfolio.youtube') }}" target="_blank" rel="noopener"
               class="contact-card" id="contact-youtube">
                <div class="w-12 h-12 rounded-xl bg-red-50 dark:bg-red-900/20 flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/>
                    </svg>
                </div>
                <strong class="text-sm font-semibold text-slate-900 dark:text-slate-100">YouTube</strong>
                <span class="text-xs text-slate-500 dark:text-slate-400">{{ '@' . config('portfolio.youtube') }}</span>
            </a>

            <a href="mailto:{{ config('portfolio.email') }}" class="contact-card" id="contact-email">
                <div class="w-12 h-12 rounded-xl bg-primary-50 dark:bg-primary-900/20 flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <strong class="text-sm font-semibold text-slate-900 dark:text-slate-100">Email</strong>
                <span class="text-xs text-slate-500 dark:text-slate-400">{{ config('portfolio.email') }}</span>
            </a>
        </div>

        {{-- Contact Form --}}
        <div class="max-w-xl mx-auto fade-up" x-data="{
            name: '',
            email: '',
            message: '',
            loading: false,
            success: null,
            error: null,
            async submit() {
                if (!this.name || !this.email || !this.message) return;
                this.loading = true;
                this.success = null;
                this.error = null;
                try {
                    const res = await fetch('/contact', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                        },
                        body: JSON.stringify({ name: this.name, email: this.email, message: this.message })
                    });
                    const data = await res.json();
                    if (data.success) {
                        this.success = data.message;
                        this.name = ''; this.email = ''; this.message = '';
                    } else {
                        this.error = data.message;
                    }
                } catch(e) {
                    this.error = 'Failed to send. Please email directly at {{ config('portfolio.email') }}';
                } finally {
                    this.loading = false;
                }
            }
        }">
            <div class="card p-7 text-left">
                <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100 mb-1">Send a Message</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-6">Drop me a message and I'll get back to you within 24 hours.</p>

                <form @submit.prevent="submit" class="flex flex-col gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Your Name</label>
                        <input type="text" x-model="name" required placeholder="e.g. Budi Santoso"
                               class="w-full px-4 py-2.5 text-sm rounded-lg border border-light-border dark:border-dark-border bg-light-surface dark:bg-dark-surface text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Email Address</label>
                        <input type="email" x-model="email" required placeholder="budi@example.com"
                               class="w-full px-4 py-2.5 text-sm rounded-lg border border-light-border dark:border-dark-border bg-light-surface dark:bg-dark-surface text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Message</label>
                        <textarea x-model="message" required rows="4" placeholder="Tell me about your project or opportunity..."
                                  class="w-full px-4 py-2.5 text-sm rounded-lg border border-light-border dark:border-dark-border bg-light-surface dark:bg-dark-surface text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all resize-none"></textarea>
                    </div>

                    {{-- Success/Error --}}
                    <div x-show="success" x-transition class="text-sm text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/15 border border-emerald-200 dark:border-emerald-700/30 px-4 py-3 rounded-lg" x-text="success"></div>
                    <div x-show="error" x-transition class="text-sm text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/15 border border-red-200 dark:border-red-700/30 px-4 py-3 rounded-lg" x-text="error"></div>

                    <button type="submit" :disabled="loading" class="btn-primary justify-center">
                        <template x-if="!loading">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                Send Message
                            </span>
                        </template>
                        <template x-if="loading">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                                Sending...
                            </span>
                        </template>
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>
