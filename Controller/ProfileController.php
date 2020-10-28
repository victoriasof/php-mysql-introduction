<?php
declare(strict_types=1);

require 'Model/connection.php';

class ProfileController
{
    public function render()
    {
        session_start();


        if ($_SESSION['user'] === $_GET['user']){

            
        }

        $connection = new Connection();


        require 'View/profile.php';
    }
}