<?php 
session_start();
include('../connection.php');
$admin= $_SESSION['name'];
if(!$_SESSION['email'])
{
header('location:login.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Adminpanel - DashBoard</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jq.min.js"></script>
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
            .nav > li > a:focus, .nav > li > a:hover{
                    background: #444;
                    color: #fff;	
                }
            textarea{
                resize: vertical;
            }
            .btn-success:hover{
                transition: all .4s ease-in-out;
                box-shadow: 0px 0px 2px 0px #000 inset;
            }
        </style>
    </head>
    <body>
        <!--
        ==================
            Navbar starts
        ==================
        -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-lock"></i> Adminpanel</b></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../logout.php"><i class="glyphicon glyphicon-log-out"></i>  Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--
        ==================
            Main Section
        ==================
        -->
        <div class="container-fluid" style="margin-top:50px; background:#666;">
            <div class="row">
                 <!--
                    ==================
                        Left Side
                    ==================
                 -->
                <div class="col-sm-3">
                    <br/>
                    <div class="well well-sm">
                        <ul class="nav">
                            <li class="" style="background:#999; text-align:center; font-size:25px; padding:0px 0px; margin:0px">Dashboard </li>
                            <li><a href="index.php?u"><span class="glyphicon glyphicon-cog"></span> Check Users</a></li>
                            <li><a href="index.php?a"><span class="glyphicon glyphicon-cog"></span> Check Admins</a></li>
                        </ul>
                    </div>
                </div>
                 <!--
                    ==================
                        right Side
                    ==================
                 -->
                <div class="col-sm-9" style="background:#fdfdfd">
                    <!-- container-fluid-->
                      <?php 
                      if(isset($_GET['u'])){
                          include('user.php');
                      }
                      else if(isset($_GET['a'])){
                          include('admin.php');
                      }
                      else if(isset($_GET['s'])){
                          include('sold.php');
                      }
                      else if(isset($_GET['b'])){
                          include('blood.php');
                      }
                      else{  
                    ?>
                    <h1 class="page-header">Website Dashboard</h1>
                    <h3>Welcome ! <?php echo ucwords($admin); ?> </h3>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="well" style="border-radius:0px; padding-bottom:0px; box-shadow:2px 2px 3px 0px;">
                                <table class="table table-bordered table-hover table-striped">
                    
                                    <tr>
                                        <td colspan="2" style="background:#555; color:#fff; text-align:center; font-size:20px;">Website Stats</td>
                                    </tr>

                                  	

                                    <tr>
                                                <td align="center" width="50%"><b>Total Users </b></td>
                                                <td align="center" width="50%">
                                                    <b>
                                                        <?php
                                                            echo $amt = mysqli_num_rows(mysqli_query($con,"select * from user")). " Users";
                                                            ?>
                                                    </b>
                                                </td>
                                            </tr>	

                                    <tr>
                                                <td align="center" width="50%"><b>Total Admins </b></td>
                                                <td align="center" width="50%">
                                                    <b>
                                                        <?php
                                                            echo $amt = mysqli_num_rows(mysqli_query($con,"select * from admin")). " Admins";
                                                            ?>
                                                    </b>
                                                </td>
                                            </tr>	

                                   
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.js"></script>
    </body>
</html>
<?php } ?>