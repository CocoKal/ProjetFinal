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
     <!-- Morris Chart Styles-->

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
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Quit</a>
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
                        <a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a  href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                    </li>
                    <li>
                        <a  href="usersetting.php"><i class="fa fa-desktop"></i> Administrator Settings</a>
                    </li>
                    <li>
                        <a  href="settings.php"><i class="fa fa-desktop"></i> Rooms  Settings</a>
                    </li>
					

                    <li>
                        <a  href="clients.php"><i class="fa fa-desktop"></i> Clients Today</a>
                    </li>
                    <li>
                        <a class="active-menu" href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
                    <li>
                        <a   href="profitbyconfort.php"><i class="fa fa-qrcode"></i> Profit By Confort</a>
                    </li>
                    <li>
                        <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i> Quit</a>
                    </li>



            </div>

        </nav>
        <!-- /. NAV SIDE  -->

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
    <div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Payments<small></small>
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
                                                Choose Hotel to payments
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


                                                    <input type="submit" name="search" value="search" class="btn btn-primary" onclick="">
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
{$hotel_id=$_POST['hotel_id'];

    echo"<div class='row'>
     <div class='col-md-12'>
     <h1 class='page-header'>
     Payments <small>Details </small>
                        </h1>
                    </div>
                </div>";






    echo" 
                <div class='col-md-12'>
                    <!-- Advanced Tables -->
                    <div class='panel panel-default'>
                        <div class='panel-body'>
                            <div class='table-responsive'>
                                <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                    <thead>
                                        <tr>
                                            <th>ID PAYMENT</th>
											<th>NAME</th>
                                            <th>CARD NUMBER</th>
                                            <th>CARD DATE</th>
											<th>CARD CODE</th>
											<th>ROOMS AMOUNT</th>
											<th>SERVICES AMOUNT</th>

                                            <th>TOTAL AMOUNT</th>
                                            <th>FACTURE</th>

                                        </tr>";

                    //SHOW ALL PAYMENTS FOR A SPECIFIC HOTEL
                  $sql2="select * from payment as p , booking as b  where( b.room_id IN ( select room_id from room where hotel_id=$hotel_id) and (p.id_user = b.user_id)) group by p.id_payment";
                    $rep = mysqli_query($con,$sql2);

                                                                while($rowp=mysqli_fetch_array($rep) )
                                                                {
                                                                     echo "<tr>
							                     	<th>" . $rowp['id_payment'] . "</th>
												<th>" . $rowp['name_card'] . "</th>
												<th>" . $rowp['number_card'] . "</th>
												<th>" . $rowp['date_card'] . "</th>
												<th>" . $rowp['code'] . "</th>
												<th>" . $rowp['amount_rooms'] . "</th>
												<th>" . $rowp['amount_services'] . "</th> 
												<th>" . $rowp['amount_total'] . "</th>
												<th><a href=print.php?pid=".$rowp['id_payment'] ." <button class='btn btn-primary'> <i class='fa fa-print' ></i> Print</button></th> ";   }
                                                                                                echo"</thead>
                                                                                                <tbody>";}

                                                                echo"
                                    </thead>
                                    </table>


                                     </div>

                                    </div>
                                    </div>


                </div>
            </div>
                <!-- /. ROW  -->

                </div>

            </div>


    </div>";?>
             <!-- /. PAGE INNER  -->
            </div>
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
