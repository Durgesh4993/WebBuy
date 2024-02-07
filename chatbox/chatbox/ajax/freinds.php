 <div class="row">
                                <?php
     include('../connection.php');
								    $query = mysqli_query($con,"select * from user");
								    while($data = mysqli_fetch_array($query)){
                                        $id = $data['id'];
                                        $n = ucwords($data['name']);
                                        $u = $data['user'];
                                ?>
                                <div class="col-sm-2">
                                    <img style="margin-top:5px;" src="img/user.png" class="img-circle" alt="image" height="65" width="65">
                                </div>
                                  <a style="text-decoration:none; color:#222;" href="chat.php?user=<?php echo $u ?>">
                                <div class="col-sm-10 details" style="text-align:; padding-left:30px">
                                   <h4 title=""><?php echo $n ?></h4> 
                                        <p><?php  $avail = mysqli_fetch_array(mysqli_query($con,"select * from user where id='$id'")); echo $avail['status']?></p>
                                    <hr>
                                </div>
                                       </a>
                                 <?php } ?>
                            </div>