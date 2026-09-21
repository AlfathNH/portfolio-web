<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Portfolio Owner Information
    |--------------------------------------------------------------------------
    */

    'name'       => env('PORTFOLIO_NAME', 'Alfath Noorislami Herawansyah'),
    'short_name' => env('PORTFOLIO_SHORT_NAME', 'Alfath'),
    'tagline'    => env('PORTFOLIO_TAGLINE', 'Mahasiswa D3 Sistem Informasi di Politeknik Negeri Subang'),
    'bio'        => 'Mahasiswa D3 Sistem Informasi di Politeknik Negeri Subang yang berfokus pada pengembangan web (Laravel) dan desain UI/UX. Memiliki pengalaman nyata dalam merancang konsep logistik cerdas, membangun aplikasi manajemen berbasis web, serta aktif dalam organisasi kemahasiswaan sebagai Menteri Pubdok BEM POLSUB. Memiliki inisiatif tinggi dalam mempelajari teknologi otomatisasi alur kerja (n8n) untuk mendukung efisiensi sistem.',
    'location'   => 'Purwadadi, Subang, Jawa Barat, Indonesia',
    'birth_info' => 'Purwakarta, 19 November 2005',

    /*
    |--------------------------------------------------------------------------
    | Roles (Rotating typed animation in hero)
    |--------------------------------------------------------------------------
    */

    'roles' => [
        'UI/UX Designer',
        'Web Developer',
        'Laravel Developer',
        'Python & AI Vision',
        'Workflow Automation (n8n)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Availability Status
    | Values: 'open_to_work' | 'open_to_freelance' | 'unavailable'
    |--------------------------------------------------------------------------
    */

    'availability' => env('PORTFOLIO_AVAILABILITY', 'open_to_work'),

    'availability_labels' => [
        'open_to_work'     => 'Open to Work & Collaboration',
        'open_to_freelance' => 'Open to Freelance Projects',
        'unavailable'      => 'Currently Unavailable',
    ],

    /*
    |--------------------------------------------------------------------------
    | Social Links & Contact
    |--------------------------------------------------------------------------
    */

    'email'        => env('PORTFOLIO_EMAIL', 'alfathnoor11@gmail.com'),
    'phone'        => env('PORTFOLIO_PHONE', '+62 895-3745-17121'),
    'whatsapp'     => env('PORTFOLIO_WHATSAPP', '62895374517121'),
    'whatsapp_url' => 'https://wa.me/62895374517121',
    'linktree'     => 'alfathnoor11',
    'linktree_url' => 'https://linktr.ee/alfathnoor11',
    'github'       => env('PORTFOLIO_GITHUB', 'AlfathNH'),
    'instagram'    => env('PORTFOLIO_INSTAGRAM', 'fathz_19'),
    'youtube'      => env('PORTFOLIO_YOUTUBE', 'alfathnoor11'),
    'avatar_url'   => env('PORTFOLIO_AVATAR_URL', '/images/profile-almamater.jpg'),

    /*
    |--------------------------------------------------------------------------
    | AI Chatbot (Python Microservice)
    |--------------------------------------------------------------------------
    */

    'ai_service_url'     => env('AI_SERVICE_URL', 'http://localhost:8000'),
    'ai_service_timeout' => env('AI_SERVICE_TIMEOUT', 30),
    'chatbot_enabled'    => env('CHATBOT_ENABLED', true),
    'chatbot_max_messages' => 10,

    /*
    |--------------------------------------------------------------------------
    | GitHub Stats Integration
    |--------------------------------------------------------------------------
    */

    'github_stats_enabled' => env('GITHUB_STATS_ENABLED', true),
    'github_cache_ttl'     => 3600, // 1 hour in seconds

    /*
    |--------------------------------------------------------------------------
    | Stats for About Section (fallback if DB empty)
    |--------------------------------------------------------------------------
    */

    'stats' => [
        'projects_built' => 4,
        'awards_won'     => 4,
        'years_study'    => 2,
        'total_skills'   => 16,
    ],

    /*
    |--------------------------------------------------------------------------
    | Official Awards & Honors (Prestasi & Kejuaraan)
    |--------------------------------------------------------------------------
    */

    'awards' => [
        [
            'rank'        => 'Juara 1',
            'badge'       => '🥇 1st Place',
            'title'       => 'Juara 1 International Short Film',
            'competition' => 'Kompetisi AI',
            'organizer'   => 'HMJ MI Polnes Sambas',
            'level'       => 'Internasional',
            'color'       => 'amber',
            'icon'        => '🏆',
            'year'        => '2025',
        ],
        [
            'rank'        => 'Juara 3',
            'badge'       => '🥉 3rd Place',
            'title'       => 'Juara 3 UI/UX FUSE',
            'competition' => 'FUSE UI/UX Competition',
            'organizer'   => 'Politeknik Manufaktur Bandung (POLMAN)',
            'level'       => 'Nasional / Perguruan Tinggi',
            'color'       => 'cyan',
            'icon'        => '🎨',
            'year'        => '2025',
        ],
        [
            'rank'        => 'Juara Harapan 1',
            'badge'       => '🎖️ 4th Runner Up',
            'title'       => '4th Runner Up (Juara Harapan 1) Short Movie',
            'competition' => 'The 7th WinAction',
            'organizer'   => 'Universitas Widyatama & LLDIKTI Wilayah IV',
            'level'       => 'Regional / Wilayah IV',
            'color'       => 'purple',
            'icon'        => '🎬',
            'year'        => '2025',
        ],
        [
            'rank'        => 'Juara Harapan 1',
            'badge'       => '🏅 Harapan 1',
            'title'       => 'Juara Harapan 1 Videografi',
            'competition' => 'Lomba Videografi Kesejarahan Lokal',
            'organizer'   => 'Dinas Pendidikan Kabupaten Subang',
            'level'       => 'Kabupaten Subang',
            'color'       => 'emerald',
            'icon'        => '📹',
            'year'        => '2024',
        ],
    ],

];
