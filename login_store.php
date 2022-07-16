<?php
require('inc/connection.inc.php');
if(isset($_POST['submit'])){
    $email=strip_tags(mysqli_real_escape_string($conn,$_POST['email']));
    $password=strip_tags(mysqli_real_escape_string($conn,$_POST['password']));

    $sql="SELECT * FROM `admin` WHERE `email`='$email' && `password`='$password'";
    $res=mysqli_query($conn,$sql);
    $row_count=mysqli_num_rows($res);
    
    if($row_count == 1){
        $_SESSION['user']='Sohidul';
        header('location:index.php');
    }else{
        $_SESSION['login']="Login failed";
        header('location:login.php');
        
    }
}


?>