<?php
include 'connect.php';
if (isset($_COOKIE["sTitle"])) {

    $rDestination = $_COOKIE["sTitle"];

    $sql = "UPDATE pRecords SET rStatus = '1' WHERE rDestination = '$rDestination'";

    if (mysqli_query($conn, $sql)) {
        setcookie('rId', '', time() - 3600, "/");
        setcookie('rFullName', '', time() - 3600, "/");
        setcookie('rAge', '', time() - 3600, "/");
        setcookie('rSex', '', time() - 3600, "/");
        setcookie('rTemp', '', time() - 3600, "/");
        setcookie('rBP', '', time() - 3600, "/");
        setcookie('rWeight', '', time() - 3600, "/");
        setcookie('rDiagnosis', '', time() - 3600, "/");
        setcookie('rPrescription', '', time() - 3600, "/");
        setcookie('rLabResults', '', time() - 3600, "/");
        setcookie('rDate', '', time() - 3600, "/");
        setcookie('rStatus', '', time() - 3600, "/");
        setcookie('rType', '', time() - 3600, "/");
        setcookie('rDestination', '', time() - 3600, "/");
        setcookie('pType', '', time() - 3600, "/");
        setcookie('pId', '', time() - 3600, "/");
        setcookie('audio', '', time() - 3600, "/");

        header('Location: ../patient_list.php?msg=Your office is now empty. You may re-call your patient to come back in&type=true');
    }
} elseif (isset($_COOKIE["admin"])) {
    $sql = "UPDATE pRecords SET rStatus = '1'";

    if (mysqli_query($conn, $sql)) {
        setcookie('rId', '', time() - 3600, "/");
        setcookie('rFullName', '', time() - 3600, "/");
        setcookie('rAge', '', time() - 3600, "/");
        setcookie('rSex', '', time() - 3600, "/");
        setcookie('rTemp', '', time() - 3600, "/");
        setcookie('rBP', '', time() - 3600, "/");
        setcookie('rWeight', '', time() - 3600, "/");
        setcookie('rDiagnosis', '', time() - 3600, "/");
        setcookie('rPrescription', '', time() - 3600, "/");
        setcookie('rLabResults', '', time() - 3600, "/");
        setcookie('rDate', '', time() - 3600, "/");
        setcookie('rStatus', '', time() - 3600, "/");
        setcookie('rType', '', time() - 3600, "/");
        setcookie('rDestination', '', time() - 3600, "/");
        setcookie('pType', '', time() - 3600, "/");
        setcookie('pId', '', time() - 3600, "/");
        setcookie('audio', '', time() - 3600, "/");
        header('Location: ../admin_create_accounts.php?msg=All offices are now empty&type=true');
    }
}
