<?php

require('helpers.php'); 

$con = mysqli_connect("971699-readme-12", "root", "", "readme_db");
mysqli_set_charset($con, "utf8");

if (isset($_GET['p_id'])) 
     {
       $p_id = $_GET['p_id'];

       $q=mysqli_query($con, "SELECT id FROM posts WHERE id = $p_id");
       $w = count(mysqli_fetch_all($q));
       
	if($w>0)
		{
     		$where = "WHERE p.id = $p_id";
     		$name = $_GET['name'];
     		$address = "post-$name.php";
     }
else { 
		print("Ошибка подключения: 404");
      }};



$post_content_sql = "SELECT p.id, p.post_type_id, p.creation_date, p.title, 
p.text, p.quote, p.photo, p.video, p.link, p.author_id AS author_id,
u.login AS login, u.avatar AS avatar, p_t.name AS post_type_name, p.count_views, u.creation_date AS user_date
FROM posts p 
JOIN users u ON p.author_id = u.id 
JOIN post_types p_t ON p.post_type_id = p_t.id 
$where
ORDER BY count_views DESC 
LIMIT 6";

$result_post = mysqli_query($con, $post_content_sql);
$post = mysqli_fetch_assoc($result_post);
$content = $post[$name];

$author_id = $post['author_id'];

//количество публикаций
$result_publications = mysqli_query($con, "SELECT id FROM posts WHERE author_id = $author_id");
$count_publications = count(mysqli_fetch_all($result_publications));

//количество подписчиков
$result_subscriptions = mysqli_query($con, "SELECT subscriber_id FROM subscriptions  WHERE author_id = $author_id");
$count_subscriptions = count(mysqli_fetch_all($result_subscriptions));

$post_content = include_template($address, ['post' => $post, 'content' =>$content]);
$post_main = include_template('post-main.php', ['post' => $post, 'post_content' =>$post_content, 'count_publications' =>$count_publications, 'count_subscriptions' => $count_subscriptions]);

print $post_main;