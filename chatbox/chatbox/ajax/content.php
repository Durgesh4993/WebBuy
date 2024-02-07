<table class="table table-responsive table-bordered table-striped table-hover">
								<tr>
									<td align="center"><b>Id</b></td>
									<td align="center"><b>Name</b></td>
									<td align="center"><b>Username</b></td>
									<td align="center"><b>Password</b></td>
									<td align="center"><b>Delete</b></td>
								</tr>
    <div id="res"></div>
                               
				        <?php
                                    include('../connection.php');
								    $query = mysqli_query($con,"select * from users");
								    $i = 0;
                                    while($data = mysqli_fetch_array($query)){
                                        $id = $data['id'];
                                        $n = ucwords($data['name']);
                                        $e = $data['email'];
                                        $p = $data['rpass'];
                                        $i++;
                                        echo "
                                        <tr>
										  <td align='center'>$i</td>
                                          <td align='center'>$n</td>
										  <td align='center'>$e</td>
										  <td align='center'>$p</td>
                                          <td align='center'><b id='$i' alt='$n' value='$id'><i class='glyphicon glyphicon-trash'></i></b></td>
									   </tr>
                                       
                                       ";
								       ?>
                                         
                                        <script>	
                                    $("#<?php echo $i ?>").click(function(){
                                        var id = $("#<?php echo $i ?>").attr("value");
                                        var name = $("#<?php echo $i ?>").attr("alt");
				                        if(confirm('Do you want to delete '+ name + ' ?')==true){
                                            $.get("ajax/del.php",{id:id},function(data){
                                                $("#res").html(data);
                                            });
                                        }
                                    });
                            </script>
                                    
                    <?php } ?>
								</table>