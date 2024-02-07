<?php
include('connection.php');
session_start();


 $user = $_SESSION['user'];

 mysqli_query($con,"update user set status='Offline' where user='$user'");
session_destroy();
header('location: ../index.php');


?>