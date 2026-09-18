<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Portfolio Owner Information
    |--------------------------------------------------------------------------
    */

    'name'       => env('PORTFOLIO_NAME', 'Alfath Noorislami Herawansyah'),
    'short_name' => env('PORTFOLIO_SHORT_NAME', 'Alfath'),
    'tagline'    => env('PORTFOLIO_TAGLINE', 'Information Systems Student at Politeknik Negeri Subang'),
    'bio'        => 'I\'m a passionate Information Systems student at Politeknik Negeri Subang (POLSUB). I enjoy crafting intuitive user interfaces, building web applications, and solving real-world problems through technology. I am deeply committed to creating impactful digital experiences.',
    'location'   => 'Subang, West Java, Indonesia',

    /*
    |--------------------------------------------------------------------------
    | Roles (Rotating typed animation in hero)
    |--------------------------------------------------------------------------
    */

    'roles' => [
        'UI/UX Designer',
        'Web Developer',
        'Laravel Developer',
        'Python Enthusiast',
        'Tech & Innovation Enthusiast',
    ],

    /*
    |--------------------------------------------------------------------------
    | Availability Status
    | Values: 'open_to_work' | 'open_to_freelance' | 'unavailable'
    |--------------------------------------------------------------------------
    */

    'availability' => env('PORTFOLIO_AVAILABILITY', 'open_to_work'),

    'availability_labels' => [
        'open_to_work'     => 'Open to Work',
        'open_to_freelance' => 'Open to Freelance',
        'unavailable'      => 'Currently Unavailable',
    ],

    /*
    |--------------------------------------------------------------------------
    | Social Links & Contact
    |--------------------------------------------------------------------------
    */

    'email'     => env('PORTFOLIO_EMAIL', 'alfathnoor11@gmail.com'),
    'github'    => env('PORTFOLIO_GITHUB', 'AlfathNH'),
    'instagram' => env('PORTFOLIO_INSTAGRAM', 'fathz_19'),
    'youtube'   => env('PORTFOLIO_YOUTUBE', 'alfathnoor11'),
    'avatar_url' => env('PORTFOLIO_AVATAR_URL', '/images/profile-almamater.jpg'),

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
        'years_study'    => 2,
        'total_skills'   => 16,
        'curiosity'      => '∞',
    ],

];
