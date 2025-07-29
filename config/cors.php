<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines which domains are allowed to access your
    | application via HTTP requests from a web browser. A wildcard '*' may
    | be used to allow all domains.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Pastikan ini mencakup '/api/*' dan 'sanctum/csrf-cookie'

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'], // <-- UBAH INI!
    // Jika Anda akan deploy ke domain lain, tambahkan domain tersebut di sini:
    // 'allowed_origins' => ['http://localhost:3000', 'https://your-nextjs-app.com'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false, // TRUE or FALSE

];