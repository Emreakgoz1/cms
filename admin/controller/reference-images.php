<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once PATH . '/app/classes/upload.php';

use Upload;

$id = get('id');
if (!$id) {
    header('Location' . admin_url('reference'));
    exit;
}

$row = $db->From('reference')
    ->where('reference_id', $id)
    ->first();
if (!$row) {
    header('Location' . admin_url('reference'));
    exit;
}
if (post('submit')) {
    if (array_filter($_FILES['images']['name'])) {

        $files = [];
        foreach ($_FILES['images'] as $file_key => $values) {
            foreach ($values as $index => $value) {
                $files[$index][$file_key] = $value;
            }
        }


        //echo '<pre>';
        //print_r($handle);
        //echo '</pre>';
        //exit();
        foreach ($files as $file) {
            $handle = new Upload($file);
            if ($handle->uploaded) {
                $handle->file_new_name_body = $row['reference_url'] . '_' . rand(1, 9999);
                $handle->image_ratio_crop = true;
                //                    $handle->image_ratio_fill = true;
                $handle->image_resize = true;
                $handle->image_x = 1280;
                $handle->image_ratio_y = true;
                $handle->allowed = ['image/*'];
                $handle->process(PATH . '/upload/reference/' . $row['reference_url']);
                if ($handle->processed) {
                    $img = $handle->file_dst_name_body . '.' . $handle->file_dst_name_ext;
                    $db->insert('reference_images')
                        ->set([
                            'image_url' => $img,
                            'image_reference_id' => $id
                        ]);
                } else {
                    $error = $handle->error;
                }
            }
        }
        header('Location' . admin_url('reference-images?id=' . $id));
        //exit;
    }
}
$query = $db->from('reference_images')
    ->where('image_reference_id', $id)
    ->orderBy('image_id', 'DESC')
    ->all();

require admin_view('reference-images');
