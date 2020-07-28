<?php
if (!isset($_COOKIE["sId"]) && !isset($_COOKIE["admin"])) {
    header('Location:db/logOut.php');
} elseif (isset($_COOKIE["sId"])) {
    //route to list view
    if ($_COOKIE["sTitle"] == 'Receptionist') {
        header('Location: add_patient.php');
    } elseif ($_COOKIE["sTitle"] == 'Doctor') {
        header('Location: doctor.php');
    } elseif ($_COOKIE["sTitle"] == 'Lab Technician') {
        header('Location: lab.php');
    } elseif ($_COOKIE["sTitle"] == 'Pharmacist') {
        header('Location: pharmacy.php');
    }
}
include 'header.php';
?>

<!--::regervation_part start::-->
<section class="regervation_part section_padding">
    <div class="container">
        <h1 class="text-white text-center">Nurse's Office</h1>
        <div class="row align-items-center regervation_content">
            <div class="col-lg-12">
                <div class="regervation_part_iner">
                <form method="post" id="nextOfficeForm" action="db/nextOffice_db.php" autocomplete="on">
                        <br>
                        <div class="form-row">
                            <h3 class="col-md-12 text-white">Patient Details</h3>
                            <br>
                            <br>
                            <div class="form-group col-md-4">
                                <label class="text-white text-bold">Full Name</label>
                                <input type="text" value="<?php if (isset($_COOKIE["rFullName"])){echo $_COOKIE["rFullName"];} ?>" disabled class="form-control disabled">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="text-white text-bold">Age (years)</label>
                                <input type="text" value="<?php if (isset($_COOKIE["rAge"])){echo $_COOKIE["rAge"];} ?>" disabled class="form-control disabled">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="text-white text-bold">Sex</label>
                                <input type="text" value="<?php if (isset($_COOKIE["rSex"])){echo $_COOKIE["rSex"];} ?>" disabled class="form-control disabled">
                                <br>
                            </div>
                            <h3 class="col-md-12 text-white">Patient Vitals</h3>
                            <br>
                            <br>
                            <div class="form-group col-md-12">
                                <label class="text-white text-bold">Temperature (&#8451;)</label>
                                <input type="text" value="" class="form-control" name="rTemp">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="text-white text-bold">BP (Hmg)</label>
                                <input type="text" value="" class="form-control" name="rBP">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="text-white text-bold">Weight (Kg)</label>
                                <input type="text" value="" class="form-control" name="rWeight">
                            </div>
                        </div>
                        <input type="hidden" name="nextOffice" value="toDoctor">
                        <input type="hidden" name="rId" value="<?php if (isset($_COOKIE["rId"])){echo $_COOKIE["rId"];} ?>">
                        <div class="regerv_btn">
                            <a href="#!" class="btn_2 d-none d-lg-block" id="sendToNextOffice">Send to Doctor</a>
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

<?php include 'footer.php'; ?>