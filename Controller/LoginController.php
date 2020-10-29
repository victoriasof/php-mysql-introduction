<?php

class LoginController {

    public function render(){

        $email = $password = "";
        $emailErrorMessage =$passwordErrorMessage = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = test_input($_POST['email']);
            $password = test_input($_POST['password']);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $authorization = new Auth();

            if (empty($email)){
                $emailErrorMessage = 'Email is required';

            }

            if (empty($password)){

                $passwordErrorMessage = 'Password is required';
            }

            if (empty($emailErrorMessage) && empty($passwordErrorMessage)){

                $pdo = Connection::openConnection();
                $statement = $pdo->prepare("SELECT password FROM student WHERE email = :email");
            }

            $statement->bindValue(":email", $email);
            $statement->execute();
            $returnedPassword = $statement->fetchColumn();
            if(password_verify($password, $returnedPassword)){
                echo 'correct credentials';
            }


        }

    require 'View/login.php';

    }

}
