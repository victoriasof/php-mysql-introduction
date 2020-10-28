<?php

Class RegisterController {

    public function render(){

        $firstName = $lastName = $email = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $firstName = test_input($_POST['firstName']);
            $lastName = test_input($_POST['lastName']);
            $email = test_input($_POST['email']);

        }


        $pdo = Connection::openConnection();
        $statement = $pdo->prepare("INSERT INTO students(first_name, last_name, email, password)VALUES(:firstName, :lastName, :email)");

        $statement->bindValue(":fistName", $firstName);
        $statement->bindValue(":lastName", $lastName);
        $statement->bindValue(":email", $email);

        $statement->execute();






        require 'View/register.php';

    }

}

