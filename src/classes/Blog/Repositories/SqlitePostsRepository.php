<?php

namespace GeekBrains\LevelTwo\classes\Blog\Repositories;

use GeekBrains\LevelTwo\classes\Blog\Post;
use GeekBrains\LevelTwo\classes\Blog\UUID;
use PDO;
class SqlitePostsRepository
{
    private $connection;

    /**
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function save(Post $post)
    {
        $statement = $this->connection->prepare('INSERT INTO posts (uuid, author_uuid, title, text)
        VALUES (:uuid, :author_uuid, :title, :text)');
        $statement->execute([
            ':uuid' => $post->getUUID(), ':author_uuid' => $post->getAuthorId(), ':title' => $post->getHeader(), ':text' => $post->getText()
        ]);

    }

    public function get(UUID $uuid){
        $statement = $this->connection->prepare( 'SELECT * FROM posts WHERE uuid = ?');
        $statement->execute([
            ':uuid' => (string)$uuid,
        ]);
    }
}