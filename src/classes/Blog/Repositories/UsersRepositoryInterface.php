<?php

namespace GeekBrains\LevelTwo\classes\Blog\Repositories;

use GeekBrains\LevelTwo\classes\Blog\UUID;

interface UsersRepositoryInterface
{
    public function save($user);
    public function get(UUID $uuid);
}