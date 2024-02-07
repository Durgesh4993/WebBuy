<?php 
include('connection.php');
if(isset($_GET['data'])){
	$delete = $_GET['data'];
	$q=mysqli_query($con,"delete from users where id='$delete'");
	header('location:index.php');
}
?>