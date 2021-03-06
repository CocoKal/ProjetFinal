<?php  
session_start();  
/*if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}*/
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
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                        <a  href="settings.php"><i class="fa fa-dashboard"></i>Rooms Status</a>
                    </li>
					<li>
                        <a  class="active-menu" href="room.php"><i class="fa fa-plus-circle"></i>Add Room</a>
                    </li>
                    <li>
                        <a  href="roomdel.php"><i class="fa fa-desktop"></i> Delete Room</a>
                    </li>
					

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           NEW ROOM <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ADD NEW ROOM
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label>Type Of Room *</label>
                                            <select name="troom"  class="form-control" required>
												<option value selected ></option>
                                                <option value="1">STANDARD ROOM</option>
                                                <option value="2">Tourism ROOM</option>
												<option value="3">CONFORT ROOM</option>
												<option value="4">LUXE ROOM</option>
                                            </select>
                              </div>
							  
								<div class="form-group">
                                            <label>Room Number</label>
                                    <label>
                                        <input name="number" class="form-control"  placeholder="Enter Room Number" required>

                                    </label>

                                </div>
                            <div class="form-group">
                                <label>Hotels</label>
                                <select name="hotel"  class="form-control" required>
                                    <option value selected ></option>
                                    <option value="1">Marrakech</option>
                                    <option value="2">Paris</option>
                                    <option value="3">Dubai</option>
                                    <option value="4">New York</option>
                                    <option value="5">Rome</option>
                                    <option value="6">Londres</option>
                                    <option value="7">Bangkok</option>
                                    <option value="8">Bali</option>
                                    <option value="9">Amsterdam</option>
                                    <option value="10">Rio de Janeiro</option>
                                </select>
                            </div>
							 <input type="submit" name="add" value="Add New" class="btn btn-primary"> 
							</form>
							<?php
							 include('db.php');
							 if(isset($_POST['add']))
							 {
										$room = $_POST['troom'];
										$nb = $_POST['number'];
										$hotel=$_POST['hotel'];
										// CHECK IF THE ROOM EXISTS OR NOT
										$check="SELECT count(*) FROM room WHERE room_no = '$nb' and hotel_id=$hotel ";
										$rs = mysqli_query($con,$check);
										$data = mysqli_fetch_array($rs);
										if($data[0] > 1) {
											echo "<script type='text/javascript'> alert('Room Already in Exists')</script>";
											
										}

										else
										{
							            // ADD THE ROOM
										
										$sql ="INSERT INTO room( room_type_id, room_no,hotel_id) VALUES ('$room','$nb','$hotel')" ;
										if(mysqli_query($con,$sql))
										{
										 echo '<script>alert("New Room Added") </script>' ;

										}else {
											echo '<script>alert("Sorry ! Check The System") </script>' ;
										}
							 }
							}
							
							?>
                        </div>
                        
                    </div>
                </div>
                
                  
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ROOMS INFORMATION
                        </div>
                        <div class="panel-body">
								<!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <?php
                        //SHOW SOME ROOMS INFORMATIONS
						$sql = "select * from room limit 0,15";
						$re = mysqli_query($con,$sql)
						?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Room ID</th>
                                            <th>Room No</th>
											<th>Hotel ID</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
										while($row= mysqli_fetch_array($re))
										{

												$id = $row['room_id'];
												$ho=$row['hotel_id'];
												$room_type_id=$row['room_type_id'];
												$req="SELECT room_type from room_type where room_type_id='$room_type_id'";
                                                $ree = mysqli_query($con,$req);
                                                $row2=mysqli_fetch_array($ree);
                                                $req3="SELECT hotel_localisation_city from hotel where hotel_id=$ho";
                                                $rep3=mysqli_query($con,$req3);
                                                $r=mysqli_fetch_array($rep3);
												if($id % 2 == 0)
											{
												echo "<tr class=odd gradeX>
													<td>".$row['room_id']."</td>
													<td>".$row2['room_type']."</td>
												   <th>".$r['hotel_localisation_city']."</th>
												</tr>";
											}
											else
											{
												echo"<tr class=even gradeC>
													<td>".$row['room_id']."</td>
													<td>".$row2['room_type']."</td>
												   <th>".$r['hotel_localisation_city']."</th>
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
                    
                       
                            
							  
							 
							 
							  
							  
							   
                       </div>
                        
                    </div>
                </div>
                
               
            </div>
                    
            
				

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
