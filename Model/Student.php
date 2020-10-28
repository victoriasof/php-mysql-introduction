<?php


class Student extends Connection {

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $createdAt;


    public function __construct($id, $firstName, $lastName, $email, $createdAt)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->createdAt = $createdAt;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getFirstName()
    {
        return $this->firstName;
    }


    public function getLastName()
    {
        return $this->lastName;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getCreatedAt()
    {
        return $this->createdAt;
    }


}