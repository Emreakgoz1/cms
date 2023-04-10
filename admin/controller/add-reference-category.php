<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (post('submit')) {
    $category_name = post('category_name');
    $category_url = permalink(post('category_url'));
    if (!post('category_url')) {
        $category_url = permalink($category_name);
    }
    $category_seo = json_encode(post('category_seo'));
    if (!$category_name || !$category_url) {
        $error = 'Lütfen kategori adını belirtin';
    } else {
        //kategori varm ı kontrol et
        $query  = $db->from('reference_categories')
            ->where('category_url', $category_url)
            ->first();
        if ($query) {
            $error =  '<strong>' . $category_name . '</strong>adında bir kategori zaten eklenmiş,lütfen başka bir isim deneyin';
        } else {
            $query = $db->insert('reference_categories')
                ->set([
                    'category_name' => $category_name,
                    'category_url' => $category_url,
                    'category_seo' => $category_seo
                ]);
            if ($query) {
                header('Location:' . admin_url('reference-categories'));
            } else {
                $error = 'Bir sorun oluştu';
            }
        }
    }
}

require admin_view('add-reference-category');
