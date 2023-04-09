<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = get('id');
if (!$id) {
    header('Location:' . admin_url('pages'));
    exit;
}
$row = $db->from('pages')
    ->where('page_id', $id)
    ->first();

if (!$row) {
    header('Location:' . admin_url('pages'));
    exit;
}

if (post('submit')) {
    $page_title = post('page_title');
    $page_url = permalink(post('page_url'));
    if (!post('page_url')) {
        $page_url = permalink($page_title);
    }
    $page_content = post('page_content');
    $page_seo = json_encode(post('page_seo'));
    if (!$page_url || !$page_content) {
        $error = 'Lütfen tüm alanları doldurun';
    } else {
        //sayfa varmı kontrol et
        $query  = $db->from('pages')
            ->where('page_url', $page_url)
            ->where('page_id', $id, '!=')
            ->first();
        if ($query) {
            $error =  '<strong>' . $page_title . '</strong>adında bir sayfa  zaten eklenmiş,lütfen başka bir isim deneyin';
        } else {
            $query = $db->update('pages')
                ->where('page_id', $id)
                ->set([
                    'page_title' => $page_title,
                    'page_url' => $page_url,
                    'page_content' => $page_content,
                    'page_seo' => $page_seo
                ]);
            if ($query) {
                header('Location:' . admin_url('pages'));
            } else {
                $error = 'Bir sorun oluştu';
            }
        }
    }
}

$seo = json_decode($row['page_seo'], true);

require admin_view('edit-pages');
