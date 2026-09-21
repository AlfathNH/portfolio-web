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
            if (q.includes('prestasi') || q.includes('kejuaraan') || q.includes('juara') || q.includes('lomba') || q.includes('menang') || q.includes('award') || q.includes('honor')) {
                return "Berikut adalah 4 prestasi & kejuaraan resmi yang diraih Alfath:\n\n🥇 **Juara 1 International Short Film** — Kompetisi AI (HMJ MI Polnes Sambas)\n🥉 **Juara 3 UI/UX Design FUSE** — Politeknik Manufaktur Bandung (POLMAN)\n🎖️ **4th Runner Up (Juara Harapan 1) Short Movie** — The 7th WinAction (Univ Widyatama & LLDIKTI IV)\n🏅 **Juara Harapan 1 Videografi** — Kesejarahan Lokal (Dinas Pendidikan Kab. Subang)\n\nAnda dapat melihat kartu trofi selengkapnya di bagian Journey / Roadmap!";
            }
            if (q.includes('proyek') || q.includes('project') || q.includes('karya') || q.includes('portfolio') || q.includes('portofolio') || q.includes('aplikasi')) {
                return "Berikut adalah beberapa proyek utama Alfath:\n\n1. 🦩 **Ostrich Smart Hub** — Sistem manajemen tiket & satwa Mini Zoo berbasis Laravel, MySQL, dan otomatisasi alur kerja n8n.\n2. 📷 **Meme Reaction Virtual Camera** — Virtual camera Python berbasis deep learning & computer vision real-time.\n3. 🚚 **Vertex Logistics Smart System** — Konsep purwarupa UI/UX Figma untuk sistem logistik cerdas.\n4. 📊 **Sistem Retribusi Pasar Kalijati** — Aplikasi pencatatan retribusi pasar desa berbasis Excel VBA & Macros.\n\nKlik kartu proyek di bagian Projects untuk membuka pratinjau interaktif!";
            }
            if (q.includes('skill') || q.includes('keahlian') || q.includes('bahasa') || q.includes('stack') || q.includes('teknologi') || q.includes('kuasai') || q.includes('tech')) {
                return "Keahlian utama Alfath meliputi:\n\n• **Hard Skills:** Web Dev (Laravel, PHP, Tailwind CSS, Alpine.js), Database (MySQL, SQLite), UI/UX Design (Figma), Otomasi Alur Kerja (n8n), Excel VBA & Macros.\n• **Soft Skills:** Kepemimpinan, Analisis, Kerja Sama Tim, Komunikasi Efektif, Pemecahan Masalah.\n• **Bahasa:** Indonesia (Bahasa Ibu), Inggris (Tingkat Pemula).";
            }
            if (q.includes('kuliah') || q.includes('kampus') || q.includes('pendidikan') || q.includes('jurusan') || q.includes('polsub') || q.includes('sekolah') || q.includes('almamater') || q.includes('sma')) {
                return "Riwayat pendidikan resmi Alfath:\n\n🎓 **Politeknik Negeri Subang (POLSUB)** — D3 Sistem Informasi (2024 – Sekarang)\n🏫 **SMAN 2 Subang** — Jurusan MIPA (2021 – 2024)\n\nFokus akademik Alfath berpusat pada rekayasa web, arsitektur database, dan otomatisasi alur kerja.";
            }
            if (q.includes('bem') || q.includes('organisasi') || q.includes('menteri') || q.includes('pengalaman') || q.includes('experience') || q.includes('project day') || q.includes('pradipa')) {
                return "Pengalaman kepemimpinan & organisasi Alfath:\n\n• **Menteri Publikasi & Dokumentasi BEM POLSUB (2025–2026)** — Memimpin tim media dalam mengelola identitas visual dan menginisiasi program konten kreatif digital *'Dwibulanan Pradipa'*.\n• **Panitia Pelaksana Subang Project Day (2025)** — Divisi Publikasi & Dokumentasi pameran karya inovasi teknologi mahasiswa.";
            }
            if (q.includes('kerja') || q.includes('freelance') || q.includes('hire') || q.includes('open') || q.includes('tersedia') || q.includes('magang') || q.includes('intern') || q.includes('kontrak')) {
                return "Ya, Alfath saat ini **Open to Collaboration, Freelance, & Projects**! Siap membantu kebutuhan Web Development (Laravel), Otomasi (n8n/VBA), maupun UI/UX Design (Figma). Hubungi WhatsApp di **+62 895-3745-17121** atau email di **alfathnoor11@gmail.com**.";
            }
            if (q.includes('kontak') || q.includes('email') || q.includes('instagram') || q.includes('hubungi') || q.includes('contact') || q.includes('wa') || q.includes('whatsapp') || q.includes('sosmed') || q.includes('linktree') || q.includes('telepon')) {
                return "Hubungi Alfath langsung melalui:\n\n💬 **WhatsApp:** +62 895-3745-17121 (https://wa.me/62895374517121)\n🌲 **Linktree:** https://linktr.ee/alfathnoor11\n📧 **Email:** alfathnoor11@gmail.com\n📱 **Instagram:** @fathz_19\n💻 **GitHub:** https://github.com/AlfathNH";
            }
            if (q.includes('meme') || q.includes('camera') || q.includes('kamera') || q.includes('virtual')) {
                return "Proyek **Meme Reaction Virtual Camera** dibuat menggunakan Python & Computer Vision. Aplikasi ini menangkap ekspresi wajah secara live dan menampilkan reaksi meme yang cocok sebagai input virtual camera untuk OBS / Zoom / Google Meet!\n\nLink repo: https://github.com/AlfathNH/Meme-Reaction-Virtual-Camera";
            }
            if (q.includes('halo') || q.includes('hai') || q.includes('hi') || q.includes('pagi') || q.includes('siang') || q.includes('malam') || q.includes('assalam')) {
                return "Halo! Senang menyapa Anda. Saya asisten cerdas portofolio Alfath. Anda bisa bertanya tentang kejuaraan/prestasi, proyek (Ostrich Smart Hub, Virtual Camera), riwayat BEM POLSUB, atau kontak WhatsApp Alfath!";
            }
            return "Terima kasih atas pertanyaannya! Saya asisten virtual portofolio Alfath Noorislami. Untuk kerja sama atau diskusi lebih lanjut, hubungi WhatsApp di **+62 895-3745-17121** atau email di **alfathnoor11@gmail.com**.";
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
