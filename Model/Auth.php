<?php

class Auth {

    public $connection;

    public function __construct($connection)
    {
        $this->connection = new Connection();
    }


}