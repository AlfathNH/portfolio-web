# Graph Report - portfolio  (2026-10-01)

## Corpus Check
- 101 files · ~201,286 words
- Verdict: corpus is large enough that graph structure adds value.
- Unclassified: 27 file(s) not represented in the graph (top: (none) 19, .example 2, .conf 2)

## Summary
- 397 nodes · 479 edges · 47 communities (15 shown, 32 thin omitted)
- Extraction: 98% EXTRACTED · 2% INFERRED · 0% AMBIGUOUS · INFERRED: 8 edges (avg confidence: 0.86)
- Token cost: 1,200 input · 850 output

## Community Hubs (Navigation)
- Database Migrations & Users
- PHP Dependencies & Composer
- Portfolio Data & Content Controller
- Frontend NPM Packages
- Chatbot Microservice Models
- Chatbot Microservice Models
- Laravel AI Proxy Bridge
- Authentication & User Models
- GitHub Stats & API Integration
- Testing Suite & Assertions
- Client-Side Alpine.js Interactivity
- PHP Dependencies & Composer
- Blade Layouts & Sections
- Laravel Application Providers
- Testing Suite & Assertions
- Blade Layouts & Sections
- vercelon Subsystem
- FastAPI AI Service & Containers
- Blade Layouts & Sections
- Agent Instructions & Guid
- Claude Assistant Configur
- docs_images_casual_pose_i
- docs_images_meme_cam_mock
- docs_images_profile_almam
- Static Portfolio Document
- CI/CD: Deploy Laravel Subsystem
- SEO Robots Configuration Subsystem

## God Nodes (most connected - your core abstractions)
1. `Project` - 11 edges
2. `Skill` - 10 edges
3. `TimelineEntry` - 10 edges
4. `scripts` - 9 edges
5. `PortfolioTest` - 9 edges
6. `User` - 8 edges
7. `require-dev` - 8 edges
8. `PortfolioController` - 7 edges
9. `PortfolioSeeder` - 7 edges
10. `chat()` - 7 edges

