	    <br/>
		<div class="row">					
			<div class="col-md-8">
                <div class="panel">
                    <div class="panel-body" style="padding-bottom:0px;border-radius:0px; box-shadow:2px 2px 4px 0px;">
                        <table class="table table-responsive table-bordered table-hover">
                            <tr>
                                <td align="center" colspan="8" style="background:#444; color:#fff; font-size:22px; border-color:#444;">Admin</td>
                            </tr>
                            <tr>
                                <td align="center" ><b>Sr.no</b></td>
                                <td align="center" ><b>Admin Username</b></td>
                                <td align="center" ><b>Admin Password</b></td>
                                <td align="center" ><b>Delete</b></td>
                            </tr>
                            <?php
                                $i = 0;
                                $books=mysqli_query($con,"select * from admin order by 1 desc");
                                while($row = mysqli_fetch_array($books)){
                                $i++;
                                    $cate_id		= 	$row['0'];
                                    $email		= 	$row['user'];
                                    $pass		= 	$row['pass'];
                            ?>
                            <tr>
                                <td align="center"><?php echo $i ?></td>
                                <td align="center" ><?php echo $email ?></td>
                                <td align="center" ><?php echo $pass ?></td>
                                <td align="center"><a class="btn btn-danger btn-sm" href='delete.php?a=<?php echo $cate_id ?>'> <i class="glyphicon glyphicon-trash"></i> </a></td>
                            </tr>
                        <?php } ?> 
                        </table>   
                    </div>
                </div>    
            </div>
            
            <div class="col-md-4">
                <div class="login-panel panel panel-default" style="border-radius:0px; box-shadow:2px 2px 2px 0px;">
                    <div>
                        <h3 align="center"><i class="glyphicon glyphicon-copy"></i>  Insert Admin </h3>
                    </div>
					<hr/>
                    <form method="post" action="" enctype="multipart/form-data">
						<div class="panel-body" style="margin-top:-15px;">  
							<fieldset>	
                                
								
								<div class="form-group">
                                    <label>Admin Username</label>
                                    <input class="form-control" name="u" placeholder="Admin Email..."/>
                                </div>	
								
								
								<div class="form-group">
                                    <label>Admin Password</label>
                                    <input class="form-control" name="p" placeholder="Admin Password..."/>
                                </div>	
								
								<?php
									if(isset($_POST['submit']))
									{//1st starts
										$u = $_POST['u'];
										$p = $_POST['p'];
										if(mysqli_query($con,"insert into admin (user,pass) values('$u','$p')")){    
                                           	echo "<script>alert('Admin has been inserted...')</script>";
                                            echo "<script>window.open('index.php?a','_self')</script>";
										}
										else{
											echo "<script>alert('Error!!!')</script>";
										}
                                    }// isset bracket ends here
								?>    
							</fieldset>
						</div>
						<div class="panel-footer">
                            <center>
                                <button name="submit" type="submit" class="btn btn-success" style="padding:12px 20px;"> <i class="glyphicon glyphicon-send"></i> Submit  </button>     
                            </center>
                        </div>
					</form>
                </div>
            </div>
        </div>
