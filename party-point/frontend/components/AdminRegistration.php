<?php 
    include '../../backend/config/config.php';

    $id = $firstname = $lastname = $username = $email = $address = $password = $errorMessage = "";

    if ( $_SERVER['REQUEST_METHOD' == 'POST']) {

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phonenumber = $_POST["phonenumber"];
        $password = $_POST["password"];

        do {
            if ( empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($phonenumber) || empty($password) ) {
                    $errorMessage = "All the fields are required";
                    break; 
            }

            $id = $firstname = $lastname = $username = $email = $phonenumber = $password = "";

            $successMessage = "Admin added correctly";

          } while (false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Party Point</title>
</head>
<body>
    <div class="container user-registration">
        <form method="post">

            <label for="firstname">First Name:</label><br>
            <input type="text" name="firstname" value="" required><br><br>

            <label for="lastname">Last Name:</label><br>
            <input type="text" name="lastname" value="" required><br><br>

            <label for="username">Username:</label><br>
            <input type="text" name="username" value="" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" name="email" value="" required><br><br>

            <label for="phonenumber">Phone Number:</label><br>
            <input type="number" name="phonenumber" value="" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" required><br><br>

         </form>
    </div>
</body>
</html>