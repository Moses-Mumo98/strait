<?php
session_start();
ob_start();
ini_set('display_errors',0);
$_SESSION['role']['isAdmin'] =
$_SESSION['amIn']=
$_SESSION['role']['isAdmin']=true;


?><!DOCTYPE html>

<html lang="en-US">
<head class="headinfo">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
    <meta name="author" content="James Mbaaro">

    <link href="assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/elegant-fonts.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/zabuto_calendar.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">

    <link rel="stylesheet" href="assets/css/trackpad-scroll-emulator.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery.nouislider.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css??v=82" type="text/css">

    <title>Airport Transfer Today</title>

</head>

<body class="homepage nav-btn-only">
<div class="page-wrapper">
    <header id="page-header">
        <nav>
            <div class="left">
                <a href="index.html" class="brand"><img src="assets/img/logo.jpg" style="  max-height: 30px;"alt=""></a>
            </div>
            <!--end left-->
            <div class="right">

                <!--end primary-nav-->
                <div class="secondary-nav">
                  <?php if(!$_SESSION['amIn']){

                    echo '<a href="#" data-modal-external-file="modal_sign_in.php" data-target="modal-sign-in">Sign In</a>';


                  }else{

                    echo '<a href="index.php?out=O" >Sign out</a>';


                  }
              //   if($_SESSION['role']['isAdmin'] || $_SESSION['role']['allowToRegister']){

                   echo '<a href="#" class="promoted" data-modal-external-file="modal_register.php" data-target="modal-register">Register</a>';

                // }


                 if($_SESSION['role']['isAdmin'] || $_SESSION['role']['allowToSesVehicle']){

                   echo '<a href="#" class="promoted" data-modal-external-file="listVehicles.php" data-target="modal-register">Vehicles</a>';

                 }
                 if($_SESSION['role']['isAdmin'] || $_SESSION['role']['allowToSeeDriver']){

                   echo '<a href="#" class="promoted" data-modal-external-file="listDrivers.php" data-target="modal-register">Drivers</a>';

                 }
                 ?>
                </div>
                <!--end secondary-nav-->
                <a href="#" class="btn btn-primary btn-small btn-rounded icon shadow add-listing" data-modal-external-file="modal_submit.php" data-target="modal-submit"><i class="fa fa-plus"></i><span>New Client</span></a>
                <div class="nav-btn">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>
                <!--end nav-btn-->
            </div>
            <!--end right-->
        </nav>
        <!--end nav-->
    </header>
    <!--end page-header-->

    <?php
    ini_set('display_errors',0);
    error_reporting(E_STRICT & ~E_WARNING);
        if($_SESSION['feedback']!=null && $_SESSION['feedback']!=''){
          if($_SESSION['feedback']['result']==true){
              $alert='success';
              $msg_head='Done well, ';
              $msg_body=$_SESSION['feedback']['error'];
          }else{//error
              $alert='danger';
              $msg_head='ooops, ';
              $msg_body=$_SESSION['feedback']['msg'];

          }

          echo '<div class="alert alert-'.$alert.'">
                  <strong>'.$msg_head.'!</strong>
                  '.$msg_body.'
                </div>';




        }
        $_SESSION['feedback']=null;
    ?>

    <div id="page-content">
        <div class="hero-section full-screen has-map has-sidebar">
            <div class="map-wrapper">
                <div class="geo-location">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="map" id="map-homepage"></div>
            </div>
            <!--end map-wrapper-->
            <div class="results-wrapper">
                <div class="form search-form inputs-underline">
                    <form>
                        <div class="section-title">
                            <h2>Search</h2>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Enter keyword">
                        </div>
                        <!--end form-group-->
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <select class="form-control selectpicker" name="city">
                                        <option value="">Location</option>

                                    </select>
                                </div>
                                <!--end form-group-->
                            </div>
                            <!--end col-md-6-->
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <select class="form-control selectpicker" name="category">
                                        <option value="">Category</option>
                                        <option value="NC">Normal Cab</option>
                                        <option value="RV">Van</option>
                                        <option value="LC">Luxury Van</option>
                                        <option value="TV">Tour Van</option>
                                        <option value="MB">Mini Bus</option>
                                    </select>
                                </div>
                                <!--end form-group-->
                            </div>
                            <!--end col-md-6-->
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control date-picker" name="min-price" placeholder="Event Date">
                                </div>
                                <!--end form-group-->
                            </div>
                            <!--end col-md-6-->
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div class="ui-slider" id="price-slider" data-value-min="10" data-value-max="400" data-value-type="price" data-currency="$" data-currency-placement="before">
                                        <div class="values clearfix">
                                            <input class="value-min" name="value-min[]" readonly>
                                            <input class="value-max" name="value-max[]" readonly>
                                        </div>
                                        <div class="element"></div>
                                    </div>
                                    <!--end price-slider-->
                                </div>
                            </div>
                            <!--end col-md-6-->
                        </div>
                        <!--end row-->
                        <div class="form-group">
                            <button type="submit" data-ajax-response="map" data-ajax-data-file="assets/external/data.php" data-ajax-auto-zoom="1" class="btn btn-primary pull-right"><i class="fa fa-search"></i></button>
                        </div>
                        <!--end form-group-->
                    </form>
                    <!--end form-hero-->
                </div>
                <div class="results">
                    <div class="tse-scrollable">
                        <div class="tse-content">
                            <div class="section-title">
                                <h2>Transport Requests<span class="results-number"></span></h2>
                            </div>
                            <!--end section-title-->
                            <div class="results-content"></div>
                            <!--end results-content-->
                        </div>
                        <!--end tse-content-->
                    </div>
                    <!--end tse-scrollable-->
                </div>
                <!--end results-->
            </div>
            <!--end results-wrapper-->
        </div>
        <!--end hero-section-->


       <div id="dashboard"></div>




    </div>
    <!--end page-content-->

    <footer id="page-footer">
        <div class="footer-wrapper">
            <div class="block">
                <div class="container">
                    <div class="vertical-aligned-elements">
                        <div class="element width-50">
                            <p data-toggle="modal" data-target="#myModal">Airport Transfer Today, Kenya. <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
                        </div>
                        <div class="element width-50 text-align-right">
                            <a href="#" class="circle-icon"><i class="social_twitter"></i></a>
                            <a href="#" class="circle-icon"><i class="social_facebook"></i></a>
                            <a href="#" class="circle-icon"><i class="social_youtube"></i></a>
                        </div>
                    </div>
                    <div class="background-wrapper">
                        <div class="bg-transfer opacity-50">
                            <img src="assets/img/footer-bg.png" alt="">
                        </div>
                    </div>
                    <!--end background-wrapper-->
                </div>
            </div>
            <div class="footer-navigation">
                <div class="container">
                    <div class="vertical-aligned-elements">
                        <div class="element width-50">(C) 2017 Airport Transfers Today, All right reserved</div>
                        <div class="element width-50 text-align-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--end page-footer-->
