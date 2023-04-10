<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = get('id');

if (!$id) {
    header('Location:' . admin_url('reference-categories'));
    exit;
}

$row = $db->from('reference_categories')
    ->where('category_id', $id)
    ->first();
if (!$row) {
    header('Location:' . admin_url('referencecategories'));
    exit;
} else {
}
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
        //kategori varmı kontrol et
        $query  = $db->from('reference_categories')
            ->where('category_url', $category_url)
            ->where('category_id', $id, '!=')
            ->first();
        if ($query) {
            $error =  '<strong>' . $category_name . '</strong>adında bir kategori zaten eklenmiş,lütfen başka bir isim deneyin';
        } else {
            $query = $db->update('reference_categories')
                ->where('category_id', $id)
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

$category_seo = json_decode($row['category_seo'], true);
require admin_view('edit-reference-category');
