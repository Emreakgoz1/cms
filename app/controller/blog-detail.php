<?php

$row = Blog::findPost($post_url);
if (!$row) {
    header('Location:' . site_url('404'));
    exit;
}

$seo = json_decode($row['post_seo'], true);

$meta = [
    'title' => $seo['title'] ?  $seo['title'] : $row['post_title'],
    'description' => $seo['description'] ? $seo['description'] : cut_text($row['post_short_content'])
];

$url = site_url('blog/' . $row['post_url']);
$title = $row['post_title'];
$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url);
$twitter_url = "https://twitter.com/intent/tweet?text=" . urldecode($url);
$linkedin_url = "https://www.linkedin.com/shareArticle?mini=true&url=" . urldecode($url);

$comments = $db->from('comments')
    ->where('comment_post_id', $row['post_id'])
    ->where('comment_status', 1)
    ->orderby('comment_id', 'ASC')
    ->all();

require view('blog-detail');
