<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Model/connection.php';


$connection = new Connection();
$pdo = $connection->openConnection();

// heck connection
if ($pdo->connect_error) {
    die("Connection failed: " . $pdo->connect_error);
}

$sql = "SELECT id, first_name, last_name, email, created_at, FROM becode";
$result = $pdo->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . " " . $row["email"] . " " . $row["created_at"];"<br>";
    }
} else {
    echo "0 results";
}
$pdo->close();




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




