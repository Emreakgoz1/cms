<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//print_r(PATH);
require_once PATH . '/app/classes/upload.php';

use Upload;

$id = get('id');
if (!$id) {
    header('Location:' . admin_url('reference'));
    exit;
}

$row = $db->from('reference')
    ->where('reference_id', $id)
    ->first();
if (!$row) {
    header('Location:' . admin_url('reference'));
    exit;
}

$categories = $db->from('reference_categories')
    ->orderby('category_name', 'ASC')
    ->all();

if (post('submit')) {

    if ($data = form_control('reference_url', 'reference_demo')) {

        $data['reference_demo'] = post('reference_demo');
        $data['reference_url'] = permalink(post('reference_url') ? post('reference_url') : $data['reference_title']);
        $data['reference_seo'] = json_encode($data['reference_seo']);
        $data['reference_categories'] = implode(',', $data['reference_categories']);

        // bu referans daha önce eklenmiş mi?
        $query = $db->from('reference')
            ->where('reference_url', $data['reference_url'])
            ->where('reference_id', $id, '!=')
            ->first();

        if ($query) {
            $error = 'Bu referans adıyla bir referans zaten mevcut! Kontrol edin!';
        } else {
            //  rmdir(PATH . '/upload/reference/' . $data['reference_url']);
            //eğer url değişmiş ise upload klasöürdeki klasör adını da güncelle
            if ($data['reference_url'] = !$row['reference_url']) {
                rename(PATH . '/upload/reference/' . $row['reference_url'], PATH . '/upload/reference/' . $data['reference_url']);
            }
            $handle = new Upload($_FILES['reference_image']);
            //echo '<pre>';
            //print_r($handle);
            //echo '</pre>';
            //exit();
            if ($handle->uploaded) {

                $handle->file_new_name_body = $data['reference_url'] . '_' . rand(1, 9999);
                $handle->image_ratio_crop = true;
                //                    $handle->image_ratio_fill = true;
                $handle->image_resize = true;
                $handle->image_x = 525;
                $handle->image_y = 350;
                $handle->allowed = ['image/*'];
                $handle->process(PATH . '/upload/reference/' . $data['reference_url']);
                if ($handle->processed) {

                    unlink(PATH . '/upload/reference/' . $data['reference_url'] . '/' . $row['reference_image']);
                    $data['reference_image'] = $handle->file_dst_name_body . '.' . $handle->file_dst_name_ext;
                } else {
                    $error = $handle->error;
                }
            } else {
                $data['reference_image'] = $row['reference_image'];
            }
        }
        if (!isset($error)) {

            $update = $db->update('reference')
                ->where('reference_id', $id)
                ->set($data);

            if ($update) {
                header('Location:' . admin_url('reference'));
            } else {
                $error = 'Bir sorun oluştu ve referans eklenemedi.';
            }
        }
    }
} else {
    $error = 'Lütfen tüm alanları doldurup tekrar deneyin.';
}

$seo = json_decode($row['reference_seo'], true);

require admin_view('edit-reference');
