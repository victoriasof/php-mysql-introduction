<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//require 'Model/connection.php';


$connection = new Connection();
$pdo = $connection->openConnection();

//$pdo = openConnection();

if(!empty($_POST['first_name']) && !empty($_POST['last_name'])) {

    if (empty($_POST['id'])) {//switched if statement
        $handle = $pdo->prepare('INSERT INTO user (first_name, last_name) VALUES (:first_name, :last_name)');
        $message = 'Your record has been added';
    } else {
        $handle = $pdo->prepare('UPDATE user SET first_name = :first_name, last_name = :last_name, WHERE id = :id');
        $handle->bindValue(':id', $_POST['id']);
        $message = 'Your record has been updated';
    }
}
/*
I AM MIXING PDO AND SQL. ALWAYS USE PDO

$firstName = $lastName = $email ="";

$sql = "INSERT INTO student (first_name, last_name, email)
VALUES ('$firstName','$lastName','$email')";

if ($pdo->query($sql) === TRUE) {
    echo "New record created successfully";
}

$sql = "SELECT id, first_name, last_name, email, created_at FROM student"; //get from table not from database
$result = $pdo->query($sql);

    while ($row = $result->fetchAll()) {
        echo "id: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . " " . $row["email"] . " " . $row["created_at"];"<br>";
    }
*/

$firstName = $lastName= $email = "";
$firstNameErr = $lastNameErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fistNameErr = "First name is required";
    } else {
        $firstName = test_input($_POST["fname"]);
    }

    if (empty($_POST["lname"])) {
        $lastNameErr = "Last name is required";
    } else {
        $lastName = test_input($_POST["lname"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
    <input type="text" id="fname" name="fname" value="<?php echo $firstName?>"><br>

    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" value="<?php echo $lastName?>"><br>

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" value="<?php echo $email?>">

    <input type="submit" value="Submit">
</form>

</body>

</html>




