<?php
session_start();
include '/../../backend/config/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = isset($_POST['id']) ? $_POST['id'] : '';
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "UPDATE newusers 
            SET firstname = ?, lastname = ?, username = ?, email = ?, address = ?";

    if (!empty($password)) {
        $hashedPassword = md5($password); 
        $sql .= ", password = ?";
    }

    $sql .= " WHERE username = ?";
    
    if ($stmt = $connection->prepare($sql)) {
        //parameters statement (s = string, i = integer)
        if (!empty($password)) {
            $stmt->bind_param("ssssssi", $firstname, $lastname, $username, $email, $address, $hashedPassword, $userId);
        } else {
            $stmt->bind_param("sssssi", $firstname, $lastname, $username, $email, $address, $userId);
        }

        if ($stmt->execute()) {
            echo "<script>alert('User information updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating record: ' + $stmt->error;);</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error preparing the statement: ' + $connection->error;);</script>";
    }
    

    $connection->close();
}
if ( isset($_SESSION['userLogged']) === true) {
    header("Location: ../../frontend/components/login.php");
} elseif ( isset($_SESSION['adminLogged']) === true) {
    header("Location: ../../frontend/components/admin.php");
}
?>
