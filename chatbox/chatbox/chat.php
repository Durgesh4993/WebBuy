<?php 
	include('connection.php');
	session_start();
	
	
	if(!$_SESSION['user']){
	header('location: login.php');	
	}
	else{
		if($_GET['user'] == $_SESSION['user']){
          header('location: index.php');	 
        }
	
?>
<html>

	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>AJAX Login System | Main page</title>
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
            .contents{
                overflow-y: scroll;
                height: 300px;
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
                        <div class="panel-heading">
                            <div class="form-group">
                                <textarea class="form-control" id="msg" rows="3" placeholder="Enter your message..." style="resize:none;"></textarea>
                            </div>
                            <button type='submit' class='btn btn-success' id='send'><i class="glyphicon glyphicon-send"></i> Send</button>    
                        </div>
                        <div class="panel-body contents" align="center" style=""	>
                           
                        </div>  
                        <div id="response"></div>
                    </div>
                </div>
            </div>   
		</div>




<br/>
<!--Script working-->
                    <?php  $_SESSION['rece'] = $_GET['user']; ?>
                <script>
                        // script to send data
                    
                    $(function(){
                        $("#send").click(function(){
                        //to get the values of the input feilds
					    var msg = $("#msg").val();
					    var rece = "<?php echo $_GET['user']; ?>";
                        if(msg==""){
                            // to say when pass feild is empty
					       alert("Please Enter Message...");
					   }else{
                      
                        // to send data via ajax to other page
                        $.get("ajax/message.php",{msg:msg,rece:rece},function(data){
                            //to show the response of the other page
                           $("#response").html(data);
                       });
					   // to make the email and pass feilds empty
                        $("#msg").val(""); 
                       }
			     });
			});
                    
                    
						function content_load(){
							$(function(){
								$.get("ajax/msg.php",function(data){
									$(".contents").html(data);
								});
							});
						}
						setInterval(function(){ content_load() },1000);
                    
                    
                    
                    
				</script>
    

	</body>
</html>
<?php } ?>