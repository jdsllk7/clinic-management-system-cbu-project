<?php

include '../db/connect.php';
$data = $_POST['data'];

if (isset($data)) {

    if (
        isset($_POST["pFullName"]) &&
        isset($_POST["pAge"]) &&
        isset($_POST["pSex"]) &&
        isset($_POST["pType"]) &&
        isset($_POST["rDestination"]) &&
        isset($_POST["pReg"]) &&
        !empty($_POST["pFullName"]) &&
        !empty($_POST["pAge"]) &&
        !empty($_POST["pSex"]) &&
        !empty($_POST["pType"]) &&
        !empty($_POST["rDestination"]) &&
        !empty($_POST["pReg"])
    ) {
        $pFullName = $_POST["pFullName"];
        $pAge = $_POST["pAge"];
        $pSex = $_POST["pSex"];
        $rType = $_POST["pType"];
        $rDestination = $_POST["rDestination"];
        $pReg = $_POST["pReg"];

        //insert------------------
        $sql = "INSERT INTO patients (
        pFullName,
        pAge,
        pSex,
        pReg
        ) VALUES (
          '$pFullName',
          '$pAge',
          '$pSex',
           $pReg
          )";

        $data = mysqli_query($conn, "SELECT * FROM patients WHERE pReg=$pReg");

        $data1 = mysqli_query($conn, "SELECT * FROM staff WHERE sNo=$pReg");

        if (mysqli_num_rows($data) == 0 && mysqli_num_rows($data1) == 0) {

            if (mysqli_query($conn, $sql)) {

                $sql1 = "INSERT INTO pRecords (
                rFullName,
                rAge,
                rSex,
                rTemp,
                rBP,
                rWeight,
                rDiagnosis,
                rPrescription,
                rLabResults,
                rType,
                rDestination,
                pType,
                pId
                ) VALUES (
                    '$pFullName',
                     $pAge,
                    '$pSex',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '$rType',
                    '$rDestination',
                    'Patient',
                     $pReg
                )";

                if (mysqli_query($conn, $sql1)) {

                    echo 'success';
                }
            }
        } else {
            echo 'fail';
        }
    } else {
        echo 'fail';
    }
}//end if(POST)