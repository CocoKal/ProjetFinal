<?php
session_start();
$current = date('m/d/Y');
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
            <a class="navbar-brand" href="home.php"><?php echo $_SESSION["user"]; ?> </a>
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
                    <a   href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                </li>
                <li>
                    <a  href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                </li>

                <li>
                    <a   href="usersetting.php"><i class="fa fa-desktop"></i> Administrator Settings</a>
                </li>
                <li>
                    <a  href="settings.php"><i class="fa fa-desktop"></i> Rooms  Settings</a>
                </li>
                <li>
                    <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Room Booking</a>
                </li>

                <li>
                    <a class="active-menu" href="clients.php"><i class="fa fa-desktop"></i> Clients Today</a>
                </li>
                <li>
                    <a  href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                </li>
                <li>
                    <a  href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                </li>
                <li>
                    <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>



        </div>

    </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                        Clients in Hotels <?php echo"$current"?><small></small>
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
                                                            Choose Hotel To see the List of Clients Today
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                                                            <?php
                                                            include('db.php');
                                                            if(isset($_POST['search']))
                                                            {
                                                                $hotel_id = $_POST['hotel_id'];
                                                                  echo"<div class='row'>
                          <div class='col-md-12'>
                          <h1 class='page-header'>
                            Status Current<small>Clients </small>
                        </h1>
                    </div>
                </div>";

                                                                  $sql2="select * from booking as b, user as u where( room_id IN ( select room_id from room where hotel_id=$hotel_id) ) and (b.user_id = u.id) and(b.check_in=$current) and (b.check_out<$current)";



						$red = mysqli_query($con,$sql2);


						$s =0;
						while($row=mysqli_fetch_array($red) )
						{$s++;
						};







                                      echo"          
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
                                                                                        Clients  <span class='badge'>" ;
                                                                                        echo $s ;"</span>
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

                                                                                                    <th>Client ID</th>
                                                                                                    <th>Client Lastname</th>
                                                                                                    <th>Client Firstname</th>
                                                                                                    
                                                                                                   

                                                                                                </tr>";
                                                                $sql3="select * from booking as b, user as u where( room_id IN ( select room_id from room where hotel_id=$hotel_id) ) and (b.user_id = u.id) and(date(b.check_in)=$current) and (b.check_out<$current)";



                                                                $rec= mysqli_query($con,$sql3);

                                                                while($rowc=mysqli_fetch_array($rec) )
                                                                {
                                                                    echo "<tr>
							                     	<th>" . $rowc['user_id'] . "</th>
												<th>" . $rowc['lastname'] . "</th>
												<th>" . $rowc['firstname'] . "</th>
												 ";   }
                                                                                                echo"</thead>
                                                                                                <tbody>";}
                                                            ?>







            </div>

            </div>

                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->


    <script src="assets/js/jquery-1.10.2.js'></script>
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

</html>
