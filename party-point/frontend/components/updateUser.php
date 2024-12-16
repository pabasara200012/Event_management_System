<?php
include '../../backend/config/config.php';

$userId = isset($_GET['id']) ? $_GET['id'] : 0;

$firstname = $lastname = $username = $email = $address = $password = '';

if ($userId > 0) {
    $sql = "SELECT firstname, lastname, username, email, address, password FROM newUsers WHERE id = ?";
    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($firstname, $lastname, $username, $email, $address, $password);
        $stmt->fetch();
        $stmt->close();
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Information</title>
    <link rel="stylesheet" href="userTable.css">
</head>
<body>
    <h2>Update User Information</h2>
    <form action="../../backend/function/updateUser.php" method="POST" >
        <input type="hidden" name="id" value="<?php echo $userId; ?>">
        
        <label for="firstname">First Name:</label><br>
        <input type="text" name="firstname" value="<?php echo $firstname; ?>" required><br><br>

        <label for="lastname">Last Name:</label><br>
        <input type="text" name="lastname" value="<?php echo $lastname; ?>" required><br><br>

        <label for="username">Username:</label><br>
        <input type="text" name="username" value="<?php echo $username; ?>" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br><br>

        <label for="address">Address:</label><br>
        <input type="text" name="address" value="<?php echo $address; ?>" required><br><br>

        <label for="password">Password:</label><br>
        <input type="text" name="password" <?php echo $password; ?> required><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
