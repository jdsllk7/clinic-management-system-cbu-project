<?php

include '../db/connect.php';
$id = $_POST['data'];

if (isset($id)) {

    $rDestination = $_COOKIE["sTitle"];

    $data = mysqli_query($conn, "SELECT * FROM pRecords WHERE rDestination = '$rDestination' AND rStatus = '0'");
    if (mysqli_num_rows($data) > 0) {
        echo 'occupied';
    } else {

        $data = mysqli_query($conn, "SELECT * FROM pRecords WHERE rId = $id");

        if (mysqli_num_rows($data) == 1) {

            $user = mysqli_fetch_assoc($data);
            setcookie('rId', $user['rId'], time() + (86400 * 30), "/");
            setcookie('rFullName', $user['rFullName'], time() + (86400 * 30), "/");
            setcookie('rAge', $user['rAge'], time() + (86400 * 30), "/");
            setcookie('rSex', $user['rSex'], time() + (86400 * 30), "/");
            setcookie('rTemp', $user['rTemp'], time() + (86400 * 30), "/");
            setcookie('rBP', $user['rBP'], time() + (86400 * 30), "/");
            setcookie('rWeight', $user['rWeight'], time() + (86400 * 30), "/");
            setcookie('rDiagnosis', $user['rDiagnosis'], time() + (86400 * 30), "/");
            setcookie('rPrescription', $user['rPrescription'], time() + (86400 * 30), "/");
            setcookie('rLabResults', $user['rLabResults'], time() + (86400 * 30), "/");
            setcookie('rDate', $user['rDate'], time() + (86400 * 30), "/");
            setcookie('rStatus', $user['rStatus'], time() + (86400 * 30), "/");
            setcookie('rType', $user['rType'], time() + (86400 * 30), "/");
            setcookie('rDestination', $user['rDestination'], time() + (86400 * 30), "/");
            setcookie('pType', $user['pType'], time() + (86400 * 30), "/");
            setcookie('pId', $user['pId'], time() + (86400 * 30), "/");
            
            if (mysqli_query($conn, "UPDATE pRecords SET rStatus = '0' WHERE rId = $id")) {
                $audio = $user['rFullName'] . ' please go to the ' .  $user['rDestination'] . '\'s office';
                echo $audio;
                setcookie('audio', $audio, time() + (86400 * 30), "/");
            }else{
                echo 'error';
            }

        }else{
            echo 'error';
        }
    }
}//end if(POST)