<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$totalRecord = $db->from('comments')
    ->select('count(comment_id) as total');
if ($status = get('status')) {
    $totalRecord = $db->where('comment_status', ($status == 2 ? 0 : $status));
}
$totalRecord = $db->total();

$pageLimit = 4;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('comments')
    ->join('posts', 'posts.post_id = comments.comment_post_id')
    ->join('users', 'users.user_id = comments.comment_user_id', 'left');
if ($status = get('status')) {
    $query = $db->where('comment_status', ($status == 2 ? 0 : $status));
}
$query = $db->orderby('comment_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();
require admin_view('comments');
