<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = get('id');
if (!$id) {
    header('Location:' . admin_url('tags'));
    exit;
}
$row = $db->from('tags')
    ->where('tag_id', $id)
    ->first();

if (!$row) {
    header('Location:' . admin_url('tags'));
    exit;
}

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
            ->where('tag_id', $id, '!=')
            ->first();
        if ($query) {
            $error =  '<strong>' . $tag_name . '</strong>adında bir sayfa  zaten eklenmiş,lütfen başka bir isim deneyin';
        } else {
            $query = $db->update('tags')
                ->where('tag_id', $id)
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

$seo = json_decode($row['tag_seo'], true);

require admin_view('edit-tags');
