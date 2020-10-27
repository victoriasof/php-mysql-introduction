<?php


class StudentInsert extends Connection {

    public function __construct($firstName, $lastName, $email) {

        $handle = $this->openConnection()->prepare('INSERT INTO student (first_name, last_name, email) VALUES (:firstname, :lastname, :email)');
        //INSERT INTO should have same parameter names as in database, VALUES should be same as below parameters

        $handle->bindValue(':firstname', $firstName);
        $handle->bindValue(':lastname', $lastName);
        $handle->bindValue(':email', $email);
        $handle->execute();


    }
}

