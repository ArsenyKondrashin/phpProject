<?php

require_once __DIR__ . '/vendor/autoload.php';

use GeekBrains\LevelTwo\classes\Blog\Post;
use GeekBrains\LevelTwo\classes\Person\User;
use GeekBrains\LevelTwo\classes\Blog\Comment;

$faker = Faker\Factory::create('ru_RU');
$name = $faker->name;
$header = $faker->word;
$text = $faker->text(random_int(100, 200));
$user = new User(1, $name);






switch ($argv[1]) {
    case 'user':
        print $user;
        break;
    case 'post':
        $post = new Post(1, $user, $header, $text);
        print $post;
        break;
    case "comment":
        $post = new Post(1, $user, $header, $text);
        $comment = new Comment(1, $user, $post, $text);
        print $comment;
        break;
}