<?php

declare(strict_types=1);

require 'Model/connection.php';

$servername = "localost";
$username = "becode";
$password = "becode123";
$dbname = "becode";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, first_name, last_name, email, created_at, FROM becode";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . " " . $row["email"] . " " . $row["created_at"];"<br>";
    }
} else {
    echo "0 results";
}
$conn->close();



