<?php

$table = get('table');
$column = get('column');
$id = get('id');

if ($table = 'reference_images') {

    $img = $db->from('reference_images')
        ->join('reference', '%s.reference_id = %s.image_reference_id')
        ->where('image_id', $id)
        ->first();

    unlink(PATH . '/upload/reference/' . $img['reference_url'] . '/' . $img['image_url']);
}
if ($table = 'reference') {

    $img = $db->from('reference')
        ->where('reference_id', $id)
        ->first();

    foreach (glob(PATH . '/upload/reference/' . $img['reference_url'] . '/*') as $file) {
        unlink($file);
    }
    rmdir(PATH . '/upload/reference/' . $img['reference_url']);
    $db->delete('reference_images')
        ->where('image_reference_id', $id)
        ->done();
}



$query = $db->delete($table)
    ->where($column, $id)
    ->done();

if ($table == 'post') {
    if ($query) {
        //konuya ait etiketleri sil
        $db->delete('post_tags')
            ->where('tag_post_id', $id)
            ->done();
        //konuya ait yorumları sil
        $db->delete('comments')
            ->where('comment_post_id', $id)
            ->done();
    }
}

if ($table = 'tags') {
    if ($query) {
        //etikete ait konu etiketlerini sil
        $db->delete('post_tags')
            ->where('tag_id', $id)
            ->done();
    }
}

header('Location:' . $_SERVER['HTTP_REFERER']);
exit;
