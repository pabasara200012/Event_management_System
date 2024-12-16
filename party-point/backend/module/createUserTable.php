<?php 
    // connection
    include '../config/config.php';

    $error = '';

    // sql to create table
    $sql = "CREATE TABLE newUsers (
        id INT(11) NOT NULL UNIQUE,
        firstname VARCHAR(50) NOT NULL UNIQUE,
        lastname VARCHAR(50) NOT NULL UNIQUE,
        username VARCHAR(15)  NOT NULL UNIQUE,
        email VARCHAR(100) PRIMARY KEY,
        address VARCHAR(200) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    if ($connection->query($sql) === TRUE) {
        echo " -> User table created successfully";
    } else {
        echo " -> Error creating user table: " . $connection->error;
    }
?>