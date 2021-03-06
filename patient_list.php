<?php
if (!isset($_COOKIE["sId"]) && !isset($_COOKIE["admin"])) {
  header('Location:db/logOut.php');
}
?>
<?php include 'header.php'; ?>



<!-- banner part start-->
<section class="banner_part">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12 col-xl-12">

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <?php
        if ($_COOKIE["sTitle"] != 'Receptionist') {
          echo '<button class="btn btn-primary right callNextPatientBtn text-white hand">Call Next Patient</button>';
        }
        ?>

        <h2 class="col-md-12 text-dark left mb-3">Patients Queue (<?php echo $_COOKIE["sTitle"];?>)</h2>


        <div>
          <table class="table table-striped table-bordered table-hover font-large">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">SIN / I.D No.</th>
                <th class="text-center">Full Name</th>
                <?php
                if ($_COOKIE["sTitle"] == 'Receptionist') {
                  echo '<th class="text-center">Next Office</th>';
                } else {
                  echo '<th class="text-center">Sex</th>';
                }
                ?>
                <th class="text-center">Type</th>
              </tr>
            </thead>
            <tbody id="loadPatientsList">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- banner part start-->


<?php include 'footer.php'; ?>