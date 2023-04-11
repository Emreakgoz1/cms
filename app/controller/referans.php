<?php

if (!route(1)) {
    header('Location' . site_url('referanslar'));
    exit;
}



$reference_url = route(1);

$row = $db->from('reference')
    ->where('reference_url', $reference_url)
    ->first();


if (!$row) {
    header('Location:' . site_url('referanslar'));
    exit;
}

$images = $db->from('reference_images')
    ->where('image_reference_id', $row['reference_id'])
    ->orderby('image_id', 'DESC')
    ->all();
$seo = json_decode($row['reference_seo'], true);

$meta = [
    'title' => $seo['title'] ? $seo['title'] : $row['reference_title'],
    'description' => $seo['description'] ? $seo['description'] : cut_text($row['reference_content'])
];

require view('referans');
