<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nextOffice"]) && isset($_POST["rId"])) {

    $rId = $_POST["rId"];

    if ($_POST["nextOffice"] == 'toDoctor') {

        if (
            isset($_POST["rTemp"]) &&
            isset($_POST["rBP"]) &&
            isset($_POST["rWeight"]) &&
            !empty($_POST["rTemp"]) &&
            !empty($_POST["rBP"]) &&
            !empty($_POST["rWeight"])
        ) {

            $rTemp = $_POST["rTemp"];
            $rBP = $_POST["rBP"];
            $rWeight = $_POST["rWeight"];

            $sql = "UPDATE pRecords SET rTemp = '$rTemp', rBP = '$rBP', rWeight = '$rWeight', rStatus = '1', rDestination = 'Doctor' WHERE rId = $rId";

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

                header('Location: patient_list.php?msg=SUCCESS: Patient Sent to Doctor\'s office&type=true');
            }
        }
    } elseif ($_POST["nextOffice"] == 'toPharmacist') {

        if (
            isset($_POST["rDiagnosis"]) &&
            isset($_POST["rPrescription"]) &&
            !empty($_POST["rDiagnosis"]) &&
            !empty($_POST["rPrescription"])
        ) {

            $rDiagnosis = $_POST["rDiagnosis"];
            $rPrescription = $_POST["rPrescription"];

            $sql = "UPDATE pRecords SET rDiagnosis = '$rDiagnosis', rPrescription = '$rPrescription', rStatus = '1', rDestination = 'Pharmacist' WHERE rId = $rId";

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

                header('Location: patient_list.php?msg=SUCCESS: Patient Sent to the Pharmacy&type=true');
            }
        }
    } elseif ($_POST["nextOffice"] == 'toLab') {

        $sql = "UPDATE pRecords SET rStatus = '1', rDestination = 'Lab Technician' WHERE rId = $rId";

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

            header('Location: patient_list.php?msg=SUCCESS: Patient Sent to the lab&type=true');
        }
    } elseif ($_POST["nextOffice"] == 'toFinish') {

        $Id = $_COOKIE["pId"];

        $sql2 = 'UPDATE staff SET sStatus = "0" WHERE sNo = ' . $Id;
        mysqli_query($conn, $sql2);
        $sql3 = 'UPDATE patients SET pStatus = "0" WHERE pReg = ' . $Id;
        mysqli_query($conn, $sql3);

        $sql = 'DELETE FROM pRecords WHERE rId = ' . $rId;
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

            header('Location: patient_list.php?msg=SUCCESS: Finished attending to patient&type=true');
        }
    } elseif ($_POST["nextOffice"] == 'backToDoctor') {
        if (
            isset($_POST["rLabResults"]) &&
            !empty($_POST["rLabResults"])
        ) {

            $rLabResults = $_POST["rLabResults"];

            $sql = "UPDATE pRecords SET rLabResults = '$rLabResults', rStatus = '1', rDestination = 'Doctor' WHERE rId = $rId";

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

                header('Location: patient_list.php?msg=SUCCESS: Patient Sent back to Doctor\'s office&type=true');
            }
        }
    }
}//end if(POST)