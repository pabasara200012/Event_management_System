<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out</title>
    <style>
        body {
            font-family: 'poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        #yes-button {
            background-color: #AD49E1;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }
        #no-button {
            background-color: #6c757d;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Are you sure you want to log out?</h1>
        <form method="post">
            <button id="yes-button" type="submit" name="confirm" value="yes" >Yes</button>
            <button id="no-button" type="submit" name="not-confirm" value="no" >No</button>
        </form>
        <?php
        if ( ($_SESSION['userLogged'] === true)) {
            if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
                session_destroy();
                header('Location: UserNav.php');
                exit;
            }
        } else {
            if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
                session_destroy();
                header('Location: admin.php');
                exit;
            }
        }
        
        if ( ($_SESSION['userLogged'] === true)) {
            if (isset($_POST['not-confirm']) && $_POST['not-confirm'] === 'no') {
                header('Location: UserNav.php');
                exit;
            }
        } else {
            if (isset($_POST['not-confirm']) && $_POST['not-confirm'] === 'no') {
                header('Location: admin.php');
                exit;
            }
        }

      
        ?>
    </div>
</body>
</html>