</div>
<!--end page-wrapper-->
<a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>
<div class="footerScripts">
<script>

function mapDone(){
 console.log('map in');

}

</script>

<script type="text/javascript" src="assets/assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyD5SO1B11i_m15cnNallBfvym3WRIfnPrQ&libraries=places&callback=mapDone"></script>
<script type="text/javascript" src="assets/js/richmarker-compiled.js"></script>
<script type="text/javascript" src="assets/js/markerclusterer_packed.js"></script>
<script type="text/javascript" src="assets/js/infobox.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.trackpad-scroll-emulator.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/jquery.nouislider.all.min.js"></script>

<script type="text/javascript" src="assets/js/custom.js?v=3"></script>
<script type="text/javascript" src="assets/js/maps.js"></script>
	<!-- /theme JS files -->

<script>

    var optimizedDatabaseLoading = 0;
  var _latitude = -1.333731;//40.7344458;//,
    var _longitude =36.927109;//-73.86704922; //
    var element = "map-homepage";
    var markerTarget = "modal"; // use "sidebar", "infobox" or "modal" - defines the action after click on marker
    var sidebarResultTarget = "modal"; // use "sidebar", "modal" or "new_page" - defines the action after click on marker
    var showMarkerLabels = false; // next to every marker will be a bubble with title
    var mapDefaultZoom = 14; // default zoom
    heroMap(_latitude,_longitude, element, markerTarget, sidebarResultTarget, showMarkerLabels, mapDefaultZoom);


</script>
</div>

</body>
