<?php



$categories = $db->from('reference_categories')
    ->orderby('category_order', 'ASC')
    ->all();

if (route(1)) {
    $current_category = null;
    foreach ($categories as $category) {
        if ($category['category_url'] == route(1)) {
            $current_category = $category;
        }
    }
    if (!$current_category) {
        header('Location:' . site_url('referanslar'));
    }
    require controller('_referans-kategori');
} else {
    $meta = [
        'title' => setting('references_title'),
        'description' => setting('references_description'),
        'keywords' => setting('keywords')
    ];
    $query = $db->from('reference')
        ->select('reference.*,GROUP_CONCAT(reference_categories.category_name) as categories')
        ->join('reference_categories', 'FIND_IN_SET(%s.category_id, %s.reference_categories)')
        //reference categories tablosuna baglandım ve ordaki category id'im FIND_IN_SEt olacak reference.reference_category_id,
        ->orderby('reference_id', 'DESC')
        ->groupby('reference_id')
        ->all();
}


require view('referanslar');
