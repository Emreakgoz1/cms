<?php

require_once 'basicdb.php';
//require_once '../../app/init.php';

class Blog
{
    public static function Categories()
    {

        global $db;
        $query = $db->prepare('SELECT categories.*, COUNT(post_id) as total FROM categories INNER JOIN posts ON FIND_IN_SET(category_id, post_categories) GROUP BY category_id');
        //  $query = $db->prepare('SELECT categories.*, COUNT(post_id) as total from categories inner join posts on FIND_IN_SET(category_id,post_categories) group by category_id');
        //$query = $db->prepare('SELECT * FROM categories ORDER BY category_order ASC');
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public static function findPost($post_url)
    {
        global $db;
        $query = $db->prepare('SELECT posts.*, GROUP_CONCAT(categories.category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(categories.category_url SEPARATOR ", ") as category_url FROM categories INNER JOIN posts ON FIND_IN_SET(categories.category_id, posts.post_categories) WHERE posts.post_url = :post_url AND posts.post_status = 1 GROUP BY posts.post_id');
        $query->bindParam(':post_url', $post_url, PDO::PARAM_STR);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
        /*  global $db;
        $query = $db->prepare('SELECT posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url FROM categories INNER JOIN posts ON FIND_IN_SET(category_id, post_categories) WHERE post_url,$post_url WHERE post_status,1');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
        /* return $db->from('posts')
            ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
            ->join('categories', 'find_in_set(category_id,post_categories)')
            ->where('post_url', $$post_url)
            ->where('post_status', 1)
            ->first();*/
    }
    public static function findPostById($post_id)
    {
        /*global $db;
        return $db->from('posts')
            ->where('post_id', $post_id)
            ->where('post_status', 1)
            ->first();*/

        global $db;
        $query = $db->prepare('SELECT * FROM posts WHERE post_id = :post_id AND post_status = 1 ');
        $query->bindParam(':post_id', $post_id, PDO::PARAM_STR);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
        /*  global $db;
        $query = $db->prepare('SELECT posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url FROM categories INNER JOIN posts ON FIND_IN_SET(category_id, post_categories) WHERE post_url,$post_url WHERE post_status,1');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
        /* return $db->from('posts')
            ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
            ->join('categories', 'find_in_set(category_id,post_categories)')
            ->where('post_url', $$post_url)
            ->where('post_status', 1)
            ->first();*/
    }
}
