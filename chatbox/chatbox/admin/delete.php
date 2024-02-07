<?php
include('../connection.php');

    if(@$_GET['u']){
        $delete = @$_GET['u'];
        $query = "delete from user where id='$delete'";
        $run = mysqli_query($con,$query);
        if($run){
            echo "<script>window.open('index.php?u','_self');</script>";
        }
        else
        {
            echo "lol";
        }
    } 




    if(@$_GET['a']){
        $delete = @$_GET['a'];
        $query = "delete from admin where id='$delete'";
        $run = mysqli_query($con,$query);
        if($run){
            echo "<script>window.open('index.php?a','_self');</script>";
        }
        else
        {
            echo "lol";
        }
    }


?>



