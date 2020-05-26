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
    <title>SOPHIE TELLS </title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />

	<link rel="stylesheet" href="assets/css/morris.css">
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js//raphael-min.js"></script>
	<script src="assets/js/morris.min.js"></script>


        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
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
                <a class="navbar-brand" href="home.php"><?php echo $_COOKIE["username"]; ?> </a>
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
                        <a  href="clients.php"><i class="fa fa-desktop"></i> Clients Today</a>
                    </li>
                    <li>
                        <a  href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    <li>
                        <a  class="active-menu" href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
                    <li>
                        <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            Payments&&Amounts Details <small>from 2020/02/01 to 2020/05/01</small>
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
                                                            Choose Hotel to see his payments and amounts
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
                <?php
                include('db.php');
                if(isset($_POST['search']))
                {
                    $hotel_id = $_POST['hotel_id'];
                    echo"<div class='row'>
                          <div class='col-md-12'>
                          <h1 class='page-header'>
                            Payments <small>Details and Amounts </small>
                        </h1>
                    </div>
                </div>";

                    $sql2="select * from booking as b , payment as p  where( b.room_id IN ( select room_id from room where hotel_id=$hotel_id) ) and( p.id_user=b.user_id) ";



                    $re = mysqli_query($con,$sql2);


                    $c =0;
                    $c_amount=0;
                    $s_amount=0;
                    $total_amount=0;
                    while($row=mysqli_fetch_array($re) )
                    {$c++;
                    $c_amount=$c_amount+$row['amount_rooms'];
                    $s_amount=$s_amount+$row['amount_services'];
                    $total_amount=$total_amount+$row['amount_total'];
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
                                                                                        Payment&Amount Details <span class='badge'>" ;
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

                                                                                                    <th>Rooms Amounts</th>
                                                                                                    <th>Services Amounts</th>
                                                                                                    <th>Total Amounts</th>
                                                                                                    
                                                                                                </tr>";



                        echo "<tr>
							                     	<th>" .$c_amount . "</th>
												<th>" . $s_amount . "</th>
												<th>" . $total_amount . "</th>
											 ";
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


    <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>
</html>
<script>

</script>
