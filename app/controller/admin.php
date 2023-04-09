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
    'index' => [
        'title' => 'Anasayfa',
        'icon' => 'tachometer'
    ],
    'users' => [
        'title' => 'Üyeler',
        'icon' => 'user'
        //        'submenu' => [
        //            'users' => 'Üyeleri Liste'
        //        ]
    ],
    'menu' => [
        'title' => 'Menü Yönetimi',
        'icon' => 'bars'
    ],
    'contact' => [
        'title' => 'İletişim Mesajları',
        'icon' => 'envelope'
    ],
    'posts' => [
        'title' => 'Konular',
        'icon' => 'rss'
    ],
    'tags' => [
        'title' => 'Etiketler',
        'icon' => 'tag'
    ],
    'categories' => [
        'title' => 'Kategoriler',
        'icon' => 'folder'
    ],
    'comments' => [
        'title' => 'Yorumlar',
        'icon' => 'comments'
    ],
    'pages' => [
        'title' => 'Sayfalar',
        'icon' => 'file'
    ],
    'settings' => [
        'title' => 'Ayarlar',
        'icon' => 'cog'
    ]
];

require admin_controller(route(1));
