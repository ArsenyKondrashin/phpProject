<?php

namespace GeekBrains\LevelTwo\classes\Blog;

class Post
{
    private $id;
    private $authorId;
    private $header;
    private $text;

    /**
     * @param $id
     * @param $authorId
     * @param $header
     * @param $text
     */
    public function __construct($id, $authorId, $header, $text)
    {
        $this->id = $id;
        $this->authorId = $authorId->getId();
        $this->header = $header;
        $this->text = $text;
    }

    public function __toString() {
        return $this->authorId . ' Заголовок: ' . $this->header . " Сообщение: " . $this->text;
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
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $header
     */
    public function setHeader($header): void
    {
        $this->header = $header;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

}