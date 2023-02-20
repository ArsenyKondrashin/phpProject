<?php

namespace GeekBrains\LevelTwo\classes\Blog;

class UUID
{
    private $uuidString;

    /**
     * @param $uuidString
     */
    public function __construct($uuidString)
    {
        $this->uuidString = $uuidString;
    }
    public static function random(): self {
        return new self(uuid_create(UUID_TYPE_RANDOM)); }
    public function __toString(): string {
        return $this->uuidString; }
}