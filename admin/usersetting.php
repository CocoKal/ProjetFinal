<?php  
session_start();  
/*if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}*/

ob_start();
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SOPHIE TELLS</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
			
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> Admin Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
					
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                     <!--   <a class="active-menu" href="settings.php"><i class="fa fa-dashboard"></i>Admin Dashboard</a>-->
                    </li>
					
					

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           ADMINISTRATOR<small> accounts </small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <?php
						include ('db.php');
						$sql = "SELECT * FROM user as u ,admin as a WHERE (a.id_user=u.id)";
						$re = mysqli_query($con,$sql)
				?>
                
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Admin ID</th>
                                            <th>Admin lastname</th>
											<th>Admin firstname</th>
                                            <th>Admin Email</th>
                                            <th>Admin Password</th>
                                            <th> Creation Date</th>
                                            <th>Update</th>


                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											$ls = $row['lastname'];
											$fs = $row['firstname'];
											$em= $row['email'];
											$ps=$row['password'];
											$cd=$row['created_at'];
											if($id % 2 ==0 )
											{
												echo"<tr class='gradeC'>
													<td>".$id."</td>
													<td>".$ls."</td>
													<td>".$fs."</td>
													<td>".$em."</td>
													<td>".$ps."</td>
													<td>".$cd."</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
													<td>".$id."</td>
													<td>".$ls."</td>
													<td>".$fs."</td>
													<td>".$em."</td>
													<td>".$ps."</td>
													<td>".$cd."</td>
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal' id='$id'>
                              Update 
                            </button></td>
													
												</tr>";
											
											}
										
										}
										
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->

                    <!-- ADD NEW ADMIN-->
					<div class="panel-body">
                            <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal1">
															Add New Admin
													</button>
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add the User name and Password</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Add new admin  lastname</label>
                                            <input name="newls"  class="form-control" placeholder="Enter Admin lastname">
											</div>
										</div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Add new admin  firstname</label>
                                                    <input name="newfs"  class="form-control" placeholder="Enter Admin firstname">
                                                </div>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>New Admin Email</label>
                                                    <input name="newem"  class="form-control" placeholder="Enter Admin Email">
                                                </div>
                                            </div>


										<div class="modal-body">
                                            <div class="form-group">
                                            <label>New Admin Password</label>
                                            <input name="newps"  class="form-control" placeholder="Enter Password">
											</div>
                                        </div>
										
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
                                           <input type="submit" name="in" value="Add" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
						<?php
						if(isset($_POST['in']))
						{
							$newls = $_POST['newls'];
							$newfs = $_POST['newfs'];
                            $newem = $_POST['newem'];
                            $newps = $_POST['newps'];
							
							$newsql1 ="Insert into user (lastname,firstname,email,password) values ('$newls','$newfs','$newem','$newps')";
                            $newsql2="SELECT max(id) from USER";
                            $cd=mysqli_query($con,$newsql2);
                            $ad=mysqli_fetch_array($cd);
                            $dd=$ad[0]+1;
							if(mysqli_query($con,$newsql1))
							{

                                //$t=mysqli_fetch_array($rd);

                                $newsql3="INSERT into admin(id_user) values($dd)";
                                $rad=mysqli_query($con,$newsql3);
                                echo' <script language="javascript" type="text/javascript"> alert("Admin Added") </script>';
                                header("Refresh:0");
							}
							else
                            {echo"erreur";}
						//header("Location: usersetting.php");
						}
						?>
                <!--DELETE USER-->
                <div class="panel-body">
                    <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal2">
                       Delete Admin
                    </button>
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Delete Admin</h4>
                                </div>
                                <form method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Add Admin ID</label>
                                            <input name="admin"  class="form-control" placeholder="Enter Admin ID">
                                        </div>
                                    </div>

                                        <input type="submit" name="de" value="delete" class="btn btn-primary">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if(isset($_POST['de']))
                {
                    $admin = $_POST['admin'];

                    $deletesql2="DELETE FROM admin where id='$admin' ";


                    if(mysqli_query($con,$deletesql2))
                    {

                        echo' <script language="javascript" type="text/javascript"> alert("Admin Deleted") </script>';
                        header("Refresh:0");
                    }
                    else
                    {echo"erreur";}
                    //header("Location: usersetting.php");
                }
                ?>
						<!-- UPDATE ADMIN-->
					<div class="panel-body">

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Change Admin Details</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Firstname</label>
                                            <input name="firstname" value="<?php echo $fs; ?>" class="form-control" placeholder="Enter  firstname">
											</div>
										</div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Change Lastname</label>
                                                    <input name="lastname" value="<?php echo $ls; ?>" class="form-control" placeholder="Enter lastname">
                                                </div>
                                            </div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Password</label>
                                            <input name="password" value="<?php echo $ps; ?>" class="form-control" placeholder="Enter Password">
											</div>
                                        </div>



                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                           <input type="submit" name="up" value="Update" class="btn btn-primary">
                                        </div>
										  </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
               
                <!-- /. ROW  -->
                <?php

				if(isset($_POST['up']))
				{
					$firstname = $_POST['firstname'];
					$password = $_POST['password'];
					$lastname=$_POST['lastname'];

					$upsql = "UPDATE `user` SET `firstname`='$firstname',lastname='$lastname',`password`='$password' WHERE (id=$id) ";
					if(mysqli_query($con,$upsql))
					{
					echo' <script language="javascript" type="text/javascript"> alert("User name and password update") </script>';
					
				
					}
					else{echo"erreur";}
				
				//header("Location: usersetting.php");
				
				}
				ob_end_flush();
				
				
				
				
				?>
                                
                  
            
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
