<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (post('submit')) {
    $tag_name = post('tag_name');
    $tag_url = permalink(post('tag_url'));
    if (!post('tag_url')) {
        $tag_url = permalink($tag_name);
    }

    $tag_seo = json_encode(post('tag_seo'));
    if (!$tag_url) {
        $error = 'Lütfen tüm alanları doldurun';
    } else {
        //etiket  varmı kontrol et
        $query  = $db->from('tags')
            ->where('tag_url', $tag_url)
            ->first();
        if ($query) {
            $error =  '<strong>' . $tag_name . '</strong>adında bir sayfa  zaten eklenmiş,lütfen başka bir isim deneyin';
        } else {
            $query = $db->insert('tags')
                ->set([
                    'tag_name' => $tag_name,
                    'tag_url' => $tag_url,
                    'tag_seo' => $tag_seo
                ]);
            if ($query) {
                header('Location:' . admin_url('tags'));
            } else {
                $error = 'Bir sorun oluştu';
            }
        }
    }
}


require admin_view('add-tag');
