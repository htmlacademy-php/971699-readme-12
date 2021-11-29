INSERT INTO post_types (title, name) VALUES ('Текст','post-text');
INSERT INTO post_types (title, name) VALUES ('Цитата','post-quote');
INSERT INTO post_types (title, name) VALUES ('Картинка','post-photo');
INSERT INTO post_types (title, name) VALUES ('Видео','post-video');
INSERT INTO post_types (title, name) VALUES ('Ссылка','post-link');

INSERT INTO users (email, login, password) VALUES ('andrey2014@mail.ru','Андрей','2014m05');
INSERT INTO users (email, login, password) VALUES ('lobanov17VS@gmail.com','lobanov','gpsmts16');
INSERT INTO users (email, login, password, avatar) VALUES ('larisa657@gmail.com','Лариса','wsda54','userpic-larisa-small.jpg');
INSERT INTO users (email, login, password, avatar) VALUES ('vlad6s@gmail.com','Владик','uikhgv47','userpic.jpg');
INSERT INTO users (email, login, password, avatar) VALUES ('victor7g@gmail.com','Виктор','fkvhjj78','userpic-mark.jpg');

INSERT INTO posts (author_id, title, quote, post_type_id, count_views) VALUES (3,'Цитата','Мы в жизни любим только раз, а после ищем лишь похожих',2,10);
INSERT INTO posts (author_id, title, text, post_type_id, count_views) VALUES (4,'Игра престолов','Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!Не могу дождаться начала финального сезона своего любимого сериала!',1,3);
INSERT INTO posts (author_id, title, photo, post_type_id, count_views) VALUES (5,'Наконец, обработал фотки!','rock-medium.jpg',3,68);
INSERT INTO posts (author_id, title, photo, post_type_id, count_views) VALUES (3,'Моя мечта','coast-medium.jpg',3,15);
INSERT INTO posts (author_id, title, link, post_type_id, count_views) VALUES (4,'Лучшие курсы','www.htmlacademy.ru',5,44);

INSERT INTO comments (content, author_id, post_id) VALUES ('Тоже жду новый сезон',1,2);
INSERT INTO comments (content, author_id, post_id) VALUES ('Очень красивое фото',2,3);

--список постов с сортировкой по популярности и вместе с именами авторов и типом контента
SELECT  p.id, p.creation_date, p.title, u.login AS login, p_t.title AS post_type_title, p.count_views FROM posts p JOIN users u ON p.author_id = u.id JOIN post_types p_t ON p.post_type_id = p_t.id ORDER BY count_views DESC;
--список постов для конкретного пользователя
SELECT * FROM posts WHERE author_id = 3;

--список комментариев для одного поста, вместе с логином пользователя
SELECT c.content, u.login AS login FROM  comments c JOIN posts p ON c.post_id = p.id JOIN users u ON c.author_id = u.id WHERE p.id = 2;

--добавляем лайк к посту
INSERT INTO likes (author_id, post_id) VALUES (1, 2);

--подписка на пользователя
INSERT INTO subscriptions (subscriber_id, author_id) VALUES (1, 3);