<?php
    session_start();// starting session to enter website
    include('../connection.php');// including connection to database
    if(isset($_GET['id'])){//means if gets email the perform the rest operation
       $id = $_GET['id'];
        mysqli_query($con,"delete from msg where id='$id'");
        
    }
?>