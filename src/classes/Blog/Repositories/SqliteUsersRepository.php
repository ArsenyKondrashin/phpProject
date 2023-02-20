<?php

namespace GeekBrains\LevelTwo\classes\Blog\Repositories;

use GeekBrains\LevelTwo\classes\Blog\UUID;
use GeekBrains\LevelTwo\classes\Person\User;
use PDO;
class SqliteUsersRepository implements UsersRepositoryInterface
{
    private $connection;

    /**
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function save($user)
    {
        $statement = $this->connection->prepare('INSERT INTO users (first_name, last_name, uuid, username)
        VALUES (:first_name, :last_name, :uuid, :username)');
        $statement->execute([
            ':first_name' => $user->getFirstname(), ':last_name' => $user->getLastname(), ':uuid' => (string)$user->getUUID(), ':username' => $user->getUsername()
        ]);
      /*  $statement = $this->connection;
        $statement->exec('INSERT INTO users (first_name, last_name)
        VALUES ($user->getFirstname(), $user->getLastname())');*/
    }

    public function get(UUID $uuid){
        $statement = $this->connection->prepare( 'SELECT * FROM users WHERE uuid = ?');
        $statement->execute([
            ':uuid' => (string)$uuid,
            ]);
    }
    public function getByUsername($username){
        $statement = $this->connection->prepare( 'SELECT * FROM users WHERE username = ?');
        $statement->execute([
            ':username' => (string)$username,
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}