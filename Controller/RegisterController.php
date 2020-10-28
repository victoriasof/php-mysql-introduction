<?php

Class RegisterController {

    public function render(){

        $firstName = $lastName = $email = "";
        $firstNameErrorMessage = $lastNameErrorMessage = $emailErrorMessage = $passwordErrorMessage = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $firstName = test_input($_POST['firstName']);
            $lastName = test_input($_POST['lastName']);
            $email = test_input($_POST['email']);
            $password = test_input($_POST['email']);

        }

        if (empty($firstName)){
            $firstNameErrorMessage = 'First name is required';
        }

        if (empty($lastNameName)){
            $lastNameErrorMessage = 'Lastname is required';
        }

        if (empty($email)){
            $emailErrorMessage = 'Email is required';
        }

        if (empty($password)){
            $passwordErrorMessage = 'Password is required';
        }


        $pdo = Connection::openConnection();
        $statement = $pdo->prepare("INSERT INTO students(first_name, last_name, email, password)VALUES(:firstName, :lastName, :email, :password)");

        $statement->bindValue(":fistName", $firstName);
        $statement->bindValue(":lastName", $lastName);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);

        $statement->execute();


        require 'View/register.php';

    }

}

