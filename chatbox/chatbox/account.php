<?php 
	include('connection.php');
	session_start();
	if(!$_SESSION['user']){
	header('location: login.php');	
	}
	else{
?>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Accounts</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
        <style>
            @font-face{
                font-family: "gotham-pro";
                src: url('fonts/gotham-pro-regular.eot');
                src: url('fonts/gotham-pro-regular.eot?#iefix') format('embedded-opentype'),
                url('fonts/gotham-pro-regular.svg#Gotham Pro') format('svg'),
                url('fonts/gotham-pro-regular.woff') format('woff'),
                url('fonts/gotham-pro-regular.ttf') format('truetype');
                font-weight: normal;
                font-style: normal;
            }   
            body{
			font-family: "gotham-pro";
			direction: ltr;
            }
            .user{
            margin-top:70px; 
            }
            .details{
                text-align: left;
            }   
            @media screen and (max-width:768px){
                .user{
                    margin-top:80px; 
                } 
                .details{
                text-align: center;
                }   
            }
        </style>
        <script src="js/jq.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
	</head>
	<body onload="content_load()">
		<nav class="navbar navbar-default navbar-fixed-top">
  			<div class="container">
  				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>   
                    <a  class="navbar-brand" href="index.php"><strong><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['name']; ?></a>
                </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
				
                        <ul class="nav navbar-nav">
                            <li><a href="account.php"><strong><i class="glyphicon glyphicon-cog"></i> Accounts</strong></a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="logout.php"><strong><i class="glyphicon glyphicon-log-out"></i> Logout</strong></a></li>
                        </ul>
                    </div>
			</div>
	  	</nav>	

		


		<div class="container-fluid user" >
			<div class="row">
				<!-- chat box -->
        	<div class="col-sm-4 col-sm-offset-4">
					<div class="login-panel panel panel-default">
	                    <div class="panel-heading" style="background:#fdfdfd; color:#444; font-size:16px;">
	                        <h3 style="font-size:17px;" align="center"><strong><i class="glyphicon glyphicon-list"></i>  Update Details </strong></h3>
	                    </div>
                        <div id="e_r"></div>
	                    <div class="panel-body">
	                            <fieldset>
	                                
                                    <div class="form-group">
                                        <label>Update Name</label>
	                                    <input  class="form-control" placeholder="Name" id="name" type="text">
	                                </div>
	                                
                                  
									
	                                <!-- Change this to a button or input when using this as a form -->
	                                <hr>
                                    <p align="center"><button style="padding:13px 25px;" class="btn btn-primary" id="sign"><i class="glyphicon glyphicon-send"></i> Update</button></p>
                                    <!-- to get the info from other page  --> 
                                    <div id="response"></div>
                                    
								</fieldset>
	                            <!--- login script -->
	                    </div>
	                </div>
			  </div>
			
                <script>
                   $("#sign").click(function(){
                       var name = $("#name").val();
                       // to send data via ajax to other page
                        $.get("ajax/upd.php",{name:name},function(data){
                            //to show the response of the other page
                            $("#response").html(data);
                       });
                   });
                </script>
			
			
			    </div>   
		</div>
<br/>
<!--Script working-->
        

	</body>
</html>
<?php } ?>