<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    echo "<script>console.log('Connected ". $dbname . " database');</script>"; 
}
?>