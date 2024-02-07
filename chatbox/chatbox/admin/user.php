	    <br/>
		<div class="row">					
			<div class="col-md-12 ">
                <div class="panel">
                    <div class="panel-body" style="padding-bottom:0px;border-radius:0px; box-shadow:2px 2px 4px 0px;">
                        <table class="table table-responsive table-bordered table-hover">
                            <tr>
                                <td align="center" colspan="8" style="background:#444; color:#fff; font-size:22px; border-color:#444;">Users</td>
                            </tr>
                            <tr>
                                <td align="center" ><b>Sr.no</b></td>
                                <td align="center" ><b>Name</b></td>
                                <td align="center" ><b>Username</b></td>
                                <td align="center" ><b>Password</b></td>
                                <td align="center" ><b>Delete</b></td>
                            </tr>
                            <?php
                                $i = 0;
                                $books=mysqli_query($con,"select * from user order by 1 desc");
                                while($row = mysqli_fetch_array($books)){
                                $i++;
                            ?>
                            <tr>
                                
                                <td align="center"> <?php echo $i; ?></td>
                                <td align="center"> <?php echo $row['name']?></td>
                                <td align="center"> <?php echo $row['user']?></td>
                                <td align="center"> <?php echo $row['rpass']?></td>
                                <td align="center"><a class="btn btn-danger btn-sm" href='delete.php?u=<?php echo $row['id'] ?>'> <i class="glyphicon glyphicon-trash"></i> </a></td>
                            </tr>
                        <?php } ?> 
                        </table>   
                    </div>
                </div>    
            </div>
            
          </div>
