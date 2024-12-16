<?php
session_start();
include '/../../backend/config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $usernameUser = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $passwordUser = $_POST['password'];

    $sql = "INSERT INTO newusers (id, firstname, lastname, username, email, address, password) VALUES ('$id', '$firstName' , '$lastName', '$usernameUser', '$email','$address', '$passwordUser')";

    if ($connection->query($sql) === TRUE) {
        echo "<script>console.log('Register successfully " . $firstName . "');</script>"; 
        echo "<script> alert('Register successfully " . $firstName . "');</script>";
    } else {
        echo "<script> alert('Error:  " . $sql . " <br> ' . $connection->error );</script>";
        echo "<script>console.log('Error: " . $sql . "<br>' . $connection->error );</script>";
    }
    }
    
    if ( ($_SESSION['userLogged'] === true)) {
        header("Location: /../../frontend/components/login.php");
    } elseif (($_SESSION['adminLogged'] === true)) {
        header("Location: /../../frontend/components/admin.php");   
    }
?>