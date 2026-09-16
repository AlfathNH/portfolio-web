import Alpine from 'alpinejs';

window.Alpine = Alpine;

// ─── Dark Mode Manager ───────────────────────────────────────────────────────
const ThemeManager = {
    init() {
        const saved = localStorage.getItem('portfolio_theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        this.apply(saved ? saved === 'dark' : prefersDark);
    },
    apply(dark) {
        document.documentElement.classList.toggle('dark', dark);
        localStorage.setItem('portfolio_theme', dark ? 'dark' : 'light');
    },
    toggle() {
        const isDark = document.documentElement.classList.contains('dark');
        this.apply(!isDark);
    },
};
ThemeManager.init();
window.ThemeManager = ThemeManager;

// ─── Typed Text Animation ─────────────────────────────────────────────────────
window.initTypedAnimation = function(elementId, texts, options = {}) {
    const el = document.getElementById(elementId);
    if (!el) return;

    const { typingSpeed = 80, deletingSpeed = 45, pauseDuration = 1800 } = options;
    let textIndex = 0, charIndex = 0, isDeleting = false;

    function type() {
        const currentText = texts[textIndex];
        if (!isDeleting) {
            el.textContent = currentText.slice(0, ++charIndex);
            if (charIndex === currentText.length) {
                isDeleting = true;
                setTimeout(type, pauseDuration);
                return;
            }
        } else {
            el.textContent = currentText.slice(0, --charIndex);
            if (charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % texts.length;
            }
        }
        setTimeout(type, isDeleting ? deletingSpeed : typingSpeed);
    }
    type();
};

// ─── Scroll Fade-In Observer ──────────────────────────────────────────────────
window.initScrollFade = function() {
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReduced) {
        document.querySelectorAll('.fade-up').forEach(el => el.classList.add('visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                observer.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
};

// ─── Navbar scroll effect ─────────────────────────────────────────────────────
window.initNavbar = function() {
    const navbar = document.getElementById('navbar');
    if (!navbar) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('shadow-md');
        } else {
            navbar.classList.remove('shadow-md');
        }
    }, { passive: true });
};

// ─── Alpine.js Portfolio Data Stores ─────────────────────────────────────────
document.addEventListener('alpine:init', () => {

    // Mobile menu store
    Alpine.store('menu', {
        open: false,
        toggle() { this.open = !this.open; },
        close() { this.open = false; },
    });

    // Theme store
    Alpine.store('theme', {
        dark: document.documentElement.classList.contains('dark'),
        toggle() {
            ThemeManager.toggle();
            this.dark = document.documentElement.classList.contains('dark');
        },
    });

    // Project filter store
    Alpine.store('projects', {
        activeFilter: 'all',
        filters: ['all', 'web', 'uiux', 'automation', 'ai-python'],
        setFilter(f) { this.activeFilter = f; },
        isVisible(category) {
            return this.activeFilter === 'all' || this.activeFilter === category;
        },
    });

    // Chatbot store
    Alpine.store('chatbot', {
        open: false,
        loading: false,
        messageCount: 0,
        maxMessages: 10,
        messages: [],
        userInput: '',

        toggle() { this.open = !this.open; },
        close()  { this.open = false; },

        get canSend() {
            return this.userInput.trim().length > 0 &&
                   !this.loading &&
                   this.messageCount < this.maxMessages;
        },

        get rateLimited() {
            return this.messageCount >= this.maxMessages;
        },

        async send() {
            if (!this.canSend) return;

            const text = this.userInput.trim();
            this.userInput = '';
            this.messages.push({ role: 'user', text, time: new Date().toLocaleTimeString() });
            this.messageCount++;
            this.loading = true;

            try {
                const res = await fetch('/api/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ message: text }),
                });

                const data = await res.json();
                this.messages.push({
                    role: 'ai',
                    text: data.response || 'Sorry, I encountered an error. Please try again.',
                    time: new Date().toLocaleTimeString(),
                });
            } catch (e) {
                this.messages.push({
                    role: 'ai',
                    text: 'Unable to connect to AI service. Please try again later.',
                    time: new Date().toLocaleTimeString(),
                });
            } finally {
                this.loading = false;
                // Auto-scroll to bottom
                this.$nextTick(() => {
                    const container = document.getElementById('chat-messages');
                    if (container) container.scrollTop = container.scrollHeight;
                });
            }
        },

        handleKeydown(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                this.send();
            }
        },
    });
});

// ─── Initialize on DOM ready ──────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    initScrollFade();
    initNavbar();

    // Typed animation
    const typedEl = document.getElementById('typed-role');
    if (typedEl && window.__portfolioRoles) {
        initTypedAnimation('typed-role', window.__portfolioRoles);
    }

    // Skill bar animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll('.skill-fill[data-width]').forEach(bar => {
                    bar.style.width = bar.dataset.width;
                });
            }
        });
    }, { threshold: 0.3 });

    const skillsSection = document.getElementById('skills');
    if (skillsSection) observer.observe(skillsSection);

    // Project card mouse glow effect
    document.querySelectorAll('.project-card').forEach(card => {
        card.addEventListener('mousemove', e => {
            const r = card.getBoundingClientRect();
            card.style.setProperty('--mx', ((e.clientX - r.left) / r.width * 100) + '%');
            card.style.setProperty('--my', ((e.clientY - r.top)  / r.height * 100) + '%');
        });
    });
});

Alpine.start();
