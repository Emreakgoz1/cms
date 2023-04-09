<?php

$table = get('table');
$column = get('column');
$id = get('id');

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
