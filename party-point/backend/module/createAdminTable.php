<?php 
    // connection
    include '../config/config.php';

    $error = '';
    
    // sql to create table
    $sql = "CREATE TABLE admins (
        firstname VARCHAR(50) NOT NULL UNIQUE,
        lastname VARCHAR(50) NOT NULL UNIQUE,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) PRIMARY KEY,
        phonenumber INT(13) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Admins table created successfully');</script>";
        header("Location: ../function/admin.php';");
    } else {
        echo "<script>alert('Error creating admins table: ". $connection->error . " ');</script>";
    }
?>