<?php

namespace GeekBrains\LevelTwo\classes\Blog\Http\Actions\Posts;

use GeekBrains\LevelTwo\classes\Blog\Http\SuccessfulResponse;
use GeekBrains\LevelTwo\classes\Blog\Post;
use GeekBrains\LevelTwo\classes\Blog\Repositories\SqlitePostsRepository;
use GeekBrains\LevelTwo\classes\Blog\UUID;
use GeekBrains\LevelTwo\classes\Person\User;

class CreatePost {
    private $postsRepository;

    /**
     * @param $postsRepository
     */
    public function __construct($postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function handle ($request){
        $authorUuid = $request->jsonBodyField('author_uuid');
        $text = $request->jsonBodyField('text');
        $title = $request->jsonBodyField('title');
        $postUuid = UUID::random();
        $author = new User($authorUuid, 'somename', 'somelastname', 'someusername');
        $post = new Post($postUuid, $author, $title, $text);
        $this->postsRepository->save($post);
        return new SuccessfulResponse([
            'post_state' => "saved",
        ]);
    }



}