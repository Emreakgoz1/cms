<?php
$query = $db->from('reference_categories')
    ->orderby('category_order', 'ASC')
    ->all();

require admin_view('reference-categories');
