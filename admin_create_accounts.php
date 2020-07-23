<?php include 'header.php'; ?>
<?php
if (!isset($_COOKIE["sId"]) && !isset($_COOKIE["admin"])) {
    header('Location:index.php');
} elseif (isset($_COOKIE["sId"])) {
    //route to list view
    if ($_COOKIE["sTitle"] == 'Nurse') {
        header('Location: nurse.php');
    } elseif ($_COOKIE["sTitle"] == 'Doctor') { 
        header('Location: doctor.php');
    } elseif ($_COOKIE["sTitle"] == 'Lab Technician') {
        header('Location: lab.php');
    } elseif ($_COOKIE["sTitle"] == 'Pharmacist') {
        header('Location: pharmacy.php');
    }elseif ($_COOKIE["sTitle"] == 'Receptionist'){
        header('Location: add_patient.php');
    }
}
?>

<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-xl-5">
                <div class="banner_text">
                    <div class="m-t-200 border-1 p-4">
                        <?php include 'db/register_db.php'; ?>
                        <form method="post" id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off">
                            <h3 class="col-md-12">
                                ADMIN - CREATE ACCOUNT
                            </h3>
                            <br>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="sFName" placeholder="First Name" title="First Name" autofocus required autocomplete="off">
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <input type="text" class="form-control" name="sLName" placeholder="Last Name" title="Last Name" autofocus required autocomplete="off">
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <input type="number" class="form-control" name="sAge" placeholder="Age" title="Age" autofocus required autocomplete="off">
                            </div>
                            <div class="form-select col-md-12 mb-4">
                                <select class="bg-transparent border rounded form-control" name="sSex" name="Sex" required>
                                    <option value="" selected>- Select Sex -</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <input type="number" class="form-control autoSNo" name="sNo" placeholder="Staff No." title="Staff No." autofocus required autocomplete="off">
                            </div>
                            <div class="form-select col-md-12 mb-4">
                                <select class="bg-transparent border rounded form-control" name="sTitle" title="Title" style="line-height: 30px;" required>
                                    <option value="" selected>- Select Title -</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Pharmacist">Pharmacist</option>
                                    <option value="Lab Technician">Lab Technician</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Receptionist">Receptionist</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mt-4">
                                <input type="password" class="form-control" name="password" placeholder="Password" title="Password" required autocomplete="off">
                            </div>
                            <div class="regerv_btn">
                                <a id="registerSubmitBtn" class="btn_2 d-none d-lg-block text-white hand">Create Account</a>
                            </div>
                            <!-- <div class="text-center col-md-12 mt-4">
                                <a href="/index.php" class="underline">Sign Out</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner_img">
                    <!-- <button class="btn border-1 text-info p-absolute" id="loadUsers" data-toggle="modal" data-target="#myModal">View Current Staff</button> -->
                    <img src="img/banner_img.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<?php include 'footer.php'; ?>