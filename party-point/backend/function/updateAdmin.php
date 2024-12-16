<?php
session_start();
include '/../../backend/config/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "UPDATE admins 
            SET firstname = ?, lastname = ?, username = ?, email = ?, phonenumber = ?";

    if (!empty($password)) {
        $hashedPassword = md5($password); 
        $sql .= ", password = ?";
    }

    $sql .= " WHERE id = ?";
    
    if ($stmt = $connection->prepare($sql)) {
        //parameters statement (s = string, i = integer)
        if (!empty($password)) {
            $stmt->bind_param("ssssis", $firstname, $lastname, $username, $email, $phonenumber, $hashedPassword);
        } else {
            $stmt->bind_param("ssssis", $firstname, $lastname, $username, $email, $phonenumber);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Admin information updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating record: ' + $stmt->error;);</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error preparing the statement: ' + $connection->error;);</script>";
    }

    $connection->close();
}
?>
