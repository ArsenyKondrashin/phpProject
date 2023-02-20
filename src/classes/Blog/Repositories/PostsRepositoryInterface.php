<?php

namespace GeekBrains\LevelTwo\classes\Blog\Repositories;
use GeekBrains\LevelTwo\classes\Blog\Post;
use GeekBrains\LevelTwo\classes\Blog\UUID;

interface PostsRepositoryInterface
{
    public function save(Post $post);
    public function get(UUID $uuid);
}
