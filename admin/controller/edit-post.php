<?php

$id = get('id');
if (!$id) {
    header('Location:' . admin_url('posts'));
    exit;
}



$row = $db->from('posts')
    ->where('post_id', $id)
    ->first();
if (!$row) {
    header('Location:' . admin_url('posts'));
    exit;
}




$categories = $db->from('categories')
    ->orderby('category_name', 'ASC')
    ->all();


$allTags = $db->from('tags')
    ->orderby('tag_id', 'ASC')
    ->all();
$tagsArr = [];
foreach ($allTags as $allTag) {
    $tagsArr[] = trim(htmlspecialchars($allTag['tag_name']));
}

//etiketler
$tags = $db->from('post_tags')
    ->join('tags', '%s.tag_id = %s.tag_id')
    ->where('tag_post_id', $id)
    ->all();

$postTags = [];
foreach ($tags as $tag) {
    $postTags[] = trim($tag['tag_name']);
}

if (post('submit')) {

    $post_title = post('post_title');
    $post_url = permalink(post('post_url'));
    if (!post('post_url')) {
        $post_url = permalink($post_title);
    }
    $post_content = post('post_content');
    $post_short_content = post('post_short_content');
    $post_categories = post('post_categories');
    $post_status = post('post_status');
    $post_tags = post('post_tags');
    $post_seo = json_encode(post('post_seo'));

    if (!$post_url || !$post_content || !$post_status || !$post_categories) {
        $error = 'Lütfen tüm alanları doldurun.';
    } else {
        $post_categories = implode(',', post('post_categories'));
        // konu var mı kontrol et
        $query = $db->from('posts')
            ->where('post_url', $post_url)
            ->where('post_id', $id, '!=')
            ->first();

        if ($query) {
            $error = '<strong>' . $post_title . '</strong> adında bir konu zaten eklenmiş, lütfen başka bir isim deneyin.';
        } else {

            $query = $db->update('posts')
                ->where('post_id', $id)
                ->set([
                    'post_title' => $post_title,
                    'post_url' => $post_url,
                    'post_content' => $post_content,
                    'post_short_content' => $post_short_content,
                    'post_categories' => $post_categories,
                    'post_seo' => $post_seo,
                    'post_status' => $post_status
                ]);

            if ($query) {

                $postID = $id;

                // etiketleri kontrol et ve ekle
                $post_tags = array_map('trim', explode(",", $post_tags));
                $post_tags = array_filter($post_tags);
                if (count($post_tags) > 0) {

                    foreach ($post_tags as $tag) {

                        // etiket var mı kontrol et
                        $row = $db->from('tags')
                            ->where('tag_url', permalink($tag))
                            ->first();

                        if (!$row) {
                            $tagInsert = $db->insert('tags')
                                ->set([
                                    'tag_name' => $tag,
                                    'tag_url' => permalink($tag)
                                ]);
                            $tagId = $db->lastId();
                        } else {
                            $tagId = $row['tag_id'];
                        }

                        // konuya ait etiket var mı?
                        $row = $db->from('post_tags')
                            ->where('tag_post_id', $postID)
                            ->where('tag_id', $tagId)
                            ->first();

                        if (!$row) {

                            $db->insert('post_tags')
                                ->set([
                                    'tag_post_id' => $postID,
                                    'tag_id' => $tagId
                                ]);
                        }
                    }
                }
                //silinen etiketleri kontrol et
                $diffs = array_diff($postTags, $post_tags);
                if (count($diffs) > 0) {
                    foreach ($diffs as $diff) {
                        foreach ($allTags as $allTag) {
                            if (trim($allTag['tag_name']) == $diff) {
                                $db->delete('post_tags')
                                    ->where('tag_id', $allTag['tag_id'])
                                    ->where('tag_post_id', $id)
                                    ->done();
                            }
                        }
                    }
                }


                header('Location:' . admin_url('posts'));
            } else {

                $error = 'Bir sorun oluştu.';
            }
        }
    }
}

$seo = json_decode($row['post_seo'], true);
require admin_view('edit-post');
