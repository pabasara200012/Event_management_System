<?php
    session_start();

    // Determine the style based on the condition
    $style = $_SESSION['adminloggedin'] ? "display:block" : "display:none";

    if (!$style = $_SESSION['adminloggedin'] === TRUE) {
        header('Location: AdminLogin.php');
    }

?>

<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="admin.css">
            <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        </head>
        <body style="<?php echo $style; ?>">

            <div class="main-nav-sectoin" style="display: block !important;">
                <div class="main-nav">
                    <div class="logo-section">
                        <img src="../assets/pointparty-1.png" alt="logo" style="width:30px; height:30px;"/>
                        <h2>Party Point</h2>
                    </div>
                    <form method="post">
                        <input type="submit" value="Users" class="admin-button" name="admin-button" id="admin-button"></input><br/>
                        <input type="submit" value="Events" class="event-button" name="event-button"></input><br/>
                        <input type="submit" value="Admin Infor" class="admin-infor-button" name="admin-infor-button"></input><br/>
                        <input type="submit" value="Add Admin" class="help-button" name="add-admin-button"></input><br/>
                        <input type="submit" value="Help" class="help-button" name="help-button"></input><br/>
                        <input type="submit" value="LogOut" class="help-button" name="LogOut-button"></input><br/>
                    </form>
                </div>
            </div>

            <div class="content">
                <?php echo "<h1>Hii " . $_SESSION['adminLogged'] . " </h1>"; ?>
                <h2 class="" style="color: #b0b0b0; padding: 0px; margin-top:-20px;">Welcome to admin page.</h2>
                <?php 
                    if(array_key_exists('admin-button', $_POST)) { 
                        include 'usertable.php';
                        echo '<script type="text/JavaScript">  
                        let adminButton = document.getElementById("admin-button");
                        console.log(adminButton); 
                        adminButton.style.backgroundColor="#AD49E1"
                        </script>' ; 
                    }  
                ?>

                <?php 
                    if(array_key_exists('LogOut-button', $_POST)) { 
                        header('Location: logout.php');
                        echo '<script type="text/JavaScript">  
                        let adminButton = document.getElementById("admin-button");
                        console.log(adminButton); 
                        adminButton.style.backgroundColor="#AD49E1"
                        </script>' ; 
                    }  
                ?>
            </div>
            
        </body>
    </html>