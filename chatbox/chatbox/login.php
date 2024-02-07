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
        <title>LogIn Page</title>
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
                    var user = $("#user").val();
					var pass = $("#pass").val();
					if(user=="" && pass==""){
					// to say when email and password feilds are empty	
					alert("Please Fill Both Feilds...");
					}else if(user==""){
					// to say when email feild is empty
						alert("Please Enter Email...");
					}else if(pass==""){
					// to say when pass feild is empty
					alert("Please Enter Password...");
					}else{
                      
                        // to send data via ajax to other page
                        $.get("ajax/login.php",{user:user,pass:pass},function(data){
                            //to show the response of the other page
                            $("#response").html(data);
                       });
					   // to make the email and pass feilds empty
                        $("#user").val(""); 
				        $("#pass").val(""); 	
					}
				});
			});
		</script>
        	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" style="background:">
  			<div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand"><b><i class="glyphicon glyphicon-lock"></i>Keep In Touch</b></a></li>
                </div>
            </div>
	  	</nav>	
		
        <div class="container-fluid" style="margin-top: 70px;">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading" style="background:#fdfdfd; color:#444; font-size:16px;">
                            <h3 style="font-size:17px;" align="center"><strong><i class="glyphicon glyphicon-log-in"></i> Login</strong></h3>
                        </div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="form-group">
                                    <input required="" class="form-control" placeholder="Username" id="user" type="text"/>
                                </div>
                                <div class="form-group">
                                    <input required="" class="form-control" placeholder="Password" id="pass" value="" type="password"/>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <hr/>
                                <p align="center">
                                    <button type="submit" class="btn btn-primary" id="login"><i class="glyphicon glyphicon-log-in"></i> login</button>
                                </p>
                                <hr/>
                                <center>
                                    <p style="color: #888; margin: 0px 0px 0px 0px;">Don't have an account yet?</p>	
                                    <a style="text-decoration:none;" href="signin.php">Create an account</a> 
                                    <div id="response"></div>
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