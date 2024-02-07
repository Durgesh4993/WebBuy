<?php
    session_start();// starting session to enter website
    include('../connection.php');// including connection to database
    if(isset($_GET['user'])){//means if gets email the perform the rest operation
        // making the password and the email secure to prevent hacking 
        $user=mysqli_real_escape_string($con,strip_tags(preg_replace('#[^@.0-9a-zA-Z]#i','',$_GET['user'])));
        $pass=mysqli_real_escape_string($con,strip_tags(preg_replace('#[^@.0-9a-zA-Z]#i','',$_GET['pass'])));
        // Encrypt the password to secure
        $encrypt = md5($pass);
        // query to run the login info
        $query="select * from user where user='$user' && pass='$encrypt'";
        // to check if user exists
         $check = mysqli_num_rows(mysqli_query($con,$query));
        // using conditionals to check wheather it works or not
        if($check=='1'){
            @$user1 = mysqli_fetch_array(mysqli_query($con,$query));
            $_SESSION['id'] = $user1['id'];// creating email as session
            $_SESSION['name'] = $user1['name'];// creating email as session
            $_SESSION['user'] = $user1['user'];// creating email as session
            mysqli_query($con,"update user set status='Availible' where user='$user'");
            echo "<script>alert('User Loged in....')</script>";
            echo "<script>window.open('index.php','_self');</script>";	
        }else{
            echo "<script>alert('User Does not Exsits....')</script>";
        }
    }
?>