<?php
date_default_timezone_set('Asia/Yekaterinburg');
$is_auth = rand(0, 1);

$user_name = 'Сергей'; // укажите здесь ваше имя
require('helpers.php'); 

$main = include_template('main.php', ['posts' => $posts]);
$layout = include_template('layout.php', ['title' => $title, 'main' => $main]);

                
                 $datetime = generate_random_date($key);
                 $date_title = date('d-m-Y H:i' ,strtotime($datetime));
                 

print $layout;

