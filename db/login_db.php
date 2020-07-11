<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["staffID"]) &&
        isset($_POST["staffPassword"]) &&
        !empty($_POST["staffID"]) &&
        !empty($_POST["staffPassword"])

    ) {

        $staffID = $_POST['staffID'];
        $staffPassword = $_POST['staffPassword'];

        if ($staffID != 00000 && $staffPassword != '00000') {

            $data = mysqli_query($conn, "SELECT * FROM staff WHERE sNo='$staffID' AND password='$staffPassword'");

            if (mysqli_num_rows($data) == 1) {

                $user = mysqli_fetch_assoc($data);
                setcookie('sId', $user['sId'], time() + (86400 * 30), "/");
                setcookie('sNo', $user['sNo'], time() + (86400 * 30), "/");
                setcookie('sFName', $user['sFName'], time() + (86400 * 30), "/");
                setcookie('sLName', $user['sLName'], time() + (86400 * 30), "/");
                setcookie('sTitle', $user['sTitle'], time() + (86400 * 30), "/");

                if ($user['sTitle'] == 'Doctor') {
                    header('Location: patient_list.php?msg=SUCCESS: Login Successful&type=true');

                } elseif ($user['sTitle'] == 'Pharmacist') {
                    header('Location: patient_list.php?msg=SUCCESS: Login Successful&type=true');

                } elseif ($user['sTitle'] == 'Lab Technician') {
                    header('Location: patient_list.php?msg=SUCCESS: Login Successful&type=true');

                } elseif ($user['sTitle'] == 'Nurse') {
                    header('Location: patient_list.php?msg=SUCCESS: Login Successful&type=true');

                } elseif ($user['sTitle'] == 'Receptionist') {
                    header('Location: add_patient.php?msg=SUCCESS: Login Successful&type=true');
                }else{
                    header('Location: logOut.php?msg=ERROR: You have not been assigned a title&type=false');
                }

            } else {
                header('Location: index.php?msg=ERROR: Incorrect Credentials&type=false');
            }
        } else {
            setcookie('admin', "admin", time() + (86400 * 30), "/");
            header('Location: admin_create_accounts.php?msg=SUCCESS: Welcome Admin&type=true');
        }
    }
}
