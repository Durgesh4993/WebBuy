
 <?php
session_start();
if(isset($_GET['msg'])){
    include('../connection.php');
    $msg = $_GET['msg'];
    $user = $_SESSION['user'];
    $rece = $_GET['rece'];
    if($msg==""){
        echo "<script>alert('Enter your Message...');</script>";	
    }
    else{
        $query="insert into msg (user,user2,msg) values('$user','$rece','$msg')";
        $run=mysqli_query($con,$query);	
        echo "<script>alert('Message sent');</script>";	
    }
}	
?>
			
			
