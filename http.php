<?php

use GeekBrains\LevelTwo\classes\Blog\Http\Request;
use GeekBrains\LevelTwo\classes\Blog\Http\SuccessfulResponse;
use \GeekBrains\LevelTwo\classes\Blog\Http\Actions\Users\FindByUsername;
use PDO;
use GeekBrains\LevelTwo\classes\Blog\Repositories\SqliteUsersRepository;
use \GeekBrains\LevelTwo\classes\Blog\Repositories\SqlitePostsRepository;
use GeekBrains\LevelTwo\classes\Person\User;
use GeekBrains\LevelTwo\classes\Blog\UUID;
use GeekBrains\LevelTwo\classes\Blog\Http\Actions\Posts\CreatePost;
use GeekBrains\LevelTwo\classes\Blog\Http\Actions\Posts\CreateComment;
use GeekBrains\LevelTwo\classes\Blog\Repositories\SqliteCommentsRepository;
require_once __DIR__ . '/vendor/autoload.php';

$connection = new PDO('sqlite:' . __DIR__ . '/database');

$usersRepository = new SqliteUsersRepository($connection);
$postsRepository = new SqlitePostsRepository($connection);
$commentsRepository = new SqliteCommentsRepository($connection);

$request = new Request( $_GET,
    $_SERVER,
    file_get_contents('php://input') );
    $path = $request->path();


$method = $request->method();

$routes = [
'GET' => [
    '/users/show' => new FindByUsername($usersRepository)
    ],
'POST' => [
    '/posts/create' => new CreatePost($postsRepository),
    '/posts/comment' => new CreateComment($commentsRepository),
    ],
];


$parameter = $request->query('some_parameter');
$header = $request->header('Some-Header');
$action = $routes[$method][$path];
var_dump($action);
$response = $action->handle($request);
$response->send();

