<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$totalRecord = $db->from('pages')
    ->select('count(page_id) as total')
    ->total();

$pageLimit = 10;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('pages')
    ->orderby('page_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require admin_view('pages');
