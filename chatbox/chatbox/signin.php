<?php 
	include('connection.php');
	session_start();
?><html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SignIn</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jq.min.js"></script>
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
            .btn-primary{
                margin: 0px auto;
                padding:15px 45px;
                font-size:17px;
                border:1px solid #ddd;
                background:none;
                color:black;
                transition:.5s ease;
                border-radius:0px;
            }
            .panel{
                border-radius: 0px;
                box-shadow: 2px 2px 2px 0px;
            }
        </style>
        <script>
            $(function(){
                $("#login").click(function(){
                    //to get the values of the input feilds
					 var name = $("#name").val();
                       var user = $("#user").val();
                       var user1 = $("#user1").val();
                       var pass = $("#pass").val();
                       var pass1 = $("#pass1").val();
					if(name=="" && user=="" && user1==""&& pass=="" && pass1==""){
					// to say when email and password feilds are empty	
					alert("Please Fill Both Feilds...");
					}else{
                      
                        // to send data via ajax to other page
                        $.get("ajax/signin.php",{name:name,user:user,user1:user1,pass:pass,pass1:pass1},function(data){
                            //to show the response of the other page
                            $("#response").html(data);
                       });
					   // to make the email and pass feilds empty
                        $("#name").val(""); 
				        $("#user").val("");
				        $("#user1").val(""); 
				        $("#pass").val("");
				        $("#pass1").val("");  	
					}
				});
			});
		</script>
        	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" style="background:">
  			<div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand"><b><i class="glyphicon glyphicon-lock"></i>Be Ready</b></a></li>
                </div>
            </div>
	  	</nav>	
		
        <div class="container-fluid" style="margin-top: 70px;">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading" style="background:#fdfdfd; color:#444; font-size:16px;">
                            <h3 style="font-size:17px;" align="center"><strong><i class="glyphicon glyphicon-log-in"></i> Sign Up</strong></h3>
                        </div>
                        <div class="panel-body">
                            <fieldset>
                               <div class="form-group">
	                                    <input  class="form-control" placeholder="Name" id="name" type="text">
	                                </div>
	                                <div class="form-group">
	                                    <input  class="form-control" placeholder="Username" id="user"  type="text">
	                                </div>   
									<div class="form-group">
	                                    <input  class="form-control" placeholder="Username Again" id="user1" type="text">
	                                </div>
	                                <div class="form-group">
	                                    <input  class="form-control" placeholder="Password" id="pass" type="password">
	                                </div>
	                                <div class="form-group">
	                                    <input  class="form-control" placeholder="Password Again" id="pass1" type="password">
	                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <hr/>
                                <p align="center">
                                    <button type="submit" class="btn btn-primary" id="login"><i class="glyphicon glyphicon-log-in"></i> Sign Up</button>
                                </p>
                                <hr/>
                                <center>
									<p style="color: #888;
margin: 0px 0px 0px 0px;">Already have an account ?</p>	
									<a style="text-decoration:none;" href="login.php">Click to login</a> 
									<div id="response" ></div>
									</center>
                            </fieldset>
                         </div>
                    </div>
                </div>
			</div>
		</div>
	<br/>
	
    
    
    </body>
</html>