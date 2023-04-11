<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//print_r(PATH);
require_once PATH . '/app/classes/upload.php';

use Upload;

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
            ->first();

        if ($query) {
            $error = 'Bu referans adıyla bir referans zaten mevcut! Kontrol edin!';
        } else {
            if (mkdir(PATH . '/upload/reference/' . $data['reference_url'], 0777)) {
                $handle = new Upload($_FILES['reference_image']);
                //echo '<pre>';
                //print_r($handle);
                //echo '</pre>';

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
                        $data['reference_image'] = $handle->file_dst_name_body . '.' . $handle->file_dst_name_ext;
                    } else {
                        $error = $handle->error;
                        print_r($error);
                    }
                } else {
                    $error = 'Lütfen referans görselini yükleyin!';
                }
            } else {
                $error = PATH . '/upload/reference/' . $data['reference_url'] . ' dizini oluşturulamadı!';
            }

            if (!isset($error)) {

                $insert = $db->insert('reference')
                    ->set($data);

                if ($insert) {
                    header('Location:' . admin_url('reference'));
                } else {
                    $error = 'Bir sorun oluştu ve referans eklenemedi.';
                }
            }
        }
    } else {
        $error = 'Lütfen tüm alanları doldurup tekrar deneyin.';
    }
}

require admin_view('add-reference');
