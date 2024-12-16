<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Production Management System - Admin</title>
</head>
<body>
    <h1>Hiii....</h1>
    <form action="../../backend/function/RegisterUser.php"method="post">
        <label>ID:</label>
        <input type="text" name="id" required><br><br>
        <label>FirstName:</label>
        <input type="text" name="firstname" required><br><br>
        <label>LastName:</label>
        <input type="text" name="lastname" required><br><br>
        <label>Username</label>
        <input type="text" name="username" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Address:</label>
        <input type="text" name="address" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="submit-1" value="submit-1" id="submit-1"></input>
    </form>
</body>
</html>

<?php
$connection->close();
?>
