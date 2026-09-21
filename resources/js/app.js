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

        getSmartFallback(message) {
            const q = message.toLowerCase();
            if (q.includes('proyek') || q.includes('project') || q.includes('karya') || q.includes('portfolio') || q.includes('portofolio') || q.includes('aplikasi')) {
                return "Berikut adalah beberapa proyek unggulan Alfath:\n\n1. 📷 **Meme Reaction Virtual Camera** — Virtual camera Python berbasis computer vision & deep learning untuk mendeteksi ekspresi wajah secara real-time.\n2. 🌐 **Modern Interactive Portfolio** — Web portofolio responsif dengan dark mode, AI assistant, dan visual yang clean.\n3. 🎓 **Dokumentasi & Media Subang Project Day** — Pengelolaan publikasi dan liputan visual pameran teknologi Polsub.\n\nAnda bisa melihat detail dan source code lengkapnya di bagian Projects!";
            }
            if (q.includes('skill') || q.includes('keahlian') || q.includes('bahasa') || q.includes('stack') || q.includes('teknologi') || q.includes('kuasai') || q.includes('tech')) {
                return "Tech stack yang dikuasai Alfath meliputi:\n\n• **Backend & Core:** PHP (Laravel), Python (FastAPI, OpenCV), SQL (MySQL, SQLite)\n• **Frontend:** Tailwind CSS, JavaScript, Alpine.js, Blade\n• **Tools & Others:** Git, GitHub, Docker, Figma UI/UX Design, Linux\n\nCek tab Skills di atas untuk melihat tingkat kemahiran masing-masing bidang!";
            }
            if (q.includes('kuliah') || q.includes('kampus') || q.includes('pendidikan') || q.includes('jurusan') || q.includes('polsub') || q.includes('sekolah') || q.includes('almamater')) {
                return "Alfath saat ini berkuliah di **Politeknik Negeri Subang (POLSUB)** dengan minat mendalam pada Rekayasa Perangkat Lunak, Kecerdasan Buatan (AI), dan Desain Antarmuka Pengguna (UI/UX).";
            }
            if (q.includes('bem') || q.includes('organisasi') || q.includes('menteri') || q.includes('pengalaman') || q.includes('experience') || q.includes('project day')) {
                return "Pengalaman kepemimpinan & organisasi Alfath:\n\n• **Menteri Publikasi & Dokumentasi (Pubdok) BEM POLSUB** — Memimpin tim kreatif, strategi konten visual, dan dokumentasi agenda kampus.\n• **Panitia Subang Project Day POLSUB** — Mengelola publikasi media dan dokumentasi pameran inovasi mahasiswa.";
            }
            if (q.includes('kerja') || q.includes('freelance') || q.includes('hire') || q.includes('open') || q.includes('tersedia') || q.includes('magang') || q.includes('intern') || q.includes('kontrak')) {
                return "Ya, Alfath saat ini **Open to Work & Freelance Projects**! Siap membantu kebutuhan Web Development (Laravel/Tailwind), Otomasi/AI Python, atau Desain UI/UX. Hubungi langsung via email di **alfathnoor11@gmail.com**.";
            }
            if (q.includes('kontak') || q.includes('email') || q.includes('instagram') || q.includes('hubungi') || q.includes('contact') || q.includes('wa') || q.includes('whatsapp') || q.includes('sosmed')) {
                return "Anda bisa menghubungi Alfath melalui:\n\n📧 **Email:** alfathnoor11@gmail.com\n📱 **Instagram:** @fathz_19\n💻 **GitHub:** https://github.com/AlfathNH\n▶️ **YouTube:** @alfathnoor11";
            }
            if (q.includes('meme') || q.includes('camera') || q.includes('kamera') || q.includes('virtual')) {
                return "Proyek **Meme Reaction Virtual Camera** dibuat menggunakan Python & Computer Vision. Aplikasi ini menangkap ekspresi wajah secara live dan menampilkan reaksi meme yang cocok sebagai input virtual camera untuk OBS / Zoom / Google Meet!\n\nLink repo: https://github.com/AlfathNH/Meme-Reaction-Virtual-Camera";
            }
            if (q.includes('halo') || q.includes('hai') || q.includes('hi') || q.includes('pagi') || q.includes('siang') || q.includes('malam') || q.includes('assalam')) {
                return "Halo! Senang menyapa Anda. Saya asisten cerdas portofolio Alfath. Anda bisa bertanya tentang proyek, keahlian, riwayat organisasi BEM, atau ketersediaan freelance Alfath!";
            }
            return "Terima kasih atas pertanyaannya! Saya asisten virtual portofolio Alfath. Untuk pertanyaan khusus, kerja sama, atau diskusi teknis, Anda bisa langsung terhubung dengan Alfath via email di **alfathnoor11@gmail.com** atau Instagram **@fathz_19**.";
        },

        async send() {
            if (!this.canSend) return;

            const text = this.userInput.trim();
            this.userInput = '';
            this.messages.push({ role: 'user', text, time: new Date().toLocaleTimeString() });
            this.messageCount++;
            this.loading = true;

            try {
                const csrfEl = document.querySelector('meta[name="csrf-token"]');
                const csrfToken = csrfEl ? csrfEl.content : '';
                const res = await fetch('/api/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ message: text }),
                });

                if (res.ok) {
                    const data = await res.json();
                    if (data && data.response) {
                        this.messages.push({
                            role: 'ai',
                            text: data.response,
                            time: new Date().toLocaleTimeString(),
                        });
                        return;
                    }
                }
                throw new Error('API unavailable');
            } catch (e) {
                // Intelligent fallback for static deployment (GitHub Pages / Vercel)
                const fallbackReply = this.getSmartFallback(text);
                this.messages.push({
                    role: 'ai',
                    text: fallbackReply,
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
