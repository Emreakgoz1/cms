<?php

$id = get('id');
if (!$id) {
    header('Location:' . admin_url('comments'));
    exit;
}

$row = $db->from('comments')
    ->join('posts', 'posts.post_id = comments.comment_post_id')
    ->join('users', 'users.user_id = comments.comment_user_id', 'left')
    ->where('comment_id', $id)
    ->first();
if (!$row) {
    header('Location:' . admin_url('comments'));
    exit;
}

if (post('submit')) {

    if ($data = form_control('comment_status')) {
        $data['comment_status'] = post('comment_status');

        $query = $db->update('comments')
            ->where('comment_id', $id)
            ->set($data);

        if ($query) {
            header('Location:' . admin_url('comments'));
        } else {
            $error = 'Bir sorun oluştu.';
        }
    } else {
        $error = 'Eksik alanlar var, lütfen kontrol edin.';
    }
}

require admin_view('edit-comment');
