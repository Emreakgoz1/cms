<?php

$totalRecord = $db->from('users')
    ->select('count(user_id) as total')
    ->total();

$pageLimit = 10;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('users')
    ->orderby('user_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require admin_view('users');
