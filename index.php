<?php
date_default_timezone_set('Asia/Yekaterinburg');
$is_auth = rand(0, 1);

$user_name = 'Сергей'; // укажите здесь ваше имя
require('helpers.php'); 

$con = mysqli_connect("971699-readme-12", "root", "", "readme_db");
mysqli_set_charset($con, "utf8");

$post_types_sql = "SELECT * 
FROM post_types";

$result_post_types = mysqli_query($con, $post_types_sql);
$post_types = mysqli_fetch_all($result_post_types, MYSQLI_ASSOC);

if (isset($_GET['type'])) 
     {
     $type = null;
     $type = $_GET['type'];
     $where = "WHERE p.post_type_id = $type";
     }
else { 
     $where = '';
     }

$posts_sql = "SELECT p.id, p.post_type_id, p.creation_date, p.title, p.text, p.quote, p.photo, p.video, p.link,u.login AS login, u.avatar AS avatar, p_t.name AS post_type_name, p.count_views 
FROM posts p 
JOIN users u ON p.author_id = u.id 
JOIN post_types p_t ON p.post_type_id = p_t.id 
$where
ORDER BY count_views DESC 
LIMIT 6";

$result_posts = mysqli_query($con, $posts_sql);
$posts = mysqli_fetch_all($result_posts, MYSQLI_ASSOC);

$main = include_template('main.php', ['posts' => $posts, 'post_types' => $post_types, 'type' => $type]);

$layout = include_template('layout.php', ['title' => $title, 'main' => $main]);






print $layout;

