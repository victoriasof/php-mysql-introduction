<?php

Class RegisterController {

    public function render(){

        $firstName = $lastName = $email = "";
        $firstNameErrorMessage = $lastNameErrorMessage = $emailErrorMessage = $passwordErrorMessage = $passwordConfirmErrorMessage = $passwordMatchError = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $firstName = test_input($_POST['firstName']);
            $lastName = test_input($_POST['lastName']);
            $email = test_input($_POST['email']);
            $password = test_input($_POST['password']);
            $passwordConfirm =test_input($_POST['passwordConfirm']);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $hashedConfirm =password_hash($passwordConfirm, PASSWORD_DEFAULT);
            $authorization = new Auth();


            if (empty($firstName)){
                $firstNameErrorMessage = 'First name is required';
            }

            if (empty($lastName)){
                $lastNameErrorMessage = 'Lastname is required';
            }

            if (empty($email)){
                $emailErrorMessage = 'Email is required';
            }

            if (empty($password)){
                $passwordErrorMessage = 'Password is required';
            }

            if(empty($passwordConfirm)){
                $passwordConfirmErrorMessage = 'Password confirmation is required';
            }

            if($password !== $passwordConfirm){

                $passwordMatchError = "Password with confirm are not equal";
            }

            if(empty($firstNameErrorMessage) && empty($lastNameErrorMessage)&&empty($emailErrorMessage)&&empty($passwordErrorMessage)&&empty($passwordConfirmErrorMessage)&&empty($passwordMatchError)){
                //if the register form is valid and no errors insert a new student in the student table
                $pdo = Connection::openConnection();

                //$connection = new Connection();
                //$pdo =  $connection->openConnection();

                $statement = $pdo->prepare("INSERT INTO student(first_name, last_name, email, password)VALUES(:firstName, :lastName, :email, :password)");

                $statement->bindValue(":fistName", $firstName);
                $statement->bindValue(":lastName", $lastName);
                $statement->bindValue(":email", $email);
                $statement->bindValue(":password", $hashedPassword);

                $statement->execute();

                //Get and integer of how many students got inserted (1always)
                $rowsChanged = $statement->rowCount();
                //Get the id of the new student created
                $id = $pdo->lastInsertId();


                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $hashedPassword;

                Header("Location: ?user=$id");

            }

        }

        require 'View/register.php';

    }

}