## Surprising Connections (you probably didn't know these)
- `PortfolioController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/PortfolioController.php → app/Http/Controllers/Controller.php
- `AIProxyController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/AIProxyController.php → app/Http/Controllers/Controller.php
- `ContactController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/ContactController.php → app/Http/Controllers/Controller.php
- `chat()` --calls--> `get_chat_response()`  [EXTRACTED]
  python-service/routers/chatbot.py → python-service/services/llm_service.py
- `github_stats()` --calls--> `get_github_profile_stats()`  [EXTRACTED]
  python-service/routers/github_stats.py → python-service/services/github_service.py

## Import Cycles
- None detected.

## Hyperedges (group relationships)
- **Full-stack AI Architecture Flow** — readme_portfolio_overview, docker_compose_laravel, docker_compose_python_ai, app_http_controllers_aiproxycontroller, python_service_main [INFERRED 0.85]

## Communities (47 total, 32 thin omitted)

### Community 0 - "Database Migrations & Users"
Cohesion: 0.08
Nodes (15): {closure#1}(), {closure#2}(), {closure#3}(), {closure#1}(), {closure#2}(), {closure#1}(), {closure#2}(), {closure#3}() (+7 more)

### Community 1 - "PHP Dependencies & Composer"
Cohesion: 0.05
Nodes (39): pestphp/pest-plugin, php-http/discovery, autoload, autoload-dev, psr-4, psr-4, config, allow-plugins (+31 more)

### Community 2 - "Portfolio Data & Content Controller"
Cohesion: 0.08
Nodes (11): PortfolioController, Project, Skill, TimelineEntry, PortfolioSeeder, Asset: activity-project-day.jpg, Asset: project-kalijati-real.png, Asset: project-memecam-real.png (+3 more)

### Community 3 - "Frontend NPM Packages"
Cohesion: 0.07
Nodes (30): devDependencies, alpinejs, autoprefixer, concurrently, laravel-vite-plugin, postcss, tailwindcss, @tailwindcss/forms (+22 more)

### Community 4 - "Chatbot Microservice Models"
Cohesion: 0.09
Nodes (11): Asset: chatbot-avatar.png, chat(), ChatMessage, ChatRequest, ChatResponse, _check_rate_limit(), _build_system_prompt(), _fallback_response() (+3 more)

### Community 5 - "Chatbot Microservice Models"
Cohesion: 0.08
Nodes (9): Docker Service: Laravel Web, Docker Service: Python AI, CI/CD: Deploy Python Microservice, health(), lifespan(), root(), Python Service Dependencies, Render Blueprint: Laravel App (+1 more)

### Community 6 - "Laravel AI Proxy Bridge"
Cohesion: 0.11
Nodes (7): AIProxyController, ContactController, Controller, {closure#1}(), {closure#2}(), {closure#3}(), Portfolio Overview & Architecture

### Community 7 - "Authentication & User Models"
Cohesion: 0.10
Nodes (3): User, UserFactory, DatabaseSeeder

### Community 8 - "GitHub Stats & API Integration"
Cohesion: 0.10
Nodes (5): github_repo_stats(), github_stats(), get_github_profile_stats(), _get_headers(), get_repo_stats()

### Community 9 - "Testing Suite & Assertions"
Cohesion: 0.19
Nodes (3): ExampleTest, PortfolioTest, TestCase

### Community 10 - "Client-Side Alpine.js Interactivity"
Cohesion: 0.18
Nodes (5): alpinejs, getSmartFallback(), handleKeydown(), send(), ThemeManager

### Community 11 - "PHP Dependencies & Composer"
Cohesion: 0.25
Nodes (8): require-dev, fakerphp/faker, laravel/pail, laravel/pao, laravel/pint, mockery/mockery, nunomaduro/collision, phpunit/phpunit

### Community 12 - "Blade Layouts & Sections"
Cohesion: 0.25
Nodes (7): layouts.app, sections.about, sections.contact, sections.hero, sections.projects, sections.skills, sections.timeline

### Community 17 - "Blade Layouts & Sections"
Cohesion: 0.50
Nodes (3): sections.chatbot, sections.footer, sections.navbar

### Community 18 - "vercelon Subsystem"
Cohesion: 0.50
Nodes (3): buildCommand, cleanUrls, outputDirectory

## Knowledge Gaps
- **92 isolated node(s):** `$schema`, `name`, `type`, `description`, `keywords` (+87 more)
  These have ≤1 connection - possible missing edges or undocumented components. (Counts symbols only; 227 node(s) total have ≤1 connection when file, concept and rationale nodes are included.)
- **32 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Portfolio Overview & Architecture` connect `Laravel AI Proxy Bridge` to `Portfolio Data & Content Controller`, `Chatbot Microservice Models`, `Chatbot Microservice Models`?**
  _High betweenness centrality (0.117) - this node is a cross-community bridge._
- **What connects `$schema`, `name`, `type` to the rest of the system?**
  _92 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Database Migrations & Users` be split into smaller, more focused modules?**
  _Cohesion score 0.08130081300813008 - nodes in this community are weakly interconnected._
- **Should `PHP Dependencies & Composer` be split into smaller, more focused modules?**
  _Cohesion score 0.05 - nodes in this community are weakly interconnected._
- **Should `Portfolio Data & Content Controller` be split into smaller, more focused modules?**
  _Cohesion score 0.08232118758434548 - nodes in this community are weakly interconnected._
- **Should `Frontend NPM Packages` be split into smaller, more focused modules?**
  _Cohesion score 0.0659536541889483 - nodes in this community are weakly interconnected._
- **Should `Chatbot Microservice Models` be split into smaller, more focused modules?**
  _Cohesion score 0.08602150537634409 - nodes in this community are weakly interconnected._