<?php

namespace GeekBrains\LevelTwo\classes\Person;

class User
{
    private $uuid;
    private $firstname;
    private $lastname;
    private $username;

    /**
     * @param $uuid
     * @param $firstname
     * @param $lastname
     * @param $username
     */
    public function __construct($uuid, $firstname, $lastname, $username)
    {
        $this->uuid = $uuid;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }


    public function __toString() {
        return "Имя и фамилия: " . $this->getFirstname(). ' ' . $this->getLastname() . ' Имя пользователя: ' . $this->getUsername() . ' ID: ' . $this->uuid;
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