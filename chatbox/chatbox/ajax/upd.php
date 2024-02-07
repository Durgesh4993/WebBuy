<?php
    session_start();// starting session to enter website
    include('../connection.php');// including connection to database
    $id = $_SESSION['id'];
    if(isset($_GET['name'])){//means if gets email the perform the rest operation
        // making the password and the email secure to prevent hacking 
        $user=mysqli_real_escape_string($con,$_GET['name']);
        $run = mysqli_query($con,"update user set name='$user' where id='$id'");
        if($run){
            $_SESSION['name'] = $user; 
            echo "<script>alert('Data Updated')</script>";
            echo "<script>window.open('account.php','_self')</script>";
            
        }
        }
?>