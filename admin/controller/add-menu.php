<?php

if (post('submit')) {

    $menu = [];
    $menu_title = post('menu_title');
    if (!$menu_title) {
        $error = 'Menü başlığını belirtin.';
    } elseif (count(array_filter(post('title'))) == 0) {
        $error = 'En az bir menü içeriği girmeniz gerekiyor!';
    } else {

        $urls = post('url');
        foreach (post('title') as $key => $title) {
            $arr = [
                'title' => $title,
                'url' => $urls[$key]
            ];
            if (post('sub_title_' . $key)) {
                $submenu = [];
                $suburls = post('sub_url_' . $key);
                foreach (post('sub_title_' . $key) as $k => $subtitle) {
                    $submenu[] = [
                        'title' => $subtitle,
                        'url' => $suburls[$k]
                    ];
                }
                $arr['submenu'] = $submenu;
            }
            $menu[] = $arr;
        }

        // menüyü veritabanına ekle
        $query = $db->prepare('INSERT INTO menu SET menu_title = :menu_title, menu_content = :menu_content');
        $result = $query->execute([
            'menu_title' => $menu_title,
            'menu_content' => json_encode($menu)
        ]);

        if ($result) {
            header('Location:' . admin_url('menu'));
        } else {
            $error = 'Bir sorun oluştu ve menü eklenemedi!';
        }

    }

}

require admin_view('add-menu');