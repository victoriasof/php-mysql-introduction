<?php
declare(strict_types = 1);

class InfoController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render()
    {

        if(!empty($_POST['firstname']) && !empty($_POST['lastname']) &&!empty($_POST['email'])){

            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $email = $_POST['email'];

            var_dump($email);

            $students = new StudentInsert($firstName, $lastName, $email);

            //return $students;
            var_dump($students);

        }

            //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        //require 'View/info.php';
    }

}