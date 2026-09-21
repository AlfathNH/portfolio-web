<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use App\Models\TimelineEntry;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedProjects();
        $this->seedSkills();
        $this->seedTimeline();
    }

    // ─── Projects ────────────────────────────────────────────────────────────
    private function seedProjects(): void
    {
        Project::truncate();

        $projects = [
            [
                'slug'           => 'memecam-virtual-camera',
                'title'          => 'Meme Reaction Virtual Camera',
                'description'    => 'Kamera virtual cerdas berbasis Python untuk Zoom, Google Meet, dan Teams yang otomatis menampilkan reaksi meme mengambang (floating overlay) dengan animasi smooth saat mendeteksi gesture tangan di webcam menggunakan MediaPipe dan OpenCV.',
                'category'       => 'ai-python',
                'tech_stack'     => ['Python', 'OpenCV', 'MediaPipe', 'OBS Virtual Cam', 'NumPy'],
                'highlights'     => [
                    'Real-time Gesture Recognition dengan MediaPipe Hands & Face Mesh',
                    'Floating Meme Overlay dengan animasi smooth fade-in & fade-out',
                    'Direct Virtual Camera terintegrasi langsung ke Zoom, Meet, & Teams',
                    'Smart Gesture Trigger: Shaka, Love, Thumbs Up, Victory, Thinking, & Crying',
                ],
                'github_repo'    => 'AlfathNH/Meme-Reaction-Virtual-Camera.',
                'thumb_icon'     => '🎭',
                'thumb_gradient' => 'from-purple-600 to-indigo-900',
                'image_url'      => 'images/projects/project-memecam-real.png',
                'featured'       => true,
                'status'         => 'completed',
                'sort_order'     => 1,
            ],
            [
                'slug'           => 'ostrich-smart-hub',
                'title'          => 'Ostrich Smart Hub',
                'description'    => 'Digital ticketing and monitoring system for Ostrich Mini Zoo Subang. Features admin dashboard, visitor management, real-time reporting, and financial analytics. Built to replace manual paper-based ticketing with a fully digital system.',
                'category'       => 'web',
                'tech_stack'     => ['Laravel', 'PHP', 'MySQL', 'Blade', 'Bootstrap'],
                'highlights'     => [
                    'Admin dashboard untuk pengelola kebun binatang',
                    'Sistem tiket digital menggantikan tiket kertas',
                    'Laporan keuangan dan statistik pengunjung otomatis',
                    'Manajemen pengunjung real-time',
                ],
                'github_repo'    => 'AlfathNH/Project-2-Ostrich-Smart-Hub',
                'thumb_icon'     => '🦅',
                'thumb_gradient' => 'from-red-600 to-red-900',
                'image_url'      => 'images/projects/project-ostrich-real.png',
                'featured'       => true,
                'status'         => 'completed',
                'sort_order'     => 2,
            ],
            [
                'slug'           => 'vertex-logistics-concept',
                'title'          => 'Vertex Logistics Concept',
                'description'    => 'UI/UX concept design for a smart manufacturing gate pass and real-time logistics tracking system. Designed with a modern, clean aesthetic focused on usability for factory floor operators.',
                'category'       => 'uiux',
                'tech_stack'     => ['Figma', 'UI/UX Design', 'Prototyping'],
                'highlights'     => [
                    'Desain gate pass digital untuk manufaktur',
                    'Real-time logistics tracking interface',
                    'Modern dan clean aesthetic design',
                    'Interactive prototype di Figma',
                ],
                'github_repo'    => 'AlfathNH/Vertex-Logistics-UIUX-Concept',
                'thumb_icon'     => '🚚',
                'thumb_gradient' => 'from-blue-700 to-blue-950',
                'image_url'      => 'images/projects/project-vertex-real.png',
                'featured'       => true,
                'status'         => 'completed',
                'sort_order'     => 3,
            ],
            [
                'slug'           => 'pasar-kalijati-system',
                'title'          => 'Pasar Kalijati System',
                'description'    => 'Automated market fee management system for Desa Kalijati Timur using Excel VBA & Macros. Replaced manual bookkeeping with an automated digital system for retribusi pasar management.',
                'category'       => 'automation',
                'tech_stack'     => ['Excel VBA', 'Macros', 'Microsoft Excel'],
                'highlights'     => [
                    'Otomasi pencatatan retribusi pasar desa',
                    'Menggantikan proses manual/buku tulis konvensional',
                    'Laporan keuangan bulanan otomatis',
                    'Digunakan aktif oleh petugas desa Kalijati Timur',
                ],
                'github_repo'    => 'AlfathNH/Project-1-Sistem-Retribusi-Pasar-Desa-Kalijati-Timur-Berbasis-Excel',
                'thumb_icon'     => '📊',
                'thumb_gradient' => 'from-emerald-600 to-emerald-900',
                'image_url'      => 'images/projects/project-kalijati-real.png',
                'featured'       => true,
                'status'         => 'completed',
                'sort_order'     => 4,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        $this->command->info('✅ Projects seeded: ' . count($projects));
    }

    // ─── Skills ──────────────────────────────────────────────────────────────
    private function seedSkills(): void
    {
        Skill::truncate();

        $skills = [
            // Frontend
            ['name' => 'HTML5',       'category' => 'frontend', 'level' => 'advanced',     'level_percent' => 90, 'icon_class' => 'devicon-html5-plain colored',       'sort_order' => 1],
            ['name' => 'CSS3',        'category' => 'frontend', 'level' => 'advanced',     'level_percent' => 85, 'icon_class' => 'devicon-css3-plain colored',        'sort_order' => 2],
            ['name' => 'JavaScript',  'category' => 'frontend', 'level' => 'intermediate', 'level_percent' => 70, 'icon_class' => 'devicon-javascript-plain colored',  'sort_order' => 3],
            ['name' => 'Tailwind CSS','category' => 'frontend', 'level' => 'intermediate', 'level_percent' => 75, 'icon_class' => 'devicon-tailwindcss-plain colored', 'sort_order' => 4],
            ['name' => 'Alpine.js',   'category' => 'frontend', 'level' => 'intermediate', 'level_percent' => 65, 'icon_class' => null,                               'sort_order' => 5, 'icon_url' => 'https://alpinejs.dev/alpine_long.svg'],

            // Backend
            ['name' => 'PHP',         'category' => 'backend',  'level' => 'intermediate', 'level_percent' => 75, 'icon_class' => 'devicon-php-plain colored',        'sort_order' => 1],
            ['name' => 'Laravel',     'category' => 'backend',  'level' => 'intermediate', 'level_percent' => 72, 'icon_class' => 'devicon-laravel-plain colored',     'sort_order' => 2],
            ['name' => 'Python',      'category' => 'backend',  'level' => 'intermediate', 'level_percent' => 70, 'icon_class' => 'devicon-python-plain colored',      'sort_order' => 3],
            ['name' => 'FastAPI',     'category' => 'backend',  'level' => 'beginner',     'level_percent' => 50, 'icon_class' => 'devicon-fastapi-plain colored',     'sort_order' => 4],

            // Database
            ['name' => 'MySQL',       'category' => 'database', 'level' => 'intermediate', 'level_percent' => 70, 'icon_class' => 'devicon-mysql-original-wordmark colored', 'sort_order' => 1],
            ['name' => 'SQLite',      'category' => 'database', 'level' => 'beginner',     'level_percent' => 55, 'icon_class' => 'devicon-sqlite-plain colored',      'sort_order' => 2],

            // Design
            ['name' => 'Figma',       'category' => 'design',   'level' => 'intermediate', 'level_percent' => 75, 'icon_class' => 'devicon-figma-plain colored',       'sort_order' => 1],
            ['name' => 'UI/UX Design','category' => 'design',   'level' => 'intermediate', 'level_percent' => 70, 'icon_class' => null,                               'sort_order' => 2, 'color' => '#8B5CF6'],

            // Tools
            ['name' => 'Git',         'category' => 'tools',    'level' => 'intermediate', 'level_percent' => 75, 'icon_class' => 'devicon-git-plain colored',         'sort_order' => 1],
            ['name' => 'GitHub',      'category' => 'tools',    'level' => 'intermediate', 'level_percent' => 78, 'icon_class' => 'devicon-github-plain',              'sort_order' => 2],
            ['name' => 'n8n',         'category' => 'tools',    'level' => 'beginner',     'level_percent' => 45, 'icon_class' => null,                               'sort_order' => 3, 'color' => '#ea4b71'],
            ['name' => 'Excel VBA',   'category' => 'tools',    'level' => 'intermediate', 'level_percent' => 70, 'icon_class' => null,                               'sort_order' => 4, 'color' => '#107C41'],
            ['name' => 'VS Code',     'category' => 'tools',    'level' => 'advanced',     'level_percent' => 88, 'icon_class' => 'devicon-vscode-plain colored',      'sort_order' => 5],
        ];

        foreach ($skills as $skill) {
            Skill::create(array_merge(['featured' => false], $skill));
        }

        $this->command->info('✅ Skills seeded: ' . count($skills));
    }

    // ─── Timeline ─────────────────────────────────────────────────────────────
    private function seedTimeline(): void
    {
        TimelineEntry::truncate();

        $entries = [
            // ─── Achievements & Awards (Prestasi & Kejuaraan) ──────────────────────────
            [
                'type'         => 'achievement',
                'title'        => 'Juara 1 International Short Film',
                'institution'  => 'Kompetisi AI — HMJ MI Polnes Sambas',
                'description'  => 'Meraih Juara 1 dalam kompetisi film pendek berskala internasional berbasis teknologi Artificial Intelligence (AI), mendemonstrasikan keunggulan dalam creative technology dan visual storytelling.',
                'period_start' => '2025',
                'period_end'   => '2025',
                'is_current'   => false,
                'icon_emoji'   => '🏆',
                'badge_color'  => 'orange',
                'image_url'    => null,
                'sort_order'   => 1,
            ],
            [
                'type'         => 'achievement',
                'title'        => 'Juara 3 UI/UX Design FUSE',
                'institution'  => 'FUSE — Politeknik Manufaktur Bandung (POLMAN)',
                'description'  => 'Meraih Juara 3 tingkat perguruan tinggi dalam merancang purwarupa antarmuka digital yang intuitif, ergonomis, dan berfokus pada pengalaman pengguna yang efektif.',
                'period_start' => '2025',
                'period_end'   => '2025',
                'is_current'   => false,
                'icon_emoji'   => '🥉',
                'badge_color'  => 'blue',
                'image_url'    => null,
                'sort_order'   => 2,
            ],
            [
                'type'         => 'achievement',
                'title'        => '4th Runner Up (Juara Harapan 1) Short Movie',
                'institution'  => 'The 7th WinAction — Universitas Widyatama & LLDIKTI Wilayah IV',
                'description'  => 'Meraih Juara Harapan 1 dalam ajang kompetisi film pendek bergengsi tingkat regional Jawa Barat & Banten yang diselenggarakan oleh LLDIKTI IV dan Universitas Widyatama.',
                'period_start' => '2025',
                'period_end'   => '2025',
                'is_current'   => false,
                'icon_emoji'   => '🎬',
                'badge_color'  => 'purple',
                'image_url'    => null,
                'sort_order'   => 3,
            ],
            [
                'type'         => 'achievement',
                'title'        => 'Juara Harapan 1 Videografi Kesejarahan',
                'institution'  => 'Dinas Pendidikan Kabupaten Subang',
                'description'  => 'Meraih Juara Harapan 1 dalam kompetisi videografi dokumenter bertema kesejarahan lokal tingkat Kabupaten Subang.',
                'period_start' => '2024',
                'period_end'   => '2024',
                'is_current'   => false,
                'icon_emoji'   => '🏅',
                'badge_color'  => 'green',
                'image_url'    => null,
                'sort_order'   => 4,
            ],

            // ─── Education (Pendidikan) ───────────────────────────────────────────────
            [
                'type'         => 'education',
                'title'        => 'D3 Sistem Informasi',
                'institution'  => 'Politeknik Negeri Subang (POLSUB)',
                'description'  => 'Fokus mendalami Rekayasa Perangkat Lunak Web (Laravel), Manajemen Basis Data (MySQL), Desain UI/UX (Figma), serta integrasi otomatisasi sistem industri.',
                'period_start' => '2024',
                'period_end'   => 'Sekarang',
                'is_current'   => true,
                'icon_emoji'   => '🎓',
                'badge_color'  => 'blue',
                'image_url'    => null,
                'sort_order'   => 5,
            ],
            [
                'type'         => 'education',
                'title'        => 'MIPA (Matematika & IPA)',
                'institution'  => 'SMAN 2 Subang',
                'description'  => 'Menyelesaikan pendidikan menengah atas peminatan MIPA dengan landasan logika analitis dan minat kuat di bidang teknologi komputer.',
                'period_start' => '2021',
                'period_end'   => '2024',
                'is_current'   => false,
                'icon_emoji'   => '🏫',
                'badge_color'  => 'blue',
                'image_url'    => null,
                'sort_order'   => 6,
            ],

            // ─── Leadership & Organization (Organisasi) ──────────────────────────────
            [
                'type'         => 'organization',
                'title'        => 'Menteri Publikasi & Dokumentasi (Pubdok)',
                'institution'  => 'BEM Politeknik Negeri Subang',
                'description'  => 'Memimpin tim media dalam mengelola identitas visual, dokumentasi, dan publikasi resmi kampus. Menginisiasi program konten kreatif digital "Dwibulanan Pradipa" untuk meningkatkan keterlibatan audiens di media sosial.',
                'period_start' => '2025',
                'period_end'   => '2026',
                'is_current'   => true,
                'icon_emoji'   => '📸',
                'badge_color'  => 'purple',
                'image_url'    => '/images/profile-almamater.jpg',
                'sort_order'   => 7,
            ],
            [
                'type'         => 'organization',
                'title'        => 'Panitia Pelaksana & Dokumentasi Project Day',
                'institution'  => 'Subang Project Day — Politeknik Negeri Subang',
                'description'  => 'Mengelola publikasi media dan dokumentasi pameran karya inovasi teknologi mahasiswa POLSUB.',
                'period_start' => '2025',
                'period_end'   => '2025',
                'is_current'   => false,
                'icon_emoji'   => '🎯',
                'badge_color'  => 'orange',
                'image_url'    => '/images/activity-project-day.jpg',
                'sort_order'   => 8,
            ],

            // ─── Professional Experience & Projects (Pengalaman Nyata) ────────────────
            [
                'type'         => 'internship',
                'title'        => 'Full-Stack Developer & n8n Automation',
                'institution'  => 'Ostrich Smart Hub — Ostrich Mini Zoo Subang',
                'description'  => 'Membangun sistem tiket digital dan manajemen satwa Ostrich Mini Zoo Subang menggunakan Laravel & MySQL. Mengintegrasikan sistem dengan n8n untuk otomatisasi fitur notifikasi alur kerja.',
                'period_start' => '2026',
                'period_end'   => '2026',
                'is_current'   => true,
                'icon_emoji'   => '🦅',
                'badge_color'  => 'green',
                'image_url'    => null,
                'sort_order'   => 9,
            ],
            [
                'type'         => 'internship',
                'title'        => 'Developer & UI/UX Designer',
                'institution'  => 'Sistem Pasar Kalijati & Vertex Logistics',
                'description'  => 'Mengembangkan aplikasi pencatatan retribusi pasar berbasis Excel VBA & Macros, serta merancang purwarupa digital High-Fidelity sistem manajemen logistik pintar di Figma.',
                'period_start' => '2025',
                'period_end'   => '2025',
                'is_current'   => false,
                'icon_emoji'   => '💻',
                'badge_color'  => 'blue',
                'image_url'    => null,
                'sort_order'   => 10,
            ],
        ];

        foreach ($entries as $entry) {
            TimelineEntry::create($entry);
        }

        $this->command->info('✅ Timeline entries seeded: ' . count($entries));
    }
}
