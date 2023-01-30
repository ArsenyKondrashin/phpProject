<?php

namespace GeekBrains\LevelTwo\classes\Blog;

class Comment
{
    private $uuid;
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
        $this->uuid = $id;
        $this->authorId = $authorId->getUUID();
        $this->postId = $postId->getUUID();
        $this->text = $text;
    }

    public function __toString() {
        return " Комментарий: " . $this->text;
    }

    /**
     * @return mixed
     */
    public function getUUID()
    {
        return $this->uuid;
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

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

}