<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

whatIsHappening(); // call function

require 'Model/connection.php';
require 'Model/Student.php';
require 'Model/StudentInsert.php';
require 'Model/StudentLoader.php';
require 'Model/Auth.php';


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET['user'])){
    require 'Controller/ProfileController.php';
    $profileController = new ProfileController();
    $profileController->render();
}
else if (isset($_GET['page'])){
    if ($_GET['page'] === 'register'){

        require 'Controller/RegisterController.php';
        $registerController = new RegisterController();
        $registerController->render();
    }
    else if($_GET['page'] === 'login'){

        require 'Controller/LoginController.php';
        $loginController = new LoginController();
        $loginController->render();
    }

}else {

    require 'Controller/FrontController.php';
    $frontController = new FrontController();
    $frontController->render();

}


