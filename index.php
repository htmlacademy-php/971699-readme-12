<?php
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

            function long_text ($text, $max_simbol=300)
            {
            $text_array = explode(" ", $text);
            $symbol = mb_strlen($text);
                if ($symbol > $max_simbol) 
                {
                    foreach ($text_array as $key => $word)
                    {
                    $sum_sim = mb_strlen($word);
                    $total_sim = $total_sim+$sum_sim+1;
                        if ($total_sim >= $max_simbol) 
                        {
                        break;
                        }
                    }
                $new_text = array_slice($text_array, 0, $key);
                $new_text = implode(" ", $new_text);
                echo "<p>" . $new_text . "...</p>";
                echo '<a class="post-text__more-link" href="#">Читать далее</a>';
                } else 
                {
                echo "<p>" . $text . "</p>";
                }
            };

$main = include_template('main.php', ['posts' => $posts]);

$layout = include_template('layout.php', ['title' => $title, 'main' => $main]);

print $layout;

