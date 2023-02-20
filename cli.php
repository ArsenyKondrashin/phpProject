<?php

require_once __DIR__ . '/vendor/autoload.php';

use GeekBrains\LevelTwo\classes\Blog\Post;
use GeekBrains\LevelTwo\classes\Person\User;
use GeekBrains\LevelTwo\classes\Blog\Comment;

use GeekBrains\LevelTwo\classes\Blog\Repositories\SqlitePostsRepository;
use GeekBrains\LevelTwo\classes\Blog\Repositories\SqliteUsersRepository;
use GeekBrains\LevelTwo\classes\Blog\UUID;
use GeekBrains\LevelTwo\classes\Blog\Repositories\SqliteCommentsRepository;
$connection = new PDO('sqlite:' . __DIR__ . '/database');

$faker = Faker\Factory::create('ru_RU');
$username = $faker->userName;
$firstname = $faker->firstName;
$lastname = $faker->lastName;
$header = $faker->word;
$text = $faker->text(random_int(100, 200));
$user = new User(UUID::random(), $firstname, $lastname, $username);

$usersRepository = new SqliteUsersRepository($connection);
$postsRepository = new SqlitePostsRepository($connection);
$commentsRepository = new SqliteCommentsRepository($connection);

switch ($argv[1]) {
    case 'user':
        print $user;
        $usersRepository->save($user);
        break;
    case 'post':
        $usersRepository->save($user);
        $post = new Post(UUID::random(), $user, $header, $text);
        print $post;

        $postsRepository->save($post);
        break;
    case "comment":
        $post = new Post(UUID::random(), $user, $header, $text);
        $comment = new Comment(UUID::random(), $user, $post, $text);
        print $comment;
        $commentsRepository->save($comment);
        break;
}