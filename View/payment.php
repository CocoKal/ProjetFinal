
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="">
<head>
    <title>Sophie Tells</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="Styles/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="Content/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/about.css">
    <link rel="stylesheet" type="text/css" href="styles/payment.css">
</head>
<body>

<div class="container-fluid">




<div class="main" style="width: 100%">


    <a href="index.php"><h1>Sophie Tells</h1></a>
    <div class="content" style="width: 100%">

        <script src="Content/js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });

        </script>
          <div class="row">
        <div class="pay-tabs col-6 bg-dark" style="margin-bottom: 0px;">
            <h2>Amounts to pay</h2>

              <table class="table">
            <thead>
            <tr>
              <th scope="col">Description</th>
              <th scope="col">Services</th>
              <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($_SESSION["panier"])) {

                  $nb_articles = count($_SESSION['panier']['id']);
                  $total_price = 0;

                  for($i = 0; $i < $nb_articles; $i++) {

                    $room = $model->get_room_by_id($_SESSION['panier']['id'][$i]);
                    $room_type = $model->get_room_type_by_id($room[0]["room_type_id"]);
                    $check_in = date('j F Y' ,strtotime($_SESSION['panier']['check_in'][$i]));
                    $check_out = date('j F Y' ,strtotime($_SESSION['panier']['check_out'][$i]));

                    $datetime1 = new DateTime($_SESSION['panier']['check_in'][$i]);
                    $datetime2 = new DateTime($_SESSION['panier']['check_out'][$i]);
                    $interval = $datetime1->diff($datetime2);
                    $int_interval = $interval->format('%a');
                    $price_chambre = $room_type[0]["price"] * $int_interval;

                    echo '
                    <tr>
                      <td>
                        <div class="row">
                        <div class="col-5 pull-left">
                          <img src="Content\images\illustration_chambre\\'.$room[0]["room_type_id"].'.jpg" style="height: 100px">
                        </div>
                      <div class="col-7 pull-right div_infos">
                        <h4>'.$room_type[0]["room_type"].'</h4>
                        <p>Nombre de lit: '.$room_type[0]["nbr_bed"].'</p>
                        <p>Date d\'arrivée: '.$check_in.'</p>
                        <p>Date de départ: '.$check_out.'</p>
                      </div>
                      </div>
                    </td>
                    <td>
                      <ul>';
                      $price_service= 0;
                      foreach ($_SESSION['panier']['services'][$i] as $service_id) {

                        $service = $model->get_service_by_id($service_id);
                        $price_service += $service[0]['price'];
                        echo '<li>'.$service[0]['name'].'</li>';
                      }
                    echo '</ul>
                    </td>
                    <td><u>Chambre:</u><br>'.$price_chambre.' €<br><u>Services:</u><br>'.$price_service.' €</td>
                    </tr>
                    ';
                    $total_price = $price_chambre + $price_service;
                  }
                  echo '<th scope="row">Total:</th>
                          <td></td>
                          <td>'.$total_price.' €</td>
                          ';
                }


               ?>


            </tbody>
            </table>

        </div>


        <div class="sap_tabs col-6">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <div class="pay-tabs bg-dark">
                    <h2>Select Payment Method</h2>
                    <ul class="resp-tabs-list">
                        <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label class="pic1"></label>Credit Card</span></li>

                        <div class="clear"></div>
                    </ul>
                </div>
                <div class="resp-tabs-container bg-dark">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        <div class="payment-info">

                            <h3 class="pay-title">Credit Card Info</h3>
                            <form>
                                <div class="tab-for">
                                    <h5 class="text-white">NAME ON CARD</h5>
                                    <input type="text"  id="name" value="">
                                    <h5 class="text-white">CARD NUMBER</h5>
                                    <input class="pay-logo" id="number" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
                                </div>
                                <div class="transaction">
                                    <div class="tab-form-left user-form">
                                        <h5 class="text-white">EXPIRATION</h5>
                                        <input type="text" id="date" value=" ">
                                    </div>
                                    <div class="tab-form-right user-form-rt">
                                        <h5 class="text-white">CVV NUMBER</h5>
                                        <input type="text" id="code" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <input type="submit" value="SUBMIT">
                            </form>
                            <div class="single-bottom">
                                <ul>
                                    <li>
                                        <input type="checkbox"  id="brand" value="">
                                        <label for="brand" class="text-white"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                        <div class="payment-info">
                            <h3>Net Banking</h3>
                            <div class="radio-btns">
                                <div class="swit">
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>Andhra Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Allahabad Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bank of Baroda</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Canara Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>IDBI Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Icici Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Overseas Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Punjab National Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>South Indian Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>State Bank Of India</label> </div></div>
                                </div>
                                <div class="swit">
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>City Union Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>HDFC Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>IndusInd Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Syndicate Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Deutsche Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Corporation Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>UCO Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Federal Bank</label> </div></div>
                                    <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>ING Vysya Bank</label> </div></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <a href="#">Continue</a>
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                        <div class="payment-info">
                            <h3>PayPal</h3>
                            <h4>Already Have A PayPal Account?</h4>
                            <div class="login-tab">
                                <div class="user-login">
                                    <h2>Login</h2>

                                    <form>
                                        <input type="text" value="name@email.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'name@email.com';}" required="">
                                        <input type="password" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}" required="">
                                        <div class="user-grids">
                                            <div class="user-left">
                                                <div class="single-bottom">
                                                    <ul>
                                                        <li>
                                                            <input type="checkbox"  id="brand1" value="">
                                                            <label for="brand1"><span></span>Remember me?</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="user-right">
                                                <input type="submit" value="LOGIN">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
                        <div class="payment-info">

                            <h3 class="pay-title">Dedit Card Info</h3>
                            <form>
                                <div class="tab-for">
                                    <h5>NAME ON CARD</h5>
                                    <input type="text" value="">
                                    <h5>CARD NUMBER</h5>
                                    <input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
                                </div>
                                <div class="transaction">
                                    <div class="tab-form-left user-form">
                                        <h5>EXPIRATION</h5>
                                        <ul>
                                            <li>
                                                <input type="number" class="text_box" type="text" value="6" min="1" />
                                            </li>
                                            <li>
                                                <input type="number" class="text_box" type="text" value="1988" min="1" />
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="tab-form-right user-form-rt">
                                        <h5>CVV NUMBER</h5>
                                        <input type="text" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <input type="submit" value="SUBMIT">
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
</body>
</html>
