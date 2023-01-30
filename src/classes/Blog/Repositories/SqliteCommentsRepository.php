<?php

namespace GeekBrains\LevelTwo\classes\Blog\Repositories;
use GeekBrains\LevelTwo\classes\Blog\Comment;
use GeekBrains\LevelTwo\classes\Blog\UUID;
use PDO;
class SqliteCommentsRepository
{
    private $connection;

    /**
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function save(Comment $comment)
    {
        $statement = $this->connection->prepare('INSERT INTO comments (uuid, post_id, author_uuid, text)
        VALUES (:uuid, :post_uuid, :author_uuid, :text)');
        $statement->execute([
            ':uuid' => $comment->getUUID(), ':post_uuid' => $comment->getPostId(), ':author_uuid' => $comment->getAuthorId(), ':text' => $comment->getText()
        ]);

    }

    public function get(UUID $uuid){
        $statement = $this->connection->prepare( 'SELECT * FROM comments WHERE uuid = ?');
        $statement->execute([
            ':uuid' => (string)$uuid,
        ]);
    }
}