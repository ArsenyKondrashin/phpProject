<?php

namespace GeekBrains\LevelTwo\classes\Person;

class User
{
    private $id;
    private $name;


    /**
     * @param $id
     * @param $name
     * @param $surname
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

    }
    public function __toString() {
        return "Имя пользователя: " . $this->getName();
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
    public function getName()
    {
        return $this->name;
    }


}