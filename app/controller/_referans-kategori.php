<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$seo = json_decode($current_category['category_seo'], true);

$meta = [
    'title' => $seo['title']  ? $seo['title'] : $current_category['category_name'],
    'description' => $seo['description']  ? $seo['description'] : null

];

$query = $db->from('reference')
    ->select('reference.*,GROUP_CONCAT(reference_categories.category_name) as categories')
    ->join('reference_categories', 'FIND_IN_SET(%s.category_id, %s.reference_categories)')
    ->FIND_IN_SET('reference_categories', $current_category['category_id'])
    //reference categories tablosuna baglandım ve ordaki category id'im FIND_IN_SEt olacak reference.reference_category_id,
    ->orderby('reference_id', 'DESC')
    ->groupby('reference_id')
    ->all();




require view('_referans-kategori');
