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
require 'View/insert.php';
require 'Model/Student.php';
require 'Model/StudentInsert.php';
require 'Model/StudentLoader.php';
require 'Controller/InfoController.php';


//profile.php?user=$user_id
require 'View/profile.php';
require 'Controller/ProfileController.php';

require 'View/overview.php';
require 'Controller/OverviewController.php';

$infoController = new InfoController();
$infoController->render();


//include all your model files here
//require 'Model/User.php';
//include all your controllers here
//require 'Controller/HomepageController.php';
//require 'Controller/InfoController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

/*
$controller = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'info') {
    $controller = new InfoController();
}
$controller->render($_GET, $_POST);
*/

/*
$connection = new Connection();
$pdo = $connection->openConnection();
*/


/*
On index.php, list a table with summaries of most of the details of all people
    Make sure the table shows the following:
        Their first name
        Their last name
        Their email
        A link to their personal page (profile.php?user=$user_id) (the link can also be, on their name or any other column you prefer)
*/

