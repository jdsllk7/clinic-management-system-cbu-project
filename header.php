<?php
include 'db/connect.php';
include 'db/vars.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CBU - Clinic</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- custom CSS -->
    <link rel="stylesheet" href="css/mystyle.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/favicon.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <h3 class="nav-link" href="index.php" style="font-size:xx-large; color: #0065e1;">
                                        CLINIC</h3>
                                </li>
                            </ul>
                        </div>
                        <?php
                        if (isset($_COOKIE["admin"]) && !isset($_COOKIE["sId"])) {
                            echo '<a class="btn-sm btn-link ml-2" href="#!" id="loadUsers" data-toggle="modal" data-target="#myModal">View Staff</a>';
                        }
                        if (!isset($_COOKIE["admin"]) && isset($_COOKIE["sId"])) {
                            echo '<a class="btn-sm btn-link ml-2" href="">Open Queue</a>';
                        }
                        if (!isset($_COOKIE["admin"]) && isset($_COOKIE["sId"])) {
                            echo '<a class="btn-sm btn-link ml-2" href="#!" onclick="displayAlertMsgPhp(\'Logged in as '.$_COOKIE["sFName"].' '.$_COOKIE["sLName"].' ('.$_COOKIE["sTitle"].')\',true)">Hi '.$_COOKIE["sFName"].'</a>';
                        }
                        if (isset($_COOKIE["admin"]) || isset($_COOKIE["sId"])) {
                            echo '<a class="btn-sm btn-link ml-2" href="db/logOut.php">Logout</a>';
                        }
                        ?>
                        
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- Toast msg -->
    <div class="toast m-3 text-center hide bg-white" role="alert" aria-live="assertive" aria-atomic="false" style="min-width: 200px; position: fixed; z-index: 9999;" data-delay="10000">
        <div class="toast-header">
            <span class="mdi mdi-message mdi-18px"></span>
            <strong class="mr-auto ml-2">Alert</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body p-4">
            Hello there, in the weldi!
        </div>
    </div>