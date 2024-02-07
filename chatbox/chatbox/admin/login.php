<?php 
include('../connection.php');
session_start();
 ?>
 <!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="refresh" content=""/>	
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Adminpanel - Dashboard</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <script src="../js/jquery_library.js"></script>
		<script src="../js/bootstrap.min.js"></script>
        <style>
         @font-face{
                font-family: "gotham-pro";
                src: url('../fonts/gotham-pro-regular.eot');
                src: url('../fonts/gotham-pro-regular.eot?#iefix') format('embedded-opentype'),
                url('../fonts/gotham-pro-regular.svg#Gotham Pro') format('svg'),
                url('../fonts/gotham-pro-regular.woff') format('woff'),
                url('../fonts/gotham-pro-regular.ttf') format('truetype');
                font-weight: normal;
                font-style: normal;
            }   
            body{
			font-family: "gotham-pro";
			direction: ltr;
            }  
            footer{
                color: #fff;
                padding: 15px 0px;
                font-size: 17px;
                background-color: #222;
            }
            .panel-body{
                padding-bottom: 10px;
            }
        </style>
    </head>
	<body style="background: #ccc;">
		<nav class="navbar navbar-default navbar-fixed-top" style="background:">
			<div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand"><strong><i class="glyphicon glyphicon-lock"></i>Adminpanel - Dashboard</strong></a>
                </div>
			</div>
		</nav>	
		<!-- navbar ends-->
		<div class="container-fluid" style="background: #f3f3f3; margin-top:50px;">
			<br/><div class="row">
				<!-- container -->
				<div class="col-sm-4 col-sm-offset-4">
                    <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px">
                        <div class="panel-heading" id="signin_panel_header">
                            <p align="center"> <img src="user.png" style="width: 50%;border-radius: 50%;text-align: center;margin-top: 20px;"/> </p>
                            <h4 align="center" style="padding-top:5px;">Admin Login</h4><hr/>
                        </div>
                        <div class="panel-body" style="margin-top:-30px;">
                            <form role="form" align="center" action="" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" placeholder="E-mail" id="email" name="user" type="text"  required>
	                                		</div>
                                    <div class="form-group">
                                          <label>Password</label>
                                        <input class="form-control" placeholder="Password" id="pass" name="pass" type="password" value="" required>
                                    </div>
                                    <hr/>
                                    <center>
                                        <button  type="submit" name="login" class="btn btn-success btn-custom"><i class="glyphicon glyphicon-log-in"></i>  login</button>
                                    </center>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
					if(isset($_POST['login']))
					{
						$email = mysqli_real_escape_string($con ,$_POST['user']);
						$password = mysqli_real_escape_string($con , $_POST['pass']);
						//$encrypt = md5($password);// for to encrypt password
						$query = "select * from admin where user='$email' and pass='$password'"; 
						$run = mysqli_query($con,$query);
						if(mysqli_num_rows($run)>0)
						{
							$query2 = "select * from admin where user='$email' and pass='$password'"; 
							$run2 = mysqli_query($con,$query);
							$run3 = mysqli_fetch_array($run2);
							$_SESSION['name']  = $run3['1'];
							$_SESSION['email'] = $run3['2'];
							echo '<script>window.open("index.php","_self")</script>';
						}
						else
						{
							echo '<script>alert("Enter Email and Password Correctly");</script>';
						}
					}
			?>
	
            	<!-- container -->
			</div>
		</div>
	</body>
</html>