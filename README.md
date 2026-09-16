# 🚀 Alfath Noorislami — Modern AI-Powered Living Portfolio

A full-stack, AI-enhanced personal portfolio built with **Laravel 13 + Tailwind CSS + Alpine.js** (frontend/backend) and a **Python FastAPI** AI microservice.

[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-v3-38B2AC?logo=tailwindcss)](https://tailwindcss.com)
[![Python](https://img.shields.io/badge/Python-3.12-3776AB?logo=python)](https://python.org)
[![FastAPI](https://img.shields.io/badge/FastAPI-0.115-009688?logo=fastapi)](https://fastapi.tiangolo.com)

---

## ✨ Features

- **Hero Section** — Typed text animation, availability badge, gradient avatar
- **Interactive Project Vault** — Filter by category (Web, UI/UX, Automation, AI/Python) with detail modals
- **Career Roadmap** — Interactive vertical timeline with category filters
- **Dynamic Skills Matrix** — Icons + animated progress bars per category
- **Live AI Q&A Widget** — Floating chatbot powered by Gemini API
- **Contact Form** — Alpine.js form with real-time feedback
- **Dark Mode** — System preference + localStorage toggle
- **Fully Responsive** — Mobile-first, works on all screen sizes

---

## 🏗️ Architecture

```
portfolio/                    ← Laravel 13 App
├── resources/views/          ← Blade templates (sections + layouts)
├── app/Http/Controllers/     ← PortfolioController, AIProxyController, ContactController
├── config/portfolio.php      ← Profile data, social links, availability
├── database/seeders/         ← PortfolioSeeder (projects, skills, timeline)
└── python-service/           ← FastAPI AI Microservice
    ├── routers/chatbot.py    ← POST /chat
    ├── routers/github_stats.py ← GET /github/stats, /github/repo/{slug}
    ├── services/llm_service.py  ← Gemini API wrapper
    └── data/portfolio_context.json ← Chatbot knowledge base
```

---

## 🚀 Quick Start (Local Development)

### Prerequisites
- PHP 8.3+, Composer
- Node.js 20+, npm
- Python 3.12+

### 1. Clone & Setup Laravel

```bash
git clone https://github.com/AlfathNH/portfolio.git
cd portfolio

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
touch database/database.sqlite
php artisan migrate
php artisan db:seed

# Build frontend
npm run build
# OR for development with hot reload:
npm run dev
```

### 2. Setup Python AI Service (Optional)

```bash
cd python-service

# Create virtual environment
python -m venv venv
venv\Scripts\activate  # Windows
# source venv/bin/activate  # Linux/Mac

# Install dependencies
pip install -r requirements.txt

# Configure environment
cp .env.example .env
# Edit .env and add your GEMINI_API_KEY

# Start service
python main.py
# Service runs at http://localhost:8001
```

### 3. Run Laravel

```bash
php artisan serve
# App runs at http://localhost:8000
```

### 4. With Docker Compose

```bash
# Copy and configure environment
cp .env.example .env
# Edit .env with your API keys

# Start all services
docker-compose up -d

# Access at http://localhost:8000
```

---

## ⚙️ Configuration

### Environment Variables (`.env`)

```env
# Portfolio Profile
PORTFOLIO_NAME="Alfath Noorislami Herawansyah"
PORTFOLIO_EMAIL=alfathnoor11@gmail.com
PORTFOLIO_GITHUB=AlfathNH
PORTFOLIO_AVAILABILITY=open_to_work    # open_to_work | open_to_freelance | unavailable

# AI Service
AI_SERVICE_URL=http://localhost:8001   # URL of Python FastAPI service
CHATBOT_ENABLED=true
GEMINI_API_KEY=your_key_here           # Get from https://ai.google.dev

# GitHub Stats
GITHUB_STATS_ENABLED=true
GITHUB_TOKEN=optional_token            # Optional: increases API rate limit
```

### Portfolio Config (`config/portfolio.php`)

Centralized profile configuration — update here to reflect across all pages.

---

## 🚢 Deployment

### Option A: Railway (Recommended)

1. Connect GitHub repo to [Railway](https://railway.app)
2. Set environment variables in Railway dashboard
3. Railway auto-detects Laravel via Nixpacks

### Option B: Render.com

- **Laravel App** → Web Service (PHP), set build command: `composer install && npm ci && npm run build && php artisan migrate --force`
- **Python Service** → Web Service (Python), start command: `uvicorn main:app --host 0.0.0.0 --port $PORT`

### Option C: VPS (Ubuntu)

```bash
# Install Nginx, PHP-FPM, Composer, Node
# Clone repo, install deps, run npm run build
# Configure Nginx virtual host
# Setup systemd service for Python FastAPI
# Configure SSL with Let's Encrypt
```

---

## 🧑‍💻 Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 13.x (PHP 8.3) |
| Frontend | Tailwind CSS v3 + Alpine.js |
| AI Service | Python 3.12 + FastAPI |
| LLM | Google Gemini 1.5 Flash |
| Database | SQLite (dev) / MySQL (prod) |
| Build Tool | Vite |
| CI/CD | GitHub Actions |
| Deployment | Railway / Render / Docker |

---

## 👤 About

**Alfath Noorislami Herawansyah** — Information Systems Student at Politeknik Negeri Subang (POLSUB)

- 🌐 Portfolio: [your-domain.com](https://your-domain.com)
- 📧 Email: alfathnoor11@gmail.com
- 💻 GitHub: [AlfathNH](https://github.com/AlfathNH)
- 📸 Instagram: [@fathz_19](https://instagram.com/fathz_19)

---

*Built with ❤️ using Laravel + Tailwind CSS + Alpine.js + Python FastAPI*
