<?php

if (!route(1)) {
    $route[1] = 'index';
}

if (!file_exists(admin_controller(route(1)))) {
    $route[1] = 'index';
}

if (!session('user_rank') || session('user_rank') == 3) {
    $route[1] = 'login';
}

$menus = [
    [
        'url' => 'index',
        'title' => 'Anasayfa',
        'icon' => 'tachometer'
    ],
    [
        'url' => 'users',
        'title' => 'Üyeler',
        'icon' => 'user'
    ],
    [
        'url' => 'posts',
        'title' => 'Blog',
        'icon' =>  'rss',
        'submenu' => [
            [
                'url' => 'posts',
                'title' => 'Konular'
            ],
            [
                'url' => 'tags',
                'title' => 'Etiketler'
            ],
            [
                'url' => 'categories',
                'title' => 'Kategoriler',
            ],
            [
                'url' => 'comments',
                'title' => 'Yorumlar',
            ],
        ],
    ],
    [
        'url' => 'references',
        'title' => 'Referanslar',
        'icon' =>  'photo',
        'submenu' => [
            [
                'url' => 'reference_categories',
                'title' => 'Kategoriler'
            ],
        ],
    ],



    [
        'url' => 'menu',
        'title' => 'Menü Yönetimi',
        'icon' => 'bars'
    ],
    [
        'url' => 'contact',
        'title' => 'İletişim Mesajları',
        'icon' => 'envelope'
    ],
    [
        'url' => 'pages',
        'title' => 'Sayfalar',
        'icon' => 'file'
    ],
    [
        'url' => 'settings',
        'title' => 'Ayarlar',
        'icon' => 'cog'
    ]
];

require admin_controller(route(1));
