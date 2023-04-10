<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$totalRecord = $db->from('reference')
    ->select('count(reference_id) as total')
    ->total();

$pageLimit = 10;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('reference')
    ->select('reference.*,GROUP_CONCAT(reference_categories.category_name) as categories')
    ->join('reference_categories', 'FIND_IN_SET(%s.category_id, %s.reference_categories)')
    //reference categories tablosuna baglandım ve ordaki category id'im FIND_IN_SEt olacak reference.reference_category_id,
    ->orderby('reference_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->groupby('reference_id')
    ->all();
require admin_view('reference');
