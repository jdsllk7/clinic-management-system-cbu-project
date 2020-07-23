<?php
include '../db/connect.php';
$refNo = $_POST['refNo'];
$type = $_POST['type'];
$rType = $_POST['rType'];
$destination = $_POST['destination'];

if (isset($refNo)) {

    if ($type == 'addTOListP') {

        //get patients details from pTable
        $patients = mysqli_query($conn, "SELECT * FROM patients WHERE pReg = " . $refNo);
        $data = mysqli_fetch_assoc($patients);
        $pFullName = $data['pFullName'];
        $pAge = $data['pAge'];
        $pSex = $data['pSex'];

        //update patients status = 1
        $sql = 'UPDATE patients SET pStatus = "1" WHERE pReg = ' . $refNo;
        if (mysqli_query($conn, $sql)) {
            $pRecords = mysqli_query($conn, "SELECT * FROM pRecords WHERE pId = " . $refNo);
            if (mysqli_num_rows($pRecords) == 0) {
                //insert to records table
                if (addToRecordsTable($conn, $pFullName, $pAge, $pSex, $rType, $destination, 'Patient', $refNo) == true) {
                    echo 'success';
                } else {
                    echo 'fail';
                }
            }
        }
    } elseif ($type == 'removeFromListP') {
        //update patients status = 0
        $sql = 'UPDATE patients SET pStatus = "0" WHERE pReg = ' . $refNo;
        if (mysqli_query($conn, $sql)) {
            $pRecords = mysqli_query($conn, "SELECT * FROM pRecords WHERE pId = " . $refNo);
            if (mysqli_num_rows($pRecords) == 1) {
                //insert to records table
                $sql = 'DELETE FROM pRecords WHERE pId = ' . $refNo;
                if (mysqli_query($conn, $sql)) {
                    echo 'success';
                } else {
                    echo 'fail';
                }
            }
        }
    } elseif ($type == 'addTOListS') {
        //get staff details from sTable
        $staff = mysqli_query($conn, "SELECT * FROM staff WHERE sNo = " . $refNo);
        $data = mysqli_fetch_assoc($staff);
        $pFullName = $data['sFName'] . ' ' . $data['sLName'];
        $pAge = $data['sAge'];
        $pSex = $data['sSex'];

        //update patients status = 1
        $sql = 'UPDATE staff SET sStatus = "1" WHERE sNo = ' . $refNo;
        if (mysqli_query($conn, $sql)) {
            $pRecords = mysqli_query($conn, "SELECT * FROM pRecords WHERE pId = " . $refNo);
            if (mysqli_num_rows($pRecords) == 0) {
                //insert to records table
                if (addToRecordsTable($conn, $pFullName, $pAge, $pSex, $rType, $destination, 'Staff Member', $refNo) == true) {
                    echo 'success';
                } else {
                    echo 'fail';
                }
            }
        }
    } elseif ($type == 'removeFromListS') {

        //update staff status = 0
        $sql = 'UPDATE staff SET sStatus = "0" WHERE sNo = ' . $refNo;
        if (mysqli_query($conn, $sql)) {
            $pRecords = mysqli_query($conn, "SELECT * FROM pRecords WHERE pId = " . $refNo);
            if (mysqli_num_rows($pRecords) == 1) {
                //insert to records table
                $sql = 'DELETE FROM pRecords WHERE pId = ' . $refNo;
                if (mysqli_query($conn, $sql)) {
                    echo 'success';
                } else {
                    echo 'fail';
                }
            }
        }
    } elseif ($type == 'deletePatient') {
        $sql = 'DELETE FROM pRecords WHERE pId = ' . $refNo;
        $sql1 = 'DELETE FROM patients WHERE pReg = ' . $refNo;
        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
            echo 'success';
        } else {
            echo 'fail';
        }
    } else {
        echo '<p>Failed to load data. Reload page & try again</p>';
    }
} else {
    echo '<p>Failed to load data. Reload page & try again</p>';
}

function addToRecordsTable($conn, $fullName, $age, $sex, $rType, $destination, $pType, $id)
{
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
            '$fullName',
             $age,
            '$sex',
            '',
            '',
            '',
            '',
            '',
            '',
            '$rType',
            '$destination',
            '$pType',
             $id
        )";

    if (mysqli_query($conn, $sql1)) {
        return true;
    } else {
        return false;
    }
}
