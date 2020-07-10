<?php include 'header.php'; ?>
<?php
if (!isset($_COOKIE["sId"]) || $_COOKIE["sId"] != 'admin') {
    header('Location:admin_create_accounts.php');
}
?>

<!-- banner part start-->
<section class="banner_part" onclick="window.history.pushState('', '', '/jdslk_projects/clinic-management-system-cbu-project/admin_create_accounts.php');">
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
                                <input type="text" class="form-control" name="sFName" placeholder="First Name" autofocus required autocomplete="off">
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <input type="text" class="form-control" name="sLName" placeholder="Last Name" autofocus required autocomplete="off">
                            </div>
                            <div class="form-group col-md-12 mt-3">
                                <input type="number" class="form-control autoSNo" name="sNo" placeholder="Staff No. (Auto Generated)" autofocus required autocomplete="off">
                            </div>
                            <div class="form-select col-md-12 mb-4">
                                <select class="bg-transparent border rounded font-medium" name="sTitle" required>
                                    <option value="" selected>- Select Title -</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Pharmacist">Pharmacist</option>
                                    <option value="Lab Technician">Lab Technician</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Receptionist">Receptionist</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mt-4">
                                <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="off">
                            </div>
                            <div class="regerv_btn">
                                <a id="registerSubmitBtn" class="btn_2 d-none d-lg-block text-white hand">Create</a>
                            </div>
                            <div class="text-center col-md-12 mt-4">
                                <a href="/index.php" class="underline">Sign Out</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner_img">
                    <button class="btn border-1 text-info p-absolute" id="loadUsers" data-toggle="modal" data-target="#myModal">View Current Staff</button>
                    <img src="img/banner_img.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<?php include 'footer.php'; ?>