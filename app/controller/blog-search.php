<?php

if (!get('q')) {
    header('Location:', site_url('blog'));
    exit;
}

$meta = [
    'title' => sprintf(setting('blog_search_title'), get('q')),
    'description' => sprintf(setting('blog_search_description'), get('q'))
];

$totalRecord = $db->from('posts')
    ->select('count(DISTINCT post_id) as total')
    ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
    ->where('post_status', 1)
    ->total();

$pageLimit = 1;
$pageParam = 'sayfa';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('posts')
    ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
    ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
    ->where('post_status', 1)
    ->where('post_title', get('q'), 'LIKE')
    ->or_where('post_content', get('q'), 'LIKE')
    ->or_where('post_short_content', get('q'), 'LIKE')
    /* ->group(function ($db) {
        $db->where('post_title',get('q'),'LIKE')  Bu şekilde group fonksiyonu ile hata döndürdüğü için ayrı ayrı orwhere yazıldı.
        ->or_where('post_content',get('q'),'LIKE')
    })*/

    ->groupby('posts.post_id')
    ->orderby('post_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require view('blog-search');
