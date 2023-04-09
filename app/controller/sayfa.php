<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$page_url = route(1);
if (!$page_url) {
    header('Location:' . site_url('404'));
}
$row = $db->from('pages')
    ->where('page_url', $page_url)
    ->first();

if (!$row) {
    header('Location:' . site_url('404'));
    exit;
}

$seo = json_decode($row['page_seo'], true);

$meta = [
    'title' => $seo['title'] ? $seo['title'] : $row['page_title'],
    'description' => $seo['description'] ? $seo['description'] : cut_text($row['page_content'], 210)
];

require view('page');
