<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>medical</title>
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
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="img/favicon.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">

                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="index.html">Home</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="add_patient.html">Add Patient</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="stuff_list.html">Stuff List</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="emergency_list.html">Emergency List</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="patient_list.html">Patient List</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="doctor.html">Doctor</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="nurse.html">Nurse</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="lab.html">Lab</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link text-white" href="pharmacy.html">Pharmacy</a>
                                </li>

                            </ul>
                        </div>
                        <a class="btn_2 d-none d-lg-block" href="index.html">Home</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-7">
                    <h1 class="text-white text-center">Reception Desk</h1>
                    <br>
                    <div class="regervation_part_iner">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12 row">
                                    <h3 class="col-md-12 text-white">Search for Patient</h3>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control searchInput"
                                            placeholder="Search by name..." title="Search James or Luke">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <a class="genric-btn default-border bg-transparent e-large text-white searchPatientBtn">Search</a>
                                    </div>
                                </div>
                                <div class="col-lg-9 searchResults hide">
                                    <label class="text-white">Search results:</label>
                                    <ul class="list-group col-md-12">
                                        <li class="list-group-item">James Banda <span class="badge-info p-1">Patient</span><a href="patient_list.html" class="badge right">Add</a></li>
                                        <li class="list-group-item">Luke Mulenga <span class="badge-info p-1">Stuff</span><a href="stuff_list.html" class="badge right">Add</a></li>
                                    </ul>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>

                                <h3 class="col-md-12 text-white">New Patient</h3>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="inputPassword4"
                                        placeholder="Age">
                                </div>
                                <div class="form-group col-md-12">
                                    <select class="form-control" id="Select">
                                        <option value="1" selected>- Select Sex -</option>
                                        <option value="2">Male</option>
                                        <option value="3">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <select class="form-control selectType">
                                        <option value="1" selected>- Select Type -</option>
                                        <option value="patient">Patient</option>
                                        <option value="stuff">Stuff</option>
                                        <option value="emergency">Emergency</option>
                                    </select>
                                </div>
                            </div>
                            <div class="regerv_btn">
                                <a class="btn_2 d-none d-lg-block addToListBtn">Add</a>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->
    <!-- jquery plugins here-->

    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- contact js -->
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script src="js/myScript.js"></script>
</body>

</html>