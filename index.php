<?php
date_default_timezone_set('Asia/Yekaterinburg');
$is_auth = rand(0, 1);

$user_name = 'Сергей'; // укажите здесь ваше имя
require('helpers.php'); 

$posts = [
            [
             'title'   => 'Цитата',
             'type'    => 'post-quote',
             'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
             'name'    => 'Лариса',
             'ava'     => 'userpic-larisa-small.jpg'
            ],
             [
             'title'  => 'Игра престолов',
             'type'    => 'post-text',
             'content' => 'Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!',
             'name'    => 'Владик',
             'ava'     => 'userpic.jpg'
            ],
             [
             'title'  => 'Наконец, обработал фотки!',
             'type'    => 'post-photo',
             'content' => 'rock-medium.jpg',
             'name'    => 'Виктор',
             'ava'     => 'userpic-mark.jpg'
            ],
             [
             'title'  => 'Моя мечта',
             'type'    => 'post-photo',
             'content' => 'coast-medium.jpg',
             'name'    => 'Лариса',
             'ava'     => 'userpic-larisa-small.jpg'
            ],
             ['title'  => 'Лучшие курсы',
             'type'    => 'post-link',
             'content' => 'www.htmlacademy.ru',
             'name'    => 'Владик',
             'ava'     => 'userpic.jpg'
            ],
            ];


$main = include_template('main.php', ['posts' => $posts]);
$layout = include_template('layout.php', ['title' => $title, 'main' => $main]);

print $layout;

