<?php include 'header.php'; ?>
<?php
if (isset($_COOKIE["admin"])) {
    header('Location:admin_create_accounts.php');
} elseif (isset($_COOKIE["sId"])) {
    //route to list view
    if ($_COOKIE["sTitle"] == 'Receptionist') {
        header('Location:add_patient.php');
    } elseif ($_COOKIE["sTitle"] == 'Nurse') {
        header('Location:oooooo.php');
    } elseif ($_COOKIE["sTitle"] == 'Doctor') {
        header('Location:oooooo.php');
    } elseif ($_COOKIE["sTitle"] == 'Lab Technician') {
        header('Location:oooooo.php');
    } elseif ($_COOKIE["sTitle"] == 'Pharmacist') {
        header('Location:oooooo.php');
    }
}
?>

<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-xl-5">
                <div class="banner_text">
                    <div class="m-t-300 border-1 p-4">
                        <?php include 'db/login_db.php'; ?>
                        <form method="post" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="on">
                            <h3 class="col-md-12">SIGN IN</h3>
                            <br>
                            <div class="form-group col-md-12">
                                <input type="number" max="9999" class="form-control" name="staffID" placeholder="Staff I.D" autofocus>
                            </div>
                            <div class="form-group col-md-12 mt-4">
                                <input type="password" class="form-control" name="staffPassword" placeholder="Password">
                            </div>
                            <div class="regerv_btn">
                                <a id="loginSubmitBtn" class="btn_2 d-none d-lg-block text-white hand">Sign in</a>
                            </div>
                            <!-- <div class="text-center col-md-12 mt-4">
                                <a href="/admin_create_accounts.php" class="underline">Create Account</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner_img">
                    <img src="img/banner_img.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<?php include 'footer.php'; ?>