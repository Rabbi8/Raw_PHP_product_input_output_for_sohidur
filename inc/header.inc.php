<?php
require('connection.inc.php');

if(!isset($_SESSION['user'])){
    $_SESSION['first_login']="Please login frist";
    header('location:login.php');
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/fav-icon.svg" type="image/x-icon">
    <title>Stock manage</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>


<body>
    <header>
        <div class="container_fluid">
            <div class="container">
                <a href="index.php">
                <img src="assets/images/avatar.svg" alt="">
                </a>
            </div>
        </div>
    </header>


