<?php

include '../db/connect.php';
$data = $_POST['data'];

if (isset($data)) {

    if (
        isset($_POST["pFullName"]) &&
        isset($_POST["pAge"]) &&
        isset($_POST["pSex"]) &&
        isset($_POST["pType"]) &&
        isset($_POST["pReg"]) &&
        !empty($_POST["pFullName"]) &&
        !empty($_POST["pAge"]) &&
        !empty($_POST["pSex"]) &&
        !empty($_POST["pType"]) &&
        !empty($_POST["pReg"])
    ) {
        $pFullName = $_POST["pFullName"];
        $pAge = $_POST["pAge"];
        $pSex = $_POST["pSex"];
        $pType = $_POST["pType"];
        $pReg = $_POST["pReg"];

        //insert------------------
        $sql = "INSERT INTO patients (
        pFullName,
        pAge,
        pSex,
        pReg,
        pType
        ) VALUES (
          '$pFullName',
          '$pAge',
          '$pSex',
          '$pReg',
          '$pType'
          )";

        $data = mysqli_query($conn, "SELECT * FROM patients WHERE pReg=$pReg");

        if (mysqli_num_rows($data) == 0) {

            mysqli_query($conn, $sql);
            echo 'success';
        } else {
            echo 'fail';
        }
    } else {
        echo 'fail';
    }
}//end if(POST)