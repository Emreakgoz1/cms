<?php

if (route(1) == 'kategori') {

    require controller('blog-category');
} else if (route(1) == 'arama') {
    require controller('blog-search');
} else {

    if ($post_url = route(1)) {
        require controller('blog-detail');
    } else {

        $meta = [
            'title' => setting('blog_title'),
            'description' => setting('blog_description'),
            'keywords' => setting('keywords')
        ];

        $totalRecord = $db->from('posts')
            ->select('count(post_id) as total')
            ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
            ->where('post_status', 1)
            ->groupby('posts.post_id')
            ->total();

        $pageLimit = 1;
        $pageParam = 'sayfa';
        $pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

        $query = $db->from('posts')
            ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
            ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
            ->where('post_status', 1)
            ->groupby('posts.post_id')
            ->orderby('post_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all();

        require view('blog');
    }
}
