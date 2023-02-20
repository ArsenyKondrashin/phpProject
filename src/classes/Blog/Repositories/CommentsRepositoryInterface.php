<?php

namespace GeekBrains\LevelTwo\classes\Blog\Repositories;

use GeekBrains\LevelTwo\classes\Blog\Comment;
use GeekBrains\LevelTwo\classes\Blog\UUID;

interface CommentsRepositoryInterface
{
    public function save(Comment $post);
    public function get(UUID $uuid);
}