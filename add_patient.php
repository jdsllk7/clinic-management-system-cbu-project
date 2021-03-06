<?php
if (!isset($_COOKIE["sId"]) && !isset($_COOKIE["admin"])) {
    header('Location:db/logOut.php');
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
    }
}
?>
<?php include 'header.php'; ?>

<!--::regervation_part start::-->
<section class="regervation_part section_padding">
    <div class="container">
        <div class="row align-items-center regervation_content">
            <div class="col-lg-7">
                <h1 class="text-white text-center">
                    <span class="float-left">Reception Desk</span>
                    <button class="btn btn-light" id="loadSearchPatients" data-toggle="modal" data-target="#myModal">
                        Search
                        <i class="ti-search pl-3"></i>
                    </button>
                </h1>
                <br>
                <div class="regervation_part_iner">
                    <!-- <?php include 'db/addNewPatient.php'; ?> -->
                    <form method="post" id="addToListBtnForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off">
                        <div class="form-row">
                            <h3 class="col-md-12 text-white mb-3">Add New Patient</h3>
                            <div class="form-group col-md-6">
                                <label class="text-white text-bold">Full Name</label>
                                <input type="text" class="form-control" name="pFullName" placeholder="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="text-white text-bold">Age</label>
                                <input type="text" class="form-control" name="pAge" placeholder="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="text-white text-bold">Select Sex</label>
                                <select class="form-control" name="pSex">
                                    <option value="" selected>- Select -</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="text-white text-bold">Select Type</label>
                                <select class="form-control selectType" name="pType">
                                    <option value="" selected>- Select -</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Emergency">Emergency</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="text-white text-bold">Next Destination</label>
                                <select class="form-control selectType" name="rDestination">
                                    <option value="" selected>- Select -</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Lab Technician">Lab Technician</option>
                                    <option value="Pharmacist">Pharmacist</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="text-white text-bold">SIN / I.D Number</label>
                                <input type="number" name="pReg" class="form-control" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="regerv_btn">
                            <a href="#!" class="btn_2 d-none d-lg-block addToWaitingListBtn">Add To Queue</a>
                        </div>
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

<?php include 'footer.php'; ?>