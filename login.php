<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="assets/css/login.style.css">
</head>
<body class="login_page_body">
    <div class="login_container">
        <div class="login">
            <form action="login_store.php" method="POST">
            <div class="email">
                <label for="email">Email:</label><input type="email" name="email" id="email" placeholder="write your email xyz@gmail.com" >
            </div>
            <div class="password">
                <label for="password">Password:</label><input type="password" name="password" id="password" placeholder="write your password">
            </div>
            <div class="submit">
                <button type="submit" name="submit" id="submit">Log-in</button>
            </form>
            </div>
            
            
        </div>
    </div>
    <?php
     require('login_sweet_alert.php');
     unset($_SESSION['login']);
     unset($_SESSION['first_login']);
     ?>
</body>
</html>