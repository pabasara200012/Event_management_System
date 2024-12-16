<?php 
    // connection
    include 'config.php';

    $error = '';

    // sql to create table
    $sql = "CREATE TABLE events (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL UNIQUE,
        location VARCHAR(20) NOT NULL UNIQUE,
        time VARCHAR(50) NOT NULL UNIQUE,
        date VARCHAR(100) NOT NULL UNIQUE,
        socity VARCHAR(100) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    if ($connection->query($sql) === TRUE) {
        echo " -> Events table created successfully";
    } else {
        echo " -> Error creating events table: " . $connection->error;
    }
?>