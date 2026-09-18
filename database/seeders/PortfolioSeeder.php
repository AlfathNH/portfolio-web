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
                'featured'       => true,
                'status'         => 'completed',
                'sort_order'     => 1,
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
                'featured'       => true,
                'status'         => 'completed',
                'sort_order'     => 2,
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
                'featured'       => true,
                'status'         => 'completed',
                'sort_order'     => 3,
            ],
            [
                'slug'           => 'memecam-virtual-camera',
                'title'          => 'MemeCam Virtual Camera',
                'description'    => 'Python-powered virtual camera application that overlays meme templates on video feed in real-time using OpenCV. Works as a virtual camera source in Zoom, Google Meet, and other video conferencing tools.',
                'category'       => 'ai-python',
                'tech_stack'     => ['Python', 'OpenCV', 'pyvirtualcam', 'NumPy', 'Pillow'],
                'highlights'     => [
                    'Real-time meme overlay menggunakan OpenCV',
                    'Integrasi sebagai virtual camera di Zoom/Meet',
                    'Pemrosesan video frame-by-frame',
                    'Berbagai template meme yang dapat dipilih',
                ],
                'github_repo'    => 'AlfathNH/MemeCam',
                'thumb_icon'     => '🎭',
                'thumb_gradient' => 'from-purple-600 to-indigo-900',
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
            [
                'type'         => 'education',
                'title'        => 'D4 Sistem Informasi',
                'institution'  => 'Politeknik Negeri Subang (POLSUB)',
                'description'  => 'Studying Information Systems with focus on web development, database management, and system analysis. Active in campus tech communities and project-based learning.',
                'period_start' => '2024',
                'period_end'   => null,
                'is_current'   => true,
                'icon_emoji'   => '🎓',
                'badge_color'  => 'blue',
                'image_url'    => null,
                'sort_order'   => 1,
            ],
            [
                'type'         => 'organization',
                'title'        => 'Menteri Publikasi & Dokumentasi',
                'institution'  => 'BEM Politeknik Negeri Subang',
                'description'  => 'Memimpin kementerian Pubdok BEM POLSUB dalam merancang strategi publikasi, dokumentasi visual, liputan kegiatan kampus, serta pengelolaan media komunikasi mahasiswa.',
                'period_start' => '2024',
                'period_end'   => '2025',
                'is_current'   => false,
                'icon_emoji'   => '📸',
                'badge_color'  => 'purple',
                'image_url'    => '/images/profile-almamater.jpg',
                'sort_order'   => 2,
            ],
            [
                'type'         => 'organization',
                'title'        => 'Panitia Pelaksana & Dokumentasi Project Day',
                'institution'  => 'Project Day — Politeknik Negeri Subang',
                'description'  => 'Berperan aktif dalam kepanitiaan tahunan Project Day POLSUB, mengoordinasikan pameran karya inovasi teknologi mahasiswa serta dokumentasi acara.',
                'period_start' => '2025',
                'period_end'   => '2025',
                'is_current'   => false,
                'icon_emoji'   => '🎯',
                'badge_color'  => 'orange',
                'image_url'    => '/images/activity-project-day.jpg',
                'sort_order'   => 3,
            ],
            [
                'type'         => 'achievement',
                'title'        => 'Ostrich Smart Hub',
                'institution'  => 'Project — Ostrich Mini Zoo Subang',
                'description'  => 'Led development of a digital ticketing and visitor management system for a local mini zoo, replacing paper-based processes with a fully digital Laravel system.',
                'period_start' => '2025',
                'period_end'   => '2025',
                'is_current'   => false,
                'icon_emoji'   => '🏆',
                'badge_color'  => 'blue',
                'image_url'    => null,
                'sort_order'   => 4,
            ],
            [
                'type'         => 'achievement',
                'title'        => 'MemeCam Virtual Camera Project',
                'institution'  => 'Personal Project',
                'description'  => 'Developed a Python-based virtual camera application using OpenCV for real-time meme overlay, demonstrating computer vision and creative programming skills.',
                'period_start' => '2026',
                'period_end'   => '2026',
                'is_current'   => false,
                'icon_emoji'   => '🎭',
                'badge_color'  => 'purple',
                'image_url'    => null,
                'sort_order'   => 5,
            ],
            [
                'type'         => 'achievement',
                'title'        => 'Pasar Kalijati Retribusi System',
                'institution'  => 'Project — Desa Kalijati Timur',
                'description'  => 'Created an Excel VBA-based automated fee management system for a local village market, replacing manual bookkeeping with digital automation.',
                'period_start' => '2024',
                'period_end'   => '2024',
                'is_current'   => false,
                'icon_emoji'   => '📊',
                'badge_color'  => 'green',
                'image_url'    => null,
                'sort_order'   => 6,
            ],
            [
                'type'         => 'education',
                'title'        => 'SMA / High School Graduate',
                'institution'  => 'SMA — Subang, West Java',
                'description'  => 'Completed high school education with interest in computers and technology, laying foundation for Information Systems studies.',
                'period_start' => '2021',
                'period_end'   => '2024',
                'is_current'   => false,
                'icon_emoji'   => '🏫',
                'badge_color'  => 'blue',
                'image_url'    => null,
                'sort_order'   => 7,
            ],
        ];

        foreach ($entries as $entry) {
            TimelineEntry::create($entry);
        }

        $this->command->info('✅ Timeline entries seeded: ' . count($entries));
    }
}
