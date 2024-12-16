<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="UserNav.css" />
</head>
<body>
    <!-------------- Navigation start here -------------------->
    <div class="navbar-main">
        <div class="logo">
            <img alt="Logo" src="../assets/pointparty-1.png" height="40" width="40"/>Party Point
        </div>
        <div class="nav-list">
            <a href="" target="_blank">Home</a>
            <a href="#">Categories</a>
            <a href="" target="_blank">Our Services</a>
            <a href="#">Add Event</a>
        </div>
        
        <?php if (!isset($_SESSION['userLogged'])): ?>
            <div class="login-or-signup-button-div">
                <a href="login.php" >
                    <button id="login-or-signup-button" style="background-color: transparent !important; font-family: poppins; color: #fff; padding:5px 60px; border-radius: 6px; border: 2px solid white; font-size: 14px;">LogIn or SignUp</button>
                </a>
            </div>
        <?php else: ?>
            <div class="profile" style="display: flex; margin: 0px 0px 0px 10px; position: relative;">
                <a href="logout.php"><?php 
                echo htmlspecialchars($_SESSION['userLogged']); ?></a>
                <a href="logout.php"><img src="../assets/logout.png" alt="Profile Picture" id="profile-image" height="30" width="30"/></a>
            </div>
        <?php endif; ?>
    </div>
    <!-------------- Navigation End here -------------------->


    <!-------------- Add your content start here -------------------->

    <div style="height:700px"></div>
    
    <!-------------- Add your content end here ---------------------->


    <!-------------- Footer start here -------------------->
    <div>
        <div class="footer">
            <div class="left">
                <h3>More</h3>
                <a href="#">Blogs</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Term and Conditions</a>
            </div>
            <div class="center">
                <h2>Let's take care of the environment</h2>
            </div>
            <div class="right" >
                <img alt="Eco Event logo" height="50" src="../assets/pointparty-1.png" width="50"/>

                <div >
                    <p style="font-size:28px; margin: 5px 0px -5px 0px">Eco Event</p>
                </div>
                <div class="social-icons">
                    <a href="#"><img src="../assets/facebook.png"/></a>
                    <a href="#"><img src="../assets/instagram.png"/></a>
                    <a href="#"><img src="../assets/linkedin.png"/></a>
                    <a href="#"><img src="../assets/youtube.png"/></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <a href="#">Copyright 2024 - Party Point organization</a>
        </div>
    </div>
    <!-------------- Footer End here -------------------->
</body>
</html>
