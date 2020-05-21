<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
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
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                    </li>

                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                   


                    
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Rooms Booking <small></small>
                        </h1>
                    </div>
                </div>
                <?php
					include ('db.php');
						$sql = "select * from hotel";
						$re = mysqli_query($con,$sql);
						$h =0;
						while($row=mysqli_fetch_array($re) )
						{$h++;}?> <!-- Nombre des hôtels -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">

                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    <button class="btn btn-default" type="button">
                                                      Hotels  <span class="badge"><?php echo $h ; ?></span>
                                                    </button>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                            <div class="panel-body">
                                                <div class="panel panel-default">

                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>

                                                                    <th>HOTEL ID</th>
                                                                    <th>HOTEL COUNTRY</th>
                                                                    <th>HOTEL CITY</th>
                                                                    <th>MANAGER ID</th>


                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php
                                                                $hsql = "select * from hotel";
                                                                $hre = mysqli_query($con,$hsql);
                                                                while($hrow=mysqli_fetch_array($hre) )
                                                                {

                                                                    echo"<tr>
												<th>".$hrow['hotel_id']."</th>
												<th>".$hrow['hotel_localisation_country']."</th>
												<th>".$hrow['hotel_localisation_city']."</th>
												<th>".$hrow['manager_id']."</th>
												
												
												
								
												</tr>";
                                                                }


                                                                ?>

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-sm-5">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            Choose Hotel to see his bookings
                                                        </div>
                                                        <div class="panel-body">
                                                            <form name="form" method="post">
                                                                <div class="form-group">
                                                                    <label>Hotel</label>
                                                                    <select name="hotel_id"  class="form-control" required>
                                                                        <option value selected ></option>
                                                                        <option value="1">Marrakech</option>
                                                                        <option value="2">Paris </option>
                                                                        <option value="3">Dubai</option>
                                                                        <option value="4">New York</option>
                                                                        <option value="5">Rome</option>
                                                                        <option value="6">Londres</option>
                                                                        <option value="7">Bangkok</option>
                                                                        <option value="8">Bali</option>
                                                                        <option value="5">Amsterdam</option>
                                                                        <option value="5">Rio de Janeiro</option>
                                                                    </select>
                                                                </div>


                                                                <input type="submit" name="search" value="search" class="btn btn-primary">
                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                                            <?php
                                                            include('db.php');
                                                            if(isset($_POST['search']))
                                                            {
                                                                $hotel_id = $_POST['hotel_id'];
                                                                  echo"<div class='row'>
                          <div class='col-md-12'>
                          <h1 class='page-header'>
                            Status <small>Room Booking </small>
                        </h1>
                    </div>
                </div>";

                                                                  $sql1="select * from booking where( room_id IN ( select room_id from room where hotel_id=$hotel_id) )";



						$re = mysqli_query($con,$sql1);


						$c =0;
						while($row=mysqli_fetch_array($re) )
						{$c++;
						};







                                      echo"          <div class='row'>
                                                    <div class='col-md-12'>
                                                        <div class='panel panel-default'>
                                                            <div class='panel-heading'>

                                                            </div>
                                                            <div class='panel-body'>
                                                                <div class='panel-group' id='accordion'>

                                                                    <div class='panel panel-primary'>
                                                                        <div class='panel-heading'>
                                                                            <h4 class='panel-title'>
                                                                                <a data-toggle='collapse' data-parent='#accordion' href='#collapseTwo'>
                                                                                    <button class='btn btn-default' type='button'>
                                                                                        New Room Bookings  <span class='badge'>" ;
                                                                                        echo $c ; echo"</span>
                                                                                    </button>
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id='collapseTwo' class='panel-collapse in' style='height: auto;'>
                                                                            <div class='panel-body'>
                                                                                <div class='panel panel-default'>

                                                                                    <div class='panel-body'>
                                                                                        <div class='table-responsive'>
                                                                                            <table class='table'>
                                                                                                <thead>
                                                                                                <tr>

                                                                                                    <th>Booking ID</th>
                                                                                                    <th>User ID</th>
                                                                                                    <th>Room ID</th>
                                                                                                    <th>Booking Date</th>
                                                                                                    <th>Check In</th>
                                                                                                    <th>Check Out</th>

                                                                                                    <th> Payment Status</th>

                                                                                                   

                                                                                                </tr>";
                                                                $sql2="select * from booking where( room_id IN ( select room_id from room where hotel_id=$hotel_id) )";



                                                                $rep = mysqli_query($con,$sql2);

                                                                while($rowh=mysqli_fetch_array($rep) )
                                                                {
                                                                    echo "<tr>
												<th>" . $rowh['booking_id'] . "</th>
												<th>" . $rowh['user_id'] . "</th>
												<th>" . $rowh['room_id'] . "</th>
												<th>" . $rowh['booking_date'] . "</th>
												<th>" . $rowh['check_in'] . "</th>
												<th>" . $rowh['check_out'] . "</th>
												<th>" . $rowh['payment_status'] . "</th> ";   }
                                                                                                echo"</thead>
                                                                                                <tbody>";
                                                                  }
                                                                                        /*

                                                                                                $tsql = "select * from booking";
                                                                                                $tre = mysqli_query($con,$tsql);
                                                                                                while($trow=mysqli_fetch_array($tre) ) {

                                                                                                    echo "<tr>
												<th>" . $trow['booking_id'] . "</th>
												<th>" . $trow['user_id'] . "</th>
												<th>" . $trow['room_id'] . "</th>
												<th>" . $trow['booking_date'] . "</th>
												<th>" . $trow['check_in'] . "</th>
												<th>" . $trow['check_out'] . "</th>
												<th>" . $trow['payment_status'] . "</th>
												
												
												<th><a href='roombook.php?rid=" . $trow['booking_id'] . " ' class='btn btn-primary'>Action</a></th>
												</tr>
                                                                                                }


                                                                                               

                                                                                                </tbody>
                                                                                            </table>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- End  Basic Table  -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            }
                                                            ?>
                                                <div class='row'>
                          <div class='col-md-12'>
                          <h1 class='page-header'>
                            Status <small>Room Booking </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->";

                                                                                                    include('db.php');
                                                                                                    $sql = "select * from booking";
                                                                                                    $re = mysqli_query($con, $sql);
                                                                                                    $c = 0;
                                                                                                    while ($row = mysqli_fetch_array($re)) {
                                                                                                        $c++;


                                                                                                    }



                                                                                                   /*echo "

					<div class='row'>
                <div class='col-md-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            
                        </div>
                        <div class='panel-body'>
                            <div class='panel-group' id='accordion'>
							
							<div class='panel panel-primary'>
                                    <div class='panel-heading'>
                                        <h4 class='panel-title'>
                                            <a data-toggle='collapse' data-parent='#accordion' href='#collapseTwo'>
											<button class='btn btn-default' type='button'>
												 New Room Bookings  <span class='badge'>";
                                                                                                    echo $c;
                                                                                                    echo "</span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id='collapseTwo' class='panel-collapse in' style='height: auto;'>
                                        <div class='panel-body'>
                                           <div class='panel panel-default'>
                        
                        <div class='panel-body'>
                            <div class='table-responsive'>
                                <table class='table'>
                                    <thead>
                                        <tr>

                                            <th>Booking ID</th>
                                            <th>User ID</th>
                                            <th>Room ID</th>
											<th>Booking Date</th>
											<th>Check In</th>
											<th>Check Out</th>

											<th> Payment Status</th>

											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>";


                                                                                                    $tsql = "select * from booking";
                                                                                                    $tre = mysqli_query($con, $tsql);
                                                                                                    while ($trow = mysqli_fetch_array($tre)) {

                                                                                                        echo "<tr>
												<th>" . $trow['booking_id'] . "</th>
												<th>" . $trow['user_id'] . "</th>
												<th>" . $trow['room_id'] . "</th>
												<th>" . $trow['booking_date'] . "</th>
												<th>" . $trow['check_in'] . "</th>
												<th>" . $trow['check_out'] . "</th>
												<th>" . $trow['payment_status'] . "</th>
												
												
												<th><a href='roombook.php?rid=" . $trow['booking_id'] . " ' class='btn btn-primary'>Action</a></th>
												</tr>";
                                                                                                    }


                                                                                                    echo "
                                        
                                    </tbody>
                                </table>
								
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  --> 
                                        </div>
                                    </div>
                                </div>";
                                                                                                }}



								 $rsql = "SELECT * FROM `roombook`";
								$rre = mysqli_query($con,$rsql);
								$r =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Conform")
										{
											$r = $r + 1;
											
											
											
										}
										
								
								}
						
								echo"
                                <div class='panel panel-info'>
                                    <div class='panel-heading'>
                                        <h4 class='panel-title'>
                                            <a data-toggle='collapse' data-parent='#accordion' href=''#collapseOne' class='collapsed'>
											<button class='btn btn-primary' type='button'>
												 Booked Rooms  <span class='badge'>"; echo $r ; echo"</span>
											</button>
											
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
										<
										$msql = "SELECT * FROM `roombook`";
										$mre = mysqli_query($con,$msql);
										
										while($mrow=mysqli_fetch_array($mre) )
										{		
											$br = $mrow['stat'];
											if($br=="Conform")
											{
												$fid = $mrow['id'];
												 
											echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$mrow['FName']."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
														<a href=show.php?sid=".$fid ."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Show
													</button></a>
															".$mrow['TRoom']."
														</div>
													</div>	
											</div>";
															
												
					
				
												
											}
											
									
										}
										?>
                                           
										</div>
										
                                    </div>
									
                                </div>
                                <
								
								$fsql = "SELECT * FROM `contact`";
								$fre = mysqli_query($con,$fsql);
								$f =0;
								while($row=mysqli_fetch_array($fre) )
								{
										$f = $f + 1;
								
								}
						
								?>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
											<button class="btn btn-primary" type="button">
												 Followers  <span class="badge">< echo $f ; ?></span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
											<th>Follow Start</th>
                                            <th>Permission status</th>
                                            
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<
									$csql = "select * from contact";
									$cre = mysqli_query($con,$csql);
									while($crow=mysqli_fetch_array($cre) )
									{	
										
											echo"<tr>
												<th>".$crow['id']."</th>
												<th>".$crow['fullname']."</th>
												<th>".$crow['email']." </th>
												<th>".$crow['cdate']." </th>
												<th>".$crow['approval']."</th>
												</tr>";
										
									
									}
									?>
                                        
                                    </tbody>
                                </table>
								<a href="messages.php" class="btn btn-primary">More Action</a>
                            </div>
                        </div>
                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            -->
			
				<!-- DEOMO-
				<div class='panel-body'>
                            <button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
                              Update 
                            </button>
                            <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Change the User name and Password</h4>
                                        </div>
										<form method='post>
                                        <div class='modal-body'>
                                            <div class='form-group'>
                                            <label>Change User name</label>
                                            <input name='firstname' value='<php echo $firstname; ?>' class='form-control' placeholder='Enter User name'>
											</div>
										</div>
										<div class='modal-body'>
                                            <div class='form-group'>
                                            <label>Change Password</label>
                                            <input name='pasd' value='<php echo $ps; ?>' class='form-control' placeholder='Enter Password'>
											</div>
                                        </div>
										
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
											
                                           <input type='submit' name='up' value='Update' class='btn btn-primary'>
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				
				<-DEMO END-->
				

                    

                <!-- /. ROW  -->
				
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
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>*/