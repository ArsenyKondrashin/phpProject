<?php

namespace GeekBrains\LevelTwo\classes\Person;

class User
{
    private $uuid;
    private $firstname;
    private $lastname;


    /**
     * @param $id
     * @param $firstname
     * @param $lastname
     */
    public function __construct($id, $firstname, $lastname)
    {
        $this->uuid = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

    }
    public function __toString() {
        return "Имя пользователя: " . $this->getFirstname() . $this->getLastname() . 'ID: ' . $this->uuid;
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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }





}