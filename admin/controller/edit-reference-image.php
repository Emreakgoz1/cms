<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = get('id');

if (!$id) {
    header('Location:' . admin_url('reference'));
    exit;
}

$row = $db->from('reference_images')
    ->join('reference', '%s.reference_id = %s.image_reference_id')
    ->where('image_id', $id)
    ->first();
if (!$row) {
    header('Location:' . admin_url('reference'));
    exit;
} else {
}
if (post('submit')) {
    $image_content = post('image_content');
    $image_content = json_encode($image_content);
    if ($_FILES['image']) {
        echo
    }
}
require admin_view('edit-reference-image');
