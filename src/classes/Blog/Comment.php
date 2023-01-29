<?php

namespace GeekBrains\LevelTwo\classes\Blog;

class Comment
{
    private $id;
    private $authorId;
    private $postId;
    private $text;

    /**
     * @param $id
     * @param $authorId
     * @param $postId
     */
    public function __construct($id, $authorId, $postId, $text)
    {
        $this->id = $id;
        $this->authorId = $authorId->getId();
        $this->postId = $postId->getId();
        $this->text = $text;
    }

    public function __toString() {
        return " Комментарий: " . $this->text;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

}