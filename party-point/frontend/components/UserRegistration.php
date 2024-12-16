<?php
session_start();
include '../../backend/config/config.php';

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
    
    // if ( ($_SESSION['userLogged'] === true)) {
    //     header("Location: /../../frontend/components/login.php");
    // } elseif (($_SESSION['adminLogged'] === true)) {
    //     header("Location: /../../frontend/components/admin.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Party Point</title>
    <link rel="stylesheet" type="text/css" href="userRegistation.css" />
</head>
<body>
    <div class="container">
        <form method="POST">
            <h2>User Form </h2>

           

            <div class="form-row">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" value="" required>
            </div>

            <div class="form-row">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" value="" required>
            </div>

            <div class="form-row">
                <label for="username">Username:</label>
                <input type="text" name="username" value="" required>
            </div>

            <div class="form-row">
                <label for="email">Email:</label>
                <input type="email" name="email" value="" required>
            </div>

            <div class="form-row">
                <label for="id">Phone no:</label>
                <input type="number" name="id" value="" required>
            </div>

            <div class="form-row">
                <label for="address">Address:</label>
                <input type="text" name="address" value="" required>
            </div>

            <div class="form-row">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-row">
                <input onmouseover="this.style.backgroundColor='#67099a';"
                onmouseout="this.style.backgroundColor='#AD49E1';" type="submit" id="submit" value="Register">
            </div>

         </form>
    </div>
</body>
</html>
