<?php

class Auth {

    public $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function emailValidation(string $email):string{

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'Invalid email address';

        }

        if ($this->connection->checkEmail($email) == true){

            return 'Email is already in use';
        }

        return "";

    }

    public function nameValidation(string $name):string {

        //preg_match — Perform a regular expression match
        //Searches subject for a match to the regular expression given in pattern.
        //preg_match pattern check that string contain only letters, whitespace and dot (stackoverflow)

        if (!preg_match("/^[a-zA-Z-']*$/", $name)){
            return 'Only letters and white space allowed';
        }

        return "";

    }

    public function passwordValidation(string $password, string $passwordConfirm):string {

        if (password_verify($passwordConfirm, $password)){
            return "";

        }
        return "Password and the password confirmation don't match";
    }

    public function checkEmail(string $email){

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'Invalid email address';
        }


        if ($this->connection->checkEmail($email) != true){

            return 'Something went wrong';
        }
        return "";

    }

    public function checkPassword(string $password ,string $email){

        $hash = $this->connection->getHash($email);

        if (password_verify($password, $hash['password'])){

            return "";
        }

        return "Something went wrong";

    }

}