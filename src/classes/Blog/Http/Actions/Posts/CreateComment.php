<?php

namespace GeekBrains\LevelTwo\classes\Blog\Http\Actions\Posts;

use GeekBrains\LevelTwo\classes\Blog\Comment;
use GeekBrains\LevelTwo\classes\Blog\Http\SuccessfulResponse;
use GeekBrains\LevelTwo\classes\Blog\Post;
use GeekBrains\LevelTwo\classes\Blog\UUID;
use GeekBrains\LevelTwo\classes\Person\User;

class CreateComment {
    private $commentsRepository;

    /**
     * @param $commentsRepository
     */
    public function __construct($commentsRepository)
    {
        $this->commentsRepository = $commentsRepository;
    }


    public function handle ($request){
        $authorUuid = $request->jsonBodyField('author_uuid');
        $text = $request->jsonBodyField('text');
        $postUuid = $request->jsonBodyField('post_uuid');
        $author = new User($authorUuid, 'somename', 'somelastname', 'someusername');
        $post = new Post($postUuid, $author, 'sometitle', $text);
        $commentId = UUID::random();
        $comment = new Comment($commentId, $author, $post, $text);
        $this->commentsRepository->save($comment);
        return new SuccessfulResponse([
            'comment_state' => "saved",
        ]);
    }



}
