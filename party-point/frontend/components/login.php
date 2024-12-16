<?php
date_default_timezone_set('Asia/Kolkata');
session_start();

include '../../backend/config/config.php';

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    $stmt = $connection->prepare("SELECT password FROM newUsers WHERE username = ?");
    if ($stmt) {
        $stmt->bind_param("s", $input_username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($stored_password);
            $stmt->fetch();

            if ($input_password === $stored_password) {
                $query = "SELECT * FROM newusers WHERE username = '$input_username'";
                $result = mysqli_query($connection, $query);
                $user = mysqli_fetch_assoc($result);
                $_SESSION['loggedin'] = true;
                $_SESSION['userLogged'] =  $user['firstname'];

                echo "<script>console.log( ' " . $user['firstname']  . "');</script>"; 

                echo "<script>console.log( 'Done Machang');</script>"; 
                header('Location: UserNav.php');
                exit; 
            } else {
                $error_message = "Invalid username or password!";
            }
        } else {
            $error_message = "Invalid username or password!";
        }
        $stmt->close();
    } else {
        $error_message = "Failed to prepare the SQL statement.";
    }
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-size: 14px;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .login-container button {
            width: 100%;
            margin: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #AD49E1;
            color: #fff;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #2E073F;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if ($error_message): ?>
            <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
