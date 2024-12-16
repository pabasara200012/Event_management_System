<?php
session_start();
include '../config/config.php';

$check_sql = "SELECT * FROM admins WHERE username = 'uoc'";
$result = $connection->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script>alert('Username already exists. Please choose another username.');</script>";
} else {
    $sql = "INSERT INTO admins (firstname, lastname, username, email, phonenumber, password, created_at) 
            VALUES ('UOC', 'Admin', 'uoc' , 'uoc@stuk' , '0111234567' , 'uoc' , '2024-09-11 21:02:22')";

    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Admin record created successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

?>