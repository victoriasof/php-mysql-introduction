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

//include all your model files here
//require 'Model/User.php';
//include all your controllers here
//require 'Controller/HomepageController.php';
//require 'Controller/InfoController.php';

require 'Model/connection.php';
//require 'insert.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

/*
$controller = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'info') {
    $controller = new InfoController();
}
$controller->render($_GET, $_POST);
*/

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method ="post">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname"><br>

    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname"><br>

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email">

</form>

</body>

</html>


