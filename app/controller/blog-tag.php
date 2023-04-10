<?php

$tag_url = route(2);

if (!$tag_url) {
    header('Location:', site_url('404'));
    exit;
}

$tag = $db->from('tags')
    ->where('tag_url', $tag_url)
    ->first();

if (!$tag_url) {
    header('Location:' . site_url('404'));
    exit;
}
$seo = json_decode($tag['tag_seo'], true);
$meta = [
    'title' => $seo['title'] ? $seo['title'] : $category['tag_name'],
    'description' => $seo['description'] ? $seo['description'] : null

];

$totalRecord = $db->from('post_tags')
    ->select('count(id) as total')
    ->where('tag_id', $tag['tag_id'])
    ->total();

$pageLimit = 1;
$pageParam = 'sayfa';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('post_tags')
    ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
    ->join('posts', '%s.post_id = %s    .tag_post_id')
    ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')

    ->where('tag_id', $tag['tag_id'])
    ->orderby('post_id', 'DESC')
    ->groupby('posts.post_id')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();


require view('blog-tag');
